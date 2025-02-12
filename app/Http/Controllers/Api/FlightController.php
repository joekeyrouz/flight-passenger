<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    public function index(){
        $flight = Flight::latest('updated_at')->paginate(25);
        return response()->json($flight);
    }

    public function show(Request $req,Flight $flight){
        return response()->json($flight);
    }
}
