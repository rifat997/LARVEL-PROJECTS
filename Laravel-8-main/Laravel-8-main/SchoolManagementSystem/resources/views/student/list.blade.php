<h1 align="center">Studnet List</h1>
<center>
    <br><br>
    <a href="{{route('student.add')}}" class="btn btn-primary">Add Students</a>
    <br><br>
<table border="1">
    <tr align="center">
        <th>Name </th>
        <th>Action</th>
    </tr>
    @foreach($students as $r)
        <tr align="center">
            <td>{{$r->name}}</td>
            {{-- <td>
                <img src="{{ asset('uploads/resorts/'.$r->image) }}" width="90px" height="70px" alt="Image">
            </td> --}}
            {{-- <td><img src="{{$r->image}}" height="50px" width="50px"></td> --}}
            <td>
                <a class="btn btn-primary" href="{{route('show', ['id'=>$r->id])}}">Details</a>
            </td>
        </tr>
    @endforeach
</table>
</center>
<br><br>