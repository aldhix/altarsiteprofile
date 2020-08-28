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
        if( Storage::disk('local')->exists('site.profile.json') ){
            $data = Storage::disk('local')->get('site.profile.json');
            $data = json_decode($data,true);
            Config::set('app.name', $data['name']);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {  
      $this->publishes([
            __DIR__.'/app' => app_path('views/errors'),
            __DIR__.'/database' => database_path('/'),
            __DIR__.'/views/altar' => resource_path('views/altar'),
            __DIR__.'/storage' => storage_path('/'),
        ]);
    }
}