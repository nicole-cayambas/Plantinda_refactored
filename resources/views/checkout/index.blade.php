@extends('layouts.app')
@section('content')
<form action="{{route('checkout')}}" method="POST"  class="p-4 sm:p-12 w-full flex justify-evenly">
  @csrf

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-4 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 sm:px-0">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">Address Information</h3>
                  <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive your orders.</p>
                </div>
              
                <div>
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <input type="number" name="product_id" value="{{$product->id}}" hidden>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                  <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                  <input type="text" name="first-name" id="first-name" value="@if(isset($address))@if($address->first_name){{$address->first_name}}@endif @endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                              
                                <div class="col-span-6 sm:col-span-3">
                                  <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                  <input type="text" name="last-name" id="last-name" value="@if(isset($address))@if($address->last_name){{$address->last_name}}@endif @endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                              
                                <div class="col-span-6 sm:col-span-4">
                                  <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                  <input type="number" name="phone-number" id="phone-number" value="@if(isset($address)){{$address->phone_number}}@endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                              
                                <div class="col-span-6 sm:col-span-3">
                                  <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                  <input id="province" name="province" value="@if(isset($address))@if($address->province){{$address->province}}@endif @endif" class="mt-1 block w-full py-2 px-3 border-2 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                              
                                <div class="col-span-6">
                                  <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                                  <input type="text" name="street-address" value="@if(isset($address))@if($address->address){{$address->address}}@endif @endif" id="street-address" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                              
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                  <label for="barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                                  <input type="text" name="barangay" id="barangay" value="@if(isset($address))@if($address->barangay){{$address->barangay}}@endif @endif" class="mt-1 p-2 focus:ring-indigo-500 border-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                              
                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                  <label for="city" class="block text-sm font-medium text-gray-700">Municipality / City</label>
                                  <input type="text" name="city" id="city" value="@if(isset($address))@if($address->city){{$address->city}}@endif @endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                              
                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                  <label for="zip-code" class="block text-sm font-medium text-gray-700">ZIP code</label>
                                  <input type="text" name="zip-code" id="zip-code" value="@if(isset($address))@if($address->zip){{$address->zip}}@endif @endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="md:col-span-2">
                <input type="number" name="product_id" value="{{$product->id}}" hidden>
                <input type="text" name="product_name" value="{{$product->name}}" hidden>
                <input type="number" name="quantity" value="{{$quantity}}" hidden>
                <input type="number" name="price" value="{{$price}}" hidden>
                <input type="number" name="shipping_price" value="{{$shipping}}" hidden>
                <input type="number" name="total_price" value="{{$total}}" hidden>
                <input type="number" name="product_id" value="{{$product->id}}" hidden>
                <input type="number" name="cart_id" value="@if(isset($cart_id)){{$cart_id}}@endif" hidden>
                <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-4/5">
                  <div class="pt-12 md:pt-0 2xl:ps-4">
                    <h2 class="text-xl font-bold">Order Summary</h2>
                    <div class="mt-8">
                      <div class="flex space-x-4">
                        <div>
                          @if (!str_starts_with($product->image, 'http'))
                              <img src="{{asset('images/products/'.$product->image)}}" class="w-60">
                          @else
                              <img src="{{$product->image}}" class="w-60">
                          @endif
                          {{-- <img src="{{$product->image}}" class="w-60"> --}}
                        </div>
                        <div class="w-full">
                          <h2 class="text-xl font-bold">{{$product->name}}</h2>
                          <p class="text-sm">{{Str::limit($product->description, 20)}}</p>
                          <p class="font-bold">Php {{$price}} x {{$quantity}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flex p-4 mt-4"></div>
                  <div class="flex items-center w-full py-4 text-sm border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Subtotal:<span class="ml-2">Php {{$subtotal}}</span>
                  </div>
                  <div class="flex items-center w-full py-4 text-sm border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Shipping Fee:<span class="ml-2">Php {{$shipping}}</span>
                  </div>
                  <div class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Total:<span class="ml-2">Php {{$total}}</span>
                  </div>
                </div>
                <div class="w-1/2 bg-green-200 rounded-lg cursor-pointer flex flex-center p-4 md:mx-10 mt-4">
                    <button type="submit" class="w-full text-center font-bold text-lg">Checkout</button>
                </div>
              </div>
        </div>
    </div>
      
    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
</form>
@endsection