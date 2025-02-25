<?php

namespace App\Jobs;

use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Bus\Queueable;
use App\Mail\FlightReminderEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendFlightReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $flight;
    protected $passenger;
    /**
     * Create a new job instance.
     */
    public function __construct(Flight $flight, Passenger $passenger)
    {
        $this->flight = $flight;
        $this->passenger = $passenger;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->passenger->email)->send(new FlightReminderEmail($this->flight, $this->passenger));
    }
}
