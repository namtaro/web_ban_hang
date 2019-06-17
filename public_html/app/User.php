<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $guard = "User";

        //protected $primaryKey='id';
    protected $table = 'personnel';
    protected $fillable = [
        'id','name','email','sex', 'birthday','address','phone' ,'password','level',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
