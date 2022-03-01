<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ReviewsController extends Controller
{
    public function create($id)
    {   
        return view('reviews.create', [
            'product' => Product::find($id)
        ]);
    }

    public function new(Request $request, $id)
    {   
        if(auth()->user()->review->where('product_id', $id)->count() == 0) {
            $this->validate($request, [
                'rating' => 'required|integer|max:5|min:1',
            ]);

            // dd($request->all());
            auth()->user()->review()->create([
                'rating' => $request->rating,
                'comment' => $request->comment,
                'product_id' => $id
            ]);

            $product = Product::find($id);
            $product->rating = $product->reviews->avg('rating');
            $product->save();

            return redirect()->back()->with('status', 'Review added successfully');
        } else {
            return redirect()->back()->with('status', 'You have already reviewed this product');
        }
        
    }

    public function destroy($id){
        $review = auth()->user()->review->find($id);
        $product = Product::find($review->product_id);
        $review->delete();
        $product->rating = $product->reviews->avg('rating');
        $product->save();
        return redirect()->back();
    }

    public function edit($id){
        $review = auth()->user()->review->find($id);

        return view('reviews.edit', [
            'review' => $review,
            'product' => $review->product
        ]);
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'rating' => 'required|integer|max:5|min:1',
        ]);

        
        // dd(auth()->user()->review->where('product_id', $id)->first());
        $review = auth()->user()->review->where('product_id', $id)->first();
        
        $review->update(
            ['rating' => $request->rating, 'comment' => $request->comment]
        );
        $product = Product::find($id);
        $product->rating = $product->reviews->avg('rating');
        $product->save();

        return redirect()->back()->with('success', 'Review updated successfully');
    }
}
