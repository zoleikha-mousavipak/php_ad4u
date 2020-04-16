<?php

namespace App\Providers;

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
    public function register(CategoryService $categoryService)
    {
        if (Schema::hasTable('categories')) {
            $this->categoryService = $categoryService;
            $categoriesList = $this->categoryService->categoriesList();
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
