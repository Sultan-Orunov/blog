<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function admins()
    {
        $admins = Admin::all();
        return view('admins.admins', compact('admins'));
    }
}
