@extends('backend._layouts.app', ['active' => 'address'])

@section('layout')
    <div class="container mt-5">
        @include('flash::message')
        <div class="card shadow-sm">
            <div class="card-header">
                Create Address
            </div>
            <div class="card-body p-5">
                <form class="form-horizontal" method="POST" action="{{route('backend.address.store')}}">
                    <div class="row">
                        <div class="col-lg-7">
                            @include('backend.address._form')
                            @csrf
                            <div class="mt-4">
                                <button type="submit" class="custom-btn btn btn-primary"><i
                                            class="fas fa-save mr-2"></i>Save
                                </button>
                                <a href="{{route('backend.address.index')}}"
                                   class="custom-btn btn btn-outline-light text-muted">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
