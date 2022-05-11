<x-home-master>
@section('setting')
 <div class="text-center my-5">
        @foreach ($settings as $setting)
        <h1 class="fw-bolder">{{$setting->title}}</h1>
        <p class="lead mb-0">{{$setting->subtitle}}</p>
        @endforeach
      </div>
@endsection

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
@section('copyright')
     @foreach($settings as $setting)
             <p class="m-0 text-center text-white">{{$setting->footer_copy_right}}</p>
        @endforeach
@endsection

</x-home-master>