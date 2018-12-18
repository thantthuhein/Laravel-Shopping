<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\InvoicePaid;

use App\User;

class TestController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        $user->notify(new InvoicePaid());
        echo "Success!";
    }
}
