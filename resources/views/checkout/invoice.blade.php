@extends('layouts.app')
@section('content')
<section class="bg-gray-100">
  <div class="max-w-2xl mx-auto py-0 md:py-16">
    <article id="printableArea" class="shadow-none md:shadow-md md:rounded-md overflow-hidden">
      <div class="md:rounded-b-md  bg-white">
        <div class="p-9 border-b border-gray-200">
          <div class="space-y-6">
            <div class="flex justify-between items-top">
              <div class="space-y-4">
                <div>
                    <h1 class="text-2xl font-bold leading-7 text-gray-900">{{$store_name}}</h1>
                  <p class="font-bold text-lg"> Invoice </p>
                  <p> {{$store_name}} </p>
                </div>
                <div>
                  <p class="font-medium text-sm text-gray-400"> Billed To </p>
                  <p> {{$buyer_name}} </p>
                  <p> {{$user->email}} </p>
                  <p> {{$phone_number}} </p>
                </div>
              </div>
              <div class="space-y-2">
                <div>
                  <p class="font-medium text-sm text-gray-400"> Invoice Number </p>
                  <p> {{$order->id}} </p>
                </div>
                <div>
                  <p class="font-medium text-sm text-gray-400"> Invoice Date </p>
                  <p> {{Str::substr($order->created_at, 0, 10)}} </p>
                </div>
                <div>
                  <a href="#" onclick="printDiv('printableArea')" class="inline-flex items-center text-sm font-medium text-blue-500 hover:opacity-75 "> Download PDF <svg class="ml-0.5 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                      <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="p-9 border-b border-gray-200">
          <p class="font-medium text-sm text-gray-400"> Note </p>
          <p class="text-sm"> Thank you for your order. </p>
        </div>
        <table class="w-full divide-y divide-gray-200 text-sm">
          <thead>
            <tr>
              <th scope="col" class="px-9 py-4 text-left font-semibold text-gray-400"> Item </th>
              <th scope="col" class="py-3 text-left font-semibold text-gray-400">  </th>
              <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Quantity </th>
              <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Unit Price </th>
              <th scope="col" class="py-3 text-left font-semibold text-gray-400"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr>
              <td class="px-9 py-5 whitespace-nowrap space-x-1 flex items-center">
                <div>
                  <p> {{$product->name}} </p>
                  <p class="text-sm text-gray-400"> {{Str::limit($product->summary, 35)}} </p>
                </div>
              </td>
              <td class="whitespace-nowrap text-gray-600 truncate"></td>
              <td class="whitespace-nowrap text-gray-600 truncate"> {{$order->quantity}} </td>
              <td class="whitespace-nowrap text-gray-600 truncate"> Php {{number_format($order->unit_price, 2)}} </td>
              <td class="whitespace-nowrap text-gray-600 truncate"> </td>
            </tr>
            
          </tbody>
        </table>
        <div class="p-9 border-b border-gray-200">
          <div class="space-y-3">
            <div class="flex justify-between">
              <div>
                <p class="text-gray-500 text-sm"> Subtotal </p>
              </div>
              <p class="text-gray-500 text-sm"> Php {{number_format($order->quantity*$order->unit_price, 2)}} </p>
            </div>
            <div class="flex justify-between">
              <div>
                <p class="text-gray-500 text-sm"> Shipping Fee </p>
              </div>
              <p class="text-gray-500 text-sm"> Php {{number_format($order->shipping_price, 2)}} </p>
            </div>
            <div class="flex justify-between">
              <div>
                <p class="text-gray-500 text-sm"> Total </p>
              </div>
              <p class="text-gray-500 text-sm"> Php {{number_format($order->total_price, 2)}} </p>
            </div>
          </div>
        </div>
        <div class="p-9 border-b border-gray-200">
          <div class="space-y-3">
            <div class="flex justify-between">
              <div>
                <p class="font-bold text-black text-lg"> Amount Due </p>
              </div>
              <p class="font-bold text-black text-lg"> Php {{number_format($order->total_price, 2)}} </p>
            </div>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@endsection