@extends('admin.layouts.app')
@section('admin_content')
@auth
<div class="flex flex-col w-full">
    <div class="px-4 m-0 sm:m-4">
        <h1>Good Day @auth {{Auth()->user()->first_name}} @endauth!</h1>
    </div>
    <div class="w-full p-4 grid grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-emerald-200 rounded-lg p-2">
            <h2 class="text-lg text-center">Total Users</h2>
            <h1 class="text-2xl text-center">{{$total_users}}</h1>
        </div>
        <div class="bg-emerald-200 rounded-lg p-2">
            <h2 class="text-lg text-center">Total Sellers</h2>
            <h1 class="text-2xl text-center">{{$total_sellers}}</h1>
        </div>
        <div class="bg-emerald-200 rounded-lg p-2">
            <h2 class="text-lg text-center">Total Buyers</h2>
            <h1 class="text-2xl text-center">{{$total_buyers}}</h1>
        </div>
        <div class="bg-emerald-200 rounded-lg p-2">
            <h2 class="text-lg text-center">Total Stores</h2>
            <h1 class="text-2xl text-center">{{$total_stores}}</h1>
        </div>
        <div class="bg-emerald-200 rounded-lg p-2">
            <h2 class="text-lg text-center">Today's Orders Created</h2>
            <h1 class="text-2xl text-center">{{$today_orders}}</h1>
        </div>
        <div class="bg-emerald-200 rounded-lg p-2">
            <h2 class="text-lg text-center">Today's Completed Orders</h2>
            <h1 class="text-2xl text-center">{{$today_completed_orders}}</h1>
        </div>

    </div>
</div>
@endauth
@endsection