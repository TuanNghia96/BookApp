<?php
namespace App\Components\Assets\Facade;
 
/**
* Created by Sang Nguyen.
* Date: 06/22/2015
* Time: 3:31 PM
*/
 
use Illuminate\Support\Facades\Facade;
 
class AssetsFacade extends Facade
{
 
    protected static function getFacadeAccessor()
    {
        return 'assets';
    }
}