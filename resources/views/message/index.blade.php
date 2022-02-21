@extends('layouts.app')
@section('content')
<div class="w-full">
<p class="w-full text-center text-emerald-600">
    {{session('status')}}
</p>
<h1>Messages</h1>
<div>
    <ul>
        @foreach($messages as $message)
        <li>
            <a href="{{route('messages', ['id' => $message->id])}}">
                {{$message->subject}}
            </a>
        </li>
        @endforeach
    </ul>
</div>
</div>
@endsection