@extends('layouts.header')
@section('content')


@for($i=0; $i<count($c); $i++)
   <li>{{$c[$i]}}</li>
@endfor  

<br><br>

<table>

   @foreach($c as $cus)
      <tr>
         <td> <a href="/customer/customerList/{{$cus->name}}/{{$cus->id}}"> {{$cus->name}} </a> </td>
      </tr>

   @endforeach

</table>

@endsection