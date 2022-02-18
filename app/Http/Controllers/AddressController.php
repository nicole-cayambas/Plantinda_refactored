<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function show(){
        return view('profile.address', [
            'address' => auth()->user()->address
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        if(auth()->user()->address==null){
            auth()->user()->address()->create([
                'first_name' => $request->input('first-name'),
                'last_name' => $request->input('last-name'),
                'phone_number' => $request->input('phone-number'),
                'address' => $request->input('street-address'),
                'province' => $request->input('province'),
                'barangay' => $request->input('barangay'),
                'city' => $request->input('city'),
                'zip' => $request->input('zip-code')
            ]);
        } else {
            auth()->user()->address()->update([
                'first_name' => $request->input('first-name'),
                'last_name' => $request->input('last-name'),
                'phone_number' => $request->input('phone-number'),
                'address' => $request->input('street-address'),
                'province' => $request->input('province'),
                'barangay' => $request->input('barangay'),
                'city' => $request->input('city'),
                'zip' => $request->input('zip-code'),
            ]);
        }
        
        return redirect()->back()->with('success', 'Address updated successfully');
    }
}
