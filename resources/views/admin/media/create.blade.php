<x-admin-master>
@section('styles')
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<h1>Upload Images</h1>

            <form action="{{ route('media.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">

                @csrf

                <div class="text-center">

                    <h4>Upload Multiple Image By Click On Box</h4>

                </div>

            </form>
@endsection






@section('scripts')

<script type="text/javascript">

  

        Dropzone.autoDiscover = false;

  

        var dropzone = new Dropzone('#image-upload', {

              thumbnailWidth: 200,
              addRemoveLinks: true,
              timeout: 50000,
              maxFilesize: 1,
              acceptedFiles: ".jpeg,.jpg,.png,.gif",
              renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
              },
              removedfile: function(file){
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("meida/destroy") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
              },
              success: function(file, response){
                console.log(response);
              },
              error: function(file, response){
               return false;
              }
       

            });

  

</script>
@endsection



</x-admin-master>