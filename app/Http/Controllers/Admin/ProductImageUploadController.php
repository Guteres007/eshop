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

        //Service ProductImageSaveService?
        $product = Product::find($id);
        $image = $request->file('file');
        $saved_image = $product->images()->create(['name' => $image->getClientOriginalName()]);
        $image_count = $product->images()->count();

        if ($image_count > 1) {
            $saved_image->increment('rank', $product->images()->max('rank'));
        }


        $folderCreator->make($product->id);
        $imageSaver->setDestionation("/product-images/" . $product->id);
        $image_path =  $imageSaver->make($image);
        $saved_image->path = $image_path;
        $saved_image->save();
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
