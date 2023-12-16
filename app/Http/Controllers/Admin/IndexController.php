<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $postsCount = Post::all()->count();
        $categoriesCount = Category::all()->count();
        $adminsCount = Admin::all()->count();
        return view('admins.dashboard', compact('postsCount', 'categoriesCount', 'adminsCount'));
    }
}
