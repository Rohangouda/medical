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

  @if(Session::has('messagered'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('messagered') }}");
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
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Select Service</label>
                                    <select class="form-select form-control" aria-label="Default select service_id" id="service" name="service_id" Required>
                                    @foreach($service as $ser)
                                    <option value="{{$ser->ser_name}}">{{$ser->ser_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        
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

                                <!-- @if (Session::has('messagered'))
                                    <div class="alert flex-center alert-dismissible alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <p>{{ Session::get('messagered') }}</p>
                                    </div>
                                @endif -->

                                <!-- @if (Session::has('message'))
                                    <div class="mt-4 alert flex-center alert-dismissible alert-success text-center">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="p-2" aria-hidden="true">&times;</span>
                                        </button>
                                        <p>{{ Session::get('message') }}</p>
                                    </div>
                                @endif -->
                            </div>
                           <!-- Card sizing section start -->
                            <section id="sizing">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                        <form action="{{route('master.banner')}}" method="POST" enctype="multipart/form-data" >
                                          @csrf
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-primary">Banner</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select" id="service_id"  name="service_id" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->id}}">{{$ser->ser_name}}</option>
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
                                                                        <input type="text"  name="banner_tittle"  class="form-control"
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
                                                                        <input type='file' name="image" id="imgInp"
                                                                         class="form-control" readonly>
                                                                         <img id="blah" src="{{ asset('medfin/images/banner-img.jpg') }}"  class="mt-4 ml-5" alt="your image" height="150" width="400"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-primary my-2"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                <!---overview-->
                                
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <form action="{{route('master.overview')}}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                <h4 class="card-title btn btn-primary">Overview</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select2" id="service_id"  name="service_id" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->id}}">{{$ser->ser_name}}</option>
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
                                                                        <input type="text" id="" name="overview_tittle"  value="Why a test Surgery" class="form-control"s >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <textarea name="overview_description" id="overview_description" placeholder="Enter Description" style="background-color: white;" required>
                                                                        <p>Here is why you should opt for a FEMTO Lasik surgery from Medfin.</p> <ul> <li></li> <li></li> <li></li> <li></li> <li></li> </ul>
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="confirm_pass">Image</label>
                                                                        <input type="file" id="image" class="form-control"
                                                                            placeholder="" name="image">
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
                                    <form action="{{route('master.treatment')}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-info">Treatment Option</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select2" id="service_id"  name="service_id" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->id}}">{{$ser->ser_name}}</option>
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
                                                                        <label for="title">Heading</label>
                                                                        <input type="text"  name="treatment_heading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <textarea name="treatment_description"></textarea>
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
                                                            <input class="toggle-box" id="acc-head-1" type="checkbox">
                                                             <label for="acc-head-1">Accordion 1</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 1</label>
                                                                        <input type="text" name="acc_head_1" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph1" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="bullet-1" type="checkbox">
                                                                        <label for="bullet-1">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet1" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content1" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="bullet-2" type="checkbox">
                                                                        <label for="bullet-2">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet2" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content2" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="bullet-3" type="checkbox">
                                                                        <label for="bullet-3">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet3" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content3" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="bullet-4" type="checkbox">
                                                                        <label for="bullet-4">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet4" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content4" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="bullet-5" type="checkbox">
                                                                        <label for="bullet-5">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet5" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content5" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- second accordion -->
                                                            <input class="toggle-box" id="acc-head-2" type="checkbox">
                                                             <label for="acc-head-2">Accordion 2</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 2</label>
                                                                        <input type="text" name="acc_head_2" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph2" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="bullet-11" type="checkbox">
                                                                        <label for="bullet-11">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet11" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content11" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="bullet-22" type="checkbox">
                                                                        <label for="bullet-22">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet22" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content22" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="bullet-33" type="checkbox">
                                                                        <label for="bullet-33">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet33" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content33" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="bullet-44" type="checkbox">
                                                                        <label for="bullet-44">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet44" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content44" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="bullet-55" type="checkbox">
                                                                        <label for="bullet-55">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet55" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content55" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- third accordion -->
                                                            <input class="toggle-box" id="acc-head-3" type="checkbox">
                                                             <label for="acc-head-3">Accordion 3</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 3</label>
                                                                        <input type="text" name="acc_head_3" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph3" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="bullet-111" type="checkbox">
                                                                        <label for="bullet-111">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet111" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content111" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="bullet-222" type="checkbox">
                                                                        <label for="bullet-222">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet222" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content222" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="bullet-333" type="checkbox">
                                                                        <label for="bullet-333">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet333" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content333" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="bullet-444" type="checkbox">
                                                                        <label for="bullet-444">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet444" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content444" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="bullet-555" type="checkbox">
                                                                        <label for="bullet-555">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet555" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content555" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- fourth accordion -->
                                                             <input class="toggle-box" id="acc-head-4" type="checkbox">
                                                             <label for="acc-head-4">Accordion 4</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 4</label>
                                                                        <input type="text" name="acc_head_4" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph4" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="bullet-1111" type="checkbox">
                                                                        <label for="bullet-1111">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet1111" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content1111" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="bullet-2222" type="checkbox">
                                                                        <label for="bullet-2222">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet2222" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content2222" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="bullet-3333" type="checkbox">
                                                                        <label for="bullet-3333">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet3333" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content3333" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="bullet-4444" type="checkbox">
                                                                        <label for="bullet-4444">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet4444" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content4444" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="bullet-5555" type="checkbox">
                                                                        <label for="bullet-5555">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet5555" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content5555" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- fifth accordion -->
                                                            <input class="toggle-box" id="acc-head-5" type="checkbox">
                                                            <label for="acc-head-5">Accordion 5</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 5</label>
                                                                        <input type="text" name="acc_head_5" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph5" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="bullet-11111" type="checkbox">
                                                                        <label for="bullet-11111">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet11111" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content11111" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="bullet-22222" type="checkbox">
                                                                        <label for="bullet-22222">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet22222" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content22222" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="bullet-33333" type="checkbox">
                                                                        <label for="bullet-33333">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet33333" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content33333" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="bullet-44444" type="checkbox">
                                                                        <label for="bullet-44444">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet44444" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content44444" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="bullet-55555" type="checkbox">
                                                                        <label for="bullet-55555">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet55555" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content55555" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- six accordion -->
                                                            <input class="toggle-box" id="acc-head-6" type="checkbox">
                                                            <label for="acc-head-6">Accordion 6</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 6</label>
                                                                        <input type="text" name="acc_head_6" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph6" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="bullet-111111" type="checkbox">
                                                                        <label for="bullet-111111">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet111111" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content111111" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="bullet-222222" type="checkbox">
                                                                        <label for="bullet-222222">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet222222" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content222222" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="bullet-333333" type="checkbox">
                                                                        <label for="bullet-333333">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet333333" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content333333" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="bullet-444444" type="checkbox">
                                                                        <label for="bullet-444444">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet444444" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content444444" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="bullet-555555" type="checkbox">
                                                                        <label for="bullet-555555">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet555555" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content555555" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                               <!-- seven accordion -->
                                                         {{--   <input class="toggle-box" id="acc-head-7" type="checkbox">
                                                             <label for="acc-head-1">Accordion 7</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 1</label>
                                                                        <input type="text" name="acc_head_7" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph7" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="bullet-1" type="checkbox">
                                                                        <label for="bullet-1">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet1" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content1" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="bullet-2" type="checkbox">
                                                                        <label for="bullet-2">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet2" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content2" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="bullet-3" type="checkbox">
                                                                        <label for="bullet-3">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet3" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content3" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="bullet-4" type="checkbox">
                                                                        <label for="bullet-4">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet4" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content4" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="bullet-5" type="checkbox">
                                                                        <label for="bullet-5">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet5" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content5" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div> --}}
                                                            <!--end--->
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info  my-5"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                <!---Causes & symptoms-->
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <form action="{{route('master.symptoms')}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-info">Causes & symptoms</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select2" id="service_id"  name="service_id" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->id}}">{{$ser->ser_name}}</option>
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
                                                                        <label for="title">Heading</label>
                                                                        <input type="text"  name="symptoms_heading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <textarea name="symptoms_description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Image</label>
                                                                        <input type="file"  name="image" class="form-control"
                                                                         >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input class="toggle-box" id="sym-head-1" type="checkbox">
                                                             <label for="sym-head-1">Accordion 1</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 1</label>
                                                                        <input type="text" name="acc_head_1" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph1" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="sym-bullet-1" type="checkbox">
                                                                        <label for="sym-bullet-1">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet1" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content1" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="sym-bullet-2" type="checkbox">
                                                                        <label for="sym-bullet-2">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet2" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content2" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="sym-bullet-3" type="checkbox">
                                                                        <label for="sym-bullet-3">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet3" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content3" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="sym-bullet-4" type="checkbox">
                                                                        <label for="sym-bullet-4">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet4" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content4" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="sym-bullet-5" type="checkbox">
                                                                        <label for="sym-bullet-5">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet5" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content5" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- second accordion -->
                                                            <input class="toggle-box" id="sym-head-2" type="checkbox">
                                                             <label for="sym-head-2">Accordion 2</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 2</label>
                                                                        <input type="text" name="acc_head_2" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph2" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="sym-bullet-11" type="checkbox">
                                                                        <label for="sym-bullet-11">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet11" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content11" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="sym-bullet-22" type="checkbox">
                                                                        <label for="sym-bullet-22">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet22" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content22" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="sym-bullet-33" type="checkbox">
                                                                        <label for="sym-bullet-33">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet33" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content33" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="sym-bullet-44" type="checkbox">
                                                                        <label for="sym-bullet-44">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet44" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content44" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="sym-bullet-55" type="checkbox">
                                                                        <label for="sym-bullet-55">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet55" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content55" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- third accordion -->
                                                            <input class="toggle-box" id="sym-head-3" type="checkbox">
                                                             <label for="sym-head-3">Accordion 3</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 3</label>
                                                                        <input type="text" name="acc_head_3" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph3" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="sym-bullet-111" type="checkbox">
                                                                        <label for="sym-bullet-111">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet111" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content111" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="sym-bullet-222" type="checkbox">
                                                                        <label for="sym-bullet-222">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet222" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content222" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="sym-bullet-333" type="checkbox">
                                                                        <label for="sym-bullet-333">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet333" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content333" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="sym-bullet-444" type="checkbox">
                                                                        <label for="sym-bullet-444">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet444" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content444" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="sym-bullet-555" type="checkbox">
                                                                        <label for="sym-bullet-555">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet555" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content555" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- fourth accordion -->
                                                             <input class="toggle-box" id="sym-head-4" type="checkbox">
                                                             <label for="sym-head-4">Accordion 4</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 4</label>
                                                                        <input type="text" name="acc_head_4" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph4" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="sym-bullet-1111" type="checkbox">
                                                                        <label for="sym-bullet-1111">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet1111" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content1111" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="sym-bullet-2222" type="checkbox">
                                                                        <label for="sym-bullet-2222">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet2222" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content2222" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="sym-bullet-3333" type="checkbox">
                                                                        <label for="sym-bullet-3333">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet3333" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content3333" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="sym-bullet-4444" type="checkbox">
                                                                        <label for="sym-bullet-4444">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet4444" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content4444" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="sym-bullet-5555" type="checkbox">
                                                                        <label for="sym-bullet-5555">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet5555" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content5555" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- fifth accordion -->
                                                            <input class="toggle-box" id="sym-head-5" type="checkbox">
                                                            <label for="sym-head-5">Accordion 5</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 5</label>
                                                                        <input type="text" name="acc_head_5" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph5" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="sym-bullet-11111" type="checkbox">
                                                                        <label for="sym-bullet-11111">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet11111" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content11111" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="sym-bullet-22222" type="checkbox">
                                                                        <label for="sym-bullet-22222">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet22222" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content22222" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="sym-bullet-33333" type="checkbox">
                                                                        <label for="sym-bullet-33333">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet33333" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content33333" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="sym-bullet-44444" type="checkbox">
                                                                        <label for="sym-bullet-44444">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet44444" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content44444" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="sym-bullet-55555" type="checkbox">
                                                                        <label for="sym-bullet-55555">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet55555" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content55555" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                            <!-- six accordion -->
                                                            <input class="toggle-box" id="sym-head-6" type="checkbox">
                                                            <label for="sym-head-6">Accordion 6</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 6</label>
                                                                        <input type="text" name="acc_head_6" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph6" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="sym-bullet-111111" type="checkbox">
                                                                        <label for="sym-bullet-111111">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet111111" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content111111" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="sym-bullet-222222" type="checkbox">
                                                                        <label for="sym-bullet-222222">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet222222" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content222222" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="sym-bullet-333333" type="checkbox">
                                                                        <label for="sym-bullet-333333">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet333333" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content333333" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="sym-bullet-444444" type="checkbox">
                                                                        <label for="sym-bullet-444444">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet444444" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content444444" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="symb-ullet-555555" type="checkbox">
                                                                        <label for="sym-bullet-555555">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet555555" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content555555" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div>
                                                               <!-- seven accordion -->
                                                         {{--   <input class="toggle-box" id="sym-head-7" type="checkbox">
                                                             <label for="sym-head-1">Accordion 7</label>
                                                            <div class="row toggle-box-content">
                                                                  <div class="form-group">
                                                                        <label for="heading">Accordion Heading 1</label>
                                                                        <input type="text" name="acc_head_7" class="form-control" placeholder="Accordion Tittle" >
                                                                        <textarea type="text"  name="paragraph7" class="form-control" placeholder="Accordion paragraph"></textarea>
                                                                        <!--bullet1-->
                                                                        <input class="toggle-box" id="bullet-1" type="checkbox">
                                                                        <label for="bullet-1">Bullet 1</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet1" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content1" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div> 
                                                                          <!--bullet2-->
                                                                        <input class="toggle-box" id="bullet-2" type="checkbox">
                                                                        <label for="bullet-2">Bullet 2</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet2" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content2" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet3-->
                                                                        <input class="toggle-box" id="bullet-3" type="checkbox">
                                                                        <label for="bullet-3">Bullet 3</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet3" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content3" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet4-->
                                                                        <input class="toggle-box" id="bullet-4" type="checkbox">
                                                                        <label for="bullet-4">Bullet 4</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet4" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content4" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>
                                                                          <!--bullet5-->
                                                                        <input class="toggle-box" id="bullet-5" type="checkbox">
                                                                        <label for="bullet-5">Bullet 5</label>
                                                                          <div class="row toggle-box-content">
                                                                          <input type="text" name="bullet5" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="content5" class="form-control" placeholder="Bullet Content"></textarea>
                                                                          </div>  
                                                                          <!--end--> 
                                                                    </div>
                                                            </div> --}}
                                                            <!--end--->
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info  my-5"><i
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
                             <!-- Causes & symptoms end -->
                               <!-- advantages start -->
                            <section id="sizing">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                    <form action="{{route('master.advantages')}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-info">Advantages</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select3" id="service_id"  name="service_id" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->id}}">{{$ser->ser_name}}</option>
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
                                                                        <input type="file" name="image" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info  my-4"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                     </form>
                                    </div>
                                <!---faq start-->
                                   <div class="col-lg-6 col-md-12 col-sm-12">
                                       <form action="{{route('master.faq')}}" method="POST" enctype="multipart/form-data">
                                         @csrf
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-info">FAQ Section</h4>
                                                <div class="float-right mr-5" style="width: 225px;">
                                                <select class="form-control select2" id="service_id"  name="service_id" Required>
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->id}}">{{$ser->ser_name}}</option>
                                                    @endforeach
                                                 </select>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                        <div class="toggle-box-region">
                                                                  <input class="toggle-box" id="toggleId-1" type="checkbox">
                                                                  <label for="toggleId-1">Click here to Question one!</label>
                                                                  <div class="toggle-box-content">  <input type="text"  name="que1" class="form-control" placeholder="Enter Question">
                                                                      <textarea type="text"  name="ans1" class="form-control" placeholder="Enter Answer" ></textarea></div>

                                                                  <input class="toggle-box" id="toggleId-2" type="checkbox">
                                                                  <label for="toggleId-2">Click here to Question two!</label>
                                                                  <div class="toggle-box-content"> <input type="text"  name="que2" id="que1" class="form-control" value="" placeholder="Enter Question">
                                                                      <textarea type="text"  name="ans2" id="ans2" class="form-control" placeholder="Enter Answer"></textarea></div>

                                                                  <input class="toggle-box" id="toggleId-3" type="checkbox">
                                                                  <label for="toggleId-3">Click here to Question three!</label>
                                                                  <div class="toggle-box-content">
                                                                  <input type="text"  name="que3" id="que3" class="form-control" placeholder="Enter Question" >
                                                                      <textarea type="text"  name="ans3" id="ans3" class="form-control" placeholder="Enter Answer"></textarea>
                                                                  </div>
                                                                  
                                                                  <input class="toggle-box" id="toggleId-4" type="checkbox">
                                                                  <label for="toggleId-4">Click here to Question four!</label>
                                                                  <div class="toggle-box-content"> <input type="text"  name="que4" id="que4" class="form-control" placeholder="Enter Question">
                                                                      <textarea type="text"  name="ans4" id="ans4" class="form-control" placeholder="Enter Answer"></textarea></div>
                                                                    
                                                                  <input class="toggle-box" id="toggleId-5" type="checkbox">
                                                                  <label for="toggleId-5">Click here to Question Five!</label>
                                                                  <div class="toggle-box-content"><input type="text"  name="que5" id="que5" class="form-control" placeholder="Enter Question">
                                                                      <textarea type="text"  name="ans5" id="ans5" class="form-control" placeholder="Enter Answer"></textarea></div>
                                                                </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info my-3"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                            </section>
                             <!-- faq end -->
                             <!-- <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block my-5"><i
                                        class="ft-check mr-2"></i>Save Change</button>
                            </div> -->                              
    </div>
</div>

<script>
    CKEDITOR.replace( 'overview_description' );
    CKEDITOR.replace( 'treatment_description' );
    CKEDITOR.replace( 'symptoms_description' );
    

    $('.select2').select2();


$('#testimonial_btn').on('click',function(e) {
    e.preventDefault();
    alert("hi");
    // Let service_id = $('#service_id').val();
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
                //         "service_id" : service_id,
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
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@stop