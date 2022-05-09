<x-admin-master>
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.css" integrity="sha512-b3Wb3Os4sxJRdYkfCWtFjvuN/OlfBNtBGJknON+zbxU6M7GRYdII8m1W7TMsls/kwuwtq1wt7TvuF58Sd/4AGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<h1>Create Media</h1>

<form action="{{route('media.store')}}"  method="post" 
      class="dropzone"
      
      id="my-awesome-dropzone">
    <input type="file" name="file" /></form>
@endsection
{{-- 
<form action="{{route('media.store')}}"class="dropzone">
{{-- @csrf
@method('POST') --}}

</form> --}}





@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.js" integrity="sha512-Sz+viN3paoBmB6Ptj2PalCpQC968OhwAwP4xHPvZ4bKP6wrVOZqX2JRrxBVHDD+KKN9rcdShRoOfSsCTnmzq7g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection



</x-admin-master>