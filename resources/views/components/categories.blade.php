<ul role="list" class="font-medium text-gray-900 px-2 py-3">
    <li>
        <a href="{{route('stores')}}" class="block px-2 py-3">Stores</a>
    </li>
    @foreach ($categories as $category)
    <li>
        <a href="{{route('applyCategory', ['id' => $category->id])}}" class="block px-2 py-3"> {{$category->name}} </a>
    </li>
    @endforeach
</ul>