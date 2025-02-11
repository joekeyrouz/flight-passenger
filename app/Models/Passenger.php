<?php

namespace App\Models;

use App\Models\Flight;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = ['fisrt_name', 'last_name', 'email', 'password', 'DOB', 'passport_expiry_date'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function flights(){
        return $this->belongsToMany(Flight::class, 'passenger_flight');
    }
}
