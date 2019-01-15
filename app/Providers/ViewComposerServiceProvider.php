<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['commons.brands.__select_brand'],
            'App\Http\ViewComposers\BrandViewComposer'
        );
        View::composer(
            ['commons.colors.__select_color'],
            'App\Http\ViewComposers\ColorViewComposer'
        );
        View::composer(
            ['commons.categories.__select_category'],
            'App\Http\ViewComposers\CategoryViewComposer'
        );
        View::composer(
            ['commons.products.__select_product'],
            'App\Http\ViewComposers\ProductViewComposer'
        );
        View::composer(
            ['commons.status.__select_status'],
            'App\Http\ViewComposers\StatusViewComposer'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
