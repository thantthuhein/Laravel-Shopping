<?php

namespace App\Http\Controllers;
use App\User;
use App\Order;
use Session;
use App\Product;
use App\Cart;
use Auth;
use App\CreditpointsCard;
use App\PurchasedCard;
use App\Http\Requests\StoreCheckout;
use App\Http\Requests\TopUpCredits;
use Carbon;

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
        $orders = auth()->user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });

        return view('/profile/creditDetails', ['orders' => $orders]);
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

            $purchasedCard = new PurchasedCard();
            $purchasedCard->user_id = auth()->user()->id;

            foreach($credits as $credit ) {
                if ($credit->useable == FALSE) {
                    return redirect()->back()->with('error', "Credit Card Already Used!");
                } else {
                    $user->credit_points += $credit->value;
                    $credit->useable = FALSE;
                    $purchasedCard->card_id = $credit->id;
                    $credit->save();
                    $purchasedCard->save();
                    $user->save();
                    return redirect('/getCreditDetails')->with('success', "Top Up Success!");
                }
            }
            
        }

    }

}
