<?php

namespace Anditsung\Master;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Anditsung\Master\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'master');

        $this->loadMigrationsFrom(__DIR__ . '/database');
        //$this->publishDatabases();

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            //
        });
    }

    private function getDatabases()
    {
        return [
            "2019_11_12_013011_create_master_unit_types_table.php",
        ];
    }

    private function publishDatabases()
    {
        $databases = $this->getDatabases();

        foreach($databases as $database) {
            $this->publishes([
                __DIR__ . '/database/' . $database => database_path() . '/migrations/' . $database,
            ]);
        }
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/master')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
