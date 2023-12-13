<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke()
    {
        return view('about.show');
    }
}
