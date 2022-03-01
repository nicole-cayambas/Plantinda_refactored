@extends('dashboard.layouts.app')
@section('dash_content')
<div class="flex flex-col w-full p-0 sm:mt-10">
    <p class="w-full text-center text-emerald-600">
        {{session('success')}}
    </p>
    <div>
        <h1>Subject: {{$message->subject}}</h1>
        <p>Body: {{$message->body}}</p>
        <p>Sent by: {{$user->first_name}} {{$user->last_name}}</p>
        <p>Sent: {{$message->created_at}}</p>
    </div>
    <form action="{{route('sendMessage')}}" method="POST" class="w-full mt-4 sm:w-4/5 border-2 p-4 flex flex-col gap-4 rounded-lg">
        @csrf
        <p class="font-bold">Compose Message</p>
        <div>
            <label for="seller_email">Send To</label>
            <input type="text" name="user_email" id="user_email" value="{{$user->email}}" class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" readonly>
        </div>
        <div>
            <label for="subject">Subject</label>
            <input class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" type="text" id="subject" name="subject" value="{{$message->subject}}" readonly>
        </div>
        @error('name')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div>
            <textarea class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full h-36" name="body" placeholder="Body"></textarea>
        </div>
        @error('body')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror
        <div>
            <label for="product_name" class="font-semibold">Product:</label>
            <input type="text" name="product_name" id="product_name" value="{{$message->product->name}}" class="p-2 focus:outline-none focus:bg-gray-100 border-2 w-full" readonly>
            <input type="number" name="product_id" value="{{$message->product_id}}" hidden>
            <input type="number" name="to" value="{{$message->from}}" hidden>
            <input type="number" name="from" value="{{$message->to}}" hidden>
        </div>
        <div class="flex justify-center mt-10">
            <button type="submit" class="w-1/2 bg-emerald-400 rounded-lg p-4 hover:bg-emerald-500">Send</button>
        </div>
    </form>
</div>
@endsection