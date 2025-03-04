<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Flight;
use Illuminate\Console\Command;
use App\Jobs\SendFlightReminderJob;

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
        $flights = Flight::latest();

        foreach ($flights as $flight) {
            foreach ($flight->passengers as $passenger) {
                SendFlightReminderJob::dispatch($flight, $passenger);
                $this->info("Job dispatched for {$passenger->email} for flight {$flight->number}");
            }
        }
    }
}
