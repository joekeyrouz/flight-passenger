Flight Reminder: {{ $flight->number }}

Dear {{ $passenger->first_name }} {{ $passenger->last_name }},

This is a reminder that your flight {{ $flight->number }} is departing in 24 hours.

Departure City: {{ $flight->departure_city }}
Arrival City: {{ $flight->arrival_city }}
Departure Time: {{ $flight->departure_time }}

Please arrive at the airport in time.

Thank you.