<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div>
        <form action="{{route('submit')}}" method="POST">
            @csrf
            <div id="id1">
                <span id="span1">
                    <select name="student[]" id="">
                        @foreach($students as $r)
                            <option value="{{$r->id}}">
                                <tr>
                                    <td>{{$r->name}}</td> 
                                </tr>
                            </option>
                        @endforeach
                    </select>
                </span>

                <select name="attendance[]" id="">
                    <option value="0">Absent</option>
                    <option value="1">Present</option>
                </select>

                <span id="span2">
                    <button type='button' id='button1'>+</button>
                </span>
            </div>

            <div id="id2">
            </div>

            <input type="submit" class="btn btn-primary" value="Add">
        </form>
    </div>

    <script>
        var tabl = $("#span2");
        $(document).ready(function(){
            $("#button1").click(function(){
                $("#id2").append('<tr>'+
                                    '<td>'+
                                        '<select name="student[]" id="">'+
                                            @foreach($students as $r)
                                                '<option value="{{$r->id}}">{{$r->name}}</option>'+
                                            @endforeach
                                        '</select>'+
                                    '</td>'+
                                    '<td>'+
                                        '<select name="attendance[]" id="">'+
                                            '<option value="0">Absent</option>'+
                                            '<option value="1">Present</option>'+
                                        '</select>'+   
                                    '</td>'+
                                    '<td> <button  type="button" class="remove" onclick="SomeDeleteRowFunction(this)">-</button> </td>'+
                                '</tr>' );  
            });
        });

        function SomeDeleteRowFunction(o) {
            var p=o.parentNode.parentNode;
            p.parentNode.removeChild(p);
        }
    </script>
</body>
</html>