<x-admin-master>
  @section('content')
  <h1>Edit User : <span>{{$user->name}}</span></h1>
  <form action="{{route('user.update',$user)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="mb-3">
      <img src="{{asset($user->avatar)}}" class="img-thumbnail w-25" alt="{{$user->username}}">
    </div>
    <div class="mb-3">
      <input class="form-control" type="file" id="formFile" name="avatar">
    </div>
    <div class="mb-3">
      <label for="usernameInput" class="form-label">User Name</label>
      <input type="text" class="form-control @error('username') is-invalide @enderror" id="usernameInput" aria-describedby="usernameHelp" name="username" value="{{$user->username}}">
    </div>
    <div class=" mb-3">
      <label for="nameInput" class="form-label"> Name</label>
      <input type="text" class="form-control" id="nameInput" aria-describedby="nameHelp" name="name" value="{{$user->name}}">
    </div>
    <div class="mb-3">
      <label for="emailInput" class="form-label"> Email</label>
      <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="email" value="{{$user->email}}">
    </div>
    <div class="mb-3">
      <label for="passwordInput" class="form-label"> Password</label>
      <input type="password" class="form-control" id="passworInput" aria-describedby="passwordHelp" name="password">
    </div>
    <div class="mb-3">
      <label for="confirmpasswordInput" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="confirmpassworInput" aria-describedby="confirmpasswordHelp" name="confirmpassword">
    </div>
    <div class="mb-3">
      <button class="btn btn-primary">Submit</button>
    </div>
  </form>

  @if(auth()->user()->userHasRole('admin') )
  <!-- Start Our Table Roles  -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Options</th>
              <th>Id</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Attach</th>
              <th>Detach</th>

            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Options</th>
              <th>Id</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Attach</th>
              <th>Detach</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($roles as $role)
            <tr>
              <td>
                <input type="checkbox" name="role" id="role" @if($user->roles->contains($role))
                checked
                @endif
                />
              </td>
              <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->slug}}</td>
              <td>
                <form action="{{route('rolesattach.attach',$user->id)}}" method="post">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="role_id" value="{{$role->id}}" />

                  <button class="btn btn-primary" type="submit" @if($user->roles->contains($role))
                    disabled
                    @endif
                    >Attach </button>
                </form>
              </td>
              <td>
                <form action="{{route('rolesdetach.detach',$user->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                  <input type="hidden" name="role_id" value="{{$role->id}}">
                  <button class="btn btn-danger" type="submit" @if(!$user->roles->contains($role))
                    disabled
                    @endif
                    > Detach </button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>

      </div>
    </div>

  </div>
  <!-- Start Our Table Permissions  -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Options</th>
              <th>Id</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Attach</th>
              <th>Detach</th>

            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Options</th>
              <th>Id</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Attach</th>
              <th>Detach</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($permissions as $permission)
            <tr>
              <td>
                <input type="checkbox" name="permission" id="permission" @if($user->permissions->contains($permission))
                checked
                @endif
                />
              </td>
              <td>{{$permission->id}}</td>
              <td>{{$permission->name}}</td>
              <td>{{$permission->slug}}</td>

              <td>
                <form action="{{route('rolesattach.attachPermission',$user->id)}}" method="post">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="permission_id" value="{{$permission->id}}" />

                  <button class="btn btn-primary" type="submit" @if($user->permissions->contains($permission))
                    disabled
                    @endif
                    >Attach </button>
                </form>
              </td>
              <td>
                <form action="{{route('rolesdetach.detachPermission',$user->id)}}" method="post">
                  @method('DELETE')
                  @csrf
                  <input type="hidden" name="permission_id" value="{{$permission->id}}">
                  <button class="btn btn-danger" type="submit" @if(!$user->permissions->contains($permission))
                    disabled
                    @endif
                    > Detach </button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>

      </div>
    </div>

  </div>
  @endif
  @endsection
</x-admin-master>