<?php
namespace App\Components\Assets;
 
/**
* Created by  Sang Nguyen
* Date: 06/22/2015
* Time: 3:43 PM
*/
 
use Illuminate\Support\ServiceProvider;
 
class AssetsServiceProvider extends ServiceProvider
{
 
    public function register()
    {
        $this->app->bind('assets', function () {
            return new Assets();
        });
     }
}