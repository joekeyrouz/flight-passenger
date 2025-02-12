<?php

namespace App\Http\Controllers\Api;

use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassengerController extends Controller
{
    public function index(Request $req){
        return view('show_passengers', [
            'passengers' => Passenger::orderBy('updated_at', 'desc')->filter(request(['search']))->simplePaginate(20)
        ]);
    }
}
