@extends('layouts.app')
@section('content')
<div class="w-full flex justify-center">
    <div class="w-full sm:w-1/2 flex flex-col p-8 justify-center items-center bg-white rounded-lg">
        <h2 class="text-center text-2xl font-bold text-gray-900">Log Into your Account</h2>
        <form class="mt-8 space-y-6 w-full sm:w-3/4" action="{{route('login')}}" method="POST">
            @if (session('status'))
                <p class="text-red-500">{{ session('status') }}</p>
            @endif
            @csrf
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="@error('email') border-red-500 border-2 @enderror relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none  focus:border-teal-500 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" class="@error('password') border-red-500 border-2 @enderror relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none  focus:border-teal-500 focus:z-10 sm:text-sm" placeholder="Password">
                </div>
                @error('password')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
                <div class="mt-6">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="form-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>
            <div class="text-center">
            <button type="submit" class="mb-2 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-900 focus:outline-none">
                Log In
            </button>
            <a href="{{route('register')}}" class="text-s text-teal-800">Sign Up</a>
            </div>
        </form>
    </div>
</div>
@endsection