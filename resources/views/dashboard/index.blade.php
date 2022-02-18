@extends('dashboard.layouts.app')
@section('dash_content')
@auth
<div class="m-0 sm:m-10">
    <h1>Good Day @auth {{Auth()->user()->first_name}} @endauth!</h1>
</div>
@endauth
@endsection