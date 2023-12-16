<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'search' => 'required|string|max:255'
        ]);
        $search = $data['search'];
        $posts = Post::where('title', 'like', "%$search%")->get();
        $newPosts = Post::orderBy('id', 'desc')->take(5)->get();
        $categories = Category::all();
        return view('posts.search.index', compact('posts', 'categories', 'newPosts'));
    }
}
