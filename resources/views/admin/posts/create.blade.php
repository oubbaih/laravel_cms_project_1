<x-admin-master>

  @section('content')
  <h1>Create Post</h1>
  <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="FormControlTitleInput" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" id="FormControlTitleInput">
    </div>
    <div class="mb-3">
      <label for="formImageFile" class="form-label">Post Image</label>
      <input class="form-control form-control-sm" name="post_image" id="formImageFile" type="file">
    </div>
    <div class="mb-3">
      <label for="FormControlContentTextarea" class="form-label">Content</label>
      <textarea class="form-control" name="body" id="FormControlContentTextarea" rows="5"></textarea>
    </div>
    <select class="form-select" name="categories_id" aria-label="Default select example">
      @if(isset($categories))
      @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
      @endif
    </select>
    <div class="col-12 my-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  @endsection

</x-admin-master>