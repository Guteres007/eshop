<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('admin.category.index', [
            "categories" => $this->categoryRepository->allPaginate()
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        if ($this->categoryRepository->create($request->validated())) {
            return redirect()->route('admin.category.index')->withSuccess("Kategorie uložena");
        };
        return redirect()->route('admin.category.index')->withError("Kategorie neuložena");
    }

    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        return redirect()->route('admin.category.index')->withSuccess("Kategorie smazána");
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return view("admin.category.edit", ["category" => $category]);
    }

    public function update($id, CategoryRequest $request)
    {
        $this->categoryRepository->update($id, $request->validated());
        return redirect()->route('admin.category.index')->withSuccess("Kategorie upravena");;
    }
}
