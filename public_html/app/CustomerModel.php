<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerModel extends Authenticatable
{
       /*protected $table = 'customer';
        protected $guarded = ['email','password'];*/
        
        protected $guard = "CustomerModel";

        protected $primaryKey='id';
    protected $table='customer';
    protected $fillable = [
        'cus_name','email','password',
    ];


         protected $hidden = [
        'password', 'remember_token',
    ];
}
