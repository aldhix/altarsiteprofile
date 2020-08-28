<?php

use Illuminate\Database\Seeder;
use App\SiteProfile;

class SiteProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteProfile::create([
        		'variable'=>'name',
        		'value'=>'Altar',
        	]);

		SiteProfile::create([
        		'variable'=>'site_address',
        		'value'=>'http://localhost:8000/',
        	]);

       SiteProfile::create([
                'variable'=>'logo',
                'value'=>'logo.png',
            ]);
       
       SiteProfile::create([
        		'variable'=>'email',
        	]);

       SiteProfile::create([
        		'variable'=>'phone',
        	]);

       SiteProfile::create([
        		'variable'=>'office_address',
        	]);
    }
}
