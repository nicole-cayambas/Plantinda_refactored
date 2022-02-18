@extends('layouts.app')
@section('content')
<div class="p-6 w-full flex flex-col items-center gap-8">
    <x-store :store="$store" />
    <div class="sm:w-11/12 rounded-lg p-2 sm:p-4 gap-4  flex flex-col">
        <h1>{{$store->name}}'s Products</h1>
        <div class="w-full">
            <select class="rounded p-2" name="category" id="">
                <option value="">Category</option>
                <option value="">Cat #</option>
                <option value="">Cat #</option>
                <option value="">Cat #</option>
                <option value="">Cat #</option>
            </select>
        </div>
        <hr>
        <x-products :products="$products" />
    </div>
</div>
@endsection