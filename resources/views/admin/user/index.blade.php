<x-admin-master>
  @section('content')

  <h1>All Users</h1>

  @if(session('user-deleted'))
  <div class="alert alert-danger">{{session('user-deleted')}}</div>
  @elseif(session('post-created'))
  <div class="alert alert-success">{{session('post-created')}}</div>
  @elseif(session('user-updated'))
  <div class="alert alert-success">{{session('user-updated')}}</div>
  @endif

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>UserName</th>
              <th>Name</th>
              <th>Avatar</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>UserName</th>
              <th>Name</th>
              <th>Avatar</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->name}}</td>
              <td><img width="100px" src="{{$user->avatar}}" alt="{{$user->name}}"></td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>
              <td><a href="{{route('user.edit' , $user)}}" class="btn btn-primary">Edit</a></td>
              <td>
                <form method="post" action="{{route('user.destroy' , $user)}}" enctype="multipart/form-data">
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
  <div class="d-flex">
    <div class="mx-auto h-50 w-100">
      {{ $users->links('vendor.pagination.default') }}
    </div>
  </div>


  @endsection

  @section('scripts')

  @endsection

</x-admin-master>