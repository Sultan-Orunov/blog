<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()){
            $categories = Category::all();
            return view('posts.create', compact('categories'));
        }else{
            return redirect()->route('login');
        }
    }
}
