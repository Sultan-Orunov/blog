<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        $mainImagePath = public_path('assets/images' . $post->main_img);
        unlink($mainImagePath);
        $previewImagePath = public_path('assets/images' . $post->preview_img);
        unlink($previewImagePath);

        $post->delete();

        return redirect()->route('post.index')->with('delete', 'Post deleted successfully');
    }
}
