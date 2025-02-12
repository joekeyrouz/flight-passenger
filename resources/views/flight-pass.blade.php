<div>
    <a href="/api/flights">Back</a>
</div>
<div>
    <table border="solid 2px">
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Passport Expiry Date</th>
        </tr>
    @foreach ($flight->passengers as $passenger)
        <tr>
            <td>{{$passenger->id}}</td>
            <td>{{$passenger->first_name}}</td>
            <td>{{$passenger->last_name}}</td>
            <td>{{$passenger->email}}</td>
            <td>{{$passenger->DOB}}</td>
            <td>{{$passenger->passport_expiry_date}}</td>
        </tr>
    @endforeach
    </table>
</div>