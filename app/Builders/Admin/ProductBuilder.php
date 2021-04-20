<?php

namespace App\Builders\Admin;

use App\Services\Images\ImageSaver;
use App\Services\Files\FolderCreator;
use App\Services\Admin\Product\CreateProductService;
use App\Services\Admin\Parameter\ParameterService;

class ProductBuilder
{
    private $product;
    private $createProductService;
    private $imageSaver;
    private $parameterService;
    public function __construct(
        CreateProductService $createProductService,
        FolderCreator $folderCreator,
        ImageSaver $imageSaver,
        ParameterService $parameterService
    ) {
        $this->imageSaver = $imageSaver;
        $this->createProductService = $createProductService;
        $this->folderCreator = $folderCreator;
        $this->parameterService = $parameterService;
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
            $image_path =  $this->imageSaver->make($image);
            $this->product->images()->create(['name' => $image->getClientOriginalName(), 'path' => $image_path]);
        }
        return $this;
    }

    public function createParameters(array $attributes)
    {
        $this->parameterService->saveParametersToProduct($this->product, $attributes['parameters']);
        return $this;
    }
}
