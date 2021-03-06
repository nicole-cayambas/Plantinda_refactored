<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('parent_id', 'desc')->get();
        $products = Product::orderBy('created_at', 'desc')->paginate(30);
        return view('Home.index', [
            'products' => $products,
            'categories' => $categories,
            'status' => 'all'
        ]);
    }

    public function search(Request $request)
    {
        $categories = Category::orderBy('parent_id', 'desc')->get();
        $products = Product::where('name', 'like', "%{$request->input('search')}%")->orderBy('created_at', 'desc')->paginate(30);
        return view('Home.index', [
            'products' => $products,
            'categories' => $categories,
            'status' => 'search',
            'query' => $request->input('search')
        ]);
    }

    public function filter(Request $request){
        $categories = Category::orderBy('parent_id', 'desc')->get();
        if($request->price){
            if($request->price == 'price1'){
                $products = Product::where('unit_price_1', '>', 0)->where('unit_price_4', '<', 500)->orderBy('created_at', 'desc')->paginate(30);
            } else if($request->price == 'price2'){
                $products = Product::where('unit_price_1', '>', 501)->where('unit_price_4', '<', 1000)->orderBy('created_at', 'desc')->paginate(30);
            } else if($request->price == 'price3'){
                $products = Product::where('unit_price_1', '>', 1001)->where('unit_price_4', '<', 5000)->orderBy('created_at', 'desc')->paginate(30);
            } else if($request->price == 'price4'){
                $products = Product::where('unit_price_1', '>', 5001)->where('unit_price_4', '<', 10000)->orderBy('created_at', 'desc')->paginate(30);
            } else if($request->price == 'price5'){
                $products = Product::where('unit_price_1', '>', 10001)->where('unit_price_4', '<', 20000)->orderBy('created_at', 'desc')->paginate(30);
            } else {
                $products = Product::where('unit_price_1', '>', 20001)->orderBy('created_at', 'desc')->paginate(30);
            }
        }
        else {
            $products = Product::where('rating', (int)$request->input('rating'))->orderBy('created_at', 'desc')->paginate(30);
        }

        return view('Home.index', [
            'products' => $products,
            'categories' => $categories,
            'status' => 'filter',
        ]);
    }

    public function category($id){
        $category = Category::find($id);
        $categories = Category::orderBy('parent_id', 'desc')->get();
        $products = Product::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(30);
        return view('Home.index', [
            'products' => $products,
            'categories' => $categories,
            'category' => $category,
            'status' => 'categoryFilter'
        ]);
    }

    public function sort(Request $request){
        $query = $request->search_query;
        $categories = Category::orderBy('parent_id', 'desc')->get();
        if($query){
            if($request->sorter == 'rating'){
                $products = Product::where('name', 'like', "%{$query}%")->orderBy('rating', 'desc')->paginate(30);
            } else if($request->sorter == 'newest'){
                $products = Product::where('name', 'like', "%{$query}%")->orderBy('created_at', 'desc')->paginate(30);
            } else if($request->sorter == 'price_asc'){
                $products = Product::where('name', 'like', "%{$query}%")->orderBy('unit_price_1', 'asc')->paginate(30);
            } else if($request->sorter == 'price_desc'){
                $products = Product::where('name', 'like', "%{$query}%")->orderBy('unit_price_1', 'desc')->paginate(30);
            } else {
                $products = Product::where('name', 'like', "%{$query}%")->orderBy('created_at', 'desc')->paginate(30);
            }
        } else if($request->sorter == 'rating'){
            $products = Product::orderBy('rating', 'desc')->paginate(30);
        } else if($request->sorter == 'newest'){
            $products = Product::orderBy('created_at', 'desc')->paginate(30);
        } else if($request->sorter == 'price_asc'){
            $products = Product::orderBy('unit_price_1', 'asc')->paginate(30);
        } else if($request->sorter == 'price_desc'){
            $products = Product::orderBy('unit_price_1', 'desc')->paginate(30);
        } else {
            $products = Product::orderBy('created_at', 'desc')->paginate(30);
        }

        if(!$query){
            $query = '';
        }
        return view('Home.index', [
            'products' => $products,
            'categories' => $categories,
            'status' => 'sort',
            'sorter' => $request->sorter,
            'query' => $query
        ]);
    }

}
