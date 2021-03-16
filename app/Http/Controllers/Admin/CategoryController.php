<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    public function index(CategoryRepository $categoryRepository)
    {
        //Repository patern
        return view('admin.category.index', ["categories" => $categoryRepository->all()]);
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
