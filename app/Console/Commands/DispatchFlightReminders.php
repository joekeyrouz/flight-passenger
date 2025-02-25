<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DispatchFlightReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flight:dispatch-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatches jobs to send reminder emails for flights departing in 24 hours.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time24HoursLater = Carbon::now()->addHours(24);

        $flights = Flight::whereBetween('departure_time', [
            $time24HoursLater->copy()->subMinutes(5),
            $time24HoursLater->copy()->addMinutes(5),
        ])->get();

        foreach ($flights as $flight) {
            foreach ($flight->passengers as $passenger) {
                SendFlightReminderJob::dispatch($flight, $passenger);
                $this->info("Job dispatched for {$passenger->email} for flight {$flight->number}");
            }
        }
    }
}
