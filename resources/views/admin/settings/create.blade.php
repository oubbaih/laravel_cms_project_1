<x-admin-master>
  @section('content')
  <h1 class="h1 by-3">Create Settigns</h1>
  <form action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="InputTitle" class="form-label">Title</label>
    <input type="text" class="form-control" id="InputTitle" name="title" aria-describedby="titleHelp">
  </div>
  <div class="mb-3">
    <label for="InputSubTitle" class="form-label">SubTitle</label>
    <input type="text" class="form-control" id="InputSubTitle" name="subtitle" aria-describedby="titleHelp">
  </div>
  <div class="mb-3">
    <label for="InputSubTitle" class="form-label">Footer CopyRight</label>
    <input type="text" class="form-control" id="InputSubTitle" name="footer_copy_right" aria-describedby="titleHelp">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">File Input</label>
  <input class="form-control" type="file" name="logo" id="formFile">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  @endsection
</x-admin-master>