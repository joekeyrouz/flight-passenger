<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    public function index(){
        $flights = Flight::latest('updated_at')->paginate(25);
        return response()->json($flights);
    }

    public function store(Request $request){
        $data = $request->validate([
            'number' => 'required',
            'departure_city' => 'required|string',
            'arrival_city' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
        ]);

        $flight = Flight::create($data);

        return response()->json([
            'message' => 'flight created successfuly',
            'flight' => $flight
        ]);
    }

    public function update(Request $request, Flight $flight){
        $data = $request->validate([
            'number' => 'required',
            'departure_city' => 'string',
            'arrival_city' => 'string',
            'departure_time' => 'date',
            'arrival_time' => 'date',
        ]);

        $flight->update($data);

        return response()->json([
            'message' => 'flight updated successfuly',
            'flight' => $flight
        ]);
    }

    public function destroy(Flight $flight){
        $flight->delete();

        return response()->json([
            'message' => 'flight deleted successfuly',
            'flight' => $flight
        ]);
    }

    public function show(Request $req,Flight $flight){
        return response()->json($flight);
    }
}
