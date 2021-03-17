<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    public function index(CategoryRepository $categoryRepository)
    {
        return view('admin.category.index', [
            "categories" => $categoryRepository->allPaginate()
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request, CategoryRepository $categoryRepository)
    {
        if ($categoryRepository->create($request->all())) {
            return redirect()->route('admin.category.index')->withSuccess("Kategorie uložena");
        };
        return redirect()->route('admin.category.index')->withError("Kategorie neuložena");
    }

    public function destroy($id,  CategoryRepository $categoryRepository)
    {
        $categoryRepository->delete($id);

        return redirect()->route('admin.category.index')->withSuccess("Kategorie smazána");
    }

    public function edit($id, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($id);
        return view("admin.category.edit", ["category" => $category]);
    }

    public function update($id, Request $request, CategoryRepository $categoryRepository)
    {
        $categoryRepository->update($id, $request->all());
        return redirect()->route('admin.category.index');
    }
}
