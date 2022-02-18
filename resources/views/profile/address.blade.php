@extends('layouts.app')
@section('content')
<div class="p-4 sm:p-12">
<div class="mt-10 sm:mt-0">
  <p class="w-full text-center m-4 bg-slate-200 text-emerald-600">
    {{session('success')}}
  </p>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Address Information</h3>
          <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive your orders.</p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{route('updateAddress')}}" method="POST">
            @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                  <input type="text" name="first-name" id="first-name" value="@if($address!=null)@if($address->first_name){{$address->first_name}}@endif @endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                  <input type="text" name="last-name" id="last-name" value="@if($address!=null)@if($address->last_name){{$address->last_name}}@endif @endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-4">
                  <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                  <input type="number" name="phone-number" id="phone-number" value="@if($address!=null){{$address->phone_number}}@endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3">
                  <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                  <input id="province" name="province" value="@if($address!=null)@if($address->province){{$address->province}}@endif @endif" class="mt-1 block w-full py-2 px-3 border-2 border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
  
                <div class="col-span-6">
                  <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                  <input type="text" name="street-address" value="@if($address!=null)@if($address->address){{$address->address}}@endif @endif" id="street-address" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label for="barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                  <input type="text" name="barangay" id="barangay" value="@if($address!=null)@if($address->barangay){{$address->barangay}}@endif @endif" class="mt-1 p-2 focus:ring-indigo-500 border-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="city" class="block text-sm font-medium text-gray-700">Municipality / City</label>
                  <input type="text" name="city" id="city" value="@if($address!=null)@if($address->city){{$address->city}}@endif @endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
  
                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label for="zip-code" class="block text-sm font-medium text-gray-700">ZIP code</label>
                  <input type="text" name="zip-code" id="zip-code" value="@if($address!=null)@if($address->zip){{$address->zip}}@endif @endif" class="mt-1 p-2 border-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
      <div class="border-t border-gray-200"></div>
    </div>
  </div>
</div>
  @endsection