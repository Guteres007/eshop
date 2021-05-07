<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\ImageSortingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductImageSortingController extends Controller
{
    public function update($product_id, Request $request, ImageSortingService $imageSortingService)
    {
        $imageSortingService->make($product_id, $request);
        return true;
    }
}
