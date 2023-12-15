<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        if (isset($data['preview_img'])){
            $data['preview_img'] = $request->preview_img->getClientOriginalName();
            $request->preview_img->move(public_path('assets/images'), $data['preview_img']);
        }

        if (isset($data['main_img'])) {
            $data['main_img'] = $request->main_img->getClientOriginalName();
            $request->main_img->move(public_path('assets/images'), $data['main_img']);
        }
        $post->update($data);
        return redirect()->route('post.show', $post->id)->with('post-update', 'Post Updated successfully');
    }
}
