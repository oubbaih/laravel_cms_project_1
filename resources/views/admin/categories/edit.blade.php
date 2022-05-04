<x-admin-master>
  @section('content')

  <h1>Update Category</h1>
  <form action="{{route('category.update' ,$category)}}" method="POST">
    @method('PATCH')
    @csrf
    <div class="mb-3">
      <label for="FormControlNameInput" class="form-label">Category Name</label>
      <input type="text" name="name" class="form-control" id="FormControlNameInput" value="{{$category->name}}">
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary btn-block">Update</button>
    </div>
  </form>


  @endsection
</x-admin-master>