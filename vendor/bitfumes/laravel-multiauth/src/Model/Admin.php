<?php

namespace Bitfumes\Multiauth\Model;

use Bitfumes\Multiauth\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $casts = ['active' => 'boolean'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function teamProcess()
    {
        return $this->belongsTo('App\Models\TeamPreProcess','id','preProcess_id');
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
