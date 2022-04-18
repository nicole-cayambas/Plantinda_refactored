@extends('layouts.app')
@section('content')
<div class="p-6 w-full flex flex-col items-center gap-8">
    <x-store :store="$store" />
    <div class="flex flex-start gap-2 w-full">
        @if ($store->permit)
            <button id="seePermitBtn" class="text-emerald-600 outline p-1 rounded-lg">See Business Permit</button>
        @endif
        @if ($store->fb)
            <button id="fbBtn" class="text-emerald-600 outline rounded-lg p-1">Facebook Link</button>
        @endif
    </div>
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
<script>
    permitBtn = document.getElementById('seePermitBtn');
    permitBtn.addEventListener('click', function(e){
        e.preventDefault();
        window.open("{{asset('images/store_permits/'.$store->permit)}}", 'Image','width=largeImage.stylewidth,height=largeImage.style.height,resizable=1');
    });
    fbBtn = document.getElementById('fbBtn');
    fbBtn.addEventListener('click', function(e){
        e.preventDefault();
        window.location.href = "{{$store->fb}}";
    });
</script>
@endsection