   <center>   
    <h3>Edit Resort</h3> 
    <form action="{{route('resort.edit.submit')}}" method="post" enctype="multipart/form-data">
    <div class="col-md-4">
        {{csrf_field()}}
        <input type="hidden" name="id" class="form-control" value="{{$resort->id}}"><br>

        <label for="">Resort Name</label>
        <input type="text" name="name" class="form-control" value="{{$resort->name}}"><br>
        @error('pname')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <div class="form-group mb-3">
            <label for="">Resort Image</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('uploads/resorts/'.$resort->image) }}" width="70px" height="70px" alt="Image">
            @error('image')
            <span class="text-danger">{{$message}}</span><br>
            @enderror
        </div>

        <br>
        <input type="reset" class="btn btn-primary" value="Reset">
        <input type="submit" class="btn btn-primary" value="Edit">

</div>    

    </form>
</center>    
