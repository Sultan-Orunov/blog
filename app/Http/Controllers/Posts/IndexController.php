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

        return view('posts.index', compact('posts', 'businessPosts'));
    }
}
