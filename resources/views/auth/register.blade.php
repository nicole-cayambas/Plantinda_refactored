@extends('layouts.app')
@section('content')
<div class="w-full flex justify-center">
    <div class="w-full sm:w-1/2 flex flex-col p-8 justify-center items-center bg-white rounded-lg">
        <h2 class="text-center text-2xl font-bold text-gray-900">Create an account</h2>
        <form class="mt-8 space-y-6 w-full sm:w-3/4" action="{{route('register')}}" method="POST">
            @csrf
                <div>
                    <label for="first_name" class="sr-only">First Name</label>
                    <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" class="@error('first_name') border-red-500 border-2 @enderror relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none  focus:border-teal-500 focus:z-10 sm:text-sm" placeholder="First Name">
                </div>
                @error('first_name')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
                <div>
                    <label for="last_name" class="sr-only">Last Name</label>
                    <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" class="@error('last_name') border-red-500 border-2 @enderror relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none  focus:border-teal-500 focus:z-10 sm:text-sm" placeholder="Last Name">
                </div>
                @error('last_name')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" class="@error('email') border-red-500 border-2 @enderror relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none  focus:border-teal-500 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
                <div>
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" name="username" type="text" value="{{ old('username') }}" class="@error('username') border-red-500 border-2 @enderror relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none  focus:border-teal-500 focus:z-10 sm:text-sm" placeholder="Username">
                </div>
                @error('username')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" class="@error('password') border-red-500 border-2 @enderror relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none  focus:border-teal-500 focus:z-10 sm:text-sm" placeholder="Password">
                </div>
                @error('password')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
                <div>
                    <label for="password2" class="sr-only">Password Again</label>
                    <input id="password2" name="password_confirmation" type="password" class="@error('password_confirmation') border-red-500 border-2 @enderror relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none  focus:border-teal-500 focus:z-10 sm:text-sm" placeholder="Repeat your password">
                </div>
                <div class="flex justify-center items-center gap-4">
                        <input type="radio" name="user_type" id="buyer" value="buyer" checked>
                        <label for="buyer">Buyer</label>
                        <input type="radio" name="user_type" id="seller" value="seller">
                        <label for="seller">Seller</label>
                </div>

            <div class="text-center">
            <button type="submit" class="mb-2 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-900 focus:outline-none">
                Sign up
            </button>
            <a href="{{route('login')}}" class="text-s text-teal-800">Log In</a>
            </div>
        </form>
    </div>
</div>
@endsection