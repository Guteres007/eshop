<?php

namespace App\Http\ViewComposers\Frontend;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Contracts\View\View;


class MenuComposer
{

    protected $category;

    public function __construct(CategoryRepository $category)
    {
        // Dependencies automatically resolved by service container...
        $this->category = $category;
    }


    public function compose(View $view)
    {
        $view->with('menu_categories', $this->category->all());
    }
}
