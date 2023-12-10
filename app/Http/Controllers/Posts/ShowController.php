<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $recentPosts = Post::take(3)->orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('posts.show', compact('post', 'recentPosts', 'categories'));
    }
}
