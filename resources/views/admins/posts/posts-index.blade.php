@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Posts</h5>

                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">User</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <th>{{ ucfirst($post->category->title) }}</th>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <form method="post" action="{{ route('admin.post.delete', $post->id) }}">
                                        @csrf @method('delete')
                                        <button class="bg-transparent text-danger border-0 btn" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
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
