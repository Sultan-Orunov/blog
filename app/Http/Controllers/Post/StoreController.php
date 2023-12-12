<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;

        $data['preview_img'] = $request->preview_img->getClientOriginalName();
        $request->preview_img->move(public_path('assets/images'), $data['preview_img']);
        $data['main_img'] = $request->main_img->getClientOriginalName();
        $request->main_img->move(public_path('assets/images'), $data['main_img']);

        Post::firstOrCreate($data);
        return redirect()->back()->with('success', 'Post created successfully');
    }
}
