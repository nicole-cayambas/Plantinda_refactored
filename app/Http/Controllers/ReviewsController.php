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
        $product = Product::find($id);

        if(auth()->user()->review->where('product_id', $id)->count() == 0) {
            $this->validate($request, [
                'rating' => 'required|integer|max:5|min:1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if($request->image) {
                $image_name = time().'-'.$product->name.'.'.$request->image->extension();
                $request->image->move(public_path('images/reviews'), $image_name);
            } else {
                $image_name = null;
            }

            auth()->user()->review()->create([
                'rating' => $request->rating,
                'comment' => $request->comment,
                'product_id' => $id,
                'image' => $image_name
            ]);
            
            // dd(auth()->user()->review);

            $product->rating = $product->reviews->avg('rating');
            $product->save();

            return redirect()->route('showProduct', ['id' => $id])->with('success', 'Review created successfully');
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
        $product = Product::find($id);

        $this->validate($request, [
            'rating' => 'required|integer|max:5|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->image) {
            $image_name = time().'-'.$product->name.'.'.$request->image->extension();
            $request->image->move(public_path('images/reviews'), $image_name);
        }
        
        $review = auth()->user()->review->where('product_id', $id)->first();
        
        if($request->image) {
            $review->update(
                ['rating' => $request->rating, 
                'comment' => $request->comment,
                'image' => $image_name
                ]
            );
        } else {
            $review->update(
                ['rating' => $request->rating, 
                'comment' => $request->comment
                ]
            );
        }
        $product->rating = $product->reviews->avg('rating');
        $product->save();

        return redirect()->route('showProduct', ['id' => $id])->with('success', 'Review updated successfully');
    }
}
