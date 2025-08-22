<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;

class HeaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('front.header', function ($view) {
            $categories = CategoryModel::get_records(); // Fetch data you want to show in the header
            $subcategories = SubCategoryModel::get_records(); // Fetch data you want to show in the header
            $view->with('categories', $categories)->with('subcategories', $subcategories);

        });
    }
}
