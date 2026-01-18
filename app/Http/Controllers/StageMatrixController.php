<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StageMatrix;
use App\Rank;
use Illuminate\Support\Facades\Auth;

class StageMatrixController extends Controller
{
    protected $seen = null;

    /**
     * Check and update the current user's stage matrix with query optimizations.
     */
    public function check_stage_matrix()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $username    = $user->username;
        $stage       = $user->stage;
        $level       = $user->level;
        $leftIndexId  = $user->left_index;   // this stores a User id
        $rightIndexId = $user->right_index;  // this stores a User id

        // Fetch rank bonuses in one query
        $rank = Rank::select('SDB', 'RCB')->where('id', $stage)->first();
        $sdb = $rank ? ($rank->SDB ?? 0) : 0;
        $scb = $rank ? ($rank->RCB ?? 0) : 0;

        // Get or create current stage matrix in one shot
        $stageMatrix = StageMatrix::firstOrCreate(
            ['username' => $username, 'stage' => $stage],
            ['status' => 'active']
        );

        // Prepare caches to avoid repeated queries
        $userCacheById = [];
        $userCacheByUsername = [];
        $matrixCacheByUserStage = [];

        // Prime caches for immediate left/right candidates with a single query
        $immediateIds = array_filter([$leftIndexId, $rightIndexId]);
        $immediateUsers = $this->fetchUsersByIds($immediateIds);
        foreach ($immediateUsers as $u) {
            $userCacheById[$u->id] = $u;
            $userCacheByUsername[$u->username] = $u;
        }

        // Positions mapping
        $leftPositions  = [1, 3, 4];
        $rightPositions = [2, 5, 6];

        // Current filled usernames to avoid duplicates
        $inMatrix = $this->get_in_matrix($stageMatrix);

        // Fill positions p1–p6 with minimal queries
        for ($i = 1; $i <= 6; $i++) {
            $pos = 'p' . $i;

            if ($stageMatrix->$pos !== null) {
                continue;
            }

            // Determine the immediate candidate by side
            $pAccount = null;
            if (in_array($i, $leftPositions) && $leftIndexId) {
                $pAccount = $userCacheById[$leftIndexId] ?? null;
                if (!$pAccount) {
                    // Fetch and cache once
                    $pAccount = User::select('id', 'username', 'stage', 'left_index', 'right_index')->find($leftIndexId);
                    if ($pAccount) {
                        $userCacheById[$pAccount->id] = $pAccount;
                        $userCacheByUsername[$pAccount->username] = $pAccount;
                    }
                }
            } elseif (in_array($i, $rightPositions) && $rightIndexId) {
                $pAccount = $userCacheById[$rightIndexId] ?? null;
                if (!$pAccount) {
                    $pAccount = User::select('id', 'username', 'stage', 'left_index', 'right_index')->find($rightIndexId);
                    if ($pAccount) {
                        $userCacheById[$pAccount->id] = $pAccount;
                        $userCacheByUsername[$pAccount->username] = $pAccount;
                    }
                }
            }

            if (!$pAccount) {
                continue;
            }

            $alreadyInside = in_array($pAccount->username, $inMatrix);

            // Direct placement if same stage and not already used
            if ($pAccount->stage == $stage && !$alreadyInside) {
                $stageMatrix->$pos = $pAccount->username;
                $stageMatrix->save();

                $this->credit_account(
                    $sdb,
                    $user,
                    config('app.credit'),
                    "STAGE_" . $stage . "_DROP_BONUS From " . strtoupper($pos) . " joining you",
                    $stage
                );

                $inMatrix = $this->get_in_matrix($stageMatrix);
                continue;
            }

            // Otherwise, search downlines (BFS up to 11 generations), batched queries
            $nextCandidate = $this->find_next_same_stage_downline_bfs(
                $stage,
                $pAccount,
                $inMatrix,
                $userCacheByUsername,
                $matrixCacheByUserStage
            );

            if ($nextCandidate && !in_array($nextCandidate, $inMatrix)) {
                $stageMatrix->$pos = $nextCandidate;
                $stageMatrix->save();

                $this->credit_account(
                    $sdb,
                    $user,
                    config('app.credit'),
                    "STAGE_" . $stage . "_DROP_BONUS From " . strtoupper($nextCandidate) . " joining you",
                    $stage
                );

                $inMatrix = $this->get_in_matrix($stageMatrix);
                $this->seen = null;
                continue;
            }
        }

        // Completion and stage advancement
        $newLevel = $this->check_stage_level($stageMatrix);
        if ($newLevel['completed'] === true) {
            if ($scb > 0) {
                $this->credit_account(
                    $scb,
                    $user,
                    config('app.credit'),
                    "STAGE_" . $stage . "_COMPLETION_BONUS",
                    $stage
                );
            }

            $stage += 1;
            $level = 0;
            $this->update_stage($stage, $level);

            StageMatrix::firstOrCreate([
                'username' => $user->username,
                'stage'    => $stage
            ], [
                'status' => 'active'
            ]);
        } else {
            $level = $newLevel['level'];
            $this->update_stage($stage, $level);
        }

        return response()->json([
            'stage' => $stage,
            'level' => $level
        ]);
    }

    /**
     * Batched BFS to find the next same-stage downline (up to 11 generations).
     * Minimizes queries by:
     * - Caching users by username
     * - Caching stage matrices by (username, stage)
     * - Fetching children in batches
     */
    protected function find_next_same_stage_downline_bfs(
        int $targetStage,
        User $root,
        array $inMatrix,
        array &$userCacheByUsername,
        array &$matrixCacheByUserStage
    ): ?string {
        // Seed queue with root's current stage matrix p1/p2 children if available
        $queue = [];

        $rootMatrix = $this->getStageMatrixCached($root->username, $root->stage, $matrixCacheByUserStage);
        if ($rootMatrix) {
            $children = array_filter([$rootMatrix->p1, $rootMatrix->p2]);
            foreach ($children as $childUsername) {
                $queue[] = $childUsername;
            }
        }

        $depth = 0;
        $maxDepth = 11;

        while (!empty($queue) && $depth < $maxDepth) {
            $depth++;

            // Batch fetch users for current level
            $currentLevelUsernames = array_values(array_unique($queue));
            $queue = []; // will refill for next level

            $users = $this->fetchUsersByUsernames($currentLevelUsernames, $userCacheByUsername);

            // Early exit: return first valid same-stage candidate not already in matrix
            foreach ($users as $candidate) {
                $inside = in_array($candidate->username, $inMatrix);
                if ($candidate->stage == $targetStage && !$inside) {
                    return $candidate->username;
                }
            }

            // Build next level from each candidate's p1/p2 children (stage-specific matrix)
            $nextLevelUsernames = [];
            foreach ($users as $candidate) {
                $candMatrix = $this->getStageMatrixCached($candidate->username, $candidate->stage, $matrixCacheByUserStage);
                if ($candMatrix) {
                    if ($candMatrix->p1) $nextLevelUsernames[] = $candMatrix->p1;
                    if ($candMatrix->p2) $nextLevelUsernames[] = $candMatrix->p2;
                }
            }

            // Deduplicate before next iteration
            $queue = array_values(array_unique($nextLevelUsernames));
        }

        return null;
    }

    /**
     * Batch-fetch users by IDs (min columns) and cache by id/username.
     */
    protected function fetchUsersByIds(array $ids): array
    {
        if (empty($ids)) return [];
        return User::select('id', 'username', 'stage', 'left_index', 'right_index')
            ->whereIn('id', $ids)
            ->get()
            ->all();
    }

    /**
     * Batch-fetch users by usernames into cache; return cached instances.
     */
    protected function fetchUsersByUsernames(array $usernames, array &$cacheByUsername): array
    {
        $usernames = array_values(array_filter($usernames));
        if (empty($usernames)) return [];

        // Determine which usernames are missing from cache
        $missing = [];
        foreach ($usernames as $uname) {
            if (!isset($cacheByUsername[$uname])) {
                $missing[] = $uname;
            }
        }

        if (!empty($missing)) {
            $fetched = User::select('id', 'username', 'stage', 'left_index', 'right_index')
                ->whereIn('username', $missing)
                ->get();
            foreach ($fetched as $u) {
                $cacheByUsername[$u->username] = $u;
            }
        }

        // Return in the same order as requested
        $result = [];
        foreach ($usernames as $uname) {
            if (isset($cacheByUsername[$uname])) {
                $result[] = $cacheByUsername[$uname];
            }
        }
        return $result;
    }

    /**
     * Cached fetch for StageMatrix by (username, stage).
     */
    protected function getStageMatrixCached(string $username, int $stage, array &$matrixCacheByUserStage): ?StageMatrix
    {
        $key = $username . '|' . $stage;
        if (!array_key_exists($key, $matrixCacheByUserStage)) {
            $matrixCacheByUserStage[$key] = StageMatrix::where('username', $username)
                ->where('stage', $stage)
                ->first();
        }
        return $matrixCacheByUserStage[$key];
    }

    /**
     * Credit account wrapper.
     */
    public function credit_account($amount, $user, $type, $for, $stage)
    {
        $tc = new TransactionController();
        $tc->credit_account($user, $amount, $type, $for, $stage);
        return;
    }

    /**
     * Your original check_stage_level logic preserved.
     */
    public function check_stage_level($stage_matrix)
    {
        $completed = false;
        $count = 0;
        $level = 0;
        $sm = $stage_matrix;

        if ($sm != null) {
            if ($sm->p1 != null || $sm->p2 != null) {
                $level = 1;
            } else {
                $level = 0;
            }

            if ($level == 1) {
                if ($sm->p1 != null && $sm->p2 != null) {
                    if ($sm->p3 != null || $sm->p4 != null || $sm->p5 != null || $sm->p6 != null) {
                        $level = 2;
                    }
                }
            }

            for ($i = 1; $i <= 14; $i++) {
                $pos = 'p' . $i;
                if ($sm->$pos != null) {
                    $count++;
                }
            }

            if ($count == 6) {
                return ['level' => $level, 'completed' => true];
            }
        }

        return ['level' => $level, 'completed' => false];
    }

    /**
     * Update stage and level for current user.
     */
    protected function update_stage($stage, $level)
    {
        User::where('username', auth()->user()->username)
            ->update([
                'stage' => $stage,
                'level' => $level
            ]);
    }

    /**
     * Get already filled positions in matrix (filtered).
     */
    public function get_in_matrix($stage_matrix)
    {
        return array_values(array_filter([
            $stage_matrix->p1,
            $stage_matrix->p2,
            $stage_matrix->p3,
            $stage_matrix->p4,
            $stage_matrix->p5,
            $stage_matrix->p6
        ]));
    }
}

