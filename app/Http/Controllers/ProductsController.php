<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function show($id)
    {
        if(auth()->check()) {
            $wish = auth()->user()->wishlist()->where('product_id', $id)->first();
            $product = Product::find($id);
            if($wish) {
                $inWishlist = true;
            }
            else {
                $inWishlist = false;
            }
            return view('products.show', [
                'product' => $product,
                'inWishlist' => $inWishlist
            ]);
        } else {
            return view('products.show', [
                'product' => Product::find($id)
            ]);
        }
        
    }
    

    public function dash_index()
    {
        $store = auth()->user()->store;
        $products = $store->product->sortBy('created_at');
        return view('dashboard.products.index', [
            'products' => $products
        ]);
    }
}
