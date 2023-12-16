@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">
                <div class="col-md-12 col-lg-8 main-content">
                    <div class="pt-5">
                        <img style="max-height: 200px" src="{{ asset('assets/images/user/'.$user->image) }}">
                    </div>

                    <div class="pt-5">
                        <p>Hello I am: <strong>{{ ucfirst($user->name) }}</strong></p>
                    </div>
                    <div class="post-content-body">
                        <p>{{ $user->bio }}</p>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div style="padding: 20px" class="sidebar-box">
                        <h3 class="heading">Latest Posts by: {{ $user->name }}</h3>

                        @if($user->posts->count() > 0)
                            <div class="post-entry-sidebar">
                                <ul>
                                    @foreach($user->posts->reverse()->take(5) as $post)
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
                        @else
                            <div class="post-entry-sidebar">
                                There's nothing here yet
                            </div>
                        @endif
                    </div>
                    <!-- END sidebar-box -->
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

@endsection
