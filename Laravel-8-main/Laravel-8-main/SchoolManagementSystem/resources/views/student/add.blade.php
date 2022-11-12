<center>   
    <h3>Add New Student</h3> 
    <form action="{{route('student.add')}}" method="post" enctype="multipart/form-data">
        <div class="col-md-4">
            {{csrf_field()}}
        
            <input type="text" name="name" class="form-control" placeholder="Student Name"><br>
            @error('name')
            <span class="text-danger">{{$message}}</span><br>
            @enderror <br>
        
            {{-- Plase give Product Picture(jpg & png Only)
            <input type="file" name="image">
            @error('image')
            <span class="text-danger">{{$message}}</span><br>
            @enderror --}}

            <br><br>
            <input type="reset" class="btn btn-primary" value="Reset">
            <input type="submit" class="btn btn-primary" value="Add">
        </div>    
    </form>
</center>    