@extends('layouts.app')
@section('content')

<p class="w-full text-center m-4 text-emerald-600">
    {{session('success')}}
</p>
<div class="w-full flex justify-center p-4">
    <form action="{{route('editReview', ['id' => $product->id])}}" method="POST" class="w-full sm:w-1/2">
        @csrf
        <strong> {{$product->name}} </strong>

        <div>
            <label for="rating">Rating</label>
            <input type="text" value="{{$review->rating}}" name="rating" id="rating" class="mt-1 p-2 focus:ring-indigo-500 border-2 focus:border-indigo-500 block w-1/8 shadow-sm sm:text-sm border-gray-300 rounded-md">
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
        <button type="submit" class="mt-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">Submit</button>
    </form>
</div>
@endsection