<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        //first section
        $posts = Post::orderBy('id', 'desc')->limit(6)->get();

        //business section
        $category = Category::where('title', 'business')->first();
        $businessPosts = Post::where('category_id', $category->id)->get()->take(2);
        $busRelatePosts = Post::where('category_id', $category->id)->orderBy('id', 'desc')->get()->take(3);

        //random posts
        $randomPosts = Post::all()->random(4);

        //culture section
        $catCulture = Category::where('title', 'culture')->first();
        $culturePosts = Post::where('category_id', $catCulture->id)->get()->take(2);
        $culRelatePosts = Post::where('category_id', $catCulture->id)->orderBy('id', 'desc')->get()->take(3);

        //politics section
        $politCat = Category::where('title', 'politics')->first();
        $politicsPosts = Post::where('category_id', $politCat->id)->orderBy('id', 'desc')->get()->take(9);

        //travel section
        $catTravel = Category::where('title', 'travel')->first();
        $travelPostsOne = Post::inRandomOrder()->where('category_id', $catTravel->id)->first();
        $travelPostsTwo = Post::inRandomOrder()->where('category_id', $catTravel->id)->orderBy('id', 'desc')->first();
        $travelPostsThree = Post::where('category_id', $catTravel->id)->orderBy('id', 'desc')->get()->take(2);

        return view('posts.index', compact(
            'posts',
            'businessPosts',
            'busRelatePosts',
            'randomPosts',
            'culturePosts',
            'culRelatePosts',
            'politicsPosts',
            'travelPostsOne',
            'travelPostsTwo',
            'travelPostsThree'
        ));
    }
}
