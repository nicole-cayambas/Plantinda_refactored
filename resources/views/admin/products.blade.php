@extends('admin.layouts.app')
@section('admin_content')
    <div class="w-full mt-2 sm:m-10 flex flex-col gap-y-4">
        <p class="w-full text-center text-emerald-600">
            {{session('success')}}
        </p>
        @if (count($products) > 0)
        @foreach ($products as $product)
            <div class="bg-white shadow-md p-8 rounded-lg">
                <div class="w-full flex flex-col sm:flex-row gap-4">
                    <div class="w-full sm:w-1/6">
                        @if (!str_starts_with($product->image, 'http'))
                            <img src="{{asset('images/products/'.$product->image)}}" alt="{{ $product->name }}"  class="w-full rounded-md">
                        @else
                            <img src="{{$product->image}}" alt="{{ $product->name }}"  class="w-full rounded-md">
                        @endif
                    </div>
                    <h3 class="w-full sm:w-1/6 text-center"><a href="/products/{{$product->id}}" class="text-lg font-bold">{{$product->name}}</a><br>Store: {{$product->store->name}}</h3>
                    <p class="w-full sm:w-1/6 text-sm">{{Str::limit($product->description, 120)}}</p>
                        <div class="w-full sm:w-1/6 text-center">
                            <p class="font-bold">Unit Price</p>
                            <p class="">Php {{$product->unit_price_1}}</p>
                            <p class="">Php {{$product->unit_price_2}}</p>
                            <p class="">Php {{$product->unit_price_3}}</p>
                            <p class="">Php {{$product->unit_price_4}}</p>
                        </div>
                        <div class="w-full sm:w-1/6 text-center">
                            <p class="font-bold">Min - Max</p>
                            <p class="">{{$product->range_1_min}} - {{$product->range_1_max}}</p>
                            <p class="">{{$product->range_2_min}} - {{$product->range_2_max}}</p>
                            <p class="">{{$product->range_3_min}} - {{$product->range_3_max}}</p>
                            <p class="">{{$product->range_4_min}} - {{$product->range_4_max}}</p>
                        </div>
                    <div class="w-full sm:w-1/6 flex flex-col text-center gap-y-4">
                        <form action="{{route('adminDeleteProduct', ['id'=>$product->id])}}" method="get">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full p-2 rounded-md text-white bg-red-500">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-10 flex w-ful justify-center">
            {{ $products->links() }}
        </div>
        @else
            <p>No products found</p>

        @endif
    </div>
@endsection