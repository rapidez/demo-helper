<?php

namespace Rapidez\DemoHelper;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Rapidez\DemoHelper\Http\Middleware\SetDemoConfig;

class DemoHelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this
            ->bootMiddleware()
            ->bootViews()
            ->bootPublishables();
    }

    public function bootMiddleware(): self
    {
        Route::pushMiddlewareToGroup('web', SetDemoConfig::class);

        return $this;
    }

    public function bootViews(): self
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rapidez-demo-helper');

        if (! $this->app->runningInConsole()) {
            View::startPush('head', view('rapidez-demo-helper::top-bar'));
        }

        return $this;
    }

    public function bootPublishables() : self
    {
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez-demo-helper'),
        ], 'rapidez-demo-helper-views');

        return $this;
    }
}
