<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassengerController extends Controller
{
    public function index(Flight $flight){
        $flight = Flight::with('passengers')->findOrFail($flight->id);
        return response()->json($flight->passengers);
    }

    public function show(Request $req,Flight $flight,Passenger $passenger){
        $flight = Flight::with('passengers')->findOrFail($flight->id);
        foreach($flight->passengers as $pass){
            if($pass['id'] == $passenger['id']){
                return response()->json($passenger);
            }
        }
        return response()->json([]);
    }
}