<?php

namespace App\Http\Controllers\Api;

use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassengerController extends Controller
{
    public function index(){
        $pass = Passenger::latest('updated_at')->paginate(20);

        return response()->json($pass);
    }

    public function show(Request $req,Passenger $passenger){
        return response()->json($passenger);
    }
}