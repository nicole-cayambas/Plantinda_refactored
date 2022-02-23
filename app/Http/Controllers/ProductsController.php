<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Helpers\PaginationHelper;

class ProductsController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        if(auth()->check()) {
            $wish = auth()->user()->wishlist()->where('product_id', $id)->first();
            if($wish) {
                $inWishlist = true;
            }
            else {
                $inWishlist = false;
            }
            return view('products.show', [
                'product' => $product,
                'inWishlist' => $inWishlist,
                'reviews' => $product->reviews
            ]);
        } else {
            return view('products.show', [
                'product' => $product,
                'reviews' => $product->reviews
            ]);
        }
        
    }
    

    public function dash_index()
    {
        $store = auth()->user()->store;
        $products = $store->products->sortByDesc('created_at');
        $products = PaginationHelper::paginate($products, 30);
        return view('dashboard.products.index', [
            'products' => $products
        ]);
    }

    public function destroy($id){
        $product = auth()->user()->store->products->find($id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function create(){
        return view('dashboard.products.create');
    }

    public function edit($id){
        return view('dashboard.products.edit')->with('product', auth()->user()->store->products->find($id));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'summary' => 'required',
            'unit_price_1' => 'required',
            'range_1_min' => 'required',
            'range_1_max' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image_name = time().'-'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images/products'), $image_name);
        
        $product = auth()->user()->store->products()->create([
            'name' => $request->name,
            'description' => $request->description,
            'summary' => $request->summary,
            'unit_price_1' => $request->unit_price_1,
            'unit_price_2' => $request->unit_price_2,
            'unit_price_3' => $request->unit_price_3,
            'unit_price_4' => $request->unit_price_4,
            'range_1_min' => $request->range_1_min,
            'range_2_min' => $request->range_2_min,
            'range_3_min' => $request->range_3_min,
            'range_4_min' => $request->range_4_min,
            'range_1_max' => $request->range_1_max,
            'range_2_max' => $request->range_2_max,
            'range_3_max' => $request->range_3_max,
            'range_4_max' => $request->range_4_max,
            'image' => $image_name,
        ]);
        
        return redirect()->route('dashboard.products')->with('success', 'Product created successfully');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'summary' => 'required',
            'unit_price_1' => 'required',
            'range_1_min' => 'required',
            'range_1_max' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image_name = time().'-'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images/products'), $image_name);

        $product = auth()->user()->store->products->find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->summary = $request->summary;
        $product->unit_price_1 = $request->unit_price_1;
        $product->unit_price_2 = $request->unit_price_2;
        $product->unit_price_3 = $request->unit_price_3;
        $product->unit_price_4 = $request->unit_price_4;
        $product->range_1_min = $request->range_1_min;
        $product->range_2_min = $request->range_2_min;
        $product->range_3_min = $request->range_3_min;
        $product->range_4_min = $request->range_4_min;
        $product->range_1_max = $request->range_1_max;
        $product->range_2_max = $request->range_2_max;
        $product->range_3_max = $request->range_3_max;
        $product->range_4_max = $request->range_4_max;
        $product->image = $image_name;
        $product->save();
        return redirect()->back()->with('success', 'Product updated successfully');
    }
}
