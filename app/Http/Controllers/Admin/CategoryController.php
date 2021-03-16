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
        return view('admin.category.index', [
            "categories" => $categoryRepository->allPagginate()
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request, CategoryRepository $categoryRepository)
    {
        if ($categoryRepository->create($request)) {
            return redirect()->route('admin.category.index')->withSuccess("Kategorie uložena");
        };
        return redirect()->route('admin.category.index')->withError("Kategorie neuložena");
    }

    public function destroy($id,  CategoryRepository $categoryRepository)
    {
        $categoryRepository->delete($id);

        return redirect()->route('admin.category.index')->withSuccess("Kategorie smazána");
    }
}
