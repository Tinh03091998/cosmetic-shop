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

    public function comments(){
        return $this->hasMany('App\Comments', 'customer_id', 'id');
    }

    public function contacts(){
        return $this->hasMany(Contact::class, 'customer_id', 'id');
    }
}
