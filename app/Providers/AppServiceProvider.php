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
        $menuhome = DB::table('categories')->where('parent_id','=',null)->get();
        $textinfo = DB::table('editcontacts')->first();
        view()->share(['menuhomes' => $menuhome,'textinfo'=>$textinfo]);
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
