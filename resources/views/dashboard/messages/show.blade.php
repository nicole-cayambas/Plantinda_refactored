@extends('dashboard.layouts.app')
@section('dash_content')
<div class="flex flex-col w-full p-0 sm:mt-10">
    <p class="w-full text-center text-emerald-600">
        {{session('success')}}
    </p>
    <div>
        <h1>Subject: {{$message->subject}}</h1>
        <p>Body: {{$message->body}}</p>
        <p>Sent by: {{$message->user->first_name}} {{$message->user->last_name}}</p>
        <p>Sent: {{$message->created_at}}</p>
    </div>
    <a href="#" class="w-fit text-teal-800 border-2 border-emerald-800 py-2 px-6 hover:text-white hover:bg-emerald-900 rounded">Reply</a>
</div>
@endsection