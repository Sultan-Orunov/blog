@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-3">Create a New Post</h3>
                <form action="" method="post" class="p-5 bg-light" enctype="multipart/form-data">
                    @csrf
                    <input name="user_id" value="{{ $post->user_id }}" type="hidden" class="form-control">

                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input name="title" value="{{ $post->title }}" type="text" class="form-control" id="title">
                        @error('title')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-select" aria-label="Default select example">
                            @foreach($categories as $category)
                                <option {{ $category->id == $post->category_id ? ' selected ' : ''}}
                                        value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="preview_img" class="form-label">Preview Image</label>
                        <img class="w-25 d-block" src="{{ asset('assets/images/'. $post->preview_img) }}" />
                        <input name="preview_img" value="{{ old('preview_img') }}" class="form-control mt-3" type="file" id="preview_img">
                        @error('preview_img')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="main_img" class="form-label">Main Image</label>
                        <img class="w-25 d-block" src="{{ asset('assets/images/'. $post->main_img) }}" />
                        <input name="main_img" value="{{ old('main_img') }}" class="form-control mt-3" type="file" id="main_img">
                        @error('main_img')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
                        @error('content')
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
