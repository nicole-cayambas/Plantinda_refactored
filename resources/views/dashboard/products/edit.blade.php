@extends('dashboard.layouts.app')
@section('dash_content')
<div class="w-full p-4 flex flex-col items-center">
    <div class="w-full px-2 py-6">
        <h1 class="font-semibold text-lg">Edit Product</h1>
        <p class="w-full text-center text-emerald-600">
            {{session('status')}}
        </p>
    </div>
    <form action="{{route('updateProduct')}}" method="POST" enctype="multipart/form-data" class="w-full sm:w-11/12 flex flex-col gap-4">
        @csrf
        <input type="number" name="product_id" value="{{$product->id}}" hidden>
        <div class="grid grid-cols-3 flex items-center">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" value="{{$product->name}}" class="col-span-2 p-2 rounded border-2 focus:outline-0">
        </div>
        <div class="grid grid-cols-3 flex items-center">
            <label for="summary">Summary</label>
            <input type="text" name="summary" id="summary" value="{{$product->summary}}" class="col-span-2 p-2 rounded border-2 focus:outline-0">
        </div>
        <div class="grid grid-cols-3 flex items-center">
            <label for="description">Description</label>
            <input type="textarea" name="description" id="description" value="{{$product->description}}" class="col-span-2 p-2 rounded border-2 focus:outline-0">
        </div>
        <div class="grid grid-cols-6 flex items-center justify-start gap-1">
            <label for="price1">Unit Price</label>
            <input type="number" name="unit_price_1" id="price1" value="{{$product->unit_price_1}}" class="p-2 rounded border-2 focus:outline-0">
            <label for="range_1_min">Min Quantity</label>
            <input type="number" name="range_1_min" id="range_1_min" value="{{$product->range_1_min}}" class="p-2 rounded border-2 focus:outline-0">
            <label for="range_1_max">Max Quantity</label>
            <input type="number" name="range_1_max" id="range_1_max" value="{{$product->range_1_max}}" class="p-2 rounded border-2 focus:outline-0">
        </div>
        <div class="grid grid-cols-6 flex items-center justify-start gap-1">
            <label for="price2">Unit Price</label>
            <input type="number" name="unit_price_2" id="price2" value="{{$product->unit_price_2}}" class="p-2 rounded border-2 focus:outline-0">
            <label for="range_2_min">Min Quantity</label>
            <input type="number" name="range_2_min" id="range_2_min" value="{{$product->range_2_min}}" class="p-2 rounded border-2 focus:outline-0">
            <label for="range_2_max">Max Quantity</label>
            <input type="number" name="range_2_max" id="range_2_max" value="{{$product->range_2_max}}" class="p-2 rounded border-2 focus:outline-0">
        </div>
        <div class="grid grid-cols-6 flex items-center justify-start gap-1">
            <label for="price3">Unit Price</label>
            <input type="number" name="unit_price_3" id="price3" value="{{$product->unit_price_3}}" class="p-2 rounded border-2 focus:outline-0">
            <label for="range_3_min">Min Quantity</label>
            <input type="number" name="range_3_min" id="range_3_min" value="{{$product->range_3_min}}" class="p-2 rounded border-2 focus:outline-0">
            <label for="range_3_max">Max Quantity</label>
            <input type="number" name="range_3_max" id="range_3_max" value="{{$product->range_3_max}}" class="p-2 rounded border-2 focus:outline-0">
        </div>
        <div class="grid grid-cols-6 flex items-center justify-start gap-1">
            <label for="price4">Unit Price</label>
            <input type="number" name="unit_price_4" id="price4" value="{{$product->unit_price_4}}" class="p-2 rounded border-2 focus:outline-0">
            <label for="range_4_min">Min Quantity</label>
            <input type="number" name="range_4_min" id="range_4_min" value="{{$product->range_4_min}}" class="p-2 rounded border-2 focus:outline-0">
            <label for="range_4_max">Max Quantity</label>
            <input type="number" name="range_4_max" id="range_4_max" value="{{$product->range_4_max}}" class="p-2 rounded border-2 focus:outline-0">
        </div>
        <div>
            <label for="shipping_price">Shipping (Base price)</label>
            <input type="number" name="shipping_price" id="shipping_price" value="{{$product->shipping_price}}" class="p-2 rounded border-2 focus:outline-0">
        </div>
        <div>
            <label for="num_units">Number of Units Available</label>
            <input type="number" name="num_units" id="num_units" value="{{$product->num_units}}" class="p-2 rounded border-2 focus:outline-0">
        </div>
        <div class="flex items-center justify-start gap-1">
            <div>
                <label class="block text-sm font-medium text-gray-700"> Photo </label>
                <div class="mt-1 flex items-center">
                  <span class="inline-block h-12 w-20 rounded-lg overflow-hidden bg-gray-100">
                    @if (!str_starts_with($product->image, 'http') && $product->image != null)
                        <img src="{{asset('images/products/'.$product->image)}}" alt="">
                    @else
                        <img src="{{$product->image}}" alt="">
                    @endif
                  </span>
                  <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .gif, .svg" hidden>
                    <button onClick="showChooser()" type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</button>
                    <p id="fileName"></p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center gap-1">
            <button type="submit" class="w-full p-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">Save</button>
        </div>
    </form>
</div>
<script>
    const fileSelector = document.getElementById('image');
    function showChooser() {
      fileSelector.click();
    }
    fileSelector.addEventListener('change', (event) => {
      const fileList = event.target.files;
      const file = fileList[0];
      const fileName = document.getElementById('fileName');
      fileName.innerHTML = file.name;
    });
</script>
@endsection