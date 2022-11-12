
<center>
    @if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span><br><br>@endif
    <br>
    <form action="{{route('create.blog')}}" method="post">
        <div class="col-md-4">
            {{csrf_field()}}
            <h3>Creating blog</h3>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Title"><br>
            @error('name')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

            <input type="text" id="content" name="content" class="form-control" placeholder="Content"><br>
            @error('password')
        <span class="text-danger">{{$message}}</span><br>
        @enderror

            <input type="submit" id="login" class="btn btn-primary" value="Post">
        </div>    
    </form>
</center>