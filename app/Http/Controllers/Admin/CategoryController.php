<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
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

    public function store(CategoryRequest $request, CategoryRepository $categoryRepository)
    {
        if ($categoryRepository->create($request->validated())) {
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

    public function update($id, CategoryRequest $request, CategoryRepository $categoryRepository)
    {
        $categoryRepository->update($id, $request->validated());
        return redirect()->route('admin.category.index')->withSuccess("Kategorie upravena");;
    }
}
