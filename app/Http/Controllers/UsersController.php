<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(){
        return view('profile.index', [
            'user' => auth()->user(),
            'address' => auth()->user()->address
        ]);
    }

    public function store(Request $request){

        auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
        ]);

        return back()->with('success', 'Profile updated successfully');
    }
}
