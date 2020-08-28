<?php

namespace Aldhix\Altarsiteprofile;

use Illuminate\Support\ServiceProvider as Service;
use Illuminate\Support\Facades\Blade;
use Storage;
use Config;

class ServiceProvider extends Service
{
    /**
     * Register services.
     *
     * @return void
     */


    public function register()
    {
        $data = Storage::disk('local')->get('site.profile.json');
        $data = json_decode($data,true);
        Config::set('app.name', $data['name']);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {  
      //
    }
}