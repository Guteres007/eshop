<?php

namespace App\Builders\Admin;

use App\Services\Admin\Product\CreateProductService;
use App\Services\Files\FolderCreator;
use App\Services\Images\ImageSaver;

class ProductBuilder
{
    private $product;
    private $createProductService;
    private $imageSaver;
    public function __construct(
        CreateProductService $createProductService,
        FolderCreator $folderCreator,
        ImageSaver $imageSaver
    ) {
        $this->imageSaver = $imageSaver;
        $this->createProductService = $createProductService;
        $this->folderCreator = $folderCreator;
    }

    public function createProduct(array $attributes)
    {
        $this->product = $this->createProductService->make($attributes);
        return $this;
    }
    public function createImages(array $images)
    {
        $this->folderCreator->make($this->product->id);
        $this->imageSaver->setDestionation("/product-images/" . $this->product->id);
        foreach ($images as $image) {
            $this->imageSaver->make($image);
        }
        return $this;
    }
}
