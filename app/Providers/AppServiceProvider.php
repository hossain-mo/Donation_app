<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MenuRepo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Observers\PaymentTransactionObserver;
use App\Models\PaymentTransaction;
use Illuminate\Support\Facades\Session;

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
        Schema::defaultStringLength(191);
        $menu = new MenuRepo;
        $menu = $menu->getAll();
        View::share('menus', $menu);
        if(! Session::get('applocale')){
            Session::put('applocale','en');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        PaymentTransaction::observe(PaymentTransactionObserver::class);
    }
}
