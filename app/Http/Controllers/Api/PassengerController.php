<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class PassengerController extends Controller
{
    public function index(Flight $flight){
        $passengers = Passenger::whereHas('flights', function (Builder $query) use($flight){
            $query->where('flight_id', "{$flight->id}");
        })->get();
        return response()->json($passengers);
    }

    public function show(Request $req,Flight $flight,Passenger $passenger){
        return response()->json($passenger);
    }
}