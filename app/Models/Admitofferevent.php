<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admitofferevent extends Model
{
	use SoftDeletes;
     protected $table = 'admitofferevents';
    protected $fillable = [
        'agent_id','email','phone','firstname','lastname','city','organization','event_type','accountManager'
    ];
}

