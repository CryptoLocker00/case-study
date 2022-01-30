@extends('backend._layouts.app', ['active' => 'address'])

@section('layout')
    <div class="container mt-5">
        @include('flash::message')
        <div class="card my-3">
            <div class="card-header">
                Update Address
            </div>
            <div class="card-body">
                <form class="hidden" id="del-form" method="POST"
                      action="{{route('backend.address.destroy', ['address' => $address->id])}}">
                    {{method_field('delete')}}
                    @csrf
                </form>

                <form class="form-horizontal" method="POST"
                      action="{{route('backend.address.update', $address)}}">
                    @include('backend.address._form')
                    @method('PATCH')
                    @csrf
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="submit" class="btn btn-primary text-white">Update</button>
                            <a href="{{route('backend.address.index')}}"
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
