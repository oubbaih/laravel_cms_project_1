<x-admin-master>
  @section('content')
  @if(auth()->user()->userHasRole('admin'))
  <h1 class="h3 mb-4 text-grey-800">Dashbord With Yield</h1>
  @endif
  @endsection



</x-admin-master>