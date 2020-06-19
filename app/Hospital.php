<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Hospital extends Authenticatable implements JWTSubject
{
    // Variables
    protected $table = "hospital";

    protected $fillable = [
        'name', 
        'username', 
        'password',
        "address_location" , 
        "x_location" , 
        "y_location" , 
        "free_slots_high",
        "free_slots_medium",
        "free_slots_low",
        "price_high",
        "price_medium",
        "price_low"
    ];


    // Methods

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }
}
