<?php

namespace App\Services\Admin;

use App\Models\ProductImage;

class ImageSortingService
{

    public function make($product_id, $request)
    {
        $image_ordering = $request->input('image_data')[$product_id];

        for ($i = 0; $i < count($image_ordering); $i++) {
            $rank = $i + 1;
            ProductImage::find($image_ordering[$i])->update(['rank' => $rank]);
        }
    }

    public function newRank($product_id)
    {
        $old_products = ProductImage::where('product_id', $product_id)->orderBy('rank', 'asc')->get();
        foreach ($old_products as $key  => $product) {
            $product->update(['rank' => $key + 1]);
        }
        return true;
    }
}
