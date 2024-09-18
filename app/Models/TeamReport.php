<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamReport extends Model
{
    use SoftDeletes;
    protected $table = 'team_reports';
    protected $fillable = [
        'name','type','date','calls','admin_id','emails','received_applications','canada_applications','uk_applications','aus_applications','germany_applications','canada_payments','uk_payments','aus_payments','germany_payments','canada_offers','uk_offers','aus_offers','germany_offers','pending_applications','remarks'
    ];

    public function teamreportId()
    {
        return $this->belongsTo('App\Models\TeamReport','date','date')->select('id','date');
    } 
}
