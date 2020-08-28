<?php

namespace Aldhix\Altarsiteprofile;
use Route;
use App\SiteProfile;

class Altarsite
{
   public static function routes()
   {
      Route::get('site/profile','SiteProfileController@index')->name('site.profile');
      Route::put('site/profile','SiteProfileController@update');
   }

   public static function data($value='')
   {
      $site = SiteProfile::select('variable','value')->orderBy('id')->get();
      $data = null;
      foreach($site as $e){
        $data[$e->variable] = $e->value; 
      }
      return (object)$data ;
   }

    public static function profile()
   {
      return self::data();
   }
}
