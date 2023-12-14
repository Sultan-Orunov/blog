@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if(\Illuminate\Support\Facades\Session::has('update'))
            <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('update') }}</div>
        @endif

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
