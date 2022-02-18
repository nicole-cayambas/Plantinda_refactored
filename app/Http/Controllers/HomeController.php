<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::paginate(30);
        return view('Home.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function filter(){
        $products = Product::where('category_id', request('category_id'))->paginate(30);
        return view('Home.index', [
            'products' => $products
        ]);
    }
}
