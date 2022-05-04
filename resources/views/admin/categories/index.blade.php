<x-admin-master>
  @section('content')
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h1>Create Category</h1>
        <form action="{{route('category.store')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="FormControlNameInput" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="FormControlNameInput">
          </div>

          <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
        </form>
      </div>
      <div class="col-6">

        <!-- Category Table  -->
        <h1>View All Categories</h1>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>

                    <th>Edit</th>
                    <th>Delete</th>

                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>

                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  @if(count($categories)>0)
                  @foreach($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><a href="{{route('category.edit',$category)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                      <form method="post" action="{{route('category.destroy', $category->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>

            </div>
          </div>

        </div>
        <!-- End Category Table  -->




      </div>
    </div>
  </div>



  @endsection
</x-admin-master>