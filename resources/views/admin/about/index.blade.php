<x-admin-master>
  @section('content')
  <div class="container">

      <div class="col-6">

        <!-- Category Table  -->
        <h1>View All Pages</h1>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pages </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Media Id</th>
                    <th>Content</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($aboutInfo)>0)
                  @foreach($aboutInfo as $data)
                  <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->media_id}}</td>
                    <td>{{$data->content}}</td>
                    <td><a href="{{route('about.edit',$data)}}" class="btn btn-primary">Edit</a></td>
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



  @endsection
</x-admin-master>