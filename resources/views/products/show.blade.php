@extends('layouts.app')
@section('content')
<section class="text-gray-700 body-font overflow-hidden bg-white p-4">
  <div class="container mx-auto">
      <p class="w-full text-center text-emerald-600">
        {{session('success')}}
      </p>
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="{{$product->image}}">
      <form action="{{route('sendOrder',['id' => $product->id])}}" method="POST" class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        @csrf
        <h2 class="text-sm title-font text-gray-500 tracking-widest">{{$product->store->name}}</h2>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
        <input type="number" value="{{$product->id}}" name="product_id" hidden>
        <div class="flex mb-4">
          <span class="flex items-center">
              @for($i = 0; $i < $product->rating; $i++)
              <svg fill="black" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              @endfor
              @for($i = 0; $i < 5-$product->rating; $i++)
              <svg fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              @endfor
            
            <span class="text-gray-600 ml-3">{{$product->num_reviews}} Reviews</span>
          </span>
          <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>
            </a>
          </span>
        </div>
        <p class="leading-relaxed">{{$product->summary}}</p>
        <div class="flex mt-5 items-stretch mb-5 border-b-1 border-gray-200 flex-col gap-4">
            <div id="radio" class="flex justify-between w-full gap-4 md:flex-nowrap ">
                <input onClick="setPrice(this)" type="radio" id="price1" class="" name="price" value="{{$product->unit_price_1}}" hidden checked>
                <label for="price1" id="price1label" class="w-1/2 sm:w-full border-2 border-green-800 rounded-lg p-2 text-center cursor-pointer">
                    <p class="font-bold">Php {{$product->unit_price_1}}</p>
                    <input type="radio" id="range1" name="range" value="{{$product->range_1_min}} - {{$product->range_1_max}}" hidden>
                    <p class="text-sm">{{$product->range_1_min}} - {{$product->range_1_max}}</p>
                </label>
                <input onClick="setPrice(this)" type="radio" id="price2" class="" name="price" value="{{$product->unit_price_2}}" hidden>
                <label for="price2" id="price2label" class="w-1/2 sm:w-full border-2 border-green-900 rounded-lg p-2 text-center cursor-pointer">
                    <p class="font-bold">Php {{$product->unit_price_2}}</p>
                    <input type="radio" id="range2" name="range" value="{{$product->range_2_min}} - {{$product->range_2_max}}" hidden>
                    <p class="text-sm">{{$product->range_2_min}} - {{$product->range_2_max}}</p>
                </label>
                <input onClick="setPrice(this)" type="radio" id="price3" class="" name="price" value="{{$product->unit_price_3}}" hidden>
                <label for="price3"  id="price3label" class="w-1/2 sm:w-full border-2 border-green-900 rounded-lg p-2 text-center cursor-pointer">
                    <p class="font-bold">Php {{$product->unit_price_3}}</p>
                    <input type="radio" id="range3" name="range" value="{{$product->range_3_min}} - {{$product->range_3_max}}" hidden>
                    <p class="text-sm">{{$product->range_3_min}} - {{$product->range_3_max}}</p>
                </label>
                <input onClick="setPrice(this)" type="radio" id="price4" class="" name="price" value="{{$product->unit_price_4}}" hidden>
                <label for="price4" id="price4label" class="w-1/2 sm:w-full border-2 border-green-900 rounded-lg p-2 text-center cursor-pointer">
                    <p class="font-bold">Php {{$product->unit_price_4}}</p>
                    <input type="radio" id="range4" name="range" value="{{$product->range_4_min}} - {{$product->range_4_max}}" hidden>
                    <p class="text-sm">{{$product->range_4_min}} - {{$product->range_4_max}}</p>
                </label>
            </div>
        </div>
      
        @error ('quantity')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <!-- input component -->
        <div class="pb-4 flex flex-row w-full justify-between">
          <div class="flex flex-col w-1/3">
            <label for="quantity" class="w-full text-gray-700 text-sm font-semibold">No. of Pieces
            </label>
            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
              <input type="number" id="quantity" class="outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="quantity" value="0">
            </div>
          </div>
          <div class="flex flex-col w-2/3 justify-end items-end">
            <p class="text-gray-700 text-sm font-semibold flex justify-end">Subtotal: Php <input type="number" class="text-right w-20" id="subtotal" name="subtotal" value="0" readonly></p>
            <p class="text-gray-700 text-sm font-semibold flex justify-end">Shipping: Php <input type="number" class="text-right w-20" id="shipping" value="{{50}}" name="shipping" readonly></p>
            
            <p class="text-gray-700 text-sm font-bold flex justify-end">Total: Php <input type="number" name="total" class="text-right w-20" id="total" value="0" readonly></p>
          </div>
        </div>
        <div class="flex justify-between">
          <button type="submit" id="buy" name="submit" value="sendOrder" class="w-1/2 mx-4 justify-center flex ml-auto text-white bg-green-800 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">Buy Now</button>
          <button type="submit" id="cart" name="submit" value="addToCart" class="w-1/2 mx-4 justify-center flex ml-auto text-teal-800 border-2 border-teal-800 py-2 px-6 focus:outline-none hover:text-white hover:bg-green-900 rounded">Add To Cart</button>
          <button type="submit" id="wish" name="submit" value="wishlist" class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-green-800 ml-4">
            <svg @auth @if ($inWishlist) fill="currentColor" @else fill="none" @endif @endauth stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
</section>


<script>
  const subtotal = document.getElementById('subtotal');
  const radio = document.getElementsByName('price');
  const range = document.getElementsByName('range');
  range[0].checked = true;
  const total = document.getElementById('total');
  var price = radio[0].value;
  function setPrice(src){
    price = src.value;
    for(let i = 0; i < radio.length; i++){
      if(radio[i].checked){
        range[i].checked = true;
      }
    }
  }
  const quantity = document.getElementById('quantity');
  quantity.addEventListener('change', function(){
    subtotal.value = price * quantity.value;
    total.value = parseInt(subtotal.value) + parseInt(document.getElementById('shipping').value);
    
  })

</script>

<style>
  input[type='number']::-webkit-inner-spin-button,
  input[type='number']::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  #radio input[type="radio"] {
    display: none;
  }
  #radio label{
    background-color: #e4e4e4;
    color: black;
  }
  #radio input[type="radio"]:checked + label {
    background-color: #14532D;
    color: white;
  }
</style>

@endsection