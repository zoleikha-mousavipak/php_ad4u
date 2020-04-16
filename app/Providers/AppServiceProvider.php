<?php

namespace App\Providers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $categoryService;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (Schema::hasTable('categories')) {
            $categoriesList = Category::where('status', true)->orderBy('title')->get();
            view()->share('categoriesList', $categoriesList);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
