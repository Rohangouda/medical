
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Medfin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="{{ asset('medfin/favicon.png') }}" type="image/x-icon">
<link href="{{ asset('medfin/css/bootstrap.min.css') }}"  rel="stylesheet">
<link href="{{ asset('medfin/css/lp-15.css') }}"  rel="stylesheet">
<link href="{{ asset('medfin/css/swiper-min.css') }}"  rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="{{asset('js/custom/users/all_product_details.js?var=')}}{{date('YmdHis')}}"></script>
<script src="https://use.fontawesome.com/47886b77a3.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
</head>
<body>
	{{dd($service)}}
@if($service->deactivate == 0)	
@if(Session::get('user_role') == 'Admin' && $service->page_status == 0 || $service->page_status == 1 )
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

  @if(Session::has('archive'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('archive') }}");
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
<!-- Navbar Starts -->
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
 <div class="container">
	 <a class="navbar-brand" href="{{URL::to('/')}}"><img class="white-logo" src="{{ asset('medfin/images/medfin-logo-white.svg') }}" height="27" alt=""/><img class="blue-logo" src="images/medfin-logo.svg" height="27" alt=""/></a>
  <form class="form-inline my-2 my-lg-0">
	<a class="btn btn-call" href="tel:{{$contact ?? '7026200200'}}"><span class="btn-call-icon"></span> {{$contact ?? '7026200200'}}</a>
     
	<a class="btn btn-appointment" href="javascript:void(0)" data-toggle="modal" data-target="#appointment-form"><span class="btn-appointment-icon"></span> Book Appointment</a>
   </form>
   <!--page status-->
   @if(Session::get('user_role') == 'Admin')
   <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle btn bg-warning text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Page Status
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<h6 class="dropdown-item @if($service->page_status == 0) bg-danger @else bg-success @endif">@if($service->page_status == 0)<span class="text-light"> Draft Mode</span> @else <span class="text-light"> Publish Mode </span> @endif</h6>
				@if ($service->page_status == 0)
	             <a class="dropdown-item" data-toggle="modal" data-target="#activatemodal{{$service->id ?? ''}}"><i class="fa fa-upload mr-2"></i>Publish</a>
					@else
					<a class="dropdown-item"  data-toggle="modal"
					data-target="#deactivatemodal{{$service->id ?? ''}}"><i class="fa fa-exclamation-triangle mr-2"></i>  Draft Mode</a>
		         @endif
                  <a class="dropdown-item" data-toggle="modal" data-target="#Archivemodal{{$service->id ?? ''}}"><i class="fa fa-trash mr-2"></i>Archive</a>
               
				</div>
              </li>
            </ul>
	@endif
	<!--page status--->
            @if(Session::has('user_id'))
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img class="avatar" src="{{asset('app-assets/img/portrait/small/user.jpg')}}" alt="avatar"
                    height="35" width="35">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item">{{Session::get('first_name')}} {{Session::get('last_name')}}</a>
                  @if(Session::get('user_role') == 'Admin')
                  <a class="dropdown-item" href="{{URL('/admin/dashboard')}}">
                    Dashboard</a>
                  <a class="dropdown-item" href="{{URL('/admin/profile')}}"> Edit Profile</a>
                  @endif
                  <a class="dropdown-item" href="{{URL('/admin/logout')}}"> Logout</a>
                </div>
              </li>
            </ul>
            @endif
</div>
</nav>
<!-- Navbar Ends -->
{{-- Status Activate Modal --}}
                            <div class="modal fade" id="activatemodal{{$service->id ?? ''}}" tabindex="-1"
                                role="dialog" aria-labelledby="#activatemodallabel{{$service->id ?? ''}}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-confirm modal-sm" style="background: #eda645 !important;outline: none; color: #434e65;">
									<div class="modal-content" style="padding: 20px;font-size: 16px;border-radius: 5px;border-bottom: 5px solid #1ec22b;">
									<div class="modal-header justify-content-center" style="background: #1ec22b;border-bottom: none;   position: relative;text-align: center;margin: -20px -20px 0;border-radius: 5px 5px 0 0;">
										<div class="icon-box" style="color: #fff;width: 95px; height: 95px;display: inline-block; border-radius: 50%; z-index: 9; border: 5px solid #fff; padding: 15px; text-align: center;">
										<i class="fa fa-upload" style="font-size: 58px;"></i>
										</div>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 15px; right: 15px; color: #fff;">&times;</button>
									</div>
										<div class="modal-body text-center">
											<p id="fail_modal_text_section">
												<div>
													<p class="text-center big text-green">Are You Sure To Publish Page?</p>
												</div>
												<form action="{{ route('/page_publish') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">No</button>
                                                    <input type="text" name="service_id" value="{{$service->id ?? ''}}"
                                                        hidden>
                                                    <input type="text" name="deactivate" value="Activate" hidden>
                                                    <button type="submit" class="btn btn-danger ml-2">Yes</button>
												</form>
										</p>
									</div>
									</div>
								</div>
                            </div>
                            {{-- End of Activate Status modal --}}
                            {{-- Status deactivate Modal --}}
                            <div class="modal fade" id="deactivatemodal{{$service->id ?? ''}}" tabindex="-1"
                                role="dialog" aria-labelledby="#deactivatemodallabel{{$service->id ?? ''}}"
                                aria-hidden="true">
								<div class="modal-dialog modal-confirm modal-sm" style="margin-top: 50px; color:#ffc107;">
								<div class="modal-content" style="padding: 20px;font-size: 16px;border-radius: 5px;border-bottom: 5px solid #dc3545;">
								<div class="modal-header justify-content-center" style="background:#ffc107;border-bottom: none;   position: relative;text-align: center;margin: -20px -20px 0;border-radius: 5px 5px 0 0;">
									<div class="icon-box" style="color: #fff;   width: 90px;height: 90px;display: inline-block;border-radius: 50%;z-index: 9;border: 5px solid #fff;padding: 15px;text-align: center;">
									<i class="fa fa-exclamation-triangle" style="font-size: 50px;"></i>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 15px; right: 15px; color: #fff;">&times;</button>
								</div>
									<div class="modal-body text-center">
											<div class="alert flex-center">
												<p class="text-center big text-danger">Are You Sure to Deactivate Page ?</p>
												<form action="{{ route('/page_publish') }}" method="POST">
														@csrf
														<button type="button" class="btn btn-primary"
															data-dismiss="modal">No</button>
														<input type="text" name="service_id" value="{{$service->id ?? ''}}"
															hidden>
														<input type="text" name="deactivate" value="Deactivate" hidden>
														<button type="submit" class="btn btn-danger ml-2">Yes</button>
												</form>
											</div>
									</div>
									</div>
								</div>
                            </div>
                            {{-- End of deactivate Status modal --}}
							{{-- Status archive Modal --}}
	                        <div class="modal fade" id="Archivemodal{{$service->id ?? ''}}" tabindex="-1"
                                role="dialog" aria-labelledby="#Archivemodallabel{{$service->id ?? ''}}"
                                aria-hidden="true">
                              
								<div class="modal-dialog modal-confirm modal-sm" style="margin-top: 50px; color: #434e65;">
									<div class="modal-content" style="padding: 20px;font-size: 16px;border-radius: 5px;border-bottom: 5px solid #dc3545;">
									<div class="modal-header justify-content-center bg-danger" style="background: #e85e6c;border-bottom: none;   position: relative;text-align: center;margin: -20px -20px 0;border-radius: 5px 5px 0 0;">
										<div class="icon-box" style="color: #fff;   width: 90px;height: 90px;display: inline-block;border-radius: 50%;z-index: 9;border: 5px solid #fff;padding: 15px;text-align: center;">
										<i class="fa fa-trash" style="font-size: 51px;"></i>
									</div>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 15px; right: 15px; color: #fff;">&times;</button>
								</div>
									<div class="modal-body text-center">
											<div class="alert flex-center">
												<p class="text-center big text-danger">Are You Sure to Delete This Page ?</p>
												<form action="{{ route('/page_archive') }}" method="POST">
														@csrf
														<button type="button" class="btn btn-primary"
															data-dismiss="modal">No</button>
														<input type="text" name="service_id" value="{{$service->id ?? ''}}"
															hidden>
														<input type="text" name="deactivate" value="Activate" hidden>
														<button type="submit" class="btn btn-danger ml-2">Yes</button>
												</form>
											</div>
									</div>
									</div>
								</div>
                            </div>
                            {{-- End of archive Status modal --}}
@if (!empty($banner))
@if ($banner->Deactivate == 0)	
<div style="background-color: #fff;" class="container-fluid navbar-positioning"></div>

<!-- Banner Ends -->
<section id="about" class="container-fluid home-banner">
	<div class="container align-items-center">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div>
                <img src="https://medfincms.s3.ap-south-1.amazonaws.com/{{ $banner->image ?? ''}}" alt="Banner Image" class="banner-img" style="width:100%;">
                </div>
			</div>
			<div class="col-md-6 banner-text">
				<h1>{{$banner->tittle}}</h1>
				<p>{{$banner->description}}</p>
				<!-- <h1>Get rid of your glasses in 10 minutes with a Lasik Surgery</h1>
				<p>Quick and precise Lasik surgery procedures help you correct your vision within minutes</p> -->
			{{--	{{dd($service)}} --}}
			</div>
		</div>
		
	</div>
</section>	
@endif
@endif
@if(Session::get('user_role') == 'Admin')
<!-- Banner edit  Starts -->
<section id="about" class="container-fluid home-banner">
	<div class="container align-items-center" id="myDIV">
		<div class="row align-items-center">
			<div class="col-md-5">
				<div>
                <form action="{{route('master.banner')}}"
                method="POST"  enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$banner->Banner_ID ?? ''}}" hidden>
				<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
                <img id="blah" src="{{asset('medfin/images/banner-img.jpg')}}"  class="banner-img" style="width: 90%;">
                <input type='file' name="image" onchange="readURL(this);" class="form-control mt-2" />
                <!-- <img src="{{asset('medfin/images/banner-img.jpg')}}" class="banner-img" width="99%"> -->
                </div>
			</div>
			<div class="col-md-5 banner-text">
	
				<input class="form-control mb-2"
				name="banner_tittle" value="{{$banner->tittle ?? ''}}"
				required>
                <Textarea class="form-control"
				name="banner_description"
				required>{{$banner->description ?? ''}}</textarea>
				<div class="text-center mt-3">
                    <button type="submit" class="btn btn-success" >Update</button>
			
                </div>
			</div>
		   </form>
		   @if (!empty($banner))
		   <div class="col-md-2">
		   @if ($banner->Deactivate == 1)
						<button class="btn btn-sm shadow-sm btn-success text-nowrap" data-toggle="modal"
							data-target="#activatemodal{{ $banner->Banner_ID ?? ''}}">
							 Activate
						</button>
					@else
						<button class="btn btn-sm shadow-sm btn-danger text-nowrap" data-toggle="modal"
							data-target="#deactivatemodal{{ $banner->Banner_ID ?? ''}}">
							Deactivate
						</button>
					@endif
			</div>
				{{-- Status Activate Modal --}}
                            <div class="modal fade" id="activatemodal{{ $banner->Banner_ID ?? ''}}" tabindex="-1"
                                role="dialog" aria-labelledby="#activatemodallabel{{ $banner->Banner_ID }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content modal-sm">
                                        <div class="modal-body rounded">
										<button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br>
											<h5 class="text-primary">Are you Sure to Activate ?</h5>
                                            <div class="group d-flex justify-content-center">
                                                <form action="{{ route('/banner_status') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn-sm btn-danger"
                                                        data-dismiss="modal">No</button>
                                                    <input type="text" name="Banner_ID" value="{{ $banner->Banner_ID ?? '' }}"
                                                        hidden>
                                                    <input type="text" name="deactivate" value="Activate" hidden>
                                                    <button type="submit" class="btn-sm btn-primary ml-2">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of Activate Status modal --}}

                            {{-- Status deactivate Modal --}}
                            <div class="modal fade" id="deactivatemodal{{ $banner->Banner_ID }}" tabindex="-1"
                                role="dialog" aria-labelledby="#deactivatemodallabel{{ $banner->Banner_ID }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body rounded">
										<button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br>
											<h5 class="text-primary">Are you Sure to Deactivate</h5>
                                            <div class="group d-flex justify-content-center">
                                                <form action="{{ route('/banner_status') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class=" btn-sm btn-danger"
                                                        data-dismiss="modal">No</button>
                                                    <input type="text" name="Banner_ID" value="{{ $banner->Banner_ID ?? ''}}"
                                                        hidden>
                                                    <input type="text" name="deactivate" value="Deactivate" hidden>
                                                    <button type="submit" class="btn-sm btn-primary ml-2">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of deactivate Status modal --}}
				@endif
		</div>
	</div>
