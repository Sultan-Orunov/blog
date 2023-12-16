@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-5">Login</h5>
                    @if(\Illuminate\Support\Facades\Session::has('error'))
                        <div class="alert alert-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
                    @endif
                    <form method="POST" class="p-auto" action="{{ route('admin.auth') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control" placeholder="Email" />
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" placeholder="Password" class="form-control" />
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary  mb-4 text-center">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
