@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Category</h5>
                    <form class="mt-3" method="POST" action="{{ route('admin.category.store') }}">
                        @csrf

                        <div class="form-outline mb-4">
                            <input type="text" name="title" class="form-control" placeholder="Category title..." />
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create category</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
