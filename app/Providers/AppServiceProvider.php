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
        $bannerhome = DB::table('banners')->where([['name','=','banner-home'],['show','=',1]])->first();
        $bannerblog = DB::table('banners')->where([['name','=','banner-blog'],['show','=',1]])->first();
        view()->share(['menuhomes' => $menuhome,'textinfo'=>$textinfo,'bannerhome'=>$bannerhome,'bannerblog'=>$bannerblog]);
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
