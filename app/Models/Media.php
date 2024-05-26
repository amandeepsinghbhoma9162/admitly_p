<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;
    protected $table = 'medias';
    protected $fillable = [
        'path','type','title','country_id','status','description'
    ];
}
