<x-admin-master >
  @section('cssSummernote')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
  @section('content')
  <h1>Edit Post</h1>
  <form action="{{route('posts.update',$post)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="FormControlTitleInput" class="form-label">Title</label>
      <input type="text" name="title" value="{{$post->title}}" class="form-control" id="FormControlTitleInput">
    </div>
    <div class="mb-3"><img class="img-fluid " src="{{$image->filename}}" alt="{{$post->title}}"></div>
    <div class="mb-3">
      <label for="formImageFile" class="form-label">Post Image</label>
      <input class="form-control form-control-sm" name="post_image" id="formImageFile" type="file">
    </div>
    <div class="mb-3 ">
      <label for="summernote" class="form-label">Content</label>
      <textarea class="form-control" name="body" id="summernote" rows="5">{{$post->body}}</textarea>
    </div>
    <select class="form-select" name="category_id" aria-label="Default select example">
      @foreach($categories as $cat)
      @if($post->category->name ===$cat->name ) 
      <option value="{{$post->category->id}}" selected >{{$post->category->name}}</option>
      @else
      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endif
     @endforeach
    </select>
    <div class="my-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  @endsection

    @section('jsSummernote')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script> $(document).ready(function() {
  $('#summernote').summernote({
    height:330
  });
});</script>
  @endsection
</x-admin-master>