@extends('admin.layouts.app')
@section('admin_content')
@auth
<div class="flex flex-col w-full p-2">
    <p class="mt-2 w-full text-center text-emerald-600">
        {{session('status')}}
    </p> 
    <table class="w-full">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Buyer ID
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Name
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Email
                </th>
                <th scope="col" class="relative py-3 px-6">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buyers as $buyer)
                <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                    <div>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $buyer->id }}
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                            {{$buyer->first_name}} {{$buyer->last_name}}
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                            {{$buyer->email}}
                        </td>
                        <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                            <a href="{{route('deleteUser', ['id' => $buyer->id])}}" class="text-red-600 dark:text-red-500 hover:underline">Delete</a>
                        </td>
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endauth
@endsection