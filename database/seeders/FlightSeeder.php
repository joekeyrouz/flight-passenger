<?php

namespace Database\Seeders;

use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flight::factory(50)->create();

        Flight::all()->each(function ($flight) {
            $passengers = Passenger::inRandomOrder()->take(rand(1, 10))->get();
            $flight->passengers()->attach($passengers);
        });
    }
}
