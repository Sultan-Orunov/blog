<?php

namespace App\Http\Controllers\Category\Travel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $categories = Category::all();
        $posts = Post::where('category_id',  $category->id)->orderBy('id', 'desc')->get();
        $newPosts = Post::orderBy('id', 'desc')->take(3)->get();
        return view('category.travel', compact('categories', 'posts', 'newPosts', 'category'));
    }
}
