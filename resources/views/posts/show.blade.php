@extends('layouts.app')

@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page" style="margin-top: -25px; background-image: url('{{ asset('assets/images/'. $post->main_img) }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">
                        <h1 class="mb-4">{{ $post->title }}</h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 me-3 d-inline-block"><img src="{{ $post->user->image ? $post->user->image : asset('assets/images/no_avatar.png') }}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <p>{{ $post->content }}</p>

                    </div>

                    <div class="pt-5">
                        <p>Category: <a href="#">{{ ucfirst($post->category->title) }}</a></p>
                    </div>

                    <div class="pt-5 comment-wrap">
                        <h3 class="mb-5 heading">{{ count($post->comments) }} Comments</h3>
                        <ul class="comment-list">
                            @foreach( $post->comments->reverse() as $comment)
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="{{ $post->user->image ? $post->user->image : asset('assets/images/no_avatar.png') }}" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{ $comment->user->name }}</h3>
                                        <div class="meta">{{ $comment->created_at->diffForHumans() }}</div>
                                        <p>{{ $comment->comment }}</p>
                                        <p><a href="#" class="reply rounded">Reply</a></p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post" class="p-5 bg-light">
                                @csrf

                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="comment" id="message" cols="30" rows="10" class="form-control">{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">

                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="{{ $post->user->image ? $post->user->image : asset('assets/images/no_avatar.png') }}" alt="Image Placeholder" class="img-fluid my-3">
                            <div class="bio-body">
                                <h2>{{ $post->user->name }}</h2>
                                <p class="mb-4 mx-3">{{ \Illuminate\Support\Str::limit($post->user->bio, 200) }}</p>
                                <p><a href="#" class="btn btn-primary btn-sm rounded px-2 py-2">Read my bio</a></p>
                                <p class="social">
                                    <a href="#" class="p-2"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div style="padding: 20px" class="sidebar-box">
                        <h3 class="heading">Recent Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach($recentPosts as $post)
                                    <li>
                                        <a href="{{ route('post.show', $post->id) }}">
                                            <img src="{{ asset('assets/images/'. $post->preview_img) }}" alt="Image placeholder" class="me-4 rounded">
                                            <div class="text">
                                                <h4>{{ $post->title }}</h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">{{ $post->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div style="padding: 20px" class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach($categories as $category)
                                <li><a href="#">{{ $category->title }}<span>{{count($category->posts)}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->


                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>


    <!-- Start posts-entry -->
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-uppercase text-black">More Blog Posts</div>
            </div>
            <div class="row">
                @foreach($morePosts as $post)
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="{{route('post.show', $post->id)}}" class="img-link">
                                <img src="{{ asset('assets/images/'.$post->preview_img) }}" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                            <h2><a href="{{route('post.show', $post->id)}}">{{ \Illuminate\Support\Str::limit($post->title, 50) }}</a></h2>
                            <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                            <p><a href="{{route('post.show', $post->id)}}" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End posts-entry -->
@endsection
