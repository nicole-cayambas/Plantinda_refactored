<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class OrderController extends Controller
{
    public function index(){
        return view('orders.index', [
            'orders' => auth()->user()->order,
        ]);
    }

    public function dash_orders(){
        $orders = auth()->user()->store->orders;
        return view('dashboard.orders.index', [
            'orders' => auth()->user()->store->order,
        ]);
    }

    public function complete($id){
        $order = auth()->user()->store->order->find($id);
        $order->status = 'completed';
        $order->save();
        $order->delete();
        return redirect()->back()->with('success', 'Order has been completed');
    }
}
