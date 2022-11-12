<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance</title>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Status</th>
        </tr>
        @foreach($attendance as $a)
            <tr>
                <td>{{$a->student->name}}</td>
                <td>{{$a->status}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>