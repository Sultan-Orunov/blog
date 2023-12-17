<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admins.categories-index', compact('categories'));
    }

    public function create(){
        return view('admins.create-category');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|min:3'
        ]);
        Category::create($data);
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully');
    }

    public function edit(Category $category){
        return view('admins.edit-category', compact('category'));
    }
    public function update(Request $request, Category $category){
        $data = $request->validate([
            'title' => 'string|min:3'
        ]);
        $category->update($data);
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
    }

    public function delete(Category $category){

        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully');
    }
}
