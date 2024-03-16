<?php

namespace App\Providers;

use App\Models\contact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class notif extends ServiceProvider
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
    public function boot(): void { 
        View::composer('*',function($view) { 
            
               
                $count=contact::where("read","0")->count(); 
          
             $view->with('count',$count);
            
            } );
         } 
        }

