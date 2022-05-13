<x-home-master :categories=$categories>
@section('setting')
@if (isset($setting))
     <div class="text-center my-5">
        @foreach ($settings as $setting)
        <h1 class="fw-bolder">{{$setting->title}}</h1>
        <p class="lead mb-0">{{$setting->subtitle}}</p>
        @endforeach
      </div>
@endif

@endsection
    @section('content')

    @if(isset($post))

    <!-- Title -->
    <h1 class="mt-4">{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>{{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{$post->media->filename}}" alt="{{$post->title}}">

    <hr>

    <!-- Post Content -->
    <p>{!!  $post->body  !!}</p>
    @else
    <p>No Post Exist</p>
    @endif
    <hr>

    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form action="{{route('comment.store')}}" method="POST">
                @csrf
                @if(auth()->user())
                <div class="form-group">
                    <textarea class="form-control" name="body" rows="3"></textarea>
                </div>
                <input type="hidden" name="author" value="{{auth()->user()->name}}">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="posts_id" value="{{$post->id}}">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                @else

                <a class="btn btn-primary" href="/login">Login</a>
                
                @endif

            </form>
        </div>
    </div>

    <!-- Single Comment -->

    @foreach ($post->comments as $comment)
           <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">{{$comment->author}}</h5>
          <p>{{$comment->body}}</p>
        </div>
    </div>
    @endforeach
 



    @endsection
@section('copyright')
@if (isset(setting))
         @foreach ($settings as $setting)
                  <p class="m-0 text-center text-white">{{$setting->footer_copy_right}}</p>
        @endforeach
@endif

@endsection

</x-home-master>