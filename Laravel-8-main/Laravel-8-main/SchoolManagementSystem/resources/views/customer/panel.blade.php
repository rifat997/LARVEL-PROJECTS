<h1 align="center">Resort List</h1>
<center>
<table border="1">
    <tr align="center">
        <th>Name </th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    @foreach($resorts as $r)
        <tr align="center">
            <td>{{$r->name}}</td>
            <td>
                <img src="{{ asset('uploads/resorts/'.$r->image) }}" width="90px" height="70px" alt="Image">
            </td>
            <td>
                <a class="btn btn-primary" href="{{route('resort.edit', ['id'=>$r->id])}}">Book</a>
            </td>
        </tr>
    @endforeach
</table>
</center>
<br><br>