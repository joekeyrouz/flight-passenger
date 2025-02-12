<div>
    <a href="/api">Home</a>
</div>
<br>
<h1>Passengers</h1>
<div>
    <form action="/api/passengers">
        <input type="text" placeholder="search by id/first name" name="search">
        <button type="submit">Search</button>
    </form>
</div>
@unless (count($passengers) == 0)
<table border="solid">
    <tr>
        <th>id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>DOB</th>
        <th>Passport Expiry Date</th>
    </tr>
@foreach ($passengers as $passenger)
    <tr>
        <td>{{$passenger['id']}}</td>
        <td>{{$passenger['first_name']}}</td>
        <td>{{$passenger['last_name']}}</td>
        <td>{{$passenger['email']}}</td>
        <td>{{$passenger['DOB']}}</td>
        <td>{{$passenger['passport_expiry_date']}}</td>
    </tr>
@endforeach
</table>
@endunless
<div>
    <a href="/api/passengers">Back</a>
</div>
<div>{{$passengers->links()}}</div>