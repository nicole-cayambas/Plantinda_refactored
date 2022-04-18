<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Store;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function store(Request $request){
        $address = $request->input('street-address') . ', ' . $request->barangay . ', ' . $request->city . ', ' . $request->input('zip-code') . ', ' . $request->province;
        $buyer_name = $request->input('first-name') . ' '. $request->input('last-name');
        $phone_number = $request->input('phone-number');
        $product = Product::find($request->product_id);
        $store = Store::find($product->store_id);
        $order = auth()->user()->order()->create([
            'user_id' => auth()->user()->id,
            'store_id' => $store->id,
            'store_name' => $store->name,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'quantity' => $request->quantity,
            'unit_price' => $request->price,
            'buyer_name' => $buyer_name,
            'phone_number' => $phone_number,
            'shipping_price' => $request->shipping_price,
            'total_price' => $request->total_price,
            'address' => $address,
            'status' => 'pending',
            'is_paid' => false,
        ]);
        $payment = $order->payment()->create([
            'user_id' => auth()->user()->id,
            'payment_type' => 'cod',
            'amount' => $request->total_price,
        ]);
        $order->payment_id = $payment->id;
        $order->save();

        if($request->cart_id){
            $cart = auth()->user()->cart()->where('product_id', $request->product_id)->first();
            $cart->delete();
        }

        $product->num_units -= $request->quantity;
        $product->save();
        return view('checkout.invoice', [
            'order' => $order,
            'payment' => $payment,
            'request' => $request,
            'store_name' => $order->store->name,
            'user' => auth()->user(),
            'address' => $address,
            'product' => $product,
            'buyer_name' => $buyer_name,
            'phone_number' => $phone_number,
            
            'success' => 'Order Successfully Placed'

        ]);
        
    }
}
