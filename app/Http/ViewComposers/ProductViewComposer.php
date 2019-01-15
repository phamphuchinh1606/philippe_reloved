<?php

namespace App\Http\ViewComposers;

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
        $view->with('products', $products);
    }
}
