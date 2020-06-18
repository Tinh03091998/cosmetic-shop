<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{
    use Notifiable;
    protected $table='customers';

    protected $fillable = ['email',  'password'];

    protected $hidden = ['password',  'remember_token'];

}
