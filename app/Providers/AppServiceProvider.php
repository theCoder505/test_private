<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $appname = DB::table('siteinfo')->where('id', 1)->value('main_sitename');
        $contact_email = DB::table('siteinfo')->where('id', 1)->value('email');
        $sitelogo = DB::table('siteinfo')->where('id', 1)->value('sitelogo');
        $siteicon = DB::table('siteinfo')->where('id', 1)->value('siteicon');
        $brand_location = DB::table('siteinfo')->where('id', 1)->value('brand_location');
        $phone = DB::table('siteinfo')->where('id', 1)->value('phone');
        $whatsapp = DB::table('siteinfo')->where('id', 1)->value('whatsapp');
        $linkedIn = DB::table('siteinfo')->where('id', 1)->value('linkedin');
        $fb = DB::table('siteinfo')->where('id', 1)->value('facebook');
        $insta = DB::table('siteinfo')->where('id', 1)->value('instagram');
        $tweet = DB::table('siteinfo')->where('id', 1)->value('tweeter');

        $santodomingo = DB::table('siteinfo')->where('id', 1)->value('santodomingo');
        $saintanthony = DB::table('siteinfo')->where('id', 1)->value('saintanthony');
        $icry = DB::table('siteinfo')->where('id', 1)->value('icry');
        $carobtree = DB::table('siteinfo')->where('id', 1)->value('carobtree');
        $cauquenes = DB::table('siteinfo')->where('id', 1)->value('cauquenes');
        

        View::share('appname', $appname);
        View::share('contact_email', $contact_email);
        View::share('sitelogo', $sitelogo);
        View::share('siteicon', $siteicon);
        View::share('brand_location', $brand_location);
        View::share('phone', $phone);
        View::share('whatsapp', $whatsapp);
        View::share('linkedIn', $linkedIn);
        View::share('fb', $fb);
        View::share('insta', $insta);
        View::share('tweet', $tweet);

        View::share('santodomingo', $santodomingo);
        View::share('saintanthony', $saintanthony);
        View::share('icry', $icry);
        View::share('carobtree', $carobtree);
        View::share('cauquenes', $cauquenes);
        //




        config(['app.name' => $appname]);
    }
}
