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

    public function filter(Request $req){
        $query = Passenger::query();

        if($req->has('name')){
            $query->where('first_name', 'like', "%{$req->name}%")
                  ->orWhere('last_name', 'like', "%{$req->name}%");
        }
        if($req->has('pid')){
            $query->where('id', 'like', "{$req->pid}");
        }

        return response()->json($query->get());
    }
}