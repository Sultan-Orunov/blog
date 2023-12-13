@extends('layouts.app')

@section('content')
    <div class="section search-result-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">Category: <span class="fw-bold">{{ ucfirst($category->title) }}</span></div>
                </div>
            </div>
            <div class="row posts-entry">
                <div class="col-lg-8">
                    @foreach($posts as $post)
                        <div class="blog-entry d-flex blog-entry-search-item">
                            <a href="{{ route('post.show', $post->id) }}" class="img-link me-4">
                                <img src="{{ asset('assets/images/'. $post->preview_img) }}" alt="Image" class="img-fluid">
                            </a>
                            <div>
                                <span class="date">{{ $post->created_at->diffForHumans() }} &bullet; <a href="{{ route('categories.culture.index', $post->category->id) }}">{{ $post->category->title }}</a></span>
                                <h2><a href="{{ route('post.show', $post->id) }}">{{ \Illuminate\Support\Str::limit($post->title, 50) }}</a></h2>
                                <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                                <p><a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4 sidebar">


                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Recent Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach($newPosts as $nPost)
                                    <li>
                                        <a href="{{ route('post.show', $nPost->id) }}">
                                            <img src="{{ asset('assets/images/'. $nPost->preview_img) }}" alt="Image placeholder" class="me-4 rounded">
                                            <div class="text">
                                                <h4>{{ \Illuminate\Support\Str::limit($nPost->title, 50) }}</h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">{{ $nPost->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach($categories as $category)
                                <li><a class="text-decoration-none text-secondary" href="#">{{ $category->title }}<span>{{count($category->posts)}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->




                </div>
            </div>
        </div>
    </div>
@endsection
