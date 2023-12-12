@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-3">Create a New Post</h3>
                <form action="#" method="post" class="p-5 bg-light">
                    @csrf
                    <input name="user_id" value="{{ old('title') }}" type="hidden" class="form-control">

                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title">
                        @error('title')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Category</label>
                        <select id="category" class="form-select" aria-label="Default select example">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="preview_img" class="form-label">Preview Image</label>
                        <input name="preview_img" class="form-control" type="file" id="preview_img">
                    </div>
                    <div class="form-group">
                        <label for="main_img" class="form-label">Main Image</label>
                        <input name="main_img" class="form-control" type="file" id="main_img">
                    </div>
                    <div class="form-group mt-2">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                        @error('comment')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create New Post" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
