<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        //Repository patern
        return view('admin.category.index', ["categories" => Category::all()]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {

        //Slug factory
        $formRequest = $request->all();
        $slug = ['slug' => Str::slug($request->input('name'))];
        $formRequest += $slug;
        Category::create($formRequest);
        return redirect()->route('admin.category.index');
    }
}
