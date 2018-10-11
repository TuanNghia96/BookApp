<?php
namespace App\Components\Assets;
 
use Config;
use App;
 
/**
* Created by Sang Nguyen.
* Date: 22/06/2015
* Time: 2:25 PM
*/
 
class Assets
{
    protected $javascript = [];
    protected $stylesheets = [];
    public function __construct()
    {
    }
 
    /**
    * @param array $assets
    */
    public function addJavascript($assets)
    {
        if (is_array($assets)) {
            $this->javascript = array_merge($this->javascript, $assets);
        } else {
            $this->javascript[] = $assets;
        }
    }
 
    /**
    * @param array $assets
    */
    public function addStylesheets($assets)
    {
        if (is_array($assets)) {
           $this->stylesheets = array_merge($this->stylesheets, $assets);
        } else {
           $this->stylesheets[] = $assets;
        }
    }
 
    /**
    * @param array $assets
    */
    public function removeStylesheets($assets)
    {
        if (is_array($assets)) {
            foreach ($assets as $rem) {
                unset($this->stylesheets[array_search($rem, $this->stylesheets)]);
            }
        } else {
            unset($this->stylesheets[array_search($assets, $this->stylesheets)]);
        }
    }
 
    /**
    * @param array $assets
    */
    public function removeJavascript($assets)
    {
        if (is_array($assets)) {
             foreach ($assets as $rem) {
                unset($this->javascript[array_search($rem, $this->javascript)]);
        }
        } else {
             unset($this->javascript[array_search($assets, $this->javascript)]);
        }
    }
 
    /**
    *
    */
    public function getJavascript($module)
    {
        $scripts = [];
 
        $this->javascript = array_merge(
           Config::get('assets.base.'. $module. '.javascript'),
           $this->javascript);
        if (!empty($this->javascript)) {
            // get the final scripts need for page
            foreach (array_unique($this->javascript) as $js) {
                 if (Config::has('assets.resources.javascript.' . $js)) {
                     if (Config::get('assets.resources.javascript.' . $js . '.use_cdn') 
                         && !Config::get('assets.offline')) {
                         $src = Config::get('assets.resources.javascript.' . $js
                                . '.src.cdn');
                     } else {
                           $src = Config::get('assets.resources.javascript.' . $js
                           . '.src.local');
                     }
                     if (is_array($src)) {
                          foreach ($src as $s) {
                               $scripts[] = $s;
                          }
                     } else {
                          $scripts[] = $src;
                     }
                 }
             }
         }
 
        return $scripts;
    }
 
    /**
    *
    */
    public function getStylesheets($module)
    {
        $stylesheets = [];
 
        $this->stylesheets = array_merge(
             Config::get('assets.base.'. $module. '.stylesheets'),
             $this->stylesheets);
        if (!empty($this->stylesheets)) {
            // get the final scripts need for page
            foreach (array_unique($this->stylesheets) as $style) {
                if (Config::has('assets.resources.stylesheets.' . $style)) {
                    if (Config::get('assets.resources.stylesheets.' . $style . '.use_cdn')
                        && !Config::get('assets.offline')) {
                         $src = Config::get('assets.resources.stylesheets.' . $style
                                 . '.src.cdn');
                    } else {
                         $src = Config::get('assets.resources.stylesheets.' . $style
                                . '.src.local');
                    }
                    if (is_array($src)) {
                        foreach ($src as $s) {
                           $stylesheets[] = $s;
                        }
                    } else {
                        $stylesheets[] = $src;
                    }
                 }
             }
         }
 
         return $stylesheets;
      }
   }