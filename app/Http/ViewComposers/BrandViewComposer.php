<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Services\BrandService;

class BrandViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $brandService;

    /**
     * Create a new profile composer.
     *
     * @param  BrandRepository  $brand
     * @return void
     */
    public function __construct(BrandService $brandService)
    {
        // Dependencies automatically resolved by service container...
        $this->brandService = $brandService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $brands = $this->brandService->getList();
        $view->with('brands', $brands);
    }
}
