<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Builder;

class PassengerController extends Controller
{
    public function index(Flight $flight){
        $cacheKey = "passengers_flight_{$flight->id}";
        $passengers = Cache::Remember($cacheKey,10,function() use($flight){
            return Passenger::whereHas('flights', function (Builder $query) use($flight){
                $query->where('flight_id', "{$flight->id}");
            })->get();});
        return response()->json($passengers);
    }

    public function show(Request $req,Flight $flight,Passenger $passenger){
        return response()->json($passenger);
    }
}