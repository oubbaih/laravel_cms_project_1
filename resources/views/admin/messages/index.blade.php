<x-admin-master>
    @section('content')

    <h1>All Messages</h1>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Messages </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Message</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Message</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($messages as $mes)
                        <tr>
                            <td>{{$mes->first_name}}</td>
                            <td>{{$mes->last_name}}</td>
                            <td>{{$mes->email}}</td>
                            <td>{{$mes->job_title}}</td>
                            <td>{{$mes->message}}</td>
                            <td>
                                <form action="{{route('admin.contact.destroy',$mes->id)}}"  method="POST" >
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
            {{ $messages->links('vendor.pagination.default') }}
        </div>
    </div>
    @endsection

</x-admin-master>