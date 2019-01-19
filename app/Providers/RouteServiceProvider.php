<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $namespaceApi = "App\Http\Controllers\Api";

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_user.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_brand.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_model.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_status.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_color.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_category.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_product.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_item.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_tag.php'));

        Route::middleware(['web','auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/route_sale_item.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespaceApi)
             ->group(base_path('routes/api.php'));
    }
}
