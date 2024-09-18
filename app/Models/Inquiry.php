<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use SoftDeletes;
     protected $table = 'inquiries';
    protected $fillable = [
        'id','name','email','phone','reffer_by','country','ielts',
    ];
}