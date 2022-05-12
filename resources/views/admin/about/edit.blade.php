<x-admin-master>
  @section('content')

  <h1>Create About Page</h1>
  <form action="{{route('about.update' , $about)}}"  method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <img src="{{asset($about->media->filename)}}" class="img-fluid" alt="cxzfdg">
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label">About Image</label>
      <input class="form-control" type="file" id="formFileMultiple" name="image" >
    </div>
    <div class="form-floating mb-3">
        <label for="floatingTextarea">About Content</label>
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="content">{{$about->content}}</textarea>
    </div>
    <div class="mb-3">
      <button class="btn btn-primary" type="submit">Update</button>
    </div>
  </form>  
      
  @endsection
</x-admin-master>