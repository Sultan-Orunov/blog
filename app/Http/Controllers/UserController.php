<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user){
        return view('users.show', compact('user'));
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user){

        if (Auth::user()->id == $user->id){
            $data = $request->validated();
            $user->update($data);
            return redirect()->route('home')->with('update', 'Your profile was updated successfully');
        }else{
            return abort(404);
        }
    }
}
