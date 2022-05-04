<x-admin-master>
  @section('content')
  <h1 class="h1 by-3">Pemissions Table</h1>

  <div class="row">
    <div class="col-4">
      <div class="  mb-4">
        <form action="{{route('permissions.store')}}" method="POST">
          @csrf
          @method('POST')
          <div class=" mb-3">
            <input type="text" class="form-control" name="name" placeholder="Enter Permissions Name">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Create Permissions</button>
        </form>

      </div>

    </div>

    <div class="col-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Permissions </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>

                @foreach($permissions as $permission)
                <tr>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  <td>{{$permission->slug}}</td>
                  <td><a href="{{route('permissions.edit' , $permission)}}" class="btn btn-primary">Edit</a></td>
                  <td>
                    <form method="POST" action="{{route('permissions.destroy' , $permission)}}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>



  @endsection
</x-admin-master>