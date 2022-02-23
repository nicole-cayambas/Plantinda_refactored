<div class="group relative rounded-lg shadow-lg p-4 sm:p-2">
    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 rounded-lg aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
        @if (!str_starts_with($product->image, 'http'))
            <img src="{{asset('images/products/'.$product->image)}}" alt="{{ $product->name }}"  class="w-full h-full object-center object-cover lg:w-full lg:h-full">
        @else
            <img src="{{$product->image}}" alt="{{ $product->name }}"  class="w-full h-full object-center object-cover lg:w-full lg:h-full">
        @endif

    </div>
    <div class="mt-4 flex justify-between">
        <div>
            <h3 class="text-sm text-gray-700">
            <a href="{{route('showProduct', ['id'=>$product->id])}}" class="text-xl sm:text-base ">
                <span aria-hidden="true" class="absolute inset-0"></span>
                {{$product->name}}
            </a>
            </h3>
            <p class="mt-1 text-gray-500">Min order: {{$product->range_1_min}}</p>
        </div>
        <p class="text-xl sm:text-sm font-medium text-gray-900">Php {{$product->unit_price_1}}</p>
    </div>
</div>