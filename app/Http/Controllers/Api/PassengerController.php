<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

    public function store(Request $request){
        $data = $request->validate([
            'first_name' => 'required|string|max:10',
            'last_name' => 'required|string|max:10',
            'email' => 'required|email|unique:passengers,email',
            'password' => 'required|string|min:8|confirmed',
            'date_of_birth' => 'required|date',
            'passport_expiry_date' => 'required|date',
        ]);

        $data['image'] = 'null';

        $data['password'] = Hash::make($data['password']);

        $passenger = Passenger::create($data);

        return response()->json([
            'message' => 'passenger created successfuly',
            'passenger' => $passenger
        ]);
    }

    public function update(Request $request, Passenger $passenger){
        $data = $request->validate([
            'first_name' => 'string|max:10',
            'last_name' => 'string|max:10',
            'email' => 'email|unique:passengers,email',
            'password' => 'required|string|min:8|confirmed',
            'date_of_birth' => 'date',
            'passport_expiry_date' => 'date',
        ]);
        $data['password'] = Hash::make($data['password']);
        
        $passenger->update($data);

        return response()->json([
            'message' => 'passenger updated successfuly',
            'passenger' => $passenger
        ]);
    }

    public function destroy(Passenger $passenger){
        $passenger->delete();

        return response()->json([
            'message' => 'passenger deleted successfuly',
            'passenger' => $passenger
        ]);
    }

    public function show(Request $req,Flight $flight,Passenger $passenger){
        return response()->json($passenger);
    }
}