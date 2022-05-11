<x-admin-master>
  @section('content')
  <h1 class="h1 by-3">Edit Settigns</h1>
   <form action="{{route('setting.update' , $setting)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @isset($setting)
      <div class="mb-3">
        <label for="InputTitle" class="form-label">Title</label>
        <input type="text" class="form-control" id="InputTitle" name="title" value="{{$setting->title}}" aria-describedby="titleHelp">
      </div>
      <div class="mb-3">
        <label for="InputSubTitle" class="form-label">SubTitle</label>
        <input type="text" class="form-control" id="InputSubTitle" name="subtitle"  value="{{$setting->subtitle}}" aria-describedby="titleHelp">
      </div>
      <div class="mb-3">
        <label for="InputSubTitle" class="form-label">Footer CopyRight</label>
        <input type="text" class="form-control" id="InputSubTitle" name="footer_copy_right" value="{{$setting->footer_copy_right}}" aria-describedby="titleHelp">
      </div>
      <img src="{{asset($setting->media->filename)}}" alt="{{$setting->title}}">
      <div class="mb-3">
      <label for="formFile" class="form-label">File Input</label>
      <input class="form-control" type="file" name="logo"  id="formFile">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
   @endisset
</form>
  @endsection
</x-admin-master>