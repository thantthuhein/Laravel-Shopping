<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;
use Session;
use App\Product;
use App\Cart;
use App\UserFeedback;
use Auth;
use App\CreditpointsCard;
use App\Http\Requests\StoreCheckout;
use App\Http\Requests\TopUpCredits;
use App\Http\Requests\PostFeedback;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = User::find(Auth()->user()->id);
        $orders = auth()->user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        
        // dd($orders);
        return view('profile.page', ['user' => $user, 'orders' => $orders]);
    }

    public function getChangeInfo() 
    {
        $user = User::find(auth()->user()->id);
        return view('/profile/changeInfo', ['user' => $user]);
    }

    public function changeInfo(StoreCheckout $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('/getProfile')->with('success', "Changed Info Successfully");
    }

    public function getCreditDetails()
    {
        $user = User::find(auth()->user()->id);
        // $purchasedCards = $user->creditpointscards();
        // dd($user->creditpointscards());
        // dd(auth()->user()->creditpointscards);
        $purchasedCards = CreditpointsCard::where('user_id', auth()->user()->id)
            ->latest('purchased_at')
            ->get();

        // $cards = CreditpointsCard::find(auth()->user()->id);
        // dd($user->creditpointscards);
        foreach($purchasedCards as $card) {
            $time = strtotime($card->purchased_at);
            $card->purchased_at = date(' M : d :Y | h : i : A', $time);
            // dd($card->purchased_at);
        }
        $orders = auth()->user()->orders()->latest()->get();
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        return view('/profile/creditDetails', ['orders' => $orders, 'purchasedCards' => $purchasedCards]);
    }

    public function enterPin()
    {
        return view('/profile/enterPin');
    }

    public function topUpCredits(TopUpCredits $request)
    {
        $credits = CreditpointsCard::where('pin', $request->pin)->get();
        // dd($credit);
        if($credits->isEmpty()) {
            return redirect()->back()->with('error', "Invalid Code!");
        } else {
            // founded
            $user = User::find(auth()->user()->id);

            foreach($credits as $credit ) {
                if ( $credit->useable == FALSE ) {
                    return redirect()->back()->with('error', "Credit Card Already Used!");
                } else {
                    $user->credit_points += $credit->value;
                    $credit->useable = FALSE;
                    $credit->user_id = $user->id;
                    $credit->purchased_at = Carbon::now()->toDateTimeString();
                    $credit->save();
                    $user->save();
                    // dd($credit->purchased_at);
                    return redirect('/getCreditDetails')->with('success', "Top Up Success!");
                }
            }
            
        }

    }

    public function getFeedback()
    {
        return view('/profile/userFeedbackForm');
    }

    public function sendFeedback(PostFeedback $request)
    {
        // dd($request->all());
        $feedback = new UserFeedback();
        $feedback->subject = $request->subject;
        $feedback->description = $request->description;
        $feedback->user_name = $request->user_name;
        $feedback->save();
        return redirect()->route('/')->with('success', "Successfully Send Feedback !");
    }
    

}
