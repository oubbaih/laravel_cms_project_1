<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Blog Home - Start Bootstrap Template</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" />

</head>

<body>
  <!-- Responsive navbar-->
  @include('partials._blog-navbar')
  <!-- Page header with logo and tagline-->
  
  <header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
     @yield('setting')
    </div>
  </header>
  <!-- Page content-->
  <div class="container">
    <div class="row">
      <!-- Blog entries-->
      <div class="col-lg-8">
        @yield('content')
      </div>
      <!-- Side widgets-->
      <div class="col-lg-4">
        <!-- Search widget-->
        <div class="card mb-4">
          <div class="card-header">Search</div>
          <div class="card-body">
            <form action="{{route('search')}}" method="GET">
              <div class="input-group">
                <input class="form-control" type="text" name="query" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="submit">Search!</button>
              </div>
            </form>
          </div>
        </div>
        <!-- Categories widget-->
        <div class="card mb-4">
         
          <div class="card-header">Categories</div>
           @if(isset($categories))
          <div class="card-body">
            <div class="row">
              @foreach($categories as $category)
              <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                  <li><a href="#!">{{$category->name}}</a></li>
                </ul>
              </div>
           
              @endforeach
            </div>
          </div>
          @endif
        </div>
        <!-- Side widget-->
        <div class="card mb-4">
          <div class="card-header">Side Widget</div>
          <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container">
   @yield('copyright')
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="{{asset('js/scripts.js')}}"></script>

</body>

</html>