@extends('dashboard.layouts.app')
@section('dash_content')
<div class="flex flex-col w-full p-0 sm:mt-10">
    <p class="w-full text-center text-emerald-600">
        {{session('success')}}
    </p>
    <h1 class="px-4">Messages</h1>
    <div class="mt-5">
        <ul class="flex flex-col gap-2 px-4">
            @foreach ($messages as $message)
            <li class="bg-gray-200 rounded p-2">
                <a href="{{route('showMessage',['id'=>$message->id])}}" class="flex flex-row justify-between items-center">
                    <div>
                        <h1>{{$message->subject}}</h1>
                        <p>{{$message->user->first_name}} {{$message->user->last_name}}</p>
                    </div>
                    <p>{{$message->created_at}}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection