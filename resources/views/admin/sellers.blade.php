@extends('admin.layouts.app')
@section('admin_content')
@auth
<div class="flex flex-col w-full p-2">
    <table class="w-full">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Seller ID
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Store
                </th>
                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Name
                </th>
                <th scope="col" class="relative py-3 px-6">
                    <span class="sr-only">Delete</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sellers as $seller)
                <tr class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                    <div>
                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $seller->id }}
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                            {{$seller->store->name}}
                        </td>
                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                            {{$seller->first_name}} {{$seller->last_name}}
                        </td>
                        <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                            <a href="#" class="text-red-600 dark:text-red-500 hover:underline">Delete</a>
                        </td>
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endauth
@endsection