<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // $adminRole = Role::create(['name' => 'admin']);
        // $userRole = Role::create(['name' => 'user']);

        // $admin = User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'admin12345'
        // ]);
        // $admin->assignRole($adminRole);

        // $user = User::create([
        //     'name' => 'Regular User',
        //     'email' => 'user@gmail.com',
        //     'password' => 'user12345',
        // ]);
        // $user->assignRole($userRole);

        $this->call([
            RoleSeeder::class,
            PassengerSeeder::class,
            FlightSeeder::class,
        ]);

        Passenger::factory(1000)->create();
        Flight::factory(50)->create();
        
        Flight::all()->each(function ($flight) {
            $passengers = Passenger::inRandomOrder()->take(rand(1, 10))->get();
            $flight->passengers()->attach($passengers);
        });
    }
}
