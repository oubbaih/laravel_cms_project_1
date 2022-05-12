<x-home-master  :categories=$categories>

@section('content')
<h1>About Us Page</h1>
  <div class="row">
    @foreach ($aboutData as $dat)
        <div class="col-6">
          <article>
          <p>{{$dat->content}}</p> 
          </article>
        </div>
        <div class="col-6">
          <img class="img-fluid" src="{{asset($dat->media->filename)}}" alt="aabout page Image">
        </div>
    @endforeach
  </div>
@endsection

</x-home-master>