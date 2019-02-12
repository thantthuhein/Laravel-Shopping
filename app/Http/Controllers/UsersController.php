<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

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
        ->update(['isAdmin' => 1]);
        return redirect()->back();
    }

    public function remove($id)
    {
        DB::table('users')
        ->where('id', $id)
        ->update(['isAdmin' => NULL]);
        return redirect()->back();
    }
}
