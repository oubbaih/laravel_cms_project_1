<x-admin-master>
  @section('content')
  <h1>Edit Post</h1>
  <form action="{{route('posts.update',$post)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="FormControlTitleInput" class="form-label">Title</label>
      <input type="text" name="title" value="{{$post->title}}" class="form-control" id="FormControlTitleInput">
    </div>
    <div><img src="{{$post->post_image}}" alt=""></div>
    <div class="mb-3">
      <label for="formImageFile" class="form-label">Post Image</label>
      <input class="form-control form-control-sm" name="post_image" id="formImageFile" type="file">
    </div>
    <div class="mb-3">
      <label for="FormControlContentTextarea" class="form-label">Content</label>
      <textarea class="form-control" name="body" id="FormControlContentTextarea" rows="5">{{$post->body}}</textarea>
    </div>
    <select class="form-select" name="categories_id" aria-label="Default select example">
      @if(isset($categories))
      @foreach($categories as $category)
      <option value="{{$category->id}}" @if($post->categories->name == $category->name)
        selected
        @endif
        >{{$category->name}}</option>
      @endforeach
      @endif
    </select>
    <div class="my-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  @endsection
</x-admin-master>