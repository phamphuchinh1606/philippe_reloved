<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Services\ColorService;

class ColorViewComposer
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
    public function __construct(ColorService $service)
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
        $colors = $this->service->getList();
        $view->with('colors', $colors);
    }
}
