<?php


namespace App\Feeds;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

abstract class AbstractFeed implements IFeed
{
    protected $xml;
    protected function getProducts()
    {
        return Product::all();
    }

    public function saveToFile($storagePath) {
        return Storage::put($storagePath, $this->xml);
    }
}
