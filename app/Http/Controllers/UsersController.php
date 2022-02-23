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

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image_name = time().'-'.$request->username.'.'.$request->image->extension();
        $request->image->move(public_path('images/icons'), $image_name);

        auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'icon' => $image_name
        ]);

        return back()->with('success', 'Profile updated successfully');
    }
}
