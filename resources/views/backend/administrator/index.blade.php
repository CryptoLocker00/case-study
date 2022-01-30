@extends('backend._layouts.app', ['active' => 'administrator'])

@section('layout')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-6">
                <a href="{{route('backend.administrator.create')}}" class="custom-btn btn btn-primary text-white">
                    <i class="fas fa-plus mr-2"></i> Administrator
                </a>
            </div>
        </div>


        @include('flash::message')

        <div class="card shadow-sm">
            <div class="card-header">
                Administrators
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($administrators as $administrator)
                            <tr>
                                <td scope="row">{{$administrator->id}}</td>
                                <td>
                                    <a href="{{route('backend.administrator.edit', $administrator)}}" class="text-decoration-none">{{$administrator->name}}</a>
                                </td>
                                <td>{{$administrator->email}}</td>
                                <td>{{optional($administrator->created_at)->format('Y-m-d')}}</td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="5" class="text-center">No Administrator</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
