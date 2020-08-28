<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteProfile extends Model
{
     protected $fillable = [
        'variable', 'value'
    ];
    
}
