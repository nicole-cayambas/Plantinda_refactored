@extends('dashboard.layouts.app')
@section('dash_content')
<div class="flex flex-col w-full p-0 sm:mt-10">
    <p class="w-full text-center text-emerald-600">
        {{session('success')}}
    </p>
    <div>
        @php
            $sender = App\Models\User::find($message->from);
            $recipient = App\Models\User::find($message->to);
        @endphp
        <h1>Subject: {{$message->subject}}</h1>
        <p>Body: {{$message->body}}</p>
        <p>From: {{$sender->first_name}} {{$sender->last_name}}</p>
        <p>To: {{$recipient->first_name}} {{$recipient->last_name}}</p>
        <p>Sent: {{$message->created_at}}</p>
    </div>
    @if ($message->from != auth()->user()->id)
    <a href="{{route('reply', ['id'=>$message->id])}}" class="w-fit text-teal-800 border-2 border-emerald-800 py-2 px-6 hover:text-white hover:bg-emerald-900 rounded">Reply</a>
    @endif
</div>
@endsection