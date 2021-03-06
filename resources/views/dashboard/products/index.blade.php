@extends('dashboard.layouts.app')
@section('dash_content')
    <div class="w-full mt-2 sm:m-10 flex flex-col gap-y-4">
        <p class="w-full text-center text-emerald-600">
            {{session('success')}}
        </p>
        <div class="flex justify-center px-4 sm:justify-start">
            <a href="{{route('createProduct')}}" class="w-full sm:w-1/4 p-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white text-center bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 cursor-pointer">Add Product</a>
        </div>
        @if (count($products) > 0)
        @foreach ($products as $product)
            <div class="bg-white shadow-md p-8 rounded-lg">
                <div class="w-full flex flex-col sm:flex-row gap-4">
                    @if (!str_starts_with($product->image, 'http'))
                        <div class="w-full sm:w-1/6">
                            <img src="{{asset('images/products/'.$product->image)}}" alt="{{ $product->name }}" class="w-full rounded-md">
                        </div>
                    @else
                    <div class="w-full sm:w-1/6">
                        <img src="{{$product->image}}" alt="{{ $product->name }}" class="w-full rounded-md">
                    </div>
                    @endif
                    <h3 class="w-full sm:w-1/6 text-center"><a href="/products/{{$product->id}}" class="text-lg font-bold">{{$product->name}}</a></h3>
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
                    <div class="w-full sm:w-1/6 flex flex-col text-center gap-y-2">
                        <p><strong>Available Units:</strong> {{$product->num_units}}</p>
                        <a href="{{route('editProduct', ['id'=>$product->id])}}" class="w-full p-1 border-2 rounded-md">Edit</a>
                        <form action="{{route('deleteProduct', $product)}}" method="get">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full p-1 rounded-md text-white bg-red-500">Delete</button>
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