</section>


<!--banner edit---->	
@endif
<!-- Top Form Starts -->
<section class="container-fluid top-form d-none d-lg-block">
	<div class="container">
		
	<div class="row justify-content-center">
		<div class="col-md-12">
			<form class="form-holder" name="myForm">
						<div class="row align-items-center">
							<div class="form-group col-lg-4">
								<div style="position: absolute; top: 13px; left: 20px;"><img src="{{ asset('medfin/images/user.svg') }}" alt="" width="20" class="left"></div>
								<input type="text" class="form-control border-0" name="Name" id="Name" placeholder="Name">
							</div>
							<div class="form-group col-lg-4">
								<div style="position: absolute; top: 13px; left: 20px;"><img src="{{ asset('medfin/images/mobile.svg') }}" alt="" width="20" class="left"></div>
								<input style="display: block;" class="form-control border-0" id="phone1" name="phone1" type="tel" placeholder="Mobile Number">
							</div>
							
							
							<div class="form-group col-lg-4 text-right">
								<button type="button" class="btn btn-danger btn-lg text-center">Book a Free Consultation</button>
							</div>
						</div>
					</form>
		</div>
	</div>
		
	</div>
</section>
<!-- Top Form Ends -->
	
	
	
<!-- USPs Starts-->
<section class="container-fluid main-usps">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="main-usps-inner">
			<div class="row justify-content-center">
			<div class="col-6 col-md-3 item">
				<div class="media align-items-center">
						<div class="icon1 d-none d-md-block"></div>
						<div class="media-body">
							<h3>50,000+</h3>
							<h4>Happy Patients</h4>
						</div>
					</div>
			</div>
			<div class="col-6 col-md-3 item">
				<div class="media align-items-center">
						<div class="icon2 d-none d-md-block"></div>
						<div class="media-body">
							<h3>100+</h3>
							<h4>Expert Surgeons</h4>
						</div>
					</div>
			</div>
			<div class="col-6 col-md-3 item">
				<div class="media align-items-center">
						<div class="icon3 d-none d-md-block"></div>
						<div class="media-body">
							<h3>50+</h3>
							<h4>Partner Hospitals</h4>
						</div>
					</div>
			</div>
			<div class="col-6 col-md-3 item">
				<div class="media align-items-center">
						<div class="icon4 d-none d-md-block"></div>
						<div class="media-body">
							<h3>100%</h3>
							<h4>Latest Procedures</h4>
						</div>
					</div>
			</div>
		</div>
		</div>
			</div>
		</div>
	</div>
</section>
<!-- USPs Ends -->
@if (!empty($overview))
@if ($overview->Deactivate == 0)
<!-- Why This Surgery Section Starts -->
<section class="container-fluid why-this-surgery">
<div class="container">	
	<div class="row">
				<div class="col-md-6 hero d-none d-md-block">
					<img src="https://medfincms.s3.ap-south-1.amazonaws.com/{{ $overview->image ?? ''}}" alt="Overview Image" class="img-fluid">
				</div>
				<div class="col-md-6">
					<h2>{{$overview->tittle ?? '' }}?</h2>
					<span class="hero d-md-none"><img src="images/why_surgery.jpg" class="img-fluid"></span>
					<!-- <p>Here is why you should opt for a FEMTO Lasik surgery from Medfin.</p>
					<ul>
						<li>Bladeless Lasik Surgery (FEMTO) that is highly precise</li>
						<li>The minimal risk involved in the surgery</li>
						<li>Extremely precise surgery performed by experienced surgeons</li>
						<li>Fast recovery (within 2-3 days)</li>
						<li>Surgery only takes 5-10 minutes to get completed</li>
					</ul> -->
					{!! $overview->description ?? '' !!}
				</div>
	</div>
</div>	
</section>
@endif
@endif

<!-- Why This Surgery Section Ends -->
@if(Session::get('user_role') == 'Admin')
<!-- Why This Surgery Section Starts edit-->
<section class="container-fluid why-this-surgery">
	<div class="container" id="myDIV">
		
	<div class="row">
		<div class="col-md-5 hero d-none d-md-block">
                <form action="{{route('master.overview')}}"
                method="POST"  enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{ $overview->Overview_ID  ?? '' }}" hidden>
				<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
				
                <!-- @if (Session::get('id'))
                <img id="surgery" @if($surgery[0]->image ?? '')  src="{{asset('/storage/surgery')}}/{{$surgery[0]->image ?? ''}}" @else src="https://www.elegantthemes.com/blog/wp-content/uploads/2014/10/UploadLimit-Header.png" @endif  class="img-fluid" style="width: 90%;">
                <input type='file' name="image" onchange="readURL(this);" class="form-control" />
                @else -->
                <!-- <img src="{{asset('medfin/images/banner-img.jpg')}}" class="img-fluid">
                @endif -->
					<!-- <img src="{{ asset('medfin/images/why_surgery.jpg') }}" class="img-fluid"> -->
					<img id="over" src="{{ asset('medfin/images/why_surgery.jpg') }}" height="120" class="img-fluid"/>
					<input type="file" id="overview" name="image">
		</div>
		<div class="col-md-5">
                <input class="form-control mb-2" name="overview_tittle" value="{{$overview->tittle ?? '' }}">
                    <textarea name="overview_description" id="overview_description" placeholder="Enter Content" style="background-color: white;">{{$overview->description ?? '' }}</textarea>
                    <div class="text-center mt-3">
                      <button type="submit" class="btn btn-success" >Update</button>
                    </div>  
         </div>  
                </form> 
				@if (!empty($overview))
				<div class="col-md-2">
				@if ($overview->Deactivate == 1)
						<button class="btn btn-sm shadow-sm btn-success text-nowrap" data-toggle="modal"
							data-target="#activateoverview{{ $overview->Overview_ID }}">
							 Activate
						</button>
					@else
						<button class="btn btn-sm shadow-sm btn-danger text-nowrap" data-toggle="modal"
							data-target="#deactivateoverview{{ $overview->Overview_ID }}">
							 Deactivate
						</button>
					@endif
				</div>  
				{{-- Status Activate Modal --}}
                            <div class="modal fade" id="activateoverview{{ $overview->Overview_ID }}" tabindex="-1"
                                role="dialog" aria-labelledby="#activateoverviewlabel{{ $overview->Overview_ID }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-sm">
                                        <div class="modal-body rounded">
										<button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br>
											<h5 class="text-primary">Are you Sure to Activate ?</h5>
                                            <div class="group d-flex justify-content-center">
                                                <form action="{{ route('/overview_status') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-info"
                                                        data-dismiss="modal">No</button>
                                                    <input type="text" name="Overview_ID" value="{{ $overview->Overview_ID }}"
                                                        hidden>
                                                    <input type="text" name="deactivate" value="Activate" hidden>
                                                    <button type="submit" class="btn  btn-success ml-2">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of Activate Status modal --}}

                            {{-- Status deactivate Modal --}}
                            <div class="modal fade" id="deactivateoverview{{ $overview->Overview_ID }}" tabindex="-1"
                                role="dialog" aria-labelledby="#deactivateoverviewlabel{{ $overview->Overview_ID }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body rounded">
										<button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br>
											<h5 class="text-primary">Are you Sure to Deactivate</h5>
                                            <div class="group d-flex justify-content-center mt-4">
                                                <form action="{{ route('/overview_status') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-info"
                                                        data-dismiss="modal">No</button>
                                                    <input type="text" name="Overview_ID" value="{{ $overview->Overview_ID ?? '' }}"
                                                        hidden>
                                                    <input type="text" name="deactivate" value="Deactivate" hidden>
                                                    <button type="submit" class="btn  btn-danger ml-2">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of deactivate Status modal --}}
				@endif               
		</div>
	</div>
</div>	
</section>

<!-- Why This Surgery Section Ends -->	
@endif	

