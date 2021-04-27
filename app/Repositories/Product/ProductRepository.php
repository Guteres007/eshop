<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    public function homepageProducts()
    {
        return  $this->model->where('active', true)->where('homepage', true)->limit(7)->get();
    }

    public function getProductsByCategory($category_id)
    {
        return DB::table('category_product')
            ->leftJoin('products', 'products.id', '=', 'category_product.product_id')
            ->leftJoin('product_images', 'product_images.product_id', '=', 'products.id')
            ->where('category_product.category_id', $category_id)
            ->where('product_images.rank', 1)
            ->where('products.active', true)
            ->select('products.*', DB::raw('product_images.path AS image_path'), DB::raw('product_images.name AS image_name'));
    }
}
