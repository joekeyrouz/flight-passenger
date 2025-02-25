<?php

namespace App\Mail;

use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class FlightReminderEmail extends Mailable
{
    use Queueable, SerializesModels;
    public Flight $flight;
    public Passenger $passenger;

    /**
     * Create a new message instance.
     */
    public function __construct(Flight $flight, Passenger $passenger)
    {
        $this->flight = $flight;
        $this->passenger = $passenger;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Flight Reminder Email' . $this->flight->number,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            text: 'emails.flight_reminder_text', // Use a text-based view
            with: [
                'flight' => $this->flight,
                'passenger' => $this->passenger,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
