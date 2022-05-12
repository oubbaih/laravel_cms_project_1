<x-home-master>

  @section('content')
    @if(session('recieved-message'))
    <div class="alert alert-success">{{session('recieved-message')}}</div>
    @endif
<!--Section: Contact v.2-->
<div class="container px-1s mx-auto mb-3">
    <div class="row d-flex justify-content-center">
        <div class=" text-center">
            <h3 class="text-capitalize h1">contact us</h3>
            <div class="card p-5">
                <form class="form-card"  action="{{route('contact.store')}}" method="POST">
                  @csrf
                  @method('POST')
                    <div class="row justify-content-between text-left mb-2">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">First name<span class="text-danger"> *</span></label> <input type="text" id="fname" name="first_name" placeholder="Enter your first name" onblur="validate(1)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Last name<span class="text-danger"> *</span></label> <input type="text" id="lname" name="last_name" placeholder="Enter your last name" onblur="validate(2)"> </div>
                    </div>
                    <div class="row justify-content-between text-left mb-2">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Business email<span class="text-danger"> *</span></label> <input type="text" id="email" name="email" placeholder="" onblur="validate(3)"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Job title<span class="text-danger"> *</span></label> <input type="text" id="job" name="job_title" placeholder="" onblur="validate(5)"> </div>
                      </div>
                    <div class="row justify-content-between text-left mb-2">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Your Message Content<span class="text-danger"> *</span></label> <textarea name="message" rows="5"></textarea> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group"> <button type="submit" class="btn btn-block btn-primary">Send Message</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Section: Contact v.2-->
@endsection
</x-home-master>