<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use App\Helpers\PaginationHelper;

class StoresController extends Controller
{
    public function show(Request $request)
    {
        $products = Store::find($request->id)->products;

        $products = PaginationHelper::paginate($products, 30);
        return view('store.show', [
            'products' => $products,
            'store' => Store::find($request->id)
        ]);
    }

    public function index()
    {
        $stores = Store::all();
        return view('store.index')->with('stores', $stores);
    }

    public function create()
    {
        return view('dashboard.store.create');
    }

    public function save(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'main_products' => 'required',
            'main_markets' => 'required',
        ]);

        
        if(!auth()->user()->store) {

            $image_name = 'null.png';
            $banner_name = 'null.png';
            $permit_name = 'null.jpg';
            
            if($request->image){
                $image_name = time().'-'.$request->name.'.'.$request->image->extension();
                $request->image->move(public_path('images/store_images'), $image_name);
            }
            if($request->banner_image){
                $banner_name = time().'-'.$request->name.'.'.$request->banner_image->extension();
                $request->banner_image->move(public_path('images/store_banners'), $banner_name);
            }
            if($request->permit){
                $permit_name = time().'-'.$request->name.'.'.$request->permit->extension();
                $request->permit->move(public_path('images/store_permits'), $permit_name);
            }

            $request->user()->store()->create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image_name,
                'banner_image' => $banner_name,
                'permit' => $permit_name,
                'main_products' => $request->main_products,
                'main_markets' => $request->main_markets,
                'fb' => $request->fb,
            ]);

            return view('dashboard.store.edit')->with('store', auth()->user()->store)->with('status', 'Store created successfully');
        }
        else {
            $image_name = auth()->user()->store->image;
            $banner_name = auth()->user()->store->banner_image;
            $permit_name = auth()->user()->store->permit;

            if($request->image){
                $image_name = time().'-'.$request->name.'.'.$request->image->extension();
                $request->image->move(public_path('images/store_images'), $image_name);
            }
            if($request->banner_image){
                $banner_name = time().'-'.$request->name.'.'.$request->banner_image->extension();
                $request->banner_image->move(public_path('images/store_banners'), $banner_name);
            }
            if($request->permit){
                $permit_name = time().'-'.$request->name.'.'.$request->permit->extension();
                $request->permit->move(public_path('images/store_permits'), $permit_name);
            }
            $request->user()->store->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image_name,
                'banner_image' => $banner_name,
                'permit' => $permit_name,
                'main_products' => $request->main_products,
                'main_markets' => $request->main_markets,
                'fb' => $request->fb,
            ]);
            return redirect()->back()->with('status', 'Store updated.');
        }

    }

    public function dash_store()
    {
        return view('dashboard.store.edit')->with('store', auth()->user()->store);
    }

    public function verifyStore($id){
        $store = Store::find($id);
        $store->certifications = "verified";
        $store->save();
        return redirect()->back()->with('status', 'Store verified.');
    }

}
