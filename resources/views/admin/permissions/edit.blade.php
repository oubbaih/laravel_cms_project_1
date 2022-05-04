<x-admin-master>
  @section('content')

  <div class="row">
    <h1 class="text-capitalize">Update Permission : {{$permission->name}}</h1>
    <div class=" col-4 mt-4">
      <div class="  mb-4">
        <form action="{{route('permissions.update' , $permission->id)}}" method="POST">
          @csrf
          @method('PATCH')
          <div class=" mb-3">
            <input type="text" class="form-control" name="name" placeholder="Enter Role Name" value="{{$permission->name}}">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Update Role</button>
        </form>

      </div>

    </div>


  </div>



  @endsection
</x-admin-master>