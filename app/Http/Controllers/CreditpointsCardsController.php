<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory;
use App\CreditpointsCard;

class CreditpointsCardsController extends Controller
{
    public function getTotalCards()
    {
        $cards = CreditpointsCard::all();
        return view('/admin/cardsDetails/totalCards', ['cards' => $cards]);
    }

    public function getUseableCards()
    {
        $useableCards = CreditpointsCard::where('useable', TRUE)->get();
        return view('/admin/cardsDetails/useableCards', ['useableCards' => $useableCards]);
    }

    public function getUsedCards()
    {
        $usedCards = CreditpointsCard::where('useable', FALSE)->latest('purchased_at')->get();
        return view('/admin/cardsDetails/usedCards', ['usedCards' => $usedCards]);
    }

    public function generateCards_i($times)
    {
        // dd($times);
        $faker = Factory::create();

        for($count = 1; $count <= $times; $count++) {
            $creditCard = new CreditpointsCard();
            $creditCard->value = 1000;
            $creditCard->pin = $faker->creditCardNumber;
            $creditCard->save();
        }
        return redirect()->back();
    }

    public function generateCards_ii($times)    
    {
        $faker = Factory::create();
        for($count = 1; $count <= $times; $count++) {
            $creditCard = new CreditpointsCard();
            $creditCard->value = 3000;
            $creditCard->pin = $faker->creditCardNumber;
            $creditCard->save();
        }
        return redirect()->back();
    }

    public function generateCards_iii($times)
    {
        $faker = Factory::create();
        for($count = 1; $count <= $times; $count++) {
            $creditCard = new CreditpointsCard();
            $creditCard->value = 5000;
            $creditCard->pin = $faker->creditCardNumber;
            $creditCard->save();
        }
        return redirect()->back();
    }

    public function usedCardDetails($id)
    {
        $card = CreditpointsCard::find($id);
        // dd($card->user->name);
        return view('/admin/usedCardDetails', [ 'card' => $card ]);
    }

    public function deleteAllUsedCardsHistory()
    {
        $cards = Creditpointscard::where('useable', FALSE)->get();
        foreach ($cards as $card) {
            $card->delete();
        }
        // dd($cards);
        return redirect()->back()->with('success', "Success!");
    }

    public function deleteHistory($id)
    {
        $card = CreditpointsCard::find($id);
        if ($card !== NULL) {
            $card->delete();
        }
        $usedCards = CreditpointsCard::where('useable', FALSE)->latest('purchased_at')->get();
        return view('/admin/cardsDetails/usedCards', ['usedCards' => $usedCards]);
    }
}
