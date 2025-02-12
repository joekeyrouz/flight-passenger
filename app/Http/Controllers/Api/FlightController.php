<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    public function index(){
        return view('show_flights', [
            'flights' => Flight::orderBy('updated_at', 'desc')->filter(request(['search']))->simplePaginate(25)
        ]);
    }

    public function show(Flight $flight){
        return view('flight-pass', [
            'flight' => $flight
        ]);
    }
}
