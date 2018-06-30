<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $menuhomes = DB::table('menuhomes')->get();
        // $script= DB::table('scriptcodes')->first();
        $menuhome= DB::table('menuhomes')->get();
        view()->share(['menuhomes' => $menuhome]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
