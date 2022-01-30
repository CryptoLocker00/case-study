@extends('backend._layouts.app', ['active' => 'administrator'])

@section('layout')
    <div class="container mt-5">
        @include('flash::message')
        <div class="card my-3">
            <div class="card-header">
                Update <strong>{{$administrator->name}}</strong>
            </div>
            <div class="card-body">
                <form class="hidden" id="del-form" method="POST"
                      action="{{route('backend.administrator.destroy', ['administrator' => $administrator->id])}}">
                    {{method_field('delete')}}
                    @csrf
                </form>

                <form class="form-horizontal" method="POST"
                      action="{{route('backend.administrator.update', $administrator)}}">
                    @include('backend.administrator._form')
                    @method('PATCH')
                    @csrf

                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="password" class="col-form-label mandatory">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="password-confirmation" class="col-form-label mandatory">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                   id="password-confirmation">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="submit" class="btn btn-primary text-white">Update</button>
                            <a href="{{route('backend.administrator.index')}}"
                               class="btn btn-outline-secondary">Cancel</a>
                        </div>
                        <div>
                            <button type="button" id="del-btn" class="btn btn-danger text-white">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>

        $("#del-btn").click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonClass: 'btn btn-info',
                confirmButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it.',
                confirmButtonColor: '#ec312d'
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        title: 'Deleting...',
                        text: 'please wait',
                        type: 'info',
                        showConfirmButton: false
                    });

                    $("#del-form").submit();
                }
            });
        });

    </script>
@endpush
