<?php

namespace App\Models;

use App\Models\Passenger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;
    public function passengers(){
        return $this->belongsToMany(Passenger::class, 'passenger_flight');
    }

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('id', 'like', request('search'))
            ->orWhere('number', 'like', '%'.request('search') . '%');
        }
    }
}
