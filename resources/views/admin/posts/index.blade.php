<x-admin-master>
    @section('content')

    <h1>All Posts</h1>

    @if(session('delete-message'))
    <div class="alert alert-danger">{{session('delete-message')}}</div>
    @elseif(session('post-created'))
    <div class="alert alert-success">{{session('post-created')}}</div>
    @elseif(session('update-message'))
    <div class="alert alert-success">{{session('update-message')}}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Posts </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->categories ? $post->categories->name : "UnCategorized"}}</td>
                            <td><img width="100px" src="{{$post->post_image}}" alt=""></td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>
                            <td><a href="{{route('posts.edit',$post)}}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form method="post" action="{{route('posts.destroy', $post->id)}}" enctype="multipart/form-data">
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
            {{ $posts->links('vendor.pagination.default') }}
        </div>
    </div>
    @endsection

    @section('scripts')

    @endsection

</x-admin-master>