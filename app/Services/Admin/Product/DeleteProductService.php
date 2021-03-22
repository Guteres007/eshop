<?php

namespace App\Services\Admin\Product;

use App\Repositories\Product\ProductRepository;
use App\Services\Files\FolderRemover;

class DeleteProductService
{
    private $productRepository;
    public function __construct(ProductRepository $productRepository, FolderRemover $folderRemover)
    {
        $this->productRepository = $productRepository;
        $this->folderRemover = $folderRemover;
    }

    public function make($product_id)
    {
        $this->productRepository->delete($product_id);
        //remove images
        $this->folderRemover->setDestionation('/product-images/');
        $this->folderRemover->make($product_id);
    }
}
