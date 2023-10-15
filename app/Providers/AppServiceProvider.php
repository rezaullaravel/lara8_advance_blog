<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        $categories = Category::orderBy('id','asc')->limit(10)->get();



        View::share([
            'categories' => $categories,
        ]);

        //custom password validation
        Validator::extend('starts_with_capital', function ($attribute, $value, $parameters, $validator) {
            // Check if the first character is a capital letter
            return preg_match('/^[A-Z]/', $value) === 1;
        });

        // Optionally, you can add a custom validation message
        Validator::replacer('starts_with_capital', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must start with a capital letter.');
        });
    }//end method
}
