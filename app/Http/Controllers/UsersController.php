<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use DB;
use App\User;
use Carbon\Carbon;

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
}
