<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }
}
