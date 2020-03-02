<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_crea_id','user_edita_id','sis_esta_id','sis_clinica_id'
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

    
      protected $attributes = ['sis_esta_id' => 1,'user_crea_id'=> 1,'user_edita_id'=> 1];
      public function creador()
      {
        return $this->belongsTo(User::class, 'user_crea_id');
      }
    
      public function editor()
      {
        return $this->belongsTo(User::class, 'user_edita_id');
      }
      public function setPasswordAttribute($value)
      {
        if (!empty($value)) {
          $this->attributes['password'] = bcrypt($value);
        }
      }
}