{{-- @props(['products' => $products])']) --}}

<div class="h-96 lg:h-full">
    <div class="bg-white">
        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <x-product :product="$product" />
                @endforeach
            @else
                <p>No products found</p>
            @endif
        </div>
    </div>
    <div class="mt-10 flex w-ful justify-center">
        {{ $products->links() }}
    </div>
      
</div>