<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';
    protected $frontend_namespace = 'App\Http\Controllers\frontend';


    public const HOME = '/';


    public function boot()
    {
        //

        parent::boot();
    }


    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapFrontendRoutes();

        //
    }


    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapFrontendRoutes()
    {
        Route::middleware('web')
            ->namespace($this->frontend_namespace)
            ->group(base_path('routes/frontend/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
