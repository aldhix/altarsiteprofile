<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteProfile;
use Altarsite;
use Altar;
use Storage;

class SiteProfileController extends Controller
{
    public function index()
    {
    	$data = Altarsite::profile();
    	return view('altar.siteprofile.index',['data'=>$data]);
    }

    public function update(Request $request)
    {
    	$request->validate([
                'logo'=> ['nullable','mimetypes:image/png,image/jpeg','dimensions:min_width=200, min_height=200'],
    			'name'=>'required|min:3',
    			'site_address'=>'nullable|url',
    			'email'=>'nullable|email',
    		]);

        $site = Altarsite::data();
        $filename = $site->logo;

        if( !empty($request->logo) ){
            $file = $_FILES["logo"];
            $filename = 'logo.'.$request->logo->getClientOriginalExtension();
            Altar::imagefitpng($file,'favicon.png',16);
            if( !Altar::imagefit($file, 'images/'.$filename) ){
                $filename = $site->logo;
            }

        }

    	foreach ($request->except('_token') as $key => $value) {
		  	if($key == 'logo'){
                SiteProfile::where('variable',$key)->update(['value'=>$filename]);
            } else {
                SiteProfile::where('variable',$key)->update(['value'=>$value]);
            }
		}

        $content = ['name'=>$request->name];
        Storage::disk('local')->put('site.profile.json', json_encode($content) );

		return back()->with('success','update');
    }
}
