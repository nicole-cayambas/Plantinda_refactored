<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EarningsController extends Controller
{
    public function index(){
        return view('dashboard.earnings.index');
    }
}
