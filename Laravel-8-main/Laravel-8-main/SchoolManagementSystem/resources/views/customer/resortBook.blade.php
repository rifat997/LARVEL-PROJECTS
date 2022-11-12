resortBook
<center>   
    <h3>Booking Resort</h3> 
    <form action="{{route('customer.resort.book')}}" method="post" enctype="multipart/form-data">
    <div class="col-md-4">
        {{csrf_field()}}
       
        <input type="text" name="email" class="form-control" placeholder="Email"><br>
        @error('email')
        <span class="text-danger">{{$message}}</span><br>
        @enderror <br>

        <input type="date" name="booking_time" class="form-control"><br>
        @error('booking_time')
        <span class="text-danger">{{$message}}</span><br>
        @enderror <br>
       
        <br><br>
        <input type="reset" class="btn btn-primary" value="Reset">
        <input type="submit" class="btn btn-primary" value="Add">

</div>    

    </form>
</center>    