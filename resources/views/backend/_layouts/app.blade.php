@extends('backend._base')

@section('main')
    @include('backend._components.nav')
    <div class="container">
        <div class="my-3">
            @yield('layout')
        </div>
    </div>
@endsection
