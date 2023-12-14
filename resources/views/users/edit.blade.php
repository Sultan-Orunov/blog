@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-3">Update profile info</h3>

                @if(\Illuminate\Support\Facades\Session::has('update-error'))
                    <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('update-error') }}</div>
                @endif

                <form action="{{ route('user.update', $user->id) }}" method="post" class="p-5 bg-light">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="name">
                        @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Name</label>
                        <input name="email" value="{{ $user->email }}" type="text" class="form-control" id="email">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="bio">About You</label>
                        <textarea name="bio" id="bio" cols="30" rows="10" class="form-control">{{ $user->bio }}</textarea>
                        @error('bio')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Profile" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
