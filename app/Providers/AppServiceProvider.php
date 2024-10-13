<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import View facade
use App\Models\Company; // Import the Company model

class AppServiceProvider extends ServiceProvider
{
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
    public function boot()
    {
        // Fetch company details, if available
        $company = Company::first();

        // Share company data with all views (null if no record exists)
        View::share('company', $company);
    }
}
