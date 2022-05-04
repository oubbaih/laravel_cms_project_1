<x-admin-master>
  @section('content')
  <h1>Create User</h1>
  <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="mb-3">
      <input class="form-control" type="file" id="formFile" name="avatar">
    </div>
    <div class="mb-3">
      <label for="usernameInput" class="form-label">User Name</label>
      <input type="text" class="form-control " id="usernameInput" aria-describedby="usernameHelp" name="username">
    </div>
    <div class=" mb-3">
      <label for="nameInput" class="form-label"> Name</label>
      <input type="text" class="form-control" id="nameInput" aria-describedby="nameHelp" name="name">
    </div>
    <div class="mb-3">
      <label for="emailInput" class="form-label"> Email</label>
      <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
      <label for="passwordInput" class="form-label"> Password</label>
      <input type="password" class="form-control" id="passworInput" aria-describedby="passwordHelp" name="password">
    </div>
    <div class="mb-3">
      <label for="confirmpasswordInput" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="confirmpassworInput" aria-describedby="confirmpasswordHelp" name="confirmpassword">
    </div>
    <div class="mb-3">
      <button class="btn btn-primary">Submit</button>
    </div>
  </form>
  @endsection
</x-admin-master>