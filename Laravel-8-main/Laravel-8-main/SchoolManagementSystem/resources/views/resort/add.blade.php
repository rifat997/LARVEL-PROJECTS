   <center>   
    <h3>Add New Resort</h3> 
    <form action="{{route('resort.add')}}" method="post" enctype="multipart/form-data">
    <div class="col-md-4">
        {{csrf_field()}}
       
        <input type="text" name="name" class="form-control" placeholder="Resort Name"><br>
        @error('name')
        <span class="text-danger">{{$message}}</span><br>
        @enderror <br>
       
        Plase give Product Picture(jpg & png Only)
        <input type="file" name="image">
        @error('image')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

        <br><br>
        <input type="reset" class="btn btn-primary" value="Reset">
        <input type="submit" class="btn btn-primary" value="Add">

    </div>    

    </form>
</center>    