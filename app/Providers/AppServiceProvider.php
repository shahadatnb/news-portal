<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use App\Traits\PostTrait;
use DB;

class AppServiceProvider extends ServiceProvider
{
  use PostTrait;
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        \View::share('postType', $this->postType);
    }
}
