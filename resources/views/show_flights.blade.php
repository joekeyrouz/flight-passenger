<div>
    <a href="/api">Home</a>
</div>
<hr>
<h1>Flights</h1>
<hr>
<div>
    <form action="/api/flights">
        <input type="text" placeholder="search by id/first name" name="search">
        <button type="submit">Search</button>
    </form>
</div>
@unless (count($flights) == 0)
<table border="solid">
    <tr>
        <th>id</th>
        <th>Flight Number</th>
        <th>Departure City</th>
        <th>Arrival City</th>
        <th>Departure Date</th>
        <th>Arrival Date</th>
    </tr>
@foreach ($flights as $flight)
    <tr>
        <td><a href="/api/flights/{{$flight->id}}">{{$flight['id']}}</a></td>
        <td>{{$flight['number']}}</td>
        <td>{{$flight['departure_city']}}</td>
        <td>{{$flight['arrival_city']}}</td>
        <td>{{$flight['departure_time']}}</td>
        <td>{{$flight['arrival_time']}}</td>
    </tr>
@endforeach
</table>
@endunless
<div>
    <a href="/api/flights">Back</a>
</div>
<div>{{$flights->links()}}</div>