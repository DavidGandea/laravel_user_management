<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
    protected $table='users';
    //protected $guarded = [];
    public $timestamps=true;
    public function getAge(){
        $this->date_of_birth->diff($this->attributes['dob'])->format('%y years, %m months and %d days');
    }
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password','date_of_birth', 'gender', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    public function isAdmin()    
    {        

        return $this->type === self::ADMIN_TYPE;    
    }
    
}
