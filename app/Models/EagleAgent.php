<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EagleAgent extends Model
{
    protected $table = 'eagle_agents';
    protected $fillable = [
        'name', 'email','country_id','company_name','college_name','status','mobileno','account_manager','address','state_id','city_id', 'password','ip_address',
    ];


     public function city()
    {
        return $this->belongsTo('App\Models\Loc\City');
    } 
    public function state()
    {
        return $this->belongsTo('App\Models\Loc\State');
    } 
    public function country()
    {
        return $this->belongsTo('App\Models\Loc\Country');
    } 
    public function eventAgnets()
    {
        return $this->belongsTo('App\Models\Admitofferevent','id','agent_id');
    } 
    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment','id','attachment_id')->where('type','agent');
    } 
    public function agentDocument()
    {
        return $this->belongsTo('App\Models\Attachment','id','attachment_id')->where('type','agentDocument');
    } 
    public function identity()
    {
        return $this->belongsTo('App\Models\Attachment','id','attachment_id')->where('type','identity');
    } 
    public function establishment()
    {
        return $this->belongsTo('App\Models\Attachment','id','attachment_id')->where('type','establishment');
    }
     public function contractfile()
    {
        return $this->belongsTo('App\Models\Attachment','id','attachment_id')->where('type','contractfile');
    } 
     public function accountManager()
    {
        return $this->belongsTo('Bitfumes\Multiauth\Model\Admin','account_manager','id');
    }
    public function studentsApp()
    {
        return $this->hasMany('App\Models\Agent\Student','agent_id','id');
    } 
}
