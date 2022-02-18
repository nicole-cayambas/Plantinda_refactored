<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\PaginationHelper;

class WishlistController extends Controller
{

    public function index()
    {
        $products = auth()->user()->wishlist->pluck('product');
        $products = PaginationHelper::paginate($products, 30);
        // dd($products);
        return view('wishlist.index', [
            'products' => $products
        ]);
    }
    public function store()
    {
        $wishlist = auth()->user()->wishlist()->create([
            'product_id' => request('product_id')
        ]);
    }
}
