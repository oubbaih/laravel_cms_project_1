<x-admin-master>
  @section('content')
  <div class="container">
   
        <h1>View All Images</h1>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Images </h6>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Image </th>
                      <th>Create At</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($images)
                    @foreach($images as $image)
                    <tr>
                      <td>{{$image->id}}</td>
                      <td style="display:flex !important; justify-content:center"><img style=" height:120px" src="{{asset($image->filename)}}" alt="{{$image->id}}"></td>
                      <td>{{$image->created_at->diffForHumans()}}</td>
                      <td>{{$image->updated_at->diffForHumans()}}</td>
                      <td>
                        <form method="post" action="{{route('media.destroy', $image->id)}}" enctype="multipart/form-data">
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
          </form>
        </div>
        <div class="d-flex">
            <div class="mx-auto h-50 w-100">
                {{ $images->links('vendor.pagination.default') }}
            </div>
        </div>
  </div>



  @endsection
</x-admin-master>