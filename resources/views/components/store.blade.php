
<a href="{{route('showStore', ['id'=>$store->id])}}" id="store-card" class="mt-4 rounded-xl border-2 p-4 w-full flex flex-col sm:grid sm:grid-cols-4 gap-4">
    <div class="flex flex-col col-span-2 gap-2">
        <div class="flex flex-row gap-2 items-center">
            <img src="@if($store->image){{asset('images/store_images/'.$store->image)}} @else {{asset('images/store_images/null.png')}} @endif" class="rounded-circle w-6 h-6">
            <strong class="text-lg">{{$store->name}}</strong>
        </div>
        <p>{{$store->certifications}}</p>
        <div class="w-full sm:w-1/2 h-36">
            <img src="@if($store->banner_image){{asset('images/store_banners/'.$store->banner_image)}} @else {{asset('images/store_banners/null.png')}} @endif" class="w-full h-full rounded-lg"> 
        </div>
        <p>Seller: <strong>{{$store->user->username}}</strong></p>
    </div>
    <div class="flex flex-col gap-2 justify-center">
        <p>Main products: <strong>{{$store->main_products}}</strong></p>
        <p>Main markets: <strong>{{$store->main_markets}}</strong></p>
    </div>
    <div class="flex flex-col gap-2 justify-center">
        <p>Response time: <strong>{{$store->response_time}}%</strong></p>
        <p>Delivery rate: <strong>{{$store->delivery_rate}}%</strong></p>
        <p>Number of transactions: <strong>{{$store->num_transactions}}</strong></p>
    </div>
    {{-- <div class="flex flex-col gap-2 sm:px-8 justify-center">
        <button class="bg-emerald-400 hover:bg-emerald-800 hover:text-white">Follow</button>
        <button class="border border-emerald-600 hover:bg-gray-200">Like</button>
    </div> --}}
</a>