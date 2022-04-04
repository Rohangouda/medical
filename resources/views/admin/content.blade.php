@extends('layouts.login_layout')
@section('content')
<style>
    .toggle-box-region {background-color:#fff; border:1px solid #d9d9d9; padding:16px 18px;}
.toggle-box {display:none;}
.toggle-box + label {
	color:#555;
	cursor:pointer;
	display:block;
	font-weight:bold;
	line-height:23px;
	padding:.3em 0 .3em 26px;
	position:relative;
}

.toggle-box + label + div {display:none; margin:0 0 14px;}
.toggle-box:checked + label:nth-child(n) + div {display:block;}

.toggle-box + label:before {
	position:absolute;
	content:"\f0fe";
	font-family:FontAwesome;
	top:.3em;
	left:0px;
	color:#0085a6;
}
.toggle-box:checked + label {color:#0085a6;}
.toggle-box:checked + label:before {content:"\f146";}
.toggle-box-content {border-bottom:4px double #bfbfbf; color:#000; padding:2px 1em .6em 28px;}

/* General */
*, *:before, *:after {
	-webkit-box-sizing: border-box;
	   -moz-box-sizing: border-box;
			box-sizing: border-box;
}
.box-test {
  padding:3em;
}
    </style>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('status'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('status') }}");
  @endif
</script>
<div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
            <div>              
                    <form action="{{route('master.banner')}}" method="POST">
                          @csrf                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Select Service</label>
                                    <select class="form-select form-control" aria-label="Default select service_id" id="service" name="service_name" Required>
                                    @foreach($service as $ser)
                                    <option value="{{$ser->ser_name}}">{{$ser->ser_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
        <!-- Button trigger for Add Documnet modal -->
                               <div class="mt-1">
                                @if (Session::has('errors'))
                                    <script>
                                        @if (count($errors) > 0)
                                            @foreach ($errors->all() as $error)
                                                toastr.error("{{ $error }}");<br>
                                            @endforeach
                                        @endif
                                    </script>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="mt-4 alert flex-center alert-dismissible alert-danger text-center">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}<br>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (Session::has('messagered'))
                                    <div class="alert flex-center alert-dismissible alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <p>{{ Session::get('messagered') }}</p>
                                    </div>
                                @endif

                                @if (Session::has('message'))
                                    <div class="mt-4 alert flex-center alert-dismissible alert-success text-center">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="p-2" aria-hidden="true">&times;</span>
                                        </button>
                                        <p>{{ Session::get('message') }}</p>
                                    </div>
                                @endif
                            </div>
                           <!-- Card sizing section start -->
                            <section id="sizing">
                                <div class="row">
                                <form action="{{route('master.banner')}}" method="POST">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-primary">Banner</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select" id="service_name"  name="service_name" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->ser_name}}">{{$ser->ser_name}}</option>
                                                    @endforeach
                                                 </select>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title">Tittle</label>
                                                                        <input type="text"  name="banner_tittle" value="hi" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Description" name="banner_description">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="image">Image</label>
                                                                        <input type="file" class="form-control"
                                                                            placeholder="" name="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" onclick="savechanges()" class="btn btn-primary my-5"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!---overview-->
                                
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <form action="{{route('master.overview')}}" method="POST">
                                                <h4 class="card-title btn btn-primary">Overview</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select2" id="service_name"  name="service_name" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->ser_name}}">{{$ser->ser_name}}</option>
                                                    @endforeach
                                                 </select>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="tittle">Tittle</label>
                                                                        <input type="text" id="" name="overview_tittle"  value="Why a Lasik Surgery" class="form-control"
                                                                        >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <textarea name="overview_description" id="overview_description" placeholder="Enter Description" style="background-color: white;" required>
                                                                        <p>Here is why you should opt for a FEMTO Lasik surgery from Medfin.</p> <ul> <li>Bladeless Lasik Surgery (FEMTO) that is highly precise</li> <li>The minimal risk involved in the surgery</li> <li>Extremely precise surgery performed by experienced surgeons</li> <li>Fast recovery (within 2-3 days)</li> <li>Surgery only takes 5-10 minutes to get completed</li> </ul>
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="confirm_pass">Image</label>
                                                                        <input type="file" id="" class="form-control"
                                                                            placeholder="" name="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </section>
                            <!-- CTreatment option start -->
                            <section id="sizing">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-info">Treatment Option</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title">Heading</label>
                                                                        <input type="text"  name="heading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Description" name="description">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Subheading</label>
                                                                        <input type="text"  name="subheading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Accordion Tittle</label>
                                                                                <input type="text" name="acc_tittle_to" class="form-control" placeholder="Accordion Tittle"
                                                                                    Required>
                                                                                <input type="text" name="bullet_tittle_to" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="bullet_content_to" class="form-control" placeholder="Bullet Content"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Accordion Content</label>
                                                                        <textarea type="text"  name="acc_content_to" class="form-control"
                                                                         ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info  my-5"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!---Causes & symptoms-->
                                   <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-info">Causes & Symptoms</h4>
                                            </div>
                                            <div class="card-content">
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title">Heading</label>
                                                                        <input type="text"  name="heading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Description" name="description">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Accordion Tittle</label>
                                                                                <input type="text" name="acc_tittle_to" class="form-control" placeholder="Accordion Tittle"
                                                                                    Required>
                                                                                <input type="text" name="bullet_tittle_to" class="form-control" placeholder="Bullet Tittle" >
                                                                         <textarea type="text"  name="bullet_content_to" class="form-control" placeholder="Bullet Content"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Accordion Content</label>
                                                                        <textarea type="text"  name="acc_content_to" class="form-control"
                                                                         ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Image</label>
                                                                        <input type="file"  name="subheading" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info  my-5"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                             <!-- Causes & symptoms end -->
                               <!-- advantages start -->
                            <section id="sizing">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-info">Advantages</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title">Heading</label>
                                                                        <input type="text"  name="heading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Image</label>
                                                                        <input type="file" name="advantage_image" class="form-control"
                                                                         >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info  my-5"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!---Testimonials start-->
                                   <div class="col-lg-6 col-md-12 col-sm-12">
                                       <form action="{{route('master.faq')}}" method="POST">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-info">FAQs</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select2" id="service_name"  name="service_name" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->ser_name}}">{{$ser->ser_name}}</option>
                                                    @endforeach
                                                 </select>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title">First</label>
                                                                        <input type="text"  name="que1" id="que1" class="form-control" placeholder="Enter Question" Required>
                                                                         <textarea type="text"  name="ans1" id="ans1" class="form-control" placeholder="Enter Answer" ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input class="toggle-box" id="toggleId-2" type="checkbox">
                                                        <label for="toggleId-2">Question two</label>
                                                            <div class="row toggle-box-content">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Second</label>
                                                                        <input type="text"  name="que2" id="que1" class="form-control" placeholder="Enter Question">
                                                                         <textarea type="text"  name="ans2" id="ans2" class="form-control" placeholder="Enter Answer"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input class="toggle-box" id="toggleId-2" type="checkbox">
                                                        <label for="toggleId-2">Question three!</label>
                                                            <div class="row toggle-box-content">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Third</label>
                                                                        <input type="text"  name="que3" id="que3" class="form-control" placeholder="Enter Question">
                                                                         <textarea type="text"  name="ans3" id="ans3" class="form-control" placeholder="Enter Answer"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input class="toggle-box" id="toggleId-2" type="checkbox">
                                                        <label for="toggleId-2">Question four!</label>
                                                            <div class="row toggle-box-content">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Fourth</label>
                                                                        <input type="text"  name="que4" id="que4" class="form-control" placeholder="Enter Question">
                                                                         <textarea type="text"  name="ans4" id="ans4" class="form-control" placeholder="Enter Answer"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input class="toggle-box" id="toggleId-2" type="checkbox">
                                                        <label for="toggleId-2">Question five!</label>
                                                            <div class="row toggle-box-content">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Fifth</label>
                                                                        <input type="text"  name="que5" id="que5" class="form-control" placeholder="Enter Question">
                                                                         <textarea type="text"  name="ans5" id="ans5" class="form-control" placeholder="Enter Answer"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info my-1"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </section>
                             <!-- Testimonials end -->
                             <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block my-5"><i
                                        class="ft-check mr-2"></i>Save Change</button>
                            </div>
                        </form>                               
    </div>
</div>

<script>
    CKEDITOR.replace( 'overview_description' );
    CKEDITOR.replace( 'desc' );

    $('.select2').select2();


$('#testimonial_btn').on('click',function(e) {
    e.preventDefault();
    alert("hi");
    // Let service_name = $('#service_name').val();
    // Let name = $('#name').val();
    // Let message = $('#message').val();
    // Let city = $('#city').val();

    // $.ajaxSetup({
    //     header:{
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    //$.ajax({
                //     url: baseUrl + '/register/testimonials',
                //     type: 'POST',
                //     data: {
                //         "service_name" : service_name,
                //         "name" : name,
                //         "message" : message,
                //         "city" : city
                //     },
                //     dataType: 'json',
                //     beforeSend: function () {
                //         $('#loader').modal({ backdrop: 'static', keyboard: false });
                //     },
                //     success: function (res) {
                //         if (res.status == 200) {
                //             alert(res.msg);
                //             location.reload();
                //         } else {
                //             alert(res.msg);
                //         }
                //     },+
                //     complete: function () {
                //         $('#loader').modal('hide');
                //     }
                // });
});

</script>
@stop