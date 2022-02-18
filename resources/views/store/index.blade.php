@extends('layouts.app')
@section('content')
    <div class="w-full bg-white p-6 rounded-lg">
        <h1 class="text-xl">Stores</h1>
        @if ($stores->count())
            @foreach ($stores as $store)
                <x-store :store="$store" />
            @endforeach
                
        @else
            No stores
        @endif
    </div>
@endsection