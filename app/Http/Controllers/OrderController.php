<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class OrderController extends Controller
{
    public function index(){
        return view('orders.index', [
            'orders' => auth()->user()->order()->orderBy('updated_at', 'desc')->get(),
            'sort' => null,
        ]);
    }

    public function orders_sort(Request $request){
        // dd(auth()->user()->order()->withTrashed()->where('status', 'completed')->get());
        if($request->sortBy == "pending"){
            $orders = auth()->user()->order()->orderBy('updated_at', 'desc')->get();
            
        } else if($request->sortBy == "completed"){
            $orders = auth()->user()->order()->withTrashed()->where('status', 'completed')->orderBy('updated_at', 'desc')->get();
        } else {
            $orders = auth()->user()->order()->withTrashed()->orderBy('updated_at', 'desc')->get();
        }
        return view('orders.index', [
            'orders' => $orders,
            'sort' => $request->sortBy
        ]);
    }

    public function dash_orders(){
        if(!auth()->user()->store){
            return redirect()->route('createStore')->with('status', 'You need to create a store first');
        }
        $orders = auth()->user()->store->order()->withTrashed()->orderBy('updated_at', 'desc')->get();
        return view('dashboard.orders.index', [
            'orders' => $orders,
            'sort' => null,
        ]);
    }
    
    public function dash_orders_sort(Request $request){
        if($request->sortBy == "pending"){
            $orders = auth()->user()->store->order;
            
        } else if($request->sortBy == "completed"){
            $orders = auth()->user()->store->order()->withTrashed()->where('status', 'completed')->orderBy('updated_at', 'desc')->get();
        } else {
            $orders = auth()->user()->store->order()->withTrashed()->orderBy('updated_at', 'desc')->get();
        }
        return view('dashboard.orders.index', [
            'orders' => $orders,
            'sort' => $request->sortBy
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
