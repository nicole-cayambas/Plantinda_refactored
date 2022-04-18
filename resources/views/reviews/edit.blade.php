@extends('layouts.app')
@section('content')

<p class="w-full text-center m-4 text-emerald-600">
    {{session('success')}}
</p>
<div class="w-full flex justify-center p-4">
    <form action="{{route('editReview', ['id' => $product->id])}}" method="POST" class="w-full sm:w-1/2" enctype="multipart/form-data">
        @csrf
        <strong> {{$product->name}} </strong>
        <br>
        <div class="h-14 flex gap-2">
            <label for="star1" class="cursor-pointer p-1">
                <span class="text-3xl hover:text-4xl ease-in-out duration-300">★</span>
                <input type="radio" id="star1" name="rating" class="hidden" value="1">
            </label>
            <label for="star2" class="cursor-pointer p-1">
                <span class="text-3xl hover:text-4xl ease-in-out duration-300">★</span>
                <input type="radio" id="star2" name="rating" class="hidden" value="2">
            </label>
            <label for="star3" class="cursor-pointer p-1">
                <span class="text-3xl hover:text-4xl ease-in-out duration-300">★</span>
                <input type="radio" id="star3" name="rating" class="hidden" value="3">
            </label>
            <label for="star4" class="cursor-pointer p-1">
                <span class="text-3xl hover:text-4xl ease-in-out duration-300">★</span>
                <input type="radio" id="star4" name="rating" class="hidden" value="4">
            </label>
            <label for="star5" class="cursor-pointer p-1">
                <span class="text-3xl hover:text-4xl ease-in-out duration-300">★</span>
                <input type="radio" id="star5" name="rating" class="hidden" value="5">
            </label>
        </div>
        @error ('rating')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div>
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="mt-1 p-2 focus:ring-indigo-500 border-2 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$review->comment}}</textarea>
        </div>
        @error ('comment')
          <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <br>
        @if ($review->image)
        <div class="flex items-center justify-start gap-1">
            <div>
                <label class="block text-sm font-medium text-gray-700"> Photo </label>
                <div class="mt-1 flex items-center">
                  <span class="inline-block h-12 w-20 rounded-lg overflow-hidden bg-gray-100">
                        <img src="{{asset('images/reviews/'.$review->image)}}" alt="{{$review->image}}">
                  </span>
                  <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .gif, .svg" hidden>
                    <button onClick="showChooser()" type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</button>
                    <p id="fileName"></p>
                </div>
            </div>
        </div>
        @else
        <div class="flex items-center justify-start gap-2">
            <label class="block text-sm font-medium text-gray-700"> Photo </label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .gif, .svg" hidden>
            <button onClick="showChooser()" type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Upload photo</button>
            <p id="fileName"></p>
        </div>
        @endif

        @error('image')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <button type="submit" class="mt-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">Submit</button>
    </form>
</div>
<script>
    const star5 = document.querySelector('#star5');
    const star4 = document.querySelector('#star4');
    const star3 = document.querySelector('#star3');
    const star2 = document.querySelector('#star2');
    const star1 = document.querySelector('#star1');
    star5.addEventListener('click', () => {
        star5.labels[0].style.color = '#ffc107';
        star4.labels[0].style.color = '#ffc107';
        star3.labels[0].style.color = '#ffc107';
        star2.labels[0].style.color = '#ffc107';
        star1.labels[0].style.color = '#ffc107';
    });
    star4.addEventListener('click', () => {
        star5.labels[0].style.color = 'black';
        star4.labels[0].style.color = '#ffc107';
        star3.labels[0].style.color = '#ffc107';
        star2.labels[0].style.color = '#ffc107';
        star1.labels[0].style.color = '#ffc107';
    });
    star3.addEventListener('click', () => {
        star5.labels[0].style.color = 'black';
        star4.labels[0].style.color = 'black';
        star3.labels[0].style.color = '#ffc107';
        star2.labels[0].style.color = '#ffc107';
        star1.labels[0].style.color = '#ffc107';
    });
    star2.addEventListener('click', () => {
        star5.labels[0].style.color = 'black';
        star4.labels[0].style.color = 'black';
        star3.labels[0].style.color = 'black';
        star2.labels[0].style.color = '#ffc107';
        star1.labels[0].style.color = '#ffc107';
    });
    star1.addEventListener('click', () => {
        star5.labels[0].style.color = 'black';
        star4.labels[0].style.color = 'black';
        star3.labels[0].style.color = 'black';
        star2.labels[0].style.color = 'black';
        star1.labels[0].style.color = '#ffc107';
    });
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