@if (!empty($treatment))
@if ($treatment->Deactivate == 0)	
<!-- Diagnosis Section Starts -->
<section class="container-fluid diagnosis ash-bg">
	<div class="container">
		
	<div class="row">
				<div class="col-12">
					<h2>{{$treatment->heading ?? ''}}</h2>
				</div>
				<div class="col-md-5">
					{!! $treatment->description ?? ''!!}
					<!-- <p>An eye specialist (opthalmologist) diagnoses refractive disorders in your eyes with the help of certain diagnostic tests. These tests may include:</p>
					<p>Visual acuity test- You are made to read a vision chart. The doctor then tries on different lenses to determine where your vision needs correction.</p>
					<p>Retinoscopy- This test helps determine the refractive errors in the eye. It is mandatory before a Lasik procedure.</p>
					<p>Corneal topography- This is a computer test that analyses any disorders in the eye.</p>
					<p>Tonometry- This diagnostic test checks for eye pressure.</p>
					<p>The ophthalmologist may also perform tests to check for dryness in the eyes.</p> -->
				</div>
				<div class="col-md-7 rhs">
					<h3>{{$treatment->subheading ?? ''}}:</h3>
					<div class="faq" id="accordion">
					@if (!empty($treatment->acc_head_1 ?? ''))
					<div class="card">
								<div class="card-header" id="headingOne">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapsetest1" aria-expanded="false" aria-controls="collapsetest1">
									  <h4>{{$treatment->acc_head_1 ?? ''}}:</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapsetest1" class="collapse" aria-labelledby="collapsetest1" data-parent="#accordion">
								  <div class="card-body">
									  <div class="row align-items-center">
									  	<div class="col-12">
										  <p>{{$treatment->paragraph1 ?? ''}}</p>
											  <ul>
											  @if (!empty($treatment->bullet1))
											  <li><strong>{{$treatment->bullet1 ?? ''}}</strong><br>{{$treatment->content1 ?? ''}}</li>
												@endif
												@if (!empty($treatment->bullet2 ?? ''))
											  <li><strong>{{$treatment->bullet2 ?? ''}}</strong><br>{{$treatment->content2 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet3 ?? '')) 
											  <li><strong>{{$treatment->bullet3 ?? ''}}</strong><br>{{$treatment->content3 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet4 ?? '')) 
											  <li><strong>{{$treatment->bullet4 ?? ''}}</strong><br>{{$treatment->content4 ?? ''}}</li>
											  @endif
											  @if (!empty($treatment->bullet5 ?? ''))  
											  <li><strong>{{$treatment->bullet5 ?? ''}}</strong><br>{{$treatment->content5 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  <!---1-->
							  @endif
							  @if (!empty($treatment->acc_head_2 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingOne">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapsetest2" aria-expanded="false" aria-controls="collapsetest2">
									  <h4>{{$treatment->acc_head_2 ?? ''}}:</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapsetest2" class="collapse" aria-labelledby="collapsetest2" data-parent="#accordion">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
										  <p>{{$treatment->paragraph2 ?? ''}}</p>
											  <ul>
											  @if (!empty($treatment->bullet11))
											  <li><strong>{{$treatment->bullet11 ?? ''}}</strong><br>{{$treatment->content11 ?? ''}}</li>
												@endif
												@if (!empty($treatment->bullet22 ?? ''))
											  <li><strong>{{$treatment->bullet22 ?? ''}}</strong><br>{{$treatment->content22 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet33 ?? '')) 
											  <li><strong>{{$treatment->bullet33 ?? ''}}</strong><br>{{$treatment->content33 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet44 ?? '')) 
											  <li><strong>{{$treatment->bullet44 ?? ''}}</strong><br>{{$treatment->content44 ?? ''}}</li>
											  @endif
											  @if (!empty($treatment->bullet55 ?? ''))  
											  <li><strong>{{$treatment->bullet55 ?? ''}}</strong><br>{{$treatment->content55 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  <!---2-->
							  @endif
							  @if (!empty($treatment->acc_head_3 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingOne">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapsetest3" aria-expanded="false" aria-controls="collapsetest3">
									  <h4>{{$treatment->acc_head_3 ?? ''}}:</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapsetest3" class="collapse" aria-labelledby="collapsetest3" data-parent="#accordion">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
										  <p>{{$treatment->paragraph3 ?? ''}}</p>
										  
											  <ul>
											   @if (!empty($treatment->bullet111))
											  <li><strong>{{$treatment->bullet111 ?? ''}}</strong><br>{{$treatment->content111 ?? ''}}</li>
												@endif
												@if (!empty($treatment->bullet222 ?? ''))
											  <li><strong>{{$treatment->bullet222 ?? ''}}</strong><br>{{$treatment->content222 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet333 ?? '')) 
											  <li><strong>{{$treatment->bullet333 ?? ''}}</strong><br>{{$treatment->content333 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet444 ?? '')) 
											  <li><strong>{{$treatment->bullet444 ?? ''}}</strong><br>{{$treatment->content444 ?? ''}}</li>
											  @endif
											  @if (!empty($treatment->bullet555 ?? ''))  
											  <li><strong>{{$treatment->bullet555 ?? ''}}</strong><br>{{$treatment->content555 ?? ''}}</li>
											  @endif
											</ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  <!---3-->
							  @endif
							  @if (!empty($treatment->acc_head_4 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingOne">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									  <h4>{{$treatment->acc_head_4 ?? ''}}:</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
										  <p>{{$treatment->paragraph4 ?? ''}}</p>
											  <ul>
											  @if (!empty($treatment->bullet1111))
											  <li><strong>{{$treatment->bullet1111 ?? ''}}</strong><br>{{$treatment->content1111 ?? ''}}</li>
												@endif
												@if (!empty($treatment->bullet2222 ?? ''))
											  <li><strong>{{$treatment->bullet2222 ?? ''}}</strong><br>{{$treatment->content2222 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet3333 ?? '')) 
											  <li><strong>{{$treatment->bullet3333 ?? ''}}</strong><br>{{$treatment->content3333 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet4444 ?? '')) 
											  <li><strong>{{$treatment->bullet4444 ?? ''}}</strong><br>{{$treatment->content4444 ?? ''}}</li>
											  @endif
											  @if (!empty($treatment->bullet5555 ?? ''))  
											  <li><strong>{{$treatment->bullet5555 ?? ''}}</strong><br>{{$treatment->content5555 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  @endif
							  @if (!empty($treatment->acc_head_5 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingTwo">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  <h4>{{$treatment->acc_head_5 ?? ''}}:</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$treatment->paragraph5 ?? ''}}</p>
											  <ul>
											  @if (!empty($treatment->bullet11111))
											  <li><strong>{{$treatment->bullet11111 ?? ''}}</strong><br>{{$treatment->content11111 ?? ''}}</li>
												@endif
												@if (!empty($treatment->bullet22222 ?? ''))
											  <li><strong>{{$treatment->bullet22222 ?? ''}}</strong><br>{{$treatment->content22222 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet33333 ?? '')) 
											  <li><strong>{{$treatment->bullet33333 ?? ''}}</strong><br>{{$treatment->content33333 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet44444 ?? '')) 
											  <li><strong>{{$treatment->bullet44444 ?? ''}}</strong><br>{{$treatment->content44444 ?? ''}}</li>
											  @endif
											  @if (!empty($treatment->bullet55555 ?? ''))  
											  <li><strong>{{$treatment->bullet55555 ?? ''}}</strong><br>{{$treatment->content55555 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  @endif
                              @if (!empty($treatment->acc_head_6 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingThree">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									  <h4>{{$treatment->acc_head_6 ?? ''}}:</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$treatment->paragraph6 ?? ''}}</p>
											  <ul>
											  @if (!empty($treatment->bullet111111))
											  <li><strong>{{$treatment->bullet111111 ?? ''}}</strong><br>{{$treatment->content111111 ?? ''}}</li>
												@endif
												@if (!empty($treatment->bullet222222 ?? ''))
											  <li><strong>{{$treatment->bullet222222 ?? ''}}</strong><br>{{$treatment->content222222 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet333333 ?? '')) 
											  <li><strong>{{$treatment->bullet333333 ?? ''}}</strong><br>{{$treatment->content333333 ?? ''}}</li>
												 @endif
												 @if (!empty($treatment->bullet444444 ?? '')) 
											  <li><strong>{{$treatment->bullet444444 ?? ''}}</strong><br>{{$treatment->content444444 ?? ''}}</li>
											  @endif
											  @if (!empty($treatment->bullet555555 ?? ''))  
											  <li><strong>{{$treatment->bullet555555 ?? ''}}</strong><br>{{$treatment->content555555 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
                              @endif
				</div>
				</div>
	</div>
		
	
	</div>	
</section>
<!-- Diagnosis Section Ends -->
@endif
@endif
@if(Session::get('user_role') == 'Admin')
<!-- Diagnosis Section Edit Starts -->
<section class="container-fluid diagnosis ash-bg">
	<div class="container">	
	<form action="{{route('master.treatment')}}" method="POST">
	@csrf
	<input type="text" name="id" value="{{ $treatment->Treatment_ID  ?? '' }}" hidden>
	<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
	<div class="row">
				<div class="col-12">
				<div class="form-group">
					<label for="title">Heading</label>
					<input type="text"  name="treatment_heading" class="form-control" value="{{$treatment->heading ?? ''}}"
						Required>
				</div>
				</div>
				<div class="col-md-5">
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="treatment_description">{!! $treatment->description ?? ''!!}</textarea>
				</div>
				</div>
				<div class="col-md-7 rhs">
				<div class="form-group">
					<label for="heading">Subheading</label>
					<input type="text"  name="subheading" class="form-control" value="{{$treatment->subheading ?? ''}}"
						Required>
				</div>
				<input class="toggle-box" id="acc-head-1" type="checkbox">
					<label for="acc-head-1">Accordion 1</label>
				<div class="row toggle-box-content">
						<div class="form-group">
							<label for="heading">Accordion Heading 1</label>
							<input type="text" name="acc_head_1" class="form-control" placeholder="Accordion Tittle" value="{{$treatment->acc_head_1 ?? ''}}">
							<textarea type="text"  name="paragraph1" class="form-control" placeholder="Accordion paragraph">{{$treatment->paragraph1 ?? ''}}</textarea>
							<!--bullet1-->
							<input class="toggle-box" id="bullet-1" type="checkbox">
							<label for="bullet-1">Bullet 1</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet1" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet1 ?? ''}}">
									<textarea type="text"  name="content1" class="form-control" placeholder="Bullet Content">{{$treatment->content1 ?? ''}}</textarea>
								</div> 
								<!--bullet2-->
							<input class="toggle-box" id="bullet-2" type="checkbox">
							<label for="bullet-2">Bullet 2</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet2" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet2 ?? ''}}" >
									<textarea type="text"  name="content2" class="form-control" placeholder="Bullet Content">{{$treatment->content2 ?? ''}}</textarea>
								</div>
								<!--bullet3-->
							<input class="toggle-box" id="bullet-3" type="checkbox">
							<label for="bullet-3">Bullet 3</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet3" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet3 ?? ''}}" >
									<textarea type="text"  name="content3" class="form-control" placeholder="Bullet Content">{{$treatment->content3 ?? ''}}</textarea>
								</div>
								<!--bullet4-->
							<input class="toggle-box" id="bullet-4" type="checkbox">
							<label for="bullet-4">Bullet 4</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet4" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet4 ?? ''}}">
									<textarea type="text"  name="content4" class="form-control" placeholder="Bullet Content">{{$treatment->content4 ?? ''}}</textarea>
								</div>
								<!--bullet5-->
							<input class="toggle-box" id="bullet-5" type="checkbox">
							<label for="bullet-5">Bullet 5</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet5" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet5 ?? ''}}">
									<textarea type="text"  name="content5" class="form-control" placeholder="Bullet Content">{{$treatment->content5 ?? ''}}</textarea>
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
							<input type="text" name="acc_head_2" class="form-control" placeholder="Accordion Tittle" value="{{$treatment->acc_head_2 ?? ''}}" >
							<textarea type="text"  name="paragraph2" class="form-control" placeholder="Accordion paragraph">{{$treatment->paragraph2 ?? ''}}</textarea>
							<!--bullet1-->
							<input class="toggle-box" id="bullet-11" type="checkbox">
							<label for="bullet-11">Bullet 1</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet11" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet11 ?? ''}}">
									<textarea type="text"  name="content11" class="form-control" placeholder="Bullet Content">{{$treatment->content11 ?? ''}}</textarea>
								</div> 
								<!--bullet2-->
							<input class="toggle-box" id="bullet-22" type="checkbox">
							<label for="bullet-22">Bullet 2</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet22" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet22 ?? ''}}">
									<textarea type="text"  name="content22" class="form-control" placeholder="Bullet Content">{{$treatment->content22 ?? ''}}</textarea>
								</div>
								<!--bullet3-->
							<input class="toggle-box" id="bullet-33" type="checkbox">
							<label for="bullet-33">Bullet 3</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet33" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet33 ?? ''}}">
									<textarea type="text"  name="content33" class="form-control" placeholder="Bullet Content">{{$treatment->content33 ?? ''}}</textarea>
								</div>
								<!--bullet4-->
							<input class="toggle-box" id="bullet-44" type="checkbox">
							<label for="bullet-44">Bullet 4</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet44" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet44 ?? ''}}">
									<textarea type="text"  name="content44" class="form-control" placeholder="Bullet Content">{{$treatment->content44 ?? ''}}</textarea>
								</div>
								<!--bullet5-->
							<input class="toggle-box" id="bullet-55" type="checkbox">
							<label for="bullet-55">Bullet 5</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet55" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet55 ?? ''}}">
									<textarea type="text"  name="content55" class="form-control" placeholder="Bullet Content">{{$treatment->content55 ?? ''}}</textarea>
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
							<input type="text" name="acc_head_3" class="form-control" placeholder="Accordion Tittle" value="{{$treatment->acc_head_3 ?? ''}}">
							<textarea type="text"  name="paragraph3" class="form-control" placeholder="Accordion paragraph">{{$treatment->paragraph3 ?? ''}}</textarea>
							<!--bullet1-->
							<input class="toggle-box" id="bullet-111" type="checkbox">
							<label for="bullet-111">Bullet 1</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet111" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet111 ?? ''}}">
									<textarea type="text"  name="content111" class="form-control" placeholder="Bullet Content">{{$treatment->content111 ?? ''}}</textarea>
								</div> 
								<!--bullet2-->
							<input class="toggle-box" id="bullet-222" type="checkbox">
							<label for="bullet-222">Bullet 2</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet222" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet222 ?? ''}}">
									<textarea type="text"  name="content222" class="form-control" placeholder="Bullet Content">{{$treatment->content222 ?? ''}}</textarea>
								</div>
								<!--bullet3-->
							<input class="toggle-box" id="bullet-333" type="checkbox">
							<label for="bullet-333">Bullet 3</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet333" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet333 ?? ''}}">
									<textarea type="text"  name="content333" class="form-control" placeholder="Bullet Content">{{$treatment->content333 ?? ''}}</textarea>
								</div>
								<!--bullet4-->
							<input class="toggle-box" id="bullet-444" type="checkbox">
							<label for="bullet-444">Bullet 4</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet444" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet444 ?? ''}}">
									<textarea type="text"  name="content444" class="form-control" placeholder="Bullet Content">{{$treatment->content444 ?? ''}}</textarea>
								</div>
								<!--bullet5-->
							<input class="toggle-box" id="bullet-555" type="checkbox">
							<label for="bullet-555">Bullet 5</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet555" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet555 ?? ''}}">
									<textarea type="text"  name="content555" class="form-control" placeholder="Bullet Content">{{$treatment->content555 ?? ''}}</textarea>
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
							<input type="text" name="acc_head_4" class="form-control" placeholder="Accordion Tittle" value="{{$treatment->acc_head_4 ?? ''}}">
							<textarea type="text"  name="paragraph4" class="form-control" placeholder="Accordion paragraph">{{$treatment->paragraph4 ?? ''}}</textarea>
							<!--bullet1-->
							<input class="toggle-box" id="bullet-1111" type="checkbox">
							<label for="bullet-1111">Bullet 1</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet1111" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet1111 ?? ''}}">
									<textarea type="text"  name="content1111" class="form-control" placeholder="Bullet Content">{{$treatment->content1111 ?? ''}}</textarea>
								</div> 
								<!--bullet2-->
							<input class="toggle-box" id="bullet-2222" type="checkbox">
							<label for="bullet-2222">Bullet 2</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet2222" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet2222 ?? ''}}">
									<textarea type="text"  name="content2222" class="form-control" placeholder="Bullet Content">{{$treatment->content2222 ?? ''}}</textarea>
								</div>
								<!--bullet3-->
							<input class="toggle-box" id="bullet-3333" type="checkbox">
							<label for="bullet-3333">Bullet 3</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet3333" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet3333 ?? ''}}">
									<textarea type="text"  name="content3333" class="form-control" placeholder="Bullet Content">{{$treatment->content3333 ?? ''}}</textarea>
								</div>
								<!--bullet4-->
							<input class="toggle-box" id="bullet-4444" type="checkbox">
							<label for="bullet-4444">Bullet 4</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet4444" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet4444 ?? ''}}">
									<textarea type="text"  name="content4444" class="form-control" placeholder="Bullet Content">{{$treatment->content4444 ?? ''}}</textarea>
								</div>
								<!--bullet5-->
							<input class="toggle-box" id="bullet-5555" type="checkbox">
							<label for="bullet-5555">Bullet 5</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet5555" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet5555 ?? ''}}">
									<textarea type="text"  name="content5555" class="form-control" placeholder="Bullet Content">{{$treatment->content5555 ?? ''}}</textarea>
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
							<input type="text" name="acc_head_5" class="form-control" placeholder="Accordion Tittle" value="{{$treatment->acc_head_5 ?? ''}}">
							<textarea type="text"  name="paragraph5" class="form-control" placeholder="Accordion paragraph">{{$treatment->paragraph5 ?? ''}}</textarea>
							<!--bullet1-->
							<input class="toggle-box" id="bullet-11111" type="checkbox">
							<label for="bullet-11111">Bullet 1</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet11111" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet11111 ?? ''}}" >
									<textarea type="text"  name="content11111" class="form-control" placeholder="Bullet Content">{{$treatment->content11111 ?? ''}}</textarea>
								</div> 
								<!--bullet2-->
							<input class="toggle-box" id="bullet-22222" type="checkbox">
							<label for="bullet-22222">Bullet 2</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet22222" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet22222 ?? ''}}">
									<textarea type="text"  name="content22222" class="form-control" placeholder="Bullet Content">{{$treatment->content22222 ?? ''}}</textarea>
								</div>
								<!--bullet3-->
							<input class="toggle-box" id="bullet-33333" type="checkbox">
							<label for="bullet-33333">Bullet 3</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet33333" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet33333 ?? ''}}">
									<textarea type="text"  name="content33333" class="form-control" placeholder="Bullet Content">{{$treatment->content33333 ?? ''}}</textarea>
								</div>
								<!--bullet4-->
							<input class="toggle-box" id="bullet-44444" type="checkbox">
							<label for="bullet-44444">Bullet 4</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet44444" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet44444 ?? ''}}">
									<textarea type="text"  name="content44444" class="form-control" placeholder="Bullet Content">{{$treatment->content44444 ?? ''}}</textarea>
								</div>
								<!--bullet5-->
							<input class="toggle-box" id="bullet-55555" type="checkbox">
							<label for="bullet-55555">Bullet 5</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet55555" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet55555 ?? ''}}">
									<textarea type="text"  name="content55555" class="form-control" placeholder="Bullet Content">{{$treatment->content55555 ?? ''}}</textarea>
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
							<input type="text" name="acc_head_6" class="form-control" placeholder="Accordion Tittle" value="{{$treatment->acc_head_6 ?? ''}}">
							<textarea type="text"  name="paragraph6" class="form-control" placeholder="Accordion paragraph">{{$treatment->paragraph6 ?? ''}}</textarea>
							<!--bullet1-->
							<input class="toggle-box" id="bullet-111111" type="checkbox">
							<label for="bullet-111111">Bullet 1</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet111111" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet111111 ?? ''}}">
									<textarea type="text"  name="content111111" class="form-control" placeholder="Bullet Content">{{$treatment->content111111 ?? ''}}</textarea>
								</div> 
								<!--bullet2-->
							<input class="toggle-box" id="bullet-222222" type="checkbox">
							<label for="bullet-222222">Bullet 2</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet222222" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet222222 ?? ''}}">
									<textarea type="text"  name="content222222" class="form-control" placeholder="Bullet Content">{{$treatment->content222222 ?? ''}}</textarea>
								</div>
								<!--bullet3-->
							<input class="toggle-box" id="bullet-333333" type="checkbox">
							<label for="bullet-333333">Bullet 3</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet333333" class="form-control" placeholder="Bullet Tittle"  value="{{$treatment->bullet333333 ?? ''}}">
									<textarea type="text"  name="content333333" class="form-control" placeholder="Bullet Content">{{$treatment->content333333 ?? ''}}</textarea>
								</div>
								<!--bullet4-->
							<input class="toggle-box" id="bullet-444444" type="checkbox">
							<label for="bullet-444444">Bullet 4</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet444444" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet444444 ?? ''}}">
									<textarea type="text"  name="content444444" class="form-control" placeholder="Bullet Content">{{$treatment->content444444 ?? ''}}</textarea>
								</div>
								<!--bullet5-->
							<input class="toggle-box" id="bullet-555555" type="checkbox">
							<label for="bullet-555555">Bullet 5</label>
								<div class="row toggle-box-content">
								<input type="text" name="bullet555555" class="form-control" placeholder="Bullet Tittle" value="{{$treatment->bullet555555 ?? ''}}">
									<textarea type="text"  name="content555555" class="form-control" placeholder="Bullet Content">{{$treatment->content555555 ?? ''}}</textarea>
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
				</div>
	</div>
			<div class="text-center">
				<button type="submit" class="btn btn-info  my-2">Save Change</button>
			</div>
	</form>
	</div>	
</section>
<!-- Diagnosis Section edit Ends -->	
@endif			
	
	
		
@if (!empty($symptoms))
@if ($symptoms->Deactivate == 0)	
<!-- Meaning of Surgery Section Starts -->
<section class="container-fluid meaning-of-surgery">
	<div class="container">
		
	<div class="row">
				<div class="col-12">
					<h2>{{$symptoms->heading ?? ''}}</h2>
				</div>
				<div class="col-12 main-text">
				{!! $symptoms->description ?? ''!!}
				</div>
				<div class="col-md-6">
					<div class="faq" id="accordion2">
					@if (!empty($symptoms->acc_head_1 ?? ''))
					          <div class="card">
								<div class="card-header" id="headingFour">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
									  <h4>{{$symptoms->acc_head_1 ?? ''}}</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseOne" class="collapse" aria-labelledby="collapseOne" data-parent="#accordion2">
								  <div class="card-body">
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$symptoms->paragraph1 ?? ''}}:</p>
											  <ul>
											  @if (!empty($symptoms->bullet1))
											  <li><strong>{{$symptoms->bullet1 ?? ''}}</strong><br>{{$symptoms->content1 ?? ''}}</li>
												@endif
												@if (!empty($symptoms->bullet2 ?? ''))
											  <li><strong>{{$symptoms->bullet2 ?? ''}}</strong><br>{{$symptoms->content2 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet3 ?? '')) 
											  <li><strong>{{$symptoms->bullet3 ?? ''}}</strong><br>{{$symptoms->content3 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet4 ?? '')) 
											  <li><strong>{{$symptoms->bullet4 ?? ''}}</strong><br>{{$symptoms->content4 ?? ''}}</li>
											  @endif
											  @if (!empty($symptoms->bullet5 ?? ''))  
											  <li><strong>{{$symptoms->bullet5 ?? ''}}</strong><br>{{$symptoms->content5 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
                             @endif
							 @if (!empty($symptoms->acc_head_2 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingFour">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseTest" aria-expanded="false" aria-controls="collapseTest">
									  <h4>{{$symptoms->acc_head_2 ?? ''}}</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseTest" class="collapse" aria-labelledby="collapseTest" data-parent="#accordion2">
								  <div class="card-body">
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$symptoms->paragraph2 ?? ''}}:</p>
											  <ul>
											  @if (!empty($symptoms->bullet11))
											  <li><strong>{{$symptoms->bullet11 ?? ''}}</strong><br>{{$symptoms->content11 ?? ''}}</li>
												@endif
												@if (!empty($symptoms->bullet22 ?? ''))
											  <li><strong>{{$symptoms->bullet22 ?? ''}}</strong><br>{{$symptoms->content22 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet33 ?? '')) 
											  <li><strong>{{$symptoms->bullet33 ?? ''}}</strong><br>{{$symptoms->content33 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet44 ?? '')) 
											  <li><strong>{{$symptoms->bullet44 ?? ''}}</strong><br>{{$symptoms->content44 ?? ''}}</li>
											  @endif
											  @if (!empty($symptoms->bullet55 ?? ''))  
											  <li><strong>{{$symptoms->bullet55 ?? ''}}</strong><br>{{$symptoms->content55 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
                              @endif
							  @if (!empty($symptoms->acc_head_3 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingFour">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									  <h4>{{$symptoms->acc_head_3 ?? ''}}</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="collapseTwo" data-parent="#accordion2">
								  <div class="card-body">
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$symptoms->paragraph3 ?? ''}}:</p>
											  <ul>
											   @if (!empty($symptoms->bullet111))
											  <li><strong>{{$symptoms->bullet111 ?? ''}}</strong><br>{{$symptoms->content111 ?? ''}}</li>
												@endif
												@if (!empty($symptoms->bullet222 ?? ''))
											  <li><strong>{{$symptoms->bullet222 ?? ''}}</strong><br>{{$symptoms->content222 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet333 ?? '')) 
											  <li><strong>{{$symptoms->bullet333 ?? ''}}</strong><br>{{$symptoms->content333 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet444 ?? '')) 
											  <li><strong>{{$symptoms->bullet444 ?? ''}}</strong><br>{{$symptoms->content444 ?? ''}}</li>
											  @endif
											  @if (!empty($symptoms->bullet555 ?? ''))  
											  <li><strong>{{$symptoms->bullet555 ?? ''}}</strong><br>{{$symptoms->content555 ?? ''}}</li>
											  @endif
											</ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
                            @endif
							@if (!empty($symptoms->acc_head_4 ?? ''))
					       <div class="card">
								<div class="card-header" id="headingFour">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#headingThree" aria-expanded="false" aria-controls="headingThree">
									  <h4>{{$symptoms->acc_head_4 ?? ''}}</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="headingThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion2">
								  <div class="card-body">
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$symptoms->paragraph4 ?? ''}}:</p>
											  <ul>
											  @if (!empty($symptoms->bullet1111))
											  <li><strong>{{$symptoms->bullet1111 ?? ''}}</strong><br>{{$symptoms->content1111 ?? ''}}</li>
												@endif
												@if (!empty($symptoms->bullet2222 ?? ''))
											  <li><strong>{{$symptoms->bullet2222 ?? ''}}</strong><br>{{$symptoms->content2222 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet3333 ?? '')) 
											  <li><strong>{{$symptoms->bullet3333 ?? ''}}</strong><br>{{$symptoms->content3333 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet4444 ?? '')) 
											  <li><strong>{{$symptoms->bullet4444 ?? ''}}</strong><br>{{$symptoms->content4444 ?? ''}}</li>
											  @endif
											  @if (!empty($symptoms->bullet5555 ?? ''))  
											  <li><strong>{{$symptoms->bullet5555 ?? ''}}</strong><br>{{$symptoms->content5555 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
								  </div>
								</div>
							  </div>
                             @endif
							 @if (!empty($symptoms->acc_head_5 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingFour">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									  <h4>{{$symptoms->acc_head_5 ?? ''}}</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion2">
								  <div class="card-body">
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$symptoms->paragraph5 ?? ''}}:</p>
											  <ul>
											  @if (!empty($symptoms->bullet11111))
											  <li><strong>{{$symptoms->bullet11111 ?? ''}}</strong><br>{{$symptoms->content11111 ?? ''}}</li>
												@endif
												@if (!empty($symptoms->bullet22222 ?? ''))
											  <li><strong>{{$symptoms->bullet22222 ?? ''}}</strong><br>{{$symptoms->content22222 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet33333 ?? '')) 
											  <li><strong>{{$symptoms->bullet33333 ?? ''}}</strong><br>{{$symptoms->content33333 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet44444 ?? '')) 
											  <li><strong>{{$symptoms->bullet44444 ?? ''}}</strong><br>{{$symptoms->content44444 ?? ''}}</li>
											  @endif
											  @if (!empty($symptoms->bullet55555 ?? ''))  
											  <li><strong>{{$symptoms->bullet55555 ?? ''}}</strong><br>{{$symptoms->content55555 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
                               @endif
							   @if (!empty($symptoms->acc_head_6 ?? ''))
							  <div class="card">
								<div class="card-header" id="headingFive">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									  <h4>{{$symptoms->acc_head_6 ?? ''}}</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion2">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$symptoms->paragraph6 ?? ''}}:</p>
											  <ul>
											  @if (!empty($symptoms->bullet111111))
											  <li><strong>{{$symptoms->bullet111111 ?? ''}}</strong><br>{{$symptoms->content111111 ?? ''}}</li>
												@endif
												@if (!empty($symptoms->bullet222222 ?? ''))
											  <li><strong>{{$symptoms->bullet222222 ?? ''}}</strong><br>{{$symptoms->content222222 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet333333 ?? '')) 
											  <li><strong>{{$symptoms->bullet333333 ?? ''}}</strong><br>{{$symptoms->content333333 ?? ''}}</li>
												 @endif
												 @if (!empty($symptoms->bullet444444 ?? '')) 
											  <li><strong>{{$symptoms->bullet444444 ?? ''}}</strong><br>{{$symptoms->content444444 ?? ''}}</li>
											  @endif
											  @if (!empty($symptoms->bullet555555 ?? ''))  
											  <li><strong>{{$symptoms->bullet555555 ?? ''}}</strong><br>{{$symptoms->content555555 ?? ''}}</li>
											  @endif
											  </ul>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
                            @endif
				</div>
				</div>
				<div class="col-md-6 hero d-none d-md-block">
					<img src="https://medfincms.s3.ap-south-1.amazonaws.com/{{ $symptoms->image ?? ''}}" class="img-fluid">
				</div>
	</div>
		
	
	</div>	
</section>
<!-- Meaning of Surgery Section Ends -->
@endif
@endif
@if(Session::get('user_role') == 'Admin')		
<!-- Meaning of Surgery Section edit Starts -->
<section class="container-fluid meaning-of-surgery">
	<div class="container">	
	<form action="{{route('master.symptoms')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="text" name="id" value="{{ $symptoms->Symptoms_ID  ?? '' }}" hidden>
	<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
	<div class="row">
				<div class="col-12">
				<div class="form-group">
					<label for="title">Heading</label>
					<input type="text"  name="symptoms_heading" class="form-control" value="{{$symptoms->heading ?? ''}}"
						Required>
				</div>
				</div>
				<div class="col-md-5">
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="symptoms_description">{!! $symptoms->description ?? ''!!}</textarea>
				</div>
				</div>
				<div class="col-md-7 rhs">
				<div class="form-group">
					<img id="sym" src="{{asset('images/why_surgery.jpg')}}" height="170"/>
					<input type='file' name="image" id="symptoms_image" class="form-control" />
				</div>
				<input class="toggle-box" id="sym-head-1" type="checkbox">
						<label for="sym-head-1">Accordion 1</label>
					<div class="row toggle-box-content">
							<div class="form-group">
								<label for="heading">Accordion Heading 1</label>
								<input type="text" name="acc_head_1" class="form-control" placeholder="Accordion Tittle"  value="{{$symptoms->acc_head_1 ?? ''}}">
								<textarea type="text"  name="paragraph1" class="form-control" placeholder="Accordion paragraph">{{$symptoms->paragraph1 ?? ''}}</textarea>
								<!--bullet1-->
								<input class="toggle-box" id="sym-bullet-1" type="checkbox">
								<label for="sym-bullet-1">Bullet 1</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet1" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet1 ?? ''}}">
										<textarea type="text"  name="content1" class="form-control" placeholder="Bullet Content">{{$symptoms->content1 ?? ''}}</textarea>
									</div> 
									<!--bullet2-->
								<input class="toggle-box" id="sym-bullet-2" type="checkbox">
								<label for="sym-bullet-2">Bullet 2</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet2" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet2 ?? ''}}">
										<textarea type="text"  name="content2" class="form-control" placeholder="Bullet Content">{{$symptoms->content2 ?? ''}}</textarea>
									</div>
									<!--bullet3-->
								<input class="toggle-box" id="sym-bullet-3" type="checkbox">
								<label for="sym-bullet-3">Bullet 3</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet3" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet3 ?? ''}}">
										<textarea type="text"  name="content3" class="form-control" placeholder="Bullet Content">{{$symptoms->content3 ?? ''}}</textarea>
									</div>
									<!--bullet4-->
								<input class="toggle-box" id="sym-bullet-4" type="checkbox">
								<label for="sym-bullet-4">Bullet 4</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet4" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet4 ?? ''}}">
										<textarea type="text"  name="content4" class="form-control" placeholder="Bullet Content">{{$symptoms->content4 ?? ''}}</textarea>
									</div>
									<!--bullet5-->
								<input class="toggle-box" id="sym-bullet-5" type="checkbox">
								<label for="sym-bullet-5">Bullet 5</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet5" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet5 ?? ''}}">
										<textarea type="text"  name="content5" class="form-control" placeholder="Bullet Content">{{$symptoms->content5 ?? ''}}</textarea>
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
								<input type="text" name="acc_head_2" class="form-control" placeholder="Accordion Tittle"  value="{{$symptoms->acc_head_2 ?? ''}}" >
								<textarea type="text"  name="paragraph2" class="form-control" placeholder="Accordion paragraph">{{$symptoms->paragraph2 ?? ''}}</textarea>
								<!--bullet1-->
								<input class="toggle-box" id="sym-bullet-11" type="checkbox">
								<label for="sym-bullet-11">Bullet 1</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet11" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet11 ?? ''}}">
										<textarea type="text"  name="content11" class="form-control" placeholder="Bullet Content">{{$symptoms->content11 ?? ''}}</textarea>
									</div> 
									<!--bullet2-->
								<input class="toggle-box" id="sym-bullet-22" type="checkbox">
								<label for="sym-bullet-22">Bullet 2</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet22" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet22 ?? ''}}">
										<textarea type="text"  name="content22" class="form-control" placeholder="Bullet Content">{{$symptoms->content22 ?? ''}}</textarea>
									</div>
									<!--bullet3-->
								<input class="toggle-box" id="sym-bullet-33" type="checkbox">
								<label for="sym-bullet-33">Bullet 3</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet33" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet33 ?? ''}}">
										<textarea type="text"  name="content33" class="form-control" placeholder="Bullet Content">{{$symptoms->content33 ?? ''}}</textarea>
									</div>
									<!--bullet4-->
								<input class="toggle-box" id="sym-bullet-44" type="checkbox">
								<label for="sym-bullet-44">Bullet 4</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet44" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet44 ?? ''}}">
										<textarea type="text"  name="content44" class="form-control" placeholder="Bullet Content">{{$symptoms->content44 ?? ''}}</textarea>
									</div>
									<!--bullet5-->
								<input class="toggle-box" id="sym-bullet-55" type="checkbox">
								<label for="sym-bullet-55">Bullet 5</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet55" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet55 ?? ''}}">
										<textarea type="text"  name="content55" class="form-control" placeholder="Bullet Content">{{$symptoms->content55 ?? ''}}</textarea>
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
								<input type="text" name="acc_head_3" class="form-control" placeholder="Accordion Tittle" value="{{$symptoms->acc_head_3 ?? ''}}">
								<textarea type="text"  name="paragraph3" class="form-control" placeholder="Accordion paragraph">{{$symptoms->paragraph3 ?? ''}}</textarea>
								<!--bullet1-->
								<input class="toggle-box" id="sym-bullet-111" type="checkbox">
								<label for="sym-bullet-111">Bullet 1</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet111" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet111 ?? ''}}">
										<textarea type="text"  name="content111" class="form-control" placeholder="Bullet Content">{{$symptoms->content111 ?? ''}}</textarea>
									</div> 
									<!--bullet2-->
								<input class="toggle-box" id="sym-bullet-222" type="checkbox">
								<label for="sym-bullet-222">Bullet 2</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet222" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet222 ?? ''}}" >
										<textarea type="text"  name="content222" class="form-control" placeholder="Bullet Content">{{$symptoms->content222 ?? ''}}</textarea>
									</div>
									<!--bullet3-->
								<input class="toggle-box" id="sym-bullet-333" type="checkbox">
								<label for="sym-bullet-333">Bullet 3</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet333" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet333 ?? ''}}">
										<textarea type="text"  name="content333" class="form-control" placeholder="Bullet Content">{{$symptoms->content333 ?? ''}}</textarea>
									</div>
									<!--bullet4-->
								<input class="toggle-box" id="sym-bullet-444" type="checkbox">
								<label for="sym-bullet-444">Bullet 4</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet444" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet444 ?? ''}}" >
										<textarea type="text"  name="content444" class="form-control" placeholder="Bullet Content">{{$symptoms->content444 ?? ''}}</textarea>
									</div>
									<!--bullet5-->
								<input class="toggle-box" id="sym-bullet-555" type="checkbox">
								<label for="sym-bullet-555">Bullet 5</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet555" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet555 ?? ''}}">
										<textarea type="text"  name="content555" class="form-control" placeholder="Bullet Content">{{$symptoms->content555 ?? ''}}</textarea>
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
								<input type="text" name="acc_head_4" class="form-control" placeholder="Accordion Tittle"  value="{{$symptoms->acc_head_3 ?? ''}}">
								<textarea type="text"  name="paragraph4" class="form-control" placeholder="Accordion paragraph">{{$symptoms->paragraph4 ?? ''}}</textarea>
								<!--bullet1-->
								<input class="toggle-box" id="sym-bullet-1111" type="checkbox">
								<label for="sym-bullet-1111">Bullet 1</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet1111" class="form-control" placeholder="Bullet Tittle"  value="{{$symptoms->bullet1111 ?? ''}}">
										<textarea type="text"  name="content1111" class="form-control" placeholder="Bullet Content">{{$symptoms->content1111 ?? ''}}</textarea>
									</div> 
									<!--bullet2-->
								<input class="toggle-box" id="sym-bullet-2222" type="checkbox">
								<label for="sym-bullet-2222">Bullet 2</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet2222" class="form-control" placeholder="Bullet Tittle"  value="{{$symptoms->bullet2222 ?? ''}}">
										<textarea type="text"  name="content2222" class="form-control" placeholder="Bullet Content">{{$symptoms->content2222 ?? ''}}</textarea>
									</div>
									<!--bullet3-->
								<input class="toggle-box" id="sym-bullet-3333" type="checkbox">
								<label for="sym-bullet-3333">Bullet 3</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet3333" class="form-control" placeholder="Bullet Tittle"  value="{{$symptoms->bullet3333 ?? ''}}">
										<textarea type="text"  name="content3333" class="form-control" placeholder="Bullet Content">{{$symptoms->content3333 ?? ''}}</textarea>
									</div>
									<!--bullet4-->
								<input class="toggle-box" id="sym-bullet-4444" type="checkbox">
								<label for="sym-bullet-4444">Bullet 4</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet4444" class="form-control" placeholder="Bullet Tittle"  value="{{$symptoms->bullet4444 ?? ''}}">
										<textarea type="text"  name="content4444" class="form-control" placeholder="Bullet Content">{{$symptoms->content4444 ?? ''}}</textarea>
									</div>
									<!--bullet5-->
								<input class="toggle-box" id="sym-bullet-5555" type="checkbox">
								<label for="sym-bullet-5555">Bullet 5</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet5555" class="form-control" placeholder="Bullet Tittle"  value="{{$symptoms->bullet5555 ?? ''}}">
										<textarea type="text"  name="content5555" class="form-control" placeholder="Bullet Content">{{$symptoms->content5555 ?? ''}}</textarea>
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
								<input type="text" name="acc_head_5" class="form-control" placeholder="Accordion Tittle" value="{{$symptoms->acc_head_5 ?? ''}}">
								<textarea type="text"  name="paragraph5" class="form-control" placeholder="Accordion paragraph">{{$symptoms->paragraph5 ?? ''}}</textarea>
								<!--bullet1-->
								<input class="toggle-box" id="sym-bullet-11111" type="checkbox">
								<label for="sym-bullet-11111">Bullet 1</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet11111" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet11111 ?? ''}}">
										<textarea type="text"  name="content11111" class="form-control" placeholder="Bullet Content">{{$symptoms->content11111 ?? ''}}</textarea>
									</div> 
									<!--bullet2-->
								<input class="toggle-box" id="sym-bullet-22222" type="checkbox">
								<label for="sym-bullet-22222">Bullet 2</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet22222" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet22222 ?? ''}}">
										<textarea type="text"  name="content22222" class="form-control" placeholder="Bullet Content">{{$symptoms->content22222 ?? ''}}</textarea>
									</div>
									<!--bullet3-->
								<input class="toggle-box" id="sym-bullet-33333" type="checkbox">
								<label for="sym-bullet-33333">Bullet 3</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet33333" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet33333 ?? ''}}">
										<textarea type="text"  name="content33333" class="form-control" placeholder="Bullet Content">{{$symptoms->content33333 ?? ''}}</textarea>
									</div>
									<!--bullet4-->
								<input class="toggle-box" id="sym-bullet-44444" type="checkbox">
								<label for="sym-bullet-44444">Bullet 4</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet44444" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet44444 ?? ''}}">
										<textarea type="text"  name="content44444" class="form-control" placeholder="Bullet Content">{{$symptoms->content44444 ?? ''}}</textarea>
									</div>
									<!--bullet5-->
								<input class="toggle-box" id="sym-bullet-55555" type="checkbox">
								<label for="sym-bullet-55555">Bullet 5</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet55555" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet55555 ?? ''}}">
										<textarea type="text"  name="content55555" class="form-control" placeholder="Bullet Content">{{$symptoms->content55555 ?? ''}}</textarea>
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
								<input type="text" name="acc_head_6" class="form-control" placeholder="Accordion Tittle" value="{{$symptoms->acc_head_6 ?? ''}}">
								<textarea type="text"  name="paragraph6" class="form-control" placeholder="Accordion paragraph">{{$symptoms->paragraph6 ?? ''}}</textarea>
								<!--bullet1-->
								<input class="toggle-box" id="sym-bullet-111111" type="checkbox">
								<label for="sym-bullet-111111">Bullet 1</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet111111" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet111111 ?? ''}}">
										<textarea type="text"  name="content111111" class="form-control" placeholder="Bullet Content">{{$symptoms->content111111 ?? ''}}</textarea>
									</div> 
									<!--bullet2-->
								<input class="toggle-box" id="sym-bullet-222222" type="checkbox">
								<label for="sym-bullet-222222">Bullet 2</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet222222" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet222222 ?? ''}}">
										<textarea type="text"  name="content222222" class="form-control" placeholder="Bullet Content">{{$symptoms->content222222 ?? ''}}</textarea>
									</div>
									<!--bullet3-->
								<input class="toggle-box" id="sym-bullet-333333" type="checkbox">
								<label for="sym-bullet-333333">Bullet 3</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet333333" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet333333 ?? ''}}">
										<textarea type="text"  name="content333333" class="form-control" placeholder="Bullet Content">{{$symptoms->content333333 ?? ''}}</textarea>
									</div>
									<!--bullet4-->
								<input class="toggle-box" id="sym-bullet-444444" type="checkbox">
								<label for="sym-bullet-444444">Bullet 4</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet444444" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet444444 ?? ''}}">
										<textarea type="text"  name="content444444" class="form-control" placeholder="Bullet Content">{{$symptoms->content444444 ?? ''}}</textarea>
									</div>
									<!--bullet5-->
								<input class="toggle-box" id="symb-ullet-555555" type="checkbox">
								<label for="sym-bullet-555555">Bullet 5</label>
									<div class="row toggle-box-content">
									<input type="text" name="bullet555555" class="form-control" placeholder="Bullet Tittle" value="{{$symptoms->bullet555555 ?? ''}}">
										<textarea type="text"  name="content555555" class="form-control" placeholder="Bullet Content">{{$symptoms->content555555 ?? ''}}</textarea>
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
				</div>
	</div>
			<div class="text-center">
				<button type="submit" class="btn btn-info  my-2">Save Change</button>
			</div>
	</form>
	</div>	
</section>
<!-- Meaning of Surgery Section edit Ends -->	
@endif	
	
@if (empty($doctor_status) || $doctor_status->Deactivate == 0 )
<!--Doctors Cards Starts-->
<section class="container-fluid doctors-cards">
    <div class="container">
		
		<div class="row align-items-center">
			<div class="col-md-12">
				<h2>Our stellar doctors</h2>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12">
			<div class="swiper-container swiper-doctors">
			<div class="swiper-wrapper">
				@foreach($doctor['data'] as $i => $v)
				<div class="swiper-slide">
					<div class="row doctors-cards-outer">
						<div class="col-12 p-0">
							<div class="card">
								  <div class="card-header">
									<div class="doc-photo">
										
										@if($v['profileURLImage'] != null)
										<img  src="https://medfin-assets.s3.amazonaws.com/converted/doctor-images/{{$v['profileURLImage']}}" onerror="this.src='{{ asset('images/doctor.png') }}'" alt="doctor image">
										@else
										<img src="{{ asset('medfin/favicon.png') }}" alt="no image">
										@endif
									</div>
									<h3>{{$v['title']}} {{$v['firstName']}} {{$v['lastName']}}</h3>
									<p>{{$v['designation']}}</p>
								  </div>
								  <div class="card-body">
									  <span class="sep"></span>
									  <p class="small red-color">Experience: {{$v['totalExp']}}+ Years</p>
									  <p>{{$v['educationTag']}}</p>
								  </div>
								  <div class="card-footer text-center">
									<a class="btn btn-info btn-lg btn-block" href="javascript:void(0)" data-toggle="modal" data-target="#appointment-form">Book now</a>
								  </div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="swiper-pagination d-md-none"></div>
		</div>
		<div class="swiper-button-prev-doctors-cards"></div>
		<div class="swiper-button-next-doctors-cards"></div>
		</div>
		</div>
    </div>
</section>
<!--Doctors Cards Ends-->
@endif
@if(Session::get('user_role') == 'Admin')
<!--edit doctor status--->
<section class="container-fluid doctors-cards">
    <div class="container">
		
		<div class="row align-items-center">
			<div class="col-md-12">
				<h2>Our stellar doctors</h2>
			</div>
		</div>
         
		<div class="text-center">
		
		@if (empty($doctor_status) || $doctor_status->Deactivate == 0 )
		                <button class="btn btn-sm shadow-sm btn-danger text-nowrap" data-toggle="modal"
							data-target="#deactivatedoctor{{ $service->id ?? ''}}">
							 Deactivate
			           </button>
				@else  	
					   <button class="btn btn-sm shadow-sm btn-success text-nowrap" data-toggle="modal"
							data-target="#activatedoctor{{ $service->id ?? ''}}">
							 Activate
						</button>
		        @endif
		{{-- Status Activate Modal --}}
                            <div class="modal fade" id="activatedoctor{{ $service->id}}" tabindex="-1"
                                role="dialog" aria-labelledby="#activatfaqlabel{{ $service->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-sm">
                                        <div class="modal-body rounded">
										<button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br>
											<h5 class="text-primary">Are you Sure to Activate ?</h5>
                                            <div class="group d-flex justify-content-center">
                                                <form action="{{ route('/doctor_status') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-info"
                                                        data-dismiss="modal">No</button>
														<input type="text" name="id" value="{{$doctor_status->Doctor_ID ?? ''}}" hidden>
													<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
                                                    <input type="text" name="deactivate" value="Activate" hidden>
                                                    <button type="submit" class="btn  btn-success ml-2">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of Activate Status modal --}}

                            {{-- Status deactivate Modal --}}
                            <div class="modal fade" id="deactivatedoctor{{ $service->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="#deactivatefaqlabel{{ $service->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body rounded">
										<button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br>
											<h5 class="text-primary">Are you Sure to Deactivate</h5>
                                            <div class="group d-flex justify-content-center">
                                                <form action="{{ route('/doctor_status') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-info"
                                                        data-dismiss="modal">No</button>
														@if ($doctor_status != null)
														<input type="text" name="id" value="{{$doctor_status->Doctor_ID ?? ''}}" hidden>
														@endif
														<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
                                                    <input type="text" name="deactivate" value="Deactivate" hidden>
                                                    <button type="submit" class="btn  btn-danger ml-2">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of deactivate Status modal --}}
							
					</div>

		</div>
</section>	
<!---doctor status-->
@endif
<!-- Why Medfin Section Starts -->
<section class="container-fluid why-medfin ash-bg">
	<div class="container">
	
	<div class="row">
		<div class="col-12">
				<h2>Why opt for Medfin?</h2>
		</div>
	</div>
		
	<div class="row">
		<div class="col-md-4 why-medfin-card">
			<div class="why-medfin-card-inner">
					<div class="media align-items-center">
  						<img src="images/patient-care.svg" class="mr-3">
						  <div class="media-body">
							<h5 class="mt-0">Patient Care</h5>
						  </div>
					</div>
					<ul>
						<li>Personal Assistant</li>
						<li>Free Second Opinion</li>
						<li>Priority Consultations</li>
					</ul>
			</div>	
		</div>
		<div class="col-md-4 why-medfin-card">
			<div class="why-medfin-card-inner">
					<div class="media align-items-center">
  						<img src="{{ asset('medfin/images/affordable-pricing.svg') }}" class="mr-3">
						  <div class="media-body">
							<h5 class="mt-0">Affordable Pricing</h5>
						  </div>
					</div>
					<ul>
						<li>Minimum 30% Savings on Surgery</li>
						<li>No Hidden Cost</li>
						<li>Lowest Fixed Price Packages</li>
					</ul>
			</div>	
		</div>
		<div class="col-md-4 why-medfin-card">
			<div class="why-medfin-card-inner">
					<div class="media align-items-center">
  						<img src="{{ asset('medfin/images/medical-financing.svg') }}" class="mr-3">
						  <div class="media-body">
							<h5 class="mt-0">Medical Financing</h5>
						  </div>
					</div>
					<ul>
						<li>0% Interest EMI</li>
						<li>All Insurances Accepted</li>
					</ul>
			</div>	
		</div>
		<div class="col-md-4 why-medfin-card">
			<div class="why-medfin-card-inner">
					<div class="media align-items-center">
  						<img src="{{ asset('medfin/images/hassle-free.svg') }}" class="mr-3">
						  <div class="media-body">
							<h5 class="mt-0">Hassle-free Experience</h5>
						  </div>
					</div>
					<ul>
						<li>Free Processing of Insurance</li>
						<li>Free Pickup & Drop</li>
						<li>Free Room Upgrade</li>
					</ul>
			</div>	
		</div>
		<div class="col-md-4 why-medfin-card">
			<div class="why-medfin-card-inner">
					<div class="media align-items-center">
  						<img src="{{ asset('medfin/images/expert-surgeons.svg') }}" class="mr-3">
						  <div class="media-body">
							<h5 class="mt-0">Expert Surgeons</h5>
						  </div>
					</div>
					<ul>
						<li>15+ Years of Experience</li>
						<li>Stellar Track Record</li>
						<li>High Success Rate</li>
					</ul>
			</div>	
		</div>
		<div class="col-md-4 why-medfin-card">
			<div class="why-medfin-card-inner">
					<div class="media align-items-center">
  						<img src="{{ asset('medfin/images/latest-technology.svg') }}" class="mr-3">
						  <div class="media-body">
							<h5 class="mt-0">Best Surgery Centers</h5>
						  </div>
					</div>
					<ul>
						<li>Latest Technology</li>
						<li>Fully Equipped Facilities</li>
						<li>Experienced Nurses & Staff</li>
					</ul>
			</div>	
		</div>
	</div>
		
	
	</div>	
</section>
<!-- Why Medfin Section Ends -->
	
	
	
@if (!empty($advantage))
@if ($advantage->Deactivate == 0)	
<!-- AdvaAdvantages Section Starts -->
<section class="container-fluid advantages">
	<div class="container">
	
	<div class="row align-items-center">
		<div class="col-md-5">
			<h2>{{$advantage->heading ?? ''}}</h2>
		</div>
		<div class="col-md-7">
			<img src="https://medfincms.s3.ap-south-1.amazonaws.com/{{ $advantage->image ?? ''}}" class="img-fluid">
		</div>
	</div>
		
	</div>	
</section>
<!-- Advantages Section Ends -->
@endif
@endif
@if(Session::get('user_role') == 'Admin')
<!-- AdvaAdvantages Section edit Starts -->
<section class="container-fluid advantages">
	<div class="container">	
	<form action="{{route('master.advantages')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="text" name="id" value="{{ $advantage->Advantage_ID  ?? '' }}" hidden>
	<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
	<div class="row align-items-center">
		<div class="col-md-7">
		<label for="title">Heading</label>
		<input type="text"  name="heading" class="form-control" value="{{ $advantage->heading  ?? '' }}"
			Required>
		</div>
		<div class="col-md-5">
		<img id="adv" src="{{ asset('images/adv.jpg') }}" class="img-fluid"/>
        <input type="file" name="image" id="advantage_image" class="form-control">
	</div>
	</div>
	<div class="text-center">
			<button type="submit" class="btn btn-success my-1">Update</button>
	</div>
	</form>	
	</div>	
</section>
<!-- Advantages Section edit Ends -->
@endif	
@if (!empty($testimonial))
<!--Testimonials Starts-->
<div class="container-fluid testimonials-sec ash-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Hear from our customers</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
			<div class="swiper-container swiper-testimonials">
			<div class="swiper-wrapper">
			@foreach($testimonial as $key => $data)
				<div class="swiper-slide">
					<div class="row testimonials-outer">
						<div class="col-12 p-0">
							<div class="card">
								  <div class="card-header text-left">
									<img src="{{ asset('medfin/images/quote.svg') }}" height="22px">
								  </div>
								  <div class="card-body text-left">
									  {{$data->message}}
								  </div>
								  <div class="card-footer text-left">
								  {{$data->name}}<br><span style="color:#777777;">{{$data->city}}</span>
								  </div>
							</div>
						</div>
					</div>
				</div>
			 @endforeach
			</div>

			<div class="swiper-pagination d-md-none"></div>
		</div>
		<div class="swiper-button-prev-testimonials"></div>
		<div class="swiper-button-next-testimonials"></div>
		</div>
		</div>
	</div>
</div>
<!--Testimonials Ends-->
@endif	
@if (!empty($faq))
@if ($faq->Deactivate == 0)			
<!-- FAQ Section Starts -->
<section class="container-fluid faq-sec">
	<div class="container">
		
	<div class="row">
				<div class="col-12">
					<h2>Frequently asked questions</h2>
				</div>
				<div class="col-md-6 hero d-none d-md-block">
					<img src="{{ asset('medfin/images/faq.jpg') }}" class="img-fluid">
				</div>
				<div class="col-md-6">
					<div class="faq" id="accordion3">
						@if(!empty($faq->que1))
							  <div class="card">
								<div class="card-header" id="headingSix">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
									  <h4>{{$faq->que1}}?</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion3">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$faq->ans1}}</p>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							@endif
							@if(!empty($faq->que2))
							  <div class="card">
								<div class="card-header" id="headingSeven">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
									  <h4>{{$faq->que2}}?</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion3">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$faq->ans2 ?? ''}}</p>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  @endif
							  @if(!empty($faq->que3))
							<div class="card">
								<div class="card-header" id="headingEight">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
									  <h4>{{$faq->que3 ?? ''}}?</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion3">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$faq->ans3 ?? ''}}</p>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  @endif
                              @if(!empty($faq->que4))
							  <div class="card">
								<div class="card-header" id="headingNine">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
									  <h4>{{$faq->que4 ?? ''}}?</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion3">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$faq->ans4 ?? ''}}</p>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  @endif
							  @if(!empty($faq->que5))
							<div class="card">
								<div class="card-header" id="headingTen">
								  <h5 class="mb-0">
									<button class="btn title collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
									  <h4>{{$faq->que5 ?? ''}}?</h4>
									  <div class="square">
										<span class="plus-ico"></span>
										<span class="minus-ico"></span>
									  </div>
									</button>
								  </h5>
								</div>
								<div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion3">
								  <div class="card-body">
									  
									  <div class="row align-items-center">
									  	<div class="col-12">
											  <p>{{$faq->ans5 ?? ''}}</p>
									  	</div>
									  </div>
									  
								  </div>
								</div>
							  </div>
							  @endif

				</div>
				</div>
	</div>
		
	
	</div>	
</section>
@endif
@endif
<!-- FAQ Section Ends -->
@if(Session::get('user_role') == 'Admin')
<!--Faq Section edit--->
	<div class="container mb-4">
	<form action="{{route('master.faq')}}" method="POST">
	<div class="toggle-box-region"> 
	<input type="text" name="id" value="{{$faq->Faq_ID ?? ''}}" hidden>
	<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
		<input class="toggle-box" id="toggleId-1" type="checkbox">
		<label for="toggleId-1">Click here to Question one!</label>
		<div class="toggle-box-content">  <input type="text"  name="que1" class="form-control" placeholder="Enter Question" value="{{$faq->que1 ?? ''}}">
         <textarea type="text"  name="ans1" class="form-control" placeholder="Enter Answer" >{{$faq->ans1 ?? ''}}</textarea></div>

		<input class="toggle-box" id="toggleId-2" type="checkbox">
		<label for="toggleId-2">Click here to Question two!</label>
		<div class="toggle-box-content"> <input type="text"  name="que2" id="que1" class="form-control" value="{{$faq->que2 ?? ''}}" placeholder="Enter Question">
        <textarea type="text"  name="ans2" id="ans2" class="form-control" placeholder="Enter Answer">{{$faq->ans2 ?? ''}}</textarea></div>

		<input class="toggle-box" id="toggleId-3" type="checkbox">
		<label for="toggleId-3">Click here to Question three!</label>
		<div class="toggle-box-content">
		<input type="text"  name="que3" id="que3" class="form-control" placeholder="Enter Question" value="{{$faq->que3 ?? ''}}">
         <textarea type="text"  name="ans3" id="ans3" class="form-control" placeholder="Enter Answer">{{$faq->ans3 ?? ''}}</textarea>
		</div>
		
		<input class="toggle-box" id="toggleId-4" type="checkbox">
		<label for="toggleId-4">Click here to Question four!</label>
		<div class="toggle-box-content"> <input type="text"  name="que4" id="que4" class="form-control" placeholder="Enter Question" value="{{$faq->que4 ?? ''}}">
         <textarea type="text"  name="ans4" id="ans4" class="form-control" placeholder="Enter Answer">{{$faq->ans4 ?? ''}}</textarea></div>
	     
		<input class="toggle-box" id="toggleId-5" type="checkbox">
		<label for="toggleId-5">Click here to Question Five!</label>
		<div class="toggle-box-content"><input type="text"  name="que5" id="que5" class="form-control" placeholder="Enter Question" value="{{$faq->que5 ?? ''}}">
         <textarea type="text"  name="ans5" id="ans5" class="form-control" placeholder="Enter Answer">{{$faq->ans5 ?? ''}}</textarea></div>
	</div>
	<div class="text-center">
		<button type="submit" class="btn btn-primary mt-1">Update</button>
	</div>
    </form>
	</div>
	<div class="text-center mb-2">
	@if (!empty($faq))
		@if ($faq->Deactivate == 1 ?? '')
						<button class="btn btn-sm shadow-sm btn-success text-nowrap" data-toggle="modal"
							data-target="#activatfaq{{ $faq->Faq_ID ?? ''}}">
							 Activate
						</button>
					@else
						<button class="btn btn-sm shadow-sm btn-danger text-nowrap" data-toggle="modal"
							data-target="#deactivatefaq{{ $faq->Faq_ID ?? ''}}">
							 Deactivate
			</button>
		@endif
		{{-- Status Activate Modal --}}
                            <div class="modal fade" id="activatfaq{{ $faq->Faq_ID}}" tabindex="-1"
                                role="dialog" aria-labelledby="#activatfaqlabel{{ $faq->Faq_ID }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-sm">
                                        <div class="modal-body rounded">
										<button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br>
											<h5 class="text-primary">Are you Sure to Activate ?</h5>
                                            <div class="group d-flex justify-content-center">
                                                <form action="{{ route('/faq_status') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-info"
                                                        data-dismiss="modal">No</button>
                                                    <input type="text" name="Faq_ID" value="{{ $faq->Faq_ID }}"
                                                        hidden>
                                                    <input type="text" name="deactivate" value="Activate" hidden>
                                                    <button type="submit" class="btn  btn-success ml-2">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of Activate Status modal --}}

                            {{-- Status deactivate Modal --}}
                            <div class="modal fade" id="deactivatefaq{{ $faq->Faq_ID }}" tabindex="-1"
                                role="dialog" aria-labelledby="#deactivatefaqlabel{{ $faq->Faq_ID }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body rounded">
										<button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button><br>
											<h5 class="text-primary">Are you Sure to Deactivate</h5>
                                            <div class="group d-flex justify-content-center">
                                                <form action="{{ route('/faq_status') }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-info"
                                                        data-dismiss="modal">No</button>
                                                    <input type="text" name="Faq_ID" value="{{ $faq->Faq_ID ?? '' }}"
                                                        hidden>
                                                    <input type="text" name="deactivate" value="Deactivate" hidden>
                                                    <button type="submit" class="btn  btn-danger ml-2">Yes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End of deactivate Status modal --}}
		@endif
				</div>
<!--faq section end--->
@endif	
<!--Footer Starts-->
<footer class="container-fluid footer">
    <div class="container">
		<div class="row text-center">
			<div class="col-12 footer-links">
			<a href="https://www.medfin.in/about-medfin" target="_blank">About Medfin</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/privacy-policy" target="_blank">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/terms-conditions" target="_blank">Terms and Conditions</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/contact-us" target="_blank">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/faq" target="_blank">FAQs</a>
			</div>
			<div class="col-12 social-icons-sec">
				<ul class="list-unstyled list-inline social-icons">
						<li>
							<a href="https://m.facebook.com/medfinhealth" target="_blank" class="social-fb">
							</a>
						</li>
						<li>
							<a href="http://twitter.com/medfinhealth" target="_blank" class="social-twt">
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" target="_blank" class="social-gpls">
							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/medfin_health/" target="_blank" class="social-insta">
							</a>
						</li>
						<li>
							<a href="https://youtube.com/c/Medfinhealth" target="_blank" class="social-ytb">
							</a>
						</li>
					</ul>
			</div>
		</div>
        
        
    </div>
        
    <div class="text-center footer-rights">
        © Medfin 2019. All Rights Reserved.
    </div>
</footer>
<!--Footer Ends-->
	
	
<!-- Multi Sticky Buttons Starts -->
<div class="container-fluid multi-sticky d-md-none">
	<div class="row">
		<a class="col btn btn-lg btn-danger"  href="javascript:void(0)" data-toggle="modal" data-target="#appointment-form">Book a Free Consultation</a>
		<a class="col btn btn-lg btn-info" href="tel:{{$contact ?? '7026200200'}}">Call Now</a>
	</div>
</div>
<!-- Multi Sticky Buttons Ends -->
	
	
<a class="btn btn-appointment btn-appointment-sticky-desktop" href="javascript:void(0)" data-toggle="modal" data-target="#appointment-form"><span class="left-arrow-icon"></span> Book a Free Consultation</a>
	
<a href="javascript:void(0)" class="whtsap"><img width="40" src="images/whatsapp.svg"></a>
	

	
	
<!-- Sidebar Form Starts -->
<div class="modal fade sidebar-form" id="appointment-form" tabindex="-1" role="dialog" aria-labelledby="lead-formTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
		<h3>Please fill your details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
			<div class="container-fluid appointment-form">
				<div class="row">
					<div class="col-12">
							<div class="form-group">
							<input type="text" class="form-control border-0" name="Fullname" id="Fullname" placeholder="Name">
						</div>
						<!-- <div class="form-group">
							<input type="email" class="form-control border-0" name="Email" id="Email" placeholder="Email">
						</div> -->
							<div style="position: relative;" class="form-group">
								<div style="position: absolute; top: 7px; left: 0px;">
									<img src="images/indian-flag.png" alt="" width="20" class="left"> <span style="font-size: 16px; color: #6e757c;">+91 </span>
								</div>
								<input style="padding-left: 60px;" type="tel"  name="Mobile" class="form-control" id="Mobile" aria-describedby="MobileHelp" placeholder="Phone number">
							</div>
					</div>
				</div>
				<a class="col btn btn-lg btn-appointment" id="submit" href="javascript:void(0)" >@if (empty($btn)) Book a Free Consultation @else {{$btn->btn_name ?? ''}} @endif</a>
			</div>
        </form>
		@if(Session::get('user_role') == 'Admin')
		      <form action="{{route('master.btn')}}"
                method="POST"  enctype="multipart/form-data">
                @csrf
				<div>
                <input type="text" name="id" value="{{$btn->App_Btn_ID ?? '' }}" hidden>
				<input type="text" name="service_id" value="{{$service->id ?? ''}}" hidden>
				<input class="form-control my-4"  name="btn_name" value="{{$btn->btn_name ?? ''}}" placeholder="Book a Consultation" required>
				</div>
				<div class="text-center mt-2">
                      <button type="submit" class="btn btn-success" >Update</button>
                 </div> 
			</form>
		@endif
      </div>
    </div>
  </div>
</div>
<!-- Sidebar Form Ends -->

<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700|Roboto+Condensed:300,400,700|Roboto:400,500,700,900" rel="stylesheet">
	
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<script src="{{ asset('medfin/js/jquery.min.js') }}"></script>
<script src="{{ asset('medfin/js/popper.min.js') }}"></script>
<script src="{{ asset('medfin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('medfin/js/swiper.min.js') }}"></script>

	
<script>
$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-light");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});
	
$(function () {
  $(document).scroll(function () {
    var $banner = $(".home-banner");
	var $nav = $(".navbar-light");
    $nav.toggleClass('scrolled2', $(this).scrollTop() > $banner.height());
  });
});
	
$(function () {
  $(document).scroll(function () {
	var $whatsappbutton = $(".whtsap");
    $whatsappbutton.toggleClass('scrolled3', $(this).scrollTop() > (2900));
  });
});

var myswiper = new Swiper('.swiper-doctors', {
      slidesPerView: 4,
      spaceBetween: 30,
      // init: false,
      loop:false,
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
		clickable: true,
      },
		navigation: {
        nextEl: '.swiper-button-next-doctors-cards',
        prevEl: '.swiper-button-prev-doctors-cards',
      },
      breakpoints: {
        1024: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 1.2,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 1.2,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });
	
var swiper = new Swiper('.swiper-testimonials', {
      slidesPerView: 2,
      spaceBetween: 30,
      // init: false,
      loop:false,
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
		clickable: true,
      },
		navigation: {
        nextEl: '.swiper-button-next-testimonials',
        prevEl: '.swiper-button-prev-testimonials',
      },
      breakpoints: {
        1024: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 1.2,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 1.2,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });


</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
// 	document.getElementById("myDIV").style.display = "none";
// 	function myFunction() {
//   var x = document.getElementById("myDIV");
//   document.getElementById("myDIV").style.display = "block";
// }
CKEDITOR.replace( 'overview_description' );
 CKEDITOR.replace( 'treatment_description' );
 CKEDITOR.replace( 'symptoms_description' );


 overview.onchange = evt => {
  const [file] = overview.files
  if (file) {
    over.src = URL.createObjectURL(file)
  }
}


advantage_image.onchange = evt => {
  const [file] = advantage_image.files
  if (file) {
    adv.src = URL.createObjectURL(file)
  }
}
symptoms_image.onchange = evt => {
  const [file] = symptoms_image.files
  if (file) {
    sym.src = URL.createObjectURL(file)
  }
}

//book consultaion
    </script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=3.0.1"></script>
        <script>

            $(document).ready(function(){
                $("#submit").click(function(){
					var name = $("#Fullname").val();
                    // var email = $("#Email").val(); 
                    var telephone = $("#Mobile").val();
					var campaign = decodeURIComponent($.urlParam('campaign'))
					var source = decodeURIComponent($.urlParam('source'))
					var varData = {"Name":name,"Mobile":telephone,"Campaign":campaign,"Source":source};
					console.log(varData);
					alert("message sent");
                });
            });



			$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}
//console.log(decodeURIComponent($.urlParam('city')));
</script>
@endif
@else
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template" style="padding: 280px 15px;text-align: center;">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
            </div>
        </div>
    </div>
</div>
@endif

</body>
</html>
