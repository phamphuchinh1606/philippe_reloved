<?php

namespace App\Http\ViewComposers;

use App\Common\Constant;
use Illuminate\View\View;
use App\Http\Services\ProductService;

class ProductViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $service;

    /**
     * Create a new profile composer.
     *
     * @param  BrandRepository  $brand
     * @return void
     */
    public function __construct(ProductService $service)
    {
        // Dependencies automatically resolved by service container...
        $this->service = $service;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $products = $this->service->getList();
        $productTree = [];
        foreach ($products as $product){
            if(!isset($product->parent)){
                $product->childs = [];
                $productTree[$product->id] = $product;
            }
        }
        foreach ($products as $product){
            if(isset($product->parent_id)){
                if(isset($productTree[$product->parent_id])){
                    $childs = $productTree[$product->parent_id]->childs;
                    $childs[] = $product;
                    $productTree[$product->parent_id]->childs = $childs;
                }
            }
        }
        $view->with('products', $products)->with('productTree', $productTree);
    }
}
