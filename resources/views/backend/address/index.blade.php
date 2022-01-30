@extends('backend._layouts.app', ['active' => 'address'])

@section('layout')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-6">
                <a href="{{route('backend.address.create')}}" class="custom-btn btn btn-primary text-white">
                    <i class="fas fa-plus mr-2"></i> Address
                </a>
            </div>
        </div>


        @include('flash::message')

        <div class="card shadow-sm">
            <div class="card-header">
                Addresses
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Address</th>
                            <th scope="col">Postcode</th>
                            <th scope="col">District</th>
                            <th scope="col">State</th>
                            <th scope="col">Country</th>
                            <th scope="col">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($addresses as $address)
                            <tr>
                                <td>
                                    <a href="{{route('backend.address.edit', $address)}}"
                                       class="text-decoration-none">{{$address->line_one}}, {{$address->line_two}}</a>
                                </td>
                                <td>{{$address->postcode}}</td>
                                <td>{{$address->district}}</td>
                                <td>{{$address->state}}</td>
                                <td>{{$address->country}}</td>
                                <td>{{optional($address->created_at)->format('Y-m-d')}}</td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="5" class="text-center">No Address</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
