<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\interfaces\CategoryRepositoryInterface::class,
            \App\Repositories\CategoryEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\interfaces\TypeRepositoryInterface::class,
            \App\Repositories\TypeEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\interfaces\PostRepositoryInterface::class,
            \App\Repositories\PostEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\interfaces\AccountRepositoryInterface::class,
            \App\Repositories\AccountEloquentRepository::class
        );
        $this->app->singleton(
            \App\Repositories\interfaces\CommentRepositoryInterface::class,
            \App\Repositories\CommentEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
