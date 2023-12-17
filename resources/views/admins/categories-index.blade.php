@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Admins</h5>

                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
                    @endif

                    <a  href="{{ route('admin.category.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Category</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories->reverse() as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <a class="text-success" href="{{ route('admin.category.edit', $category->id) }}"><i class="fa fa-pen"></i></a>
                                        </div>
                                        <form method="post" action="{{ route('admin.category.delete', $category->id) }}">
                                            @csrf @method('delete')
                                            <button class="bg-transparent text-danger border-0 btn" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
