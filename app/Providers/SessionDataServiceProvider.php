<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionDataServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Check if the user is authenticated
        if (Auth::guard('admin')->check()) {
            // Get the authenticated admin's name
            $adminName = Auth::guard('admin')->user()->name;

            // Share the data with all views
            View::share('userName', $adminName);
        }
    }

    public function register()
    {
        //
    }
}
