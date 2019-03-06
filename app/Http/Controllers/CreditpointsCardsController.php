<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $usedCards = CreditpointsCard::where('useable', FALSE)->get();
        return view('/admin/cardsDetails/usedCards', ['usedCards' => $usedCards]);
    }
}
