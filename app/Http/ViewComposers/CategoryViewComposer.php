<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Services\CategoryService;

class CategoryViewComposer
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
    public function __construct(CategoryService $service)
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
        $categories = $this->service->getList();
        $view->with('categories', $categories);
    }
}
