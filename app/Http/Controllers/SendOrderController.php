<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SendOrderController extends Controller
{
    public function store(Request $request) {

        if(!$request->from_cart){ //if not from cart

            $range = explode(" - ", $request->range);
            $min_quant = (int)$range[0];
            $max_quant = (int)$range[1];
        } 
        $price = (double)$request->price;
        $quantity = (integer)$request->quantity;
        $subtotal = (double)$price * $quantity;
        $shipping = (double)$request->shipping;
        $total = (double)$subtotal + $shipping;

        if($request->submit === 'addToCart'){
            $this->validate($request, [
                'quantity' => "numeric|between:$min_quant,$max_quant"
            ]);
            $request->user()->cart()->create([
                'product_id' => (int)$request->product_id,
                'store_id' => (int)Product::find($request->input('product_id'))->store_id,
                'quantity' => $quantity,
                'unit_price' => $price,
                'shipping_price' => $shipping,
                'total_price' => $total,
            ]);
            return redirect()->back()->with('success', 'Added To Cart');
        } 
        
        else if($request->submit === 'sendOrder'){
            if(!$request->from_cart){
                $this->validate($request, [
                    'quantity' => "numeric|between:$min_quant,$max_quant"
                ]);
                $product = Product::find($request->product_id);
                return view('checkout.index', [
                    'address'=> auth()->user()->address,
                    'product' => $product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal,
                    'shipping' => $shipping,
                    'total' => $total,
                ]);
            }else {
                $cart = auth()->user()->cart()->find($request->cart_id);
                $product = $cart->product; 
                return view('checkout.index', [
                    'address' => auth()->user()->address,
                    'product' => $product,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal,
                    'shipping' => $shipping,
                    'total' => $total,
                    'cart_id' => $request->cart_id,
                ]);
            }
            
        } 
        
        else if($request->submit === 'wishlist') {
            $wishExist = auth()->user()->wishlist()->where('product_id', $request->input('product_id'))->first();
            if(!$wishExist){
                $wish = auth()->user()->wishlist()->create([
                    'product_id' => $request->input('product_id')
                ]);
                $wish->save();
                return redirect()->back()->with('success', 'Added to Wishlist');
            } 
            else {
                $wishExist->delete();
                return redirect()->back()->with('success', 'Removed from Wishlist');
            }
        }
    }
}
