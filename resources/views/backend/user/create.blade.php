@extends('backend._layouts.app', ['active' => 'user'])

@section('layout')
    <div class="container mt-5">
        @include('flash::message')
        <div class="card shadow-sm">
            <div class="card-header">
                Create Administrator
            </div>
            <div class="card-body p-5">
                <form class="form-horizontal" method="POST" action="{{route('backend.user.store')}}">
                    <div class="row">
                        <div class="col-lg-7">
                            @include('backend.user._form')
                            @csrf
                            <div class="mt-4">
                                <button type="submit" class="custom-btn btn btn-primary"><i
                                            class="fas fa-save mr-2"></i>Save
                                </button>
                                <a href="{{route('backend.user.index')}}"
                                   class="custom-btn btn btn-outline-light text-muted">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
