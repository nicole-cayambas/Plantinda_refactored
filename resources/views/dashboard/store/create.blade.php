@extends('dashboard.layouts.app')
@section('dash_content')

<div class="w-full">
    <p class="mt-2 w-full text-center text-emerald-600">
        {{session('status')}}
    </p> 
    <div class="w-full p-4 flex justify-center">

        <form action="{{route('saveStore')}}" method="POST" class="w-full sm:w-4/5 border-2 p-4 flex flex-col gap-4 rounded-lg" enctype="multipart/form-data">
            @csrf
            <p class="font-bold">Store Information</p>
            <div>
                <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" name="name" placeholder="Store Name" value="{{old('name')}}">
            </div>
            @error('name')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
            <div>
                <textarea class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full h-36" name="description" placeholder="Description">{{old('description')}}</textarea>
            </div>
            @error('description')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
            <div>
                <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" name="main_products" placeholder="Main Products (e.g. Vegetables, Flowers, Seeds)" {{old('main_products')}}>
            </div>
            @error('main_products')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
            <div>
                <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" name="main_markets" placeholder="Main Markets (e.g. Restaurants, Souvenir Shops, Home Gardens)" {{old('main_markets')}}>
            </div>
            @error('main_markets')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
            @enderror
            <div>
                <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" name="fb" placeholder="Facebook Link" {{old('fb')}}>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700"> Business Permit </label>
                    <div class="mt-1 flex items-center gap-4">
                        <span class="inline-block h-12 w-24 overflow-hidden bg-gray-200">
                        </span>
                        <input id="choose-permit" type="file" name="permit" accept=".jpg, .jpeg, .png, .gif, .svg" hidden>
                        <button id="permit_btn" type="button" class="w-20 border-2 rounded-lg hover:bg-gray-200 p-2">Change</button>
                        <p id="permitName"></p>
                    </div>
                    <p>Upload a business permit in order to be verified.</p>
    
            </div>
            <div class="flex flex-col sm:flex-row w-full">
                <div>
                    <label class="block text-sm font-medium text-gray-700"> Store Photo </label>
                    <div class="mt-1 flex items-center gap-4">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-200">
                            <img class="rounded-circle w-full h-full">
                        </span>
                        <input id="choose-file" type="file" name="image" accept=".jpg, .jpeg, .png, .gif, .svg" hidden>
                        <button onClick="showChooser()" type="button" class="w-20 border-2 rounded-lg hover:bg-gray-200 p-2">Change</button>
                        <p id="fileName"></p>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700"> Store Banner </label>
                    <div class="mt-1 flex items-center gap-4">
                        <span class="inline-block h-12 w-40 overflow-hidden bg-gray-200">
                            <img class="rounded-lg w-full h-full" alt="">
                        </span>
                        <input id="choose-banner" type="file" name="banner_image" accept=".jpg, .jpeg, .png, .gif, .svg" hidden>
                        <button id="banner_btn" type="button" class="w-20 border-2 rounded-lg hover:bg-gray-200 p-2">Change</button>
                        <p id="bannerName"></p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-10">
                <button type="submit" class="w-1/2 bg-emerald-400 rounded-lg p-4 hover:bg-emerald-500">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    const fileSelector = document.getElementById('choose-file');
    const bannerSelector = document.getElementById('choose-banner');
    const permitSelector = document.getElementById('choose-permit');

    function showChooser() {
      fileSelector.click();
    }
    fileSelector.addEventListener('change', (event) => {
      const fileList = event.target.files;
      const file = fileList[0];
      const fileName = document.getElementById('fileName');
      fileName.innerHTML = file.name;
    });

    bannerSelector.addEventListener('change', (event) => {
      const fileList = event.target.files;
      const file = fileList[0];
      const fileName = document.getElementById('bannerName');
      fileName.innerHTML = file.name;
    });

    permitSelector.addEventListener('change', (event) => {
      const fileList = event.target.files;
      const file = fileList[0];
      const fileName = document.getElementById('permitName');
      fileName.innerHTML = file.name;
    });

    const bannerBtn = document.getElementById('banner_btn');
    bannerBtn.addEventListener('click', (event) => {
      bannerSelector.click();
    });
    const permitBtn = document.getElementById('permit_btn');
    permitBtn.addEventListener('click', (event) => {
      permitSelector.click();
    });
</script>
@endsection