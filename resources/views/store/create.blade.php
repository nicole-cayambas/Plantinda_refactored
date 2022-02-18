@extends('layouts.app')
@section('content')
<p class="w-full text-center text-emerald-600">
    {{session('status')}}
</p>
<div class="w-full p-4 flex justify-center">
    
    <form action="{{route('createStore')}}" method="POST" class="w-full sm:w-4/5 border-2 p-4 flex flex-col gap-4 rounded-lg">
        @csrf
        <p class="font-bold">Store Information</p>
        <div>
            <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" name="name" placeholder="Store Name" @if ($store) value="{{$store->name}}" @endif>
        </div>
        @error('name')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div>
            <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full h-36" type="textarea" name="description" placeholder="Description" @if ($store) value="{{$store->description}}" @endif>
        </div>
        @error('description')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div>
            <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" name="main_products" placeholder="Main Products (e.g. Vegetables, Flowers, Seeds)" @if ($store) value="{{$store->main_products}}" @endif>
        </div>
        @error('main_products')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div>
            <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" name="main_markets" placeholder="Main Markets (e.g. Restaurants, Souvenir Shops, Home Gardens)" @if ($store) value="{{$store->main_markets}}" @endif>
        </div>
        @error('main_markets')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div class="flex flex-col sm:flex-row w-full sm:justify-evenly">
            <div>
                <label class="block text-sm font-medium text-gray-700"> Store Photo </label>
                <div class="mt-1 flex items-center gap-4">
                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-200">
                        <img class="rounded-circle" src="@if($store){{$store->image}}@endif" alt="">
                    </span>
                    <button type="button" class="w-20 border-2 rounded-lg hover:bg-gray-200 p-2">Change</button>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"> Store Banner </label>
                <div class="mt-1 flex items-center gap-4">
                    <span class="inline-block h-12 w-40 overflow-hidden bg-gray-200">
                        <img src="@if($store){{$store->banner_image}}@endif" alt="">
                    </span>
                    <button type="button" class="w-20 border-2 rounded-lg hover:bg-gray-200 p-2">Change</button>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-10">
            <button type="submit" class="w-1/2 bg-emerald-400 rounded-lg p-4 hover:bg-emerald-500">Save</button>
        </div>
    </form>
</div>
@endsection