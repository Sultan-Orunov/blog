@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Category</h5>
                    <form class="mt-3" method="POST" action="{{ route('admin.category.update', $category->id) }}">
                        @csrf @method('patch')

                        <div class="form-outline mb-4">
                            <input type="text" name="title" value="{{ $category->title }}" class="form-control" placeholder="Category title..." />
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update category</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
