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
}
