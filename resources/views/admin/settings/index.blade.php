<x-admin-master>
  @section('content')
  <h1 class="h1 by-3">Settigns</h1>
  @isset($settings)
  @foreach ($settings as $setting)
      <div class="mb-3">
    <h3 class="form-label">Title</h3>
    <p  class="form-control">{{$setting->title}}</p>
  </div>
  <div class="mb-3">
    <h3 class="form-label">subTitle</h3>
    <p  class="form-control">{{$setting->subtitle}}</p>
  </div>
  <div class="mb-3">
    <h3 class="form-label">logo</h3>
    <img src="{{asset($setting->media->filename)}}" alt="{{$setting->title}}">
  </div>
  <div class="mb-3">
    <h3 class="form-label">Footer CopyRight</h3>
    <p  class="form-control">{{$setting->footer_copy_right}}</p>
  </div>
  <a class="btn btn-primary" href="{{route('setting.edit' ,$setting)}}" >Edit Settings</a>

  @endforeach
   
  @endisset
      
  @endsection
</x-admin-master>