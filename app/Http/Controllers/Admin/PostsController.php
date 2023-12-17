<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admins.posts.posts-index', compact('posts'));
    }


    public function delete(Post $post){

        $mainImagePath = public_path('assets/images' . $post->main_img);
        unlink($mainImagePath);
        $previewImagePath = public_path('assets/images' . $post->preview_img);
        unlink($previewImagePath);

        $post->delete();

        return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully');
    }
}
