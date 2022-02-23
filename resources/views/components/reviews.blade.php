<div class="col-span-1 flex justify-end px-4">
    @if ($review->user->icon)
        <img src="{{asset('images/icons/'.$review->user->icon)}}" alt="" class="bg-gray-400 rounded-full h-8 w-8">
    @else
        <img src="{{asset('images/icons/null.png')}}" alt="" class="bg-gray-400 rounded-full h-8 w-8">
    @endif
</div>
<div class="col-span-3">
    <div class="flex flex-col">
        <div class="flex flex-col gap-2">
            <strong>{{$review->user->username}}</strong>
            <div class="flex">
                <span class="flex items-center">
                    @for($i = 0; $i < $review->rating; $i++)
                    <svg fill="black" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    @endfor
                    @for($i = 0; $i < 5-$review->rating; $i++)
                    <svg fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    @endfor
                </span>
            </div>
        </div>
        <div>
            <p>{{$review->comment}}</p>
        </div>
        <p class="text-sm">{{$review->created_at}}</p>
        @if($review->user->id == auth()->user()->id)
        <div class="mt-2 flex flex-row gap-4">
            <a href="{{route('editReview', ['id' => $review->id])}}" class="underline text-green-800">Edit</a>
            <a href="{{route('deleteReview', ['id' => $review->id])}}" class="underline text-green-800">Delete</a>
        </div>
        @endif
    </div>
</div>