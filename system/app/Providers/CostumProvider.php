<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProfilToko;
use App\Models\Keranjang;
use Auth;

class CostumProvider extends ServiceProvider
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
        View::composer('*', function ($view) {

            $profilToko = ProfilToko::first();
   
            $view->with('profilToko', $profilToko);
            if (Auth::guard('member')->check()) {
                $auth_id = Auth::guard('member')->user()->member_id;
    
    
                $keranjangCount = Keranjang::where('keranjang_member_id', $auth_id)
                    ->where('flag_erase', 1)
                    ->count();
    
                $view->with('keranjang_public_count', $keranjangCount);
            }
   
        });
    }
}
