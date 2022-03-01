@extends('layouts.app')
@section('content')
<div class="w-full">
<p class="w-full text-center text-emerald-600">
    {{session('status')}}
</p>
<div class="w-full p-4 flex justify-center">
    
    <form action="{{route('sendMessage')}}" method="POST" class="w-full sm:w-4/5 border-2 p-4 flex flex-col gap-4 rounded-lg">
        @csrf
        <p class="font-bold">Compose Message</p>
        <div>
            <label for="seller_email">Send To</label>
            <input type="text" name="seller_email" id="seller_email" value="{{$seller->email}}" class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" readonly>
            <input type="text" name="store_name" id="store_name" value="{{$store->name}}" class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" readonly>
            <input type="number" name="to" value="{{$store->id}}" hidden>
            <input type="number" name="from" value="{{auth()->user()->id}}" hidden>
        </div>
        <div>
            <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" name="subject" placeholder="Subject">
        </div>
        @error('name')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div>
            <textarea class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full h-36" name="body" placeholder="Body"></textarea>
        </div>
        @error('body')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div>
            <label for="product_name" class="font-semibold">Product:</label>
            <input type="text" name="product_name" id="product_name" value="{{$product->name}}" class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" readonly>
            <input type="number" name="product_id" value="{{$product->id}}" hidden>
        </div>
        <div class="flex justify-center mt-10">
            <button type="submit" class="w-1/2 bg-emerald-400 rounded-lg p-4 hover:bg-emerald-500">Send</button>
        </div>
    </form>
</div>
</div>
@endsection