<?php

namespace App\Http\Controllers;

use App\Bonus;
use App\Matching;
use App\Package;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'member']);
    }

    /**
     * Calculate member matching/pair bonuses.
     * Each match = 3 bottles = 48 PVs = ₦48,000.
     * Bonus per match = ₦48,000 * (package.matching_bonus / 100).
     * Returns total bonus and current month's bonus.
     */
    public function get_matching_bonus(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                "amount" => number_format(0, 2),
                "this_match" => 0,
                "matched" => 0
            ]);
        }

        $left_pvs = (int) $request->left_pvs;
        $right_pvs = (int) $request->right_pvs;

        // Require minimum PVs to qualify
        if ($left_pvs < 48 || $right_pvs < 48) {
            return response()->json([
                "amount" => number_format(0, 2),
                "this_match" => 0,
                "matched" => 0
            ]);
        }

        // Ensure stage is at least 1
        if ($user->stage < 1 || $user->stage === null) {
            $user->stage = 1;
            $user->save();
        }

        // Get user's package
        $package = Package::find($user->package_id);
        if (!$package) {
            return response()->json([
                "amount" => number_format(0, 2),
                "this_match" => 0,
                "matched" => 0,
                "package" => null
            ]);
        }

        // Bonus per match based on package percentage
        $bonus_per_match = 48000 * ($package->matching_bonus / 100);

        // Calculate possible matches
        $left_multiples = intdiv($left_pvs, 48);
        $right_multiples = intdiv($right_pvs, 48);
        $min_leg = min($left_multiples, $right_multiples);

        // Check already matched
        $bonus_type_id = config('app.matching_bonus');
        $user_bonus = Bonus::firstOrCreate(
            ['user_id' => $user->id, 'bonus_type_id' => $bonus_type_id],
            ['amount' => 0, 'last_matched' => 0]
        );

        $last_matched = $user_bonus->last_matched ?? 0;
        $new_matches = max($min_leg - $last_matched, 0);

        // Calculate bonuses
        $new_matching_bonus = $new_matches * $bonus_per_match;
        $total_matching_bonus = ($last_matched + $new_matches) * $bonus_per_match;

        // Update bonus record
        $user_bonus->amount = $total_matching_bonus;
        $user_bonus->last_matched = $min_leg;
        $user_bonus->save();

        // Log current month’s matches
        if ($new_matches > 0) {
            Matching::create([
                'user_id' => $user->id,
                'amount' => $new_matching_bonus,
                'matches' => $new_matches,
                'left_pvs' => $left_pvs,
                'right_pvs' => $right_pvs,
            ]);
        }

        $this_matchings = Matching::where('user_id', $user->id)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('amount');

        return response()->json([
            "amount" => number_format($user_bonus->amount, 2),
            "this_match" => $this_matchings,
            "matched" => $new_matches * 48, // PVs matched this time
            "package" => $package->name,
        ]);
    }

    /**
     * Create a new bonus record for a member.
     */
    public function create_member_bonus(User $user, $bonus_type_id, $matching_bonus)
    {
        $bonus = new Bonus([
            'user_id' => $user->id,
            'bonus_type_id' => $bonus_type_id,
            'amount' => $matching_bonus,
            'last_matched' => 0,
        ]);
        $bonus->save();
        return $bonus;
    }
}