@extends('backend._layouts.app', ['active' => 'user'])

@section('layout')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-6">
                <a href="{{route('backend.user.create')}}" class="custom-btn btn btn-primary text-white">
                    <i class="fas fa-plus mr-2"></i> User
                </a>
            </div>
        </div>


        @include('flash::message')

        <div class="card shadow-sm">
            <div class="card-header">
                Users
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <a href="{{route('backend.user.edit', $user)}}" class="text-decoration-none">{{$user->name}}</a>
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{optional($user->created_at)->format('Y-m-d')}}</td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="5" class="text-center">No User</th>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
