<!DOCTYPE html>
<html>
<head>
    <title>Flight Reminder</title>
</head>
<body>
    <h1>Reminder: Your Flight is in 24 Hours</h1>
    <p>Hello,</p>
    <p>This is a reminder that your flight <strong>{{ $flight->number }}</strong> 
       from {{ $flight->departure_city }} to {{ $flight->arrival_city }} 
       departs at {{ $flight->departure_time }} tomorrow.</p>
    <p>Safe travels!</p>
</body>
</html>