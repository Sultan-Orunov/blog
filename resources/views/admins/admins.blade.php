@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Admins</h5>

                    @if(\Illuminate\Support\Facades\Session::has('admin-create'))
                        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('admin-create') }}</div>
                    @endif

                    <a  href="{{ route('admin.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">username</th>
                            <th scope="col">email</th>
                            <th scope="col">actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <th scope="row">{{ $admin->id }}</th>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>Действия</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
