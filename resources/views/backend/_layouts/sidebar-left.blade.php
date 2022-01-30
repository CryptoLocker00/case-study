@extends('_base')

@section('main')
  @include('website._components.nav')
  <div class="row">
    <div class="col-4">
      @yield('left')
    </div>
    <div class="col-8">
      @yield('right')
    </div>
  </div>
@endsection
