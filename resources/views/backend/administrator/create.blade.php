@extends('backend._layouts.app', ['active' => 'administrator'])

@section('layout')
    <div class="container mt-5">
        @include('flash::message')
        <div class="card shadow-sm">
            <div class="card-header">
                Create Administrator
            </div>
            <div class="card-body p-5">
                <form class="form-horizontal" method="POST" action="{{route('backend.administrator.store')}}">
                    <div class="row">
                        <div class="col-lg-7">
                            @include('backend.administrator._form')
                            @csrf

                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <label for="password" class="col-form-label mandatory">Password</label>
                                    <input type="text" class="form-control" id="password"
                                           name="password" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-12">
                                    <label for="password-confirmation" class="col-form-label mandatory">Confirm
                                        Password</label>
                                    <input type="text" class="form-control" id="password-confirmation"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="custom-btn btn btn-primary"><i
                                            class="fas fa-save mr-2"></i>Save
                                </button>
                                <a href="{{route('backend.administrator.index')}}"
                                   class="custom-btn btn btn-outline-light text-muted">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
