<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (auth()->guard('admin')->attempt(['email' => $data["email"], 'password' => $data["password"]])) {
            return redirect() -> route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }
}
