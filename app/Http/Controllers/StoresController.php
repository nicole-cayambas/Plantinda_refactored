<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
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
        return view('store.create')->with('store', auth()->user()->store);
    }

    public function save(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'main_products' => 'required',
            'main_markets' => 'required',
        ]);

        if(!auth()->user()->store) {

            // dd($request->user()->store);
            $request->user()->store()->create($request->all());

            return redirect()->back()->with('status', 'Store created successfully');
        }
        else {
            $request->user()->store->update($request->all());
            return redirect()->back()->with('status', 'Store updated.');
        }

    }

    public function edit()
    {

    }
}
