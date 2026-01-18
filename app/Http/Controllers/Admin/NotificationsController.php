<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\NewMemberRegistration;
use App\Notifications\TransactionNotification;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class NotificationsController extends Controller
{
    use Notifiable;
    //


    public function notify_user(User $user, $intoLines, $outroLines, $subject, $actionText, $actionUrl)
    {
        $user->notify(new NewMemberRegistration($intoLines, $outroLines, $subject, $actionText, $actionUrl));
    }

    public function get_user_notifications()
    {
        $user = User::where('username', app('current_user')->username)->first();
        $notifications = $user->notifications;
        $unread = $user->unreadNotifications;
//        dd($notifications);

        return view('includes.notifications', compact('notifications', 'unread'));
    }

    public function get_unread_notifications()
    {
        $user = User::where('username', app('current_user')->username)->first();
        $unread = $user->unreadNotifications;
//        dd(count($unread));

        return count($unread);
    }

    public function mark_notifications_read(User $user)
    {
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return json_encode(["success"=>"success"]);
    }

    public function credit_notification(User $user, $amount, $type, $for)
    {
        $intoLines = "your Account has benn credited with NGN".$amount;
        $outroLines = "Credited for ". $for;
        $subject = "ACCOUNT CREDITED";
        $actionText = "View Details";
        $actionUrl = route('dashboard');
        $user->notify(new TransactionNotification($type, $intoLines, $outroLines, $subject, $actionText, $actionUrl));
    }

    public function debit_notification(User $user, $amount, $type, $for)
    {
        $intoLines = "your Account has benn DEBITED with NGN".$amount;
        $outroLines = "The DEBIT was for ". $for;
        $subject = "ACCOUNT DEBITED";
        $actionText = "View Details";
        $actionUrl = route('dashboard');
        $user->notify(new TransactionNotification($type, $intoLines,  $outroLines, $subject, $actionText, $actionUrl));
    }
}
