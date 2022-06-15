<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordReset;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function package(){
        return $this->hasMany('App\Package');
     }

     public function folder(){
        return $this->hasMany('App\Folder');
     }

     public function question(){
        return $this->hasMany('App\Question');
     }

     public function sendPasswordResetNotification($token)
     {
         $this->notify(new PasswordReset($token));
     }
  
}
