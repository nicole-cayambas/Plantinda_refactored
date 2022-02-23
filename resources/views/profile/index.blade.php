@extends('layouts.app')
@section('content')
<div class="p-4 sm:p-12">
    <p class="w-full text-center text-emerald-600">
        {{session('success')}}
      </p>
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
          <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name </label>
                    <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}" class="p-2 border-2 focus:outline-none flex-1 block w-full rounded sm:text-sm border-gray-300">
                </div>
              </div>
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name </label>
                    <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}" class="p-2 border-2 focus:outline-none flex-1 block w-full rounded sm:text-sm border-gray-300">
                </div>
              </div>
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="username" class="block text-sm font-medium text-gray-700"> Username </label>
                    <input type="text" name="username" id="username" value="{{$user->username}}" class="p-2 border-2 focus:outline-none flex-1 block w-full rounded sm:text-sm border-gray-300">
                </div>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700"> Photo </label>
                <div class="mt-1 flex items-center">
                  @if ($user->icon)
                  <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                     <img src="{{ asset('images/icons/'.$user->icon) }}" alt="">
                  </span>
                  <button onClick="showChooser()" type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</button>
                  <input id="choose-file" type="file" name="image" accept=".jpg, .jpeg, .png, .gif, .svg" hidden>
                  <p id="fileName"></p>
                  @else 
                  <input type="file" name="image" accept=".jpg, .jpeg, .png, .gif, .svg">
                  @endif
                </div>
                @error('image')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
              </div>

              <div>
                <label for="address" class="block mb-1 text-sm font-medium text-gray-700"> Address </label>
                <div class="flex flex-row gap-4 items-center">
                    @if($address!=null)
                        <input id="address" type="text" value="{{$address->address}}, {{$address->barangay}}, {{$address->city}},  {{$address->zip}},  {{$address->province}}" class="p-2 block text-sm rounded font-medium text-gray-700 border-2 w-3/4" readonly>
                    @else
                        <input id="address" type="text" class="p-2 block text-sm rounded font-medium text-gray-700 border-2 w-3/4" disabled>
                    @endif
                  <a href="{{route('address')}}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </div>
              </div>
  
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
      <div class="border-t border-gray-200"></div>
    </div>
  </div>
</div>
  
  
  
</div>

<script>
    const fileSelector = document.getElementById('choose-file');
    function showChooser() {
      fileSelector.click();
    }
    fileSelector.addEventListener('change', (event) => {
      const fileList = event.target.files;
      const file = fileList[0];
      const fileName = document.getElementById('fileName');
      fileName.innerHTML = file.name;
    });
</script>
@endsection