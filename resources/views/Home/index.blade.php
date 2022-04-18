@extends('layouts.app')
@section('content')
    
<div id="filter" class="hidden fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true">
  <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
  <div class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-12 flex flex-col overflow-y-auto">
      <div class="px-4 flex items-center justify-between">
          <h2 class="text-lg font-medium text-gray-900">Filters</h2>
          <button onclick="toggleFilter()" type="button" class="-mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400">
            <span class="sr-only">Close menu</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
      </div>
    
          <!-- Filters -->
      <div class="mt-4 border-t border-gray-200">
          <h3 class="sr-only">Categories</h3>
          <x-categories :categories="$categories" />
          
          
          <div class="border-t border-gray-200 px-4 py-6">
              <h3 class="-mx-2 -my-3 flow-root">
                <!-- Expand/collapse section button -->
                <span class="font-medium text-gray-900"> Rating </span>
              </h3>
              <!-- Filter section, show/hide based on section state. -->
              <form id="filters_form" action="{{route('applyFilter')}}" method="get" class="pt-6" id="filter-section-mobile-1">
                <div class="flex flex-row justify-evenly">
                  <input onClick="applyFilter(this)" type="radio" id="star1" name="rating" value="1" hidden>
                  <label for="star1" class="cursor-pointer"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                      <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                      {{-- <path @if({{ Request::input('rating') >= 1}}) fill="#FECE3C" @else  fill="white" @endif stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/> --}}
                    </svg>
                  </label>
                  <input onClick="applyFilter(this)" type="radio" id="star2" name="rating" value="2" hidden>
                  <label for="star2" class="cursor-pointer"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                      <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                    </svg>
                  </label>
                  <input onClick="applyFilter(this)" type="radio" id="star3" name="rating" value="3" hidden>
                  <label for="star3" class="cursor-pointer"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                      <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                    </svg>
                  </label>
                  <input onClick="applyFilter(this)" type="radio" id="star4" name="rating" value="4" hidden>
                  <label for="star4" class="cursor-pointer"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                      <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                    </svg>
                  </label>
                  <input onClick="applyFilter(this)" type="radio" id="star5" name="rating" value="5" hidden>
                  <label for="star5" class="cursor-pointer"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                      <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                    </svg>
                  </label>
                </div>
              </form>
          </div>
      
          <div class="border-t border-gray-200 px-4 py-6">
            <h3 class="-mx-2 -my-3 flow-root">
              <!-- Expand/collapse section button -->
              <span class="font-medium text-gray-900"> Price </span>
            </h3>
            <!-- Filter section, show/hide based on section state. -->
            <form action="{{route('applyFilter')}}" method="get" class="pt-6" id="filter-section-mobile-2">
              <div class="space-y-6">
                <div class="flex items-center">
                  <input onClick="applyFilter(this)" id="filter-mobile-size-0" name="price" value="price1" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                  <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500"> < Php 500 </label>
                </div>
              
                <div class="flex items-center">
                  <input onClick="applyFilter(this)" id="filter-mobile-size-1" name="price" value="price2" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                  <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500"> Php 501 - Php 1000 </label>
                </div>
              
                <div class="flex items-center">
                  <input onClick="applyFilter(this)" id="filter-mobile-size-2" name="price" value="price3" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                  <label for="filter-mobile-size-2" class="ml-3 min-w-0 flex-1 text-gray-500"> Php 1001 - Php 5000 </label>
                </div>
              
                <div class="flex items-center">
                  <input onClick="applyFilter(this)" id="filter-mobile-size-3" name="price" value="price4" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                  <label for="filter-mobile-size-3" class="ml-3 min-w-0 flex-1 text-gray-500"> Php 5001 - Php 10000 </label>
                </div>
              
                <div class="flex items-center">
                  <input onClick="applyFilter(this)" id="filter-mobile-size-4" name="price" value="price5" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                  <label for="filter-mobile-size-4" class="ml-3 min-w-0 flex-1 text-gray-500"> Php 10001 - Php 20000 </label>
                </div>
              
                <div class="flex items-center">
                  <input onClick="applyFilter(this)" id="filter-mobile-size-5" name="price" value="price6" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                  <label for="filter-mobile-size-5" class="ml-3 min-w-0 flex-1 text-gray-500"> > Php 20001 </label>
                </div>
              </div>
            </form>
          </div>
      </div>
  </div>
</div>
    
<main class="w-full mx-auto px-4 sm:px-6 lg:px-8">
  <div class="relative z-10 flex items-center justify-between pt-6 pb-6 border-b border-gray-200">
    <h1 class="text-2xl font-bold tracking-tight text-gray-900">Home</h1>
    @if($status == 'search') <p> Showing results for '{{$query}}'</p> @endif
    @if($status == 'sort' && $sorter!= "") <p> Sorted by {{$sorter}}</p> @endif
    @if($status == 'categoryFilter') <p> Showing all {{$category->name}}</p> @endif
    <div class="flex items-center">
       <form action="{{route('applySort')}}" method="GET" id="sort" class="group inline-flex justify-center hover:text-gray-900 w-15 sm:w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" tabindex="-1"> 
        @if($status == 'search' || $status == 'sort')
          <input type="text" name="search_query" value="@if($query) {{$query}} @endif" hidden>
        @endif
        <select class="py-1 relative inline-block text-left" role="none" id="sortBy" name="sorter">
          <option class="text-gray-500 block px-4 py-2 text-sm" value=""> Sort By </a>
          <option class="text-gray-500 block px-4 py-2 text-sm" value="newest" @if($status == 'sort' && $sorter=="newest") selected @endif> Newest </a>
          <option class="text-gray-500 block px-4 py-2 text-sm" value="rating" @if($status == 'sort' && $sorter=="rating") selected @endif> Best Rating </a>
          <option class="text-gray-500 block px-4 py-2 text-sm" value="price_asc" @if($status == 'sort' && $sorter=="price_asc") selected @endif> Price: Low to High </a>
          <option class="text-gray-500 block px-4 py-2 text-sm" value="price_desc" @if($status == 'sort' && $sorter=="price_desc") selected @endif> Price: High to Low </a>
        </select>
      </form>
      <button onclick="toggleFilter()" type="button" class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden">
        <span class="sr-only">Filters</span>
        <!-- Heroicon name: solid/filter -->
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
  </div>
  <section aria-labelledby="products-heading" class="pt-6 pb-24">
    <h2 id="products-heading" class="sr-only">Products</h2>
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-x-8 gap-y-10">
      <!-- Filters -->
    <div class="hidden lg:block">
      <h3 class="sr-only">Categories</h3>
      <x-categories :categories="$categories" />
      
      <div class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
          <!-- Expand/collapse section button -->
          <span class="font-medium text-gray-900"> Rating </span>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <form id="filters_form" action="{{route('applyFilter')}}" method="get" class="pt-6" id="filter-section-1">
          <div class="flex flex-row justify-evenly">
            <input onClick="applyFilter(this)" type="radio" id="star1" name="rating" value="1" hidden>
            <label for="star1" class="cursor-pointer"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
                {{-- <path @if({{ Request::input('rating') >= 1}}) fill="#FECE3C" @else  fill="white" @endif stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/> --}}
              </svg>
            </label>
            <input onClick="applyFilter(this)" type="radio" id="star2" name="rating" value="2" hidden>
            <label for="star2" class="cursor-pointer"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
              </svg>
            </label>
            <input onClick="applyFilter(this)" type="radio" id="star3" name="rating" value="3" hidden>
            <label for="star3" class="cursor-pointer"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
              </svg>
            </label>
            <input onClick="applyFilter(this)" type="radio" id="star4" name="rating" value="4" hidden>
            <label for="star4" class="cursor-pointer"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
              </svg>
            </label>
            <input onClick="applyFilter(this)" type="radio" id="star5" name="rating" value="5" hidden>
            <label for="star5" class="cursor-pointer"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 51 48">
                <path fill="white" stroke="black" stroke-width="2" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
              </svg>
            </label>
          </div>
        </form>
      </div>
      <div class="border-b border-gray-200 py-6">
        <h3 class="-my-3 flow-root">
          <!-- Expand/collapse section button -->
          <span class="font-medium text-gray-900"> Price </span>
        </h3>
        <!-- Filter section, show/hide based on section state. -->
        <form action="{{route('applyFilter')}}" method="get" class="pt-6" id="filter-section-2">
          <div class="space-y-4">
            <div class="flex items-center">
              <input onClick="applyFilter(this)" id="filter-size-0" name="price" value="price1" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
              <label for="filter-size-0" class="ml-3 text-sm text-gray-600"> < Php 500 </label>
            </div>
            <div class="flex items-center">
              <input onClick="applyFilter(this)" id="filter-size-1" name="price" value="price2" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
              <label for="filter-size-1" class="ml-3 text-sm text-gray-600"> Php 501 - Php 1000 </label>
            </div>
            <div class="flex items-center">
              <input onClick="applyFilter(this)" id="filter-size-2" name="price" value="price3" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
              <label for="filter-size-2" class="ml-3 text-sm text-gray-600"> Php 1001 - Php 5000 </label>
            </div>
            <div class="flex items-center">
              <input onClick="applyFilter(this)" id="filter-size-3" name="price" value="price4" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
              <label for="filter-size-3" class="ml-3 text-sm text-gray-600"> Php 5001 - Php 10000 </label>
            </div>
            <div class="flex items-center">
              <input onClick="applyFilter(this)" id="filter-size-4" name="price" value="price5" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
              <label for="filter-size-4" class="ml-3 text-sm text-gray-600"> Php 10001 - Php 20000 </label>
            </div>
            <div class="flex items-center">
              <input onClick="applyFilter(this)" id="filter-size-5" name="price" value="price6" type="radio" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
              <label for="filter-size-5" class="ml-3 text-sm text-gray-600"> Php 20001 </label>
            </div>
          </div>
        </form>
      </div>
    </div>
      <!-- Product grid -->
    <div class="lg:col-span-4">
        <x-products :products="$products" />
    </div>
    </div>
  </section>
</main>

<script>
    function applyFilter(src){
      if(src.checked){ 
        src.form.submit();
      }
    }
    function toggleFilter(){
        const filter = document.getElementById('filter');
        filter.classList.toggle('hidden');
    }
    sorter = document.getElementById('sortBy');
    sorter.addEventListener('change', function() {
        this.form.submit();
    });
</script>
  
@endsection