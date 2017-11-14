<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Menu;
use App\Module;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
       $global = [
        "menu"=>Menu::GetMenu()->toArray(),
        "modules"=>Module::AllFormated()
       ];
 
       view()->share('global', $global);
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
