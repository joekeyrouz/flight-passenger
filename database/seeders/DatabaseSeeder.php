<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\FlightSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\PassengerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PassengerSeeder::class,
            FlightSeeder::class,
        ]);
    }
}
