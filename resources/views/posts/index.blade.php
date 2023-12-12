@extends('layouts.app')

@section('content')
<section class="section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout">
            @if(\Illuminate\Support\Facades\Session::has('delete'))
                <div class="alert alert-success ">{{ \Illuminate\Support\Facades\Session::get('delete') }}</div>
            @endif
            @if($posts->count() > 0)
                <div class="col-md-4">
                    @for($i = 0; $i < 2; $i++)
                        @if(count($posts) > $i )
                            <a href="{{ route('post.show', $posts[$i]->id) }}" class="h-entry mb-30 v-height gradient">

                                <div class="featured-img" style="background-image: url('{{ asset('assets/images/'. $posts[$i]->preview_img) }}')"></div>

                                <div class="text">
                                    <span class="date">{{ $posts[$i]->created_at->diffForHumans() }}</span>
                                    <h2>{{ $posts[$i]->title }}</h2>
                                </div>
                            </a>
                        @endif
                    @endfor
                </div>
                <div class="col-md-4">
                    @for($i = 2; $i < 4; $i++)
                        @if(count($posts) > $i )
                            <a href="{{ route('post.show', $posts[$i]->id) }}" class="h-entry mb-30 v-height gradient">

                                <div class="featured-img" style="background-image: url('{{ asset('assets/images/'. $posts[$i]->preview_img) }}')"></div>

                                <div class="text">
                                    <span class="date">{{ $posts[$i]->created_at->diffForHumans() }}</span>
                                    <h2>{{ $posts[$i]->title }}</h2>
                                </div>
                            </a>
                        @endif
                    @endfor
                </div>
                <div class="col-md-4">
                    @for($i = 4; $i < 6; $i++)
                        @if(count($posts) > $i )
                            <a href="{{ route('post.show', $posts[$i]->id) }}" class="h-entry mb-30 v-height gradient">

                                <div class="featured-img" style="background-image: url('{{ asset('assets/images/'. $posts[$i]->preview_img) }}')"></div>

                                <div class="text">
                                    <span class="date">{{ $posts[$i]->created_at->diffForHumans() }}</span>
                                    <h2>{{ $posts[$i]->title }}</h2>
                                </div>
                            </a>
                        @endif
                    @endfor
                </div>
            @else
                <div class="text-center">No more posts in this section</div>
            @endif
        </div>
    </div>
</section>
<!-- End retroy layout blog posts -->

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Business</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            @if($businessPosts->count() > 0)
                <div class="col-md-9">
                    <div class="row g-3">
                        @foreach($businessPosts as $post)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="{{ route('post.show', $post->id) }}" class="img-link">
                                        <img src="{{ asset('assets/images/'. $post->preview_img) }}" alt="Image" class="img-fluid">
                                    </a>
                                    <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                                    <h2><a href="single.html">{{ $post->title }}</a></h2>
                                    <p>{{ \Illuminate\Support\Str::limit($post->content, 200) }}</p>
                                    <p><a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        @foreach($busRelatePosts as $post)
                            <li>
                                <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                                <h3><a href="{{ route('post.show', $post->id) }}">{{$post->title}}</a></h3>
                                <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                                <p><a href="{{ route('post.show', $post->id) }}" class="read-more">Continue Reading</a></p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="text-center">No more posts in this section</div>
            @endif

        </div>
    </div>
</section>
<!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row">
            @if($randomPosts->count() > 0)
                @foreach($randomPosts as $post)
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="{{ route('post.show', $post->id) }}" class="img-link">
                                <img src="{{ asset('assets/images/'. $post->preview_img) }}" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                            <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                            <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                            <p><a href="{{ route('post.show', $post->id) }}" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center">No more posts in this section</div>
            @endif

        </div>
    </div>
</section>
<!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Culture</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            @if($culturePosts->count() > 0)
                <div class="col-md-9 order-md-2">
                    <div class="row g-3">
                        @foreach($culturePosts as $post)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="{{ route('post.show', $post->id) }}" class="img-link">
                                        <img src="{{ asset('assets/images/'. $post->preview_img) }}" alt="Image" class="img-fluid">
                                    </a>
                                    <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                                    <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                                    <p>{{ \Illuminate\Support\Str::limit($post->content, 200) }}</p>
                                    <p><a href="{{ route('post.show', $post->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        @foreach($culRelatePosts as $post)
                            <li>
                                <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                                <h3><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h3>
                                <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                                <p><a href="{{ route('post.show', $post->id) }}" class="read-more">Continue Reading</a></p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="text-center">No more posts in this section</div>
            @endif
        </div>
    </div>
</section>

<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Politics</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>

        <div class="row">
            @if($politicsPosts->count() > 0)
                @foreach($politicsPosts as $post)
                    <div class="col-lg-4 mb-4">
                        <div class="post-entry-alt">
                            <a href="{{ route('post.show', $post->id) }}" class="img-link"><img src="{{ asset('assets/images/'. $post->preview_img) }}" alt="Image" class="img-fluid"></a>
                            <div class="excerpt">


                                <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    {{--                                <figure class="author-figure mb-0 me-3 float-start"><img src="{{ url('assets/images/person_1.jpg') }}" alt="Image" class="img-fluid"></figure>--}}
                                    <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                                    <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                                </div>

                                <p>{{ \Illuminate\Support\Str::limit($post->content, 200) }}</p>
                                <p><a href="{{ route('post.show', $post->id) }}" class="read-more">Continue Reading</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center">No more posts in this section</div>
            @endif

        </div>

    </div>
</section>

<div class="section bg-light">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Travel</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>

        <div class="row align-items-stretch retro-layout-alt">

            @if($travelPostsOne->count() > 0)
                <div class="col-md-5 order-md-2">

                    <a href="{{ route('post.show', $travelPostsOne->id) }}" class="hentry img-1 h-100 gradient">
                        <div class="featured-img" style="background-image: url('{{ asset('assets/images/'. $travelPostsOne->preview_img) }}')"></div>
                        <div class="text">
                            <span>{{ $travelPostsOne->created_at->diffForHumans() }}</span>
                            <h2>{{ $travelPostsOne->title }}</h2>
                        </div>
                    </a>
                </div>

                <div class="col-md-7">

                    <a href="{{ route('post.show', $travelPostsTwo->id) }}" class="hentry img-2 v-height mb30 gradient">
                        <div class="featured-img" style="background-image: url('{{ asset('assets/images/'. $travelPostsTwo->preview_img) }}') "></div>
                        <div class="text text-sm">
                            <span>{{ $travelPostsTwo->created_at->diffForHumans() }}</span>
                            <h2>{{ $travelPostsTwo->title }}</h2>
                        </div>
                    </a>

                    <div class="two-col d-block d-md-flex justify-content-between">
                        @foreach($travelPostsThree as $post)
                            <a href="{{ route('post.show', $post->id) }}" class="hentry v-height img-2 gradient">
                                <div class="featured-img" style="background-image: url('{{ asset('assets/images/'. $post->preview_img) }}')"></div>
                                <div class="text text-sm">
                                    <span>{{ $post->created_at->diffForHumans() }}</span>
                                    <h2>{{ $post->title }}</h2>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
            @else
                <div class="text-center">No more posts in this section</div>
            @endif

        </div>

    </div>
</div>

@endsection
