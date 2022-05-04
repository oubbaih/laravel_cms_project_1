<x-admin-master>
  @section('content')

  <div class="row">
    <h1 class="text-capitalize">Update Role : {{$role->name}}</h1>
    <div class=" col-4 mt-4">
      <div class="  mb-4">
        <form action="{{route('roles.update' , $role->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class=" mb-3">
            <input type="text" class="form-control" name="name" placeholder="Enter Role Name" value={{$role->name}}>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Update Role</button>
        </form>

      </div>

    </div>


  </div>



  @endsection
</x-admin-master>