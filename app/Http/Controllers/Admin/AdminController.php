<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admins()
    {
        $admins = Admin::all();
        return view('admins.admins', compact('admins'));
    }

    public function create(){
        return view('admins.create-admins');
    }

    public function store(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);
        Admin::create($data);
        return redirect()->route('admin.show')->with('admin-create', 'Created Successfully');
    }

    public function delete(Admin $admin){
        $admin->delete();
        return redirect()->route('admin.show')->with('admin-delete', 'Deleted Successfully');
    }
}
