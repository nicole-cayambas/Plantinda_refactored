{{-- @props(['store' => $store])']) --}}
<a href="{{route('showStore', ['id'=>$store->id])}}" id="store-card" class="mt-4 rounded-xl border-2 p-4 w-full flex flex-col sm:grid sm:grid-cols-4 gap-4">
    <div class="flex flex-col gap-2">
        {{-- change path later --}}
        <h1>{{$store->id}} <strong class="text-lg">{{$store->name}}</strong></h1>
        <p>{{$store->certifications}}</p>
        <img src="{{asset('images/store_images/retro.jpg')}}" width="80px" height="80px"> 
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
    <div class="flex flex-col gap-2 sm:px-8 justify-center">
        <button class="bg-emerald-400 hover:bg-emerald-800 hover:text-white">Follow</button>
        <button class="border border-emerald-600 hover:bg-gray-200">Like</button>
    </div>
</a>