<?php

namespace App\Http\Controllers\Api;

use App\Models\Passenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassengerImageController extends Controller
{
    public function uploadImage(Request $request, Passenger $passenger){
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $path = $request->file('image')->store('passengers', 'public');

        $passenger->image = $path;
        $passenger->save();

        return response()->json([
            'message'=> 'image uploaded successfully',
            'path'=> $path,
        ]);
    }
}
