@extends('layouts.app')
@section('content')
<div class="flex flex-col w-full p-0 sm:mt-10 px-8">
    <p class="w-full text-center text-emerald-600">
        {{session('status')}}
    </p>
    <div>
        <h1>Subject: {{$message->subject}}</h1>
        <p>Body: {{$message->body}}</p>
        <p>From: {{$user->first_name}} {{$user->last_name}}</p>
        <p>To: {{$recipient->first_name}} {{$recipient->last_name}}</p>
        <p>Sent: {{$message->created_at}}</p>
    </div>
    @if ($message->from != auth()->user()->id)
    <a href="{{route('reply', ['id'=>$message->id])}}" class="w-fit text-teal-800 border-2 border-emerald-800 py-2 px-6 hover:text-white hover:bg-emerald-900 rounded">Reply</a>
    @endif
</div>
@endsection