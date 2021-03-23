<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(CategoryRepository $categoryRepository)
    {
        $categoryRepository->all();
        return view('frontend.homepage', ['categories' => $categoryRepository->all()]);
    }
}
