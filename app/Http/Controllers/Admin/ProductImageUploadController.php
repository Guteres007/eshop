<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Images\ImageSaver;
use App\Http\Controllers\Controller;
use App\Services\Files\FolderCreator;
use App\Services\Files\FolderRemover;
use App\Services\Images\ImageRemover;

class ProductImageUploadController extends Controller
{

    public function store($id, Request $request, FolderCreator $folderCreator, ImageSaver $imageSaver)
    {
        $product = Product::find($id);
        $image = $request->file('file');
        $folderCreator->make($product->id);
        $imageSaver->setDestionation("/product-images/" . $product->id);

        $image_path =  $imageSaver->make($image);
        $product->images()->create(['name' => $image->getClientOriginalName(), 'path' => $image_path]);
    }

    public function destroy($product_id, Request $request, ImageRemover $imageRemover)
    {
        $image_name = $request->input('image_name');
        $product = Product::find($product_id);
        $product->images()->where('name', $image_name)->delete();
        $imageRemover->setDestionation("/product-images/" . $product_id . "/");
        $imageRemover->make($image_name);
    }
}
