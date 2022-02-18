@extends('layouts.app')
@section('content')
<p class="w-full text-center text-emerald-600">
    {{session('success')}}
</p>
<div class="flex flex-col p-2 md:px-12 lg:px-32">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md w-full sm:rounded-lg">
                @if(count($cart_items) > 0)
                <table class="min-w-full">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Quantity x Price
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Shipping
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Total Price
                            </th>
                            <th scope="col" class="relative py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart_items as $cart_item)
                            <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                <form action="{{route('sendOrder', ['id', $cart_item->id])}}" method="POST">
                                    @csrf
                                    <input type="number" name="product_id" value="{{$cart_item->product->id}}" hidden>
                                    <input type="text" name="product_name" value="{{$cart_item->product->name}}" hidden>
                                    <input type="number" name="quantity" value="{{$cart_item->quantity}}" hidden>
                                    <input type="number" name="price" value="{{$cart_item->unit_price}}" hidden>
                                    <input type="number" name="shipping" value="{{$cart_item->shipping_price}}" hidden>
                                    <input type="number" name="total" value="{{$cart_item->total_price}}" hidden>
                                    <input type="number" name="cart_id" value="{{$cart_item->id}}" hidden>
                                    <input type="radio" name="from_cart" checked hidden>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$cart_item->product->name}} <br> <br> <img src="{{$cart_item->product->image}}" alt="{{$cart_item->product->name}} picture" width="100px" height="100px">
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{$cart_item->quantity}} x Php {{number_format($cart_item->unit_price, 2)}}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        Php {{number_format($cart_item->shipping_price, 2)}}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        Php {{number_format($cart_item->total_price, 2)}}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                                        <button name="submit" value="sendOrder" class="p-4 hover:bg-slate-400 text-center bg-slate-200 rounded-lg " type="submit">Checkout</button>
                                        <br>
                                        {{-- <a href="{{route('editCartItem'), ['id', $product->id]}}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a><br> --}}
                                        <a href="{{route('deleteCart', ['id' => $cart_item->id])}}" class="text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>No items in cart</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection