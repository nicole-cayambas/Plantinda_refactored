<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index () {
        $cart_items = auth()->user()->cart;
        return view('cart.index')->with('cart_items', $cart_items);
    }
    public function destroy($id){
        auth()->user()->cart()->find($id)->delete();
        return redirect()->back()->with('success', 'Item Removed');
    }
}
