<x-home-master :categories=$categories>
  @section('content')

  <!-- Nested row for non-featured blog posts-->
  <div class="row">

    <!-- Blog post-->
    @if(isset($posts))
    @foreach($posts as $post)
    <div class="col-6">
      <div class="card mb-4">
        <a href="#!"><img class="card-img-top" src="{{$post->media->filename}}" alt="{{$post->title}}" /></a>
        <div class="card-body overflow-hidden">
          <div class="small text-muted">{{$post->created_at->diffForHumans()}}</div>
          <h2 class="card-title h4">{{$post->title}}</h2>
          <p class="card-text">{!! $post->body !!}</p>
          <a class="btn btn-primary" href="{{ route('post',$post->id) }}">Read more →</a>
        </div>
      </div>
    </div>
    @endforeach
    @else
    <h1>No Posts Availible For Instence </h1>
    @endif

  </div>
  <!-- Pagination-->
  @if(isset($posts))
  <div class="mb-3">
    {{$posts->links('vendor.pagination.default')}}
  </div>
  @endif

  @endsection


</x-home-master>