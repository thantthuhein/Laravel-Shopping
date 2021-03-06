<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use DB;
use App\UserFeedback;
use App\User;
use App\Order;
use Carbon\Carbon;
use App\CreditpointsCard;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users/index', ['users' => $users]);
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function promote($id)
    {
        DB::table('users')
        ->where('id', $id)
        ->update(['is_Admin' => true]);
        return redirect()->back();
    }

    public function remove($id)
    {
        DB::table('users')
        ->where('id', $id)
        ->update(['is_Admin' => false]);
        return redirect()->back();
    }

    public function ban(Request $request, $id) 
    {
        $user = User::find($id);
        $user->banned_at = Carbon::now();
        // dd($user->name);
        $user->save();
        return redirect()->back()->with('blocked','Successfully Blocked'. $user->name .'!');
    }

    public function unban($id)
    {
        $user = User::find($id);
        $user->banned_at = NULL;
        $user->save();
        return redirect()->back()->with('unblocked', "Successfully Unblocked". $user->name ."!");
    }

    public function userDetails($id)
    {
        $user = User::find($id);
        // $purchasedCards = $user->creditpointscards;
        $purchasedCards = CreditpointsCard::where('user_id', $id)
            ->latest('purchased_at')
            ->get();
        // dd($purchasedCards);
        
        foreach($purchasedCards as $card) {
            $time = strtotime($card->purchased_at);
            $card->purchased_at = date('d,M,Y | h:i:a', $time);
            // dd($card->purchased_at);
        }
        $orders = Order::where('user_id', $id)->latest('created_at')->get();
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        return view('/admin/userDetails', ['user' => $user, 'orders' => $orders, 'purchasedCards' => $purchasedCards]);
    }

    public function showUserFeedbacks()
    {
        $feedbacks = UserFeedback::latest()->get();
        // dd($feedbacks);
        return view('/admin/showUserFeedbacks',['feedbacks' => $feedbacks]);
    }

    public function markAsAllRead()
    {
        $feedbacks = UserFeedback::all();
        foreach($feedbacks as $feedback) {
            $feedback->read = TRUE;
            $feedback->save();
        }
        return redirect()->back();
    }

    public function markAsRead($id)
    {
        $feedback = UserFeedback::find($id);
        $feedback->read = TRUE;
        $feedback->save();
        return redirect()->back();
    }

    public function deleteFeedback($id)
    {
        $feedback = UserFeedback::find($id);
        $feedback->delete();
        return redirect()->back();
    }
}
