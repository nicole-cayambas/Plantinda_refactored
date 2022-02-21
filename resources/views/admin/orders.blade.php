@extends('admin.layouts.app')
@section('admin_content')
<div class="flex flex-col w-full p-0 sm:mt-10">
    <p class="w-full text-center text-emerald-600">
        {{session('success')}}
    </p>
    <div class="overflow-x-auto w-full">
        <div class="inline-block py-2 px-0 min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md w-full sm:rounded-lg">
                @if(count($orders) > 0)
                <table class="w-full">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Order ID
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Product
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Buyer
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Store
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Ship to
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Total Price
                            </th>
                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($orders as $order)
                            <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                                <div>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->id }}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{$order->product_name}}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{$order->buyer_name}}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{$order->store->name}}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{$order->address}}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        Php {{number_format($order->total_price, 2)}}
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{$order->status}}
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p>No orders.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection