<?php

namespace App\Http\Controllers\Category\Culture;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $categories = Category::all();
        $posts = Post::where('category_id',  $category->id)->orderBy('id', 'desc')->get();
        $newPosts = Post::orderBy('id', 'desc')->take(3)->get();
        return view('category.culture', compact('categories', 'posts', 'newPosts', 'category'));
    }
}
