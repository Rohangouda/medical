<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Medfin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('medfin/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('medfin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('medfin/css/lp-15.css') }}" rel="stylesheet">
    <link href="{{ asset('medfin/css/swiper-min.css') }}" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script src="{{ asset('js/custom/users/all_product_details.js?var=') }}{{ date('YmdHis') }}"></script>
    <script src="https://use.fontawesome.com/47886b77a3.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/fontawesome.min.css"
        integrity="sha512-W5OxdLWuf3G9SMWFKJLHLct/Ljy7CmSxaABQLV2WIfAQPQZyLSDW/bKrw71Nx7mZKN5zcL+r8pRCZw+5bIoHHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <style>
        .toggle-box-region {
            background-color: #fff;
            border: 1px solid #d9d9d9;
            padding: 16px 18px;
        }

        .toggle-box {
            display: none;
        }

        .toggle-box+label {
            color: #555;
            cursor: pointer;
            display: block;
            font-weight: bold;
            line-height: 23px;
            padding: .3em 0 .3em 26px;
            position: relative;
        }

        .toggle-box+label+div {
            display: none;
            margin: 0 0 14px;
        }

        .toggle-box:checked+label:nth-child(n)+div {
            display: block;
        }

        .toggle-box+label:before {
            position: absolute;
            content: "\f0fe";
            font-family: FontAwesome;
            top: .3em;
            left: 0px;
            color: #0085a6;
        }

        .toggle-box:checked+label {
            color: #0085a6;
        }

        .toggle-box:checked+label:before {
            content: "\f146";
        }

        .toggle-box-content {
            border-bottom: 4px double #bfbfbf;
            color: #000;
            padding: 2px 1em .6em 28px;
        }

        /* General */
        *,
        *:before,
        *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .box-test {
            padding: 3em;
        }

    </style>
</head>

<body>
    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('status'))
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
            <a class="navbar-brand" href="{{ URL::to('/') }}"><img class="white-logo"
                    src="{{ asset('medfin/images/medfin-logo-white.svg') }}" height="27" alt="" /><img
                    class="blue-logo" src="images/medfin-logo.svg" height="27" alt="" /></a>
            <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-call" href="tel:7026-200-200"><span class="btn-call-icon"></span> 7026-200-200</a>

                <a class="btn btn-appointment" href="javascript:void(0)" data-toggle="modal"
                    data-target="#appointment-form"><span class="btn-appointment-icon"></span> Book Appointment</a>
            </form>
            @if (Session::has('user_id'))
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="avatar" src="{{ asset('app-assets/img/portrait/small/user.jpg') }}"
                                alt="avatar" height="35" width="35">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item">{{ Session::get('first_name') }}
                                {{ Session::get('last_name') }}</a>
                            @if (Session::get('user_role') == 'Admin')
                                <a class="dropdown-item" href="{{ URL('/admin/dashboard') }}"><i
                                        class="fas fa-warehouse"></i>
                                    Dashboard</a>
                                <a class="dropdown-item" href="{{ URL('/admin/profile') }}"><i
                                        class="far fa-edit"></i> Edit Profile</a>
                            @endif
                            <a class="dropdown-item" href="{{ URL('/logout') }}"><i class="fas fa-power-off"></i>
                                Logout</a>
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </nav>
    <!-- Navbar Ends -->
    @if (!empty($banner))
        @if ($banner->Deactivate == 0)
            <div style="background-color: #fff;" class="container-fluid navbar-positioning"></div>

            <!-- Banner Ends -->
            <section id="about" class="container-fluid home-banner">
                <div class="container align-items-center">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div>
                                <img src="{{ asset('medfin/images/banner-img.jpg') }}" class="banner-img"
                                    style="width:100%;">
                            </div>
                        </div>
                        <div class="col-md-6 banner-text">
                            <h1>{{ $banner->tittle }}</h1>
                            <p>{{ $banner->description }}</p>
                            <!-- <h1>Get rid of your glasses in 10 minutes with a Lasik Surgery</h1>
    <p>Quick and precise Lasik surgery procedures help you correct your vision within minutes</p> -->
                            {{-- {{dd($service)}} --}}
                        </div>
                    </div>

                </div>
            </section>
        @endif
    @endif
    @if (Session::get('user_role') == 'Admin')
        <!-- Banner edit  Starts -->
        <section id="about" class="container-fluid home-banner">
            <div class="container align-items-center" id="myDIV">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div>
                            <form action="{{ route('master.banner') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{ $banner->Banner_ID ?? '' }}" hidden>
                                <input type="text" name="service_name" value="{{ $service->ser_name ?? '' }}" hidden>
                                <!-- <img id="blah" @if ($category[0]->image ?? '') src="{{ asset('/storage/slider') }}/{{ $category[0]->image ?? '' }}" @else src="https://www.elegantthemes.com/blog/wp-content/uploads/2014/10/UploadLimit-Header.png" @endif  class="banner-img" style="width: 90%;">
                <input type='file' name="image" onchange="readURL(this);" class="form-control" /> -->
                                <img src="{{ asset('medfin/images/banner-img.jpg') }}" class="banner-img"
                                    width="99%">
                        </div>
                    </div>
                    <div class="col-md-5 banner-text">

                        <input class="form-control mb-2" name="banner_tittle" value="{{ $banner->tittle ?? '' }}"
                            required>
                        <Textarea class="form-control" name="banner_description" required>{{ $banner->description ?? '' }}</textarea>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Update</button>

                        </div>
                    </div>
                    </form>
                    @if (!empty($banner))
                        <div class="col-md-2">
                            @if ($banner->Deactivate == 1)
                                <button class="btn btn-sm shadow-sm btn-success text-nowrap" data-toggle="modal"
                                    data-target="#activatemodal{{ $banner->Banner_ID ?? '' }}">
                                    <i class="fas fa-power-off"></i> Activate
                                </button>
                            @else
                                <button class="btn btn-sm shadow-sm btn-danger text-nowrap" data-toggle="modal"
                                    data-target="#deactivatemodal{{ $banner->Banner_ID ?? '' }}">
                                    <i class="fas fa-times-circle"></i> Deactivate
                                </button>
                            @endif
                        </div>
                        {{-- Status Activate Modal --}}
                        <div class="modal fade" id="activatemodal{{ $banner->Banner_ID ?? '' }}" tabindex="-1"
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
                                                <input type="text" name="Banner_ID"
                                                    value="{{ $banner->Banner_ID ?? '' }}" hidden>
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
                                                <input type="text" name="Banner_ID"
                                                    value="{{ $banner->Banner_ID ?? '' }}" hidden>
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
                    <form class="form-holder">
                        <div class="row align-items-center">
                            <div class="form-group col-lg-4">
                                <div style="position: absolute; top: 13px; left: 20px;"><img
                                        src="{{ asset('medfin/images/user.svg') }}" alt="" width="20"
                                        class="left"></div>
                                <input type="text" class="form-control border-0" id="Name" placeholder="Name">
                            </div>
                            <div class="form-group col-lg-4">
                                <div style="position: absolute; top: 13px; left: 20px;"><img
                                        src="{{ asset('medfin/images/mobile.svg') }}" alt="" width="20"
                                        class="left"></div>
                                <input style="display: block;" class="form-control border-0" id="phone1" type="tel"
                                    placeholder="Mobile Number">
                            </div>


                            <div class="form-group col-lg-4 text-right">
                                <button type="button" class="btn btn-danger btn-lg text-center">Book a Free
                                    Consultation</button>
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
                            <img src="{{ asset('medfin/images/why_surgery.jpg') }}" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h2>{{ $overview->tittle ?? '' }}?</h2>
                            <span class="hero d-md-none"><img src="images/why_surgery.jpg"
                                    class="img-fluid"></span>
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
    @if (Session::get('user_role') == 'Admin')
        <!-- Why This Surgery Section Starts edit-->
        <section class="container-fluid why-this-surgery">
            <div class="container" id="myDIV">

                <div class="row">
                    <div class="col-md-5 hero d-none d-md-block">
                        <form action="{{ route('master.overview') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id" value="{{ $overview->Overview_ID ?? '' }}" hidden>
                            <input type="text" name="service_name" value="{{ $service->ser_name ?? '' }}" hidden>

                            <!-- @if (Session::get('id'))
<img id="surgery" @if ($surgery[0]->image ?? '') src="{{ asset('/storage/surgery') }}/{{ $surgery[0]->image ?? '' }}" @else src="https://www.elegantthemes.com/blog/wp-content/uploads/2014/10/UploadLimit-Header.png" @endif  class="img-fluid" style="width: 90%;">
                <input type='file' name="image" onchange="readURL(this);" class="form-control" />
@else
-->
                            <!-- <img src="{{ asset('medfin/images/banner-img.jpg') }}" class="img-fluid">
@endif -->
                            <img src="{{ asset('medfin/images/why_surgery.jpg') }}" class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <input class="form-control mb-2" name="overview_tittle"
                            value="{{ $overview->tittle ?? '' }}">
                        <textarea name="overview_description" id="overview_description" placeholder="Enter Content"
                            style="background-color: white;">{{ $overview->description ?? '' }}</textarea>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                    </form>
                    @if (!empty($overview))
                        <div class="col-md-2">
                            @if ($overview->Deactivate == 1)
                                <button class="btn btn-sm shadow-sm btn-success text-nowrap" data-toggle="modal"
                                    data-target="#activateoverview{{ $overview->Overview_ID }}">
                                    <i class="fas fa-power-off"></i> Activate
                                </button>
                            @else
                                <button class="btn btn-sm shadow-sm btn-danger text-nowrap" data-toggle="modal"
                                    data-target="#deactivateoverview{{ $overview->Overview_ID }}">
                                    <i class="fas fa-times-circle"></i> Deactivate
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
                                                <input type="text" name="Overview_ID"
                                                    value="{{ $overview->Overview_ID }}" hidden>
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
                        <div class="modal fade" id="deactivateoverview{{ $overview->Overview_ID }}"
                            tabindex="-1" role="dialog"
                            aria-labelledby="#deactivateoverviewlabel{{ $overview->Overview_ID }}"
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
                                            <form action="{{ route('/overview_status') }}" method="POST">
                                                @csrf
                                                <button type="button" class="btn btn-info"
                                                    data-dismiss="modal">No</button>
                                                <input type="text" name="Overview_ID"
                                                    value="{{ $overview->Overview_ID ?? '' }}" hidden>
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



    <!-- Diagnosis Section Starts -->
    <section class="container-fluid diagnosis ash-bg">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2>Diagnosis of Refractive Disorders & Lasik Treatment</h2>
                </div>
                <div class="col-md-5">
                    <p>An eye specialist (opthalmologist) diagnoses refractive disorders in your eyes with the help of
                        certain diagnostic tests. These tests may include:</p>
                    <p>Visual acuity test- You are made to read a vision chart. The doctor then tries on different
                        lenses to determine where your vision needs correction.</p>
                    <p>Retinoscopy- This test helps determine the refractive errors in the eye. It is mandatory before a
                        Lasik procedure.</p>
                    <p>Corneal topography- This is a computer test that analyses any disorders in the eye.</p>
                    <p>Tonometry- This diagnostic test checks for eye pressure.</p>
                    <p>The ophthalmologist may also perform tests to check for dryness in the eyes.</p>
                </div>
                <div class="col-md-7 rhs">
                    <h3>Here are the types of refractive correction surgeries that the doctor might suggest to you:</h3>
                    <div class="faq" id="accordion">

                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn title collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h4>Photorefractive Keratectomy (PRK):</h4>
                                        <div class="square">
                                            <span class="plus-ico"></span>
                                            <span class="minus-ico"></span>
                                        </div>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">

                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <p>This surgery also uses a laser to reshape the cornea however, the method
                                                of surgery differed a bit from Lasik. During this surgery, the outer
                                                cells of the cornea are removed while keeping your eyes still by making
                                                you focus on a target light.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn title collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <h4>Small Incision Lenticule Extraction (SMILE):</h4>
                                        <div class="square">
                                            <span class="plus-ico"></span>
                                            <span class="minus-ico"></span>
                                        </div>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">

                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <p>A minute incision is made on the surface of the cornea and it is reshaped
                                                using a laser. The incision heals on its own in a few days.</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- Diagnosis Section Ends -->








    <!-- Meaning of Surgery Section Starts -->
    <section class="container-fluid meaning-of-surgery">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2>Meaning of LASIK</h2>
                </div>
                <div class="col-12 main-text">
                    <p>LASIK is a term that means laser in-situ keratomileusis. It is a type of eye surgery that is used
                        to correct defective vision in people. LASIK surgery is a laser refractive surgery that uses a
                        special kind of laser to change the shape in front of the cornea (outer layer of the eye that
                        helps light refract to the lenses).</p>
                    <p>For people with normal eyesight, the cornea refracts(bends) the light entering the eyes onto the
                        retina at the back portion of the eyes. However, defects in the cornea lead to incorrect
                        refraction resulting in improper vision (short-sightedness or farsightedness).</p>
                    <p>People with improper vision have to use glasses or contact lenses to view things normally. A
                        LASIK surgery can help such people completely get rid of visual aids, and get their visual
                        defect corrected permanently. The surgery is recommended for people with moderate levels of
                        visual impairment.</p>
                </div>
                <div class="col-md-6">
                    <div class="faq" id="accordion2">
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn title collapsed" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <h4>Symptoms of Eye Disorders</h4>
                                        <div class="square">
                                            <span class="plus-ico"></span>
                                            <span class="minus-ico"></span>
                                        </div>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-parent="#accordion2">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <p>Here are some indicators that you might have a visual disorder:</p>
                                            <ul>
                                                <li><strong>Difficulty in viewing objects</strong><br>The most prominent
                                                    indicator of a problem in vision is the difficulty to focus on
                                                    objects either far or near. Eye disorders impact the ability to
                                                    focus on objects greatly.</li>
                                                <li><strong>Red eyes</strong><br>Eye disorders can irritate vision and
                                                    lead to excessive stress on the eyes. This can cause redness of the
                                                    eyes.</li>
                                                <li><strong>Night blindness</strong><br>Weaker eyesight can cause the
                                                    inability to see properly in the dark since the light is not
                                                    refracted properly in the eyes.</li>
                                                <li><strong>Headaches</strong><br>Headaches, when there is even a little
                                                    strain on the eyes, is an indicator of an underlying eye disorder.
                                                </li>
                                                <li><strong>Sensitivity to light</strong><br>Sensitivity to light is a
                                                    major indicator of eye disease.</li>
                                                <li><strong>Dry eyes</strong><br>If the eyes do not function properly or
                                                    they need to stress more to see clearly, it can lead to dry eyes,
                                                    indicating an eye disorder.</li>
                                                <li><strong>Excessive tearing</strong><br>A problem in vision can also
                                                    lead to excessive tearing up of the eyes.</li>
                                                <li><strong>Blurred vision</strong><br>A disorder in the eye is the most
                                                    probable cause of blurred vision.</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0">
                                    <button class="btn title collapsed" data-toggle="collapse"
                                        data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <h4>Causes of eye problems where you need a Lasik surgery</h4>
                                        <div class="square">
                                            <span class="plus-ico"></span>
                                            <span class="minus-ico"></span>
                                        </div>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-parent="#accordion2">
                                <div class="card-body">

                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <p><strong>Lasik</strong> is a surgical method that can treat refractive
                                                errors in the eyes. Here are the major causes of refractive errors in
                                                the eyes:</p>
                                            <ul>
                                                <li><strong>Farsightedness:</strong><br>Hyperopia is a condition that is
                                                    commonly known as farsightedness. This is the inability of the eyes
                                                    to focus on objects that are nearby ie at a reading distance and
                                                    objects that are away can be seen clearly. This disorder can cause
                                                    difficulty while reading, headaches, doing precise work.</li>
                                                <li><strong>Nearsightedness:</strong><br>Myopia is a condition that is
                                                    commonly called nearsightedness. This is a problem where the eyes
                                                    can clearly see objects nearby but cannot focus on objects that are
                                                    away. This may appear as difficulty in identifying faces of people
                                                    away from you, reading captions and boards that are at a distance,
                                                    difficulty in driving.</li>
                                                <li><strong>Astigmatism:</strong><br>Astigmatism is a disorder where the
                                                    cornea of the eyes is shaped irregularly resulting in blurred
                                                    vision.</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 hero d-none d-md-block">
                    <img src="{{ asset('medfin/images/lasik.jpg') }}" class="img-fluid">
                </div>
            </div>


        </div>
    </section>
    <!-- Meaning of Surgery Section Ends -->





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
                            <div class="swiper-slide">
                                <div class="row doctors-cards-outer">
                                    <div class="col-12 p-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <div style="background-image:url({{ asset('medfin/images/doctor1.jpg') }});"
                                                    class="doc-photo"></div>
                                                <h3>Dr. Rajah Koppala</h3>
                                                <p>Interventional Radiologist</p>
                                            </div>
                                            <div class="card-body">
                                                <span class="sep"></span>
                                                <p class="small red-color">Experience: 11+ Years</p>
                                                <p>MBBS, MRCP FRCR CCT (UK) EBIR</p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a class="btn btn-info btn-lg btn-block" href="javascript:void(0)">Book
                                                    now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row doctors-cards-outer">
                                    <div class="col-12 p-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <div style="background-image:url({{ asset('medfin/images/dr-chirag-thonse.jpg') }});"
                                                    class="doc-photo"></div>
                                                <h3>Dr. Rajah Koppala</h3>
                                                <p>Consultant Vascular & Endovascular Surgeon</p>
                                            </div>
                                            <div class="card-body">
                                                <span class="sep"></span>
                                                <p class="small red-color">Experience: 11+ Years</p>
                                                <p>MBBS, MS - General Surgery, MCh - Vascular Surgery</p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a class="btn btn-info btn-lg btn-block" href="javascript:void(0)">Book
                                                    now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row doctors-cards-outer">
                                    <div class="col-12 p-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <div style="background-image:url({{ asset('medfin/images/dr-chandrashekar.jpg') }});"
                                                    class="doc-photo"></div>
                                                <h3>Dr. Rajah Koppala</h3>
                                                <p>Interventional Radiologist</p>
                                            </div>
                                            <div class="card-body">
                                                <span class="sep"></span>
                                                <p class="small red-color">Experience: 11+ Years</p>
                                                <p>MBBS, MD - Radio Diagnosis/Radiology</p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a class="btn btn-info btn-lg btn-block" href="javascript:void(0)">Book
                                                    now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row doctors-cards-outer">
                                    <div class="col-12 p-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <div style="background-image:url({{ asset('medfin/images/dr-anjali-shetty.jpg') }});"
                                                    class="doc-photo"></div>
                                                <h3>Dr. Rajah Koppala</h3>
                                                <p>Interventional Radiologist</p>
                                            </div>
                                            <div class="card-body">
                                                <span class="sep"></span>
                                                <p class="small red-color">Experience: 11+ Years</p>
                                                <p>MBBS, MD - Radio Diagnosis/Radiology</p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a class="btn btn-info btn-lg btn-block" href="javascript:void(0)">Book
                                                    now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row doctors-cards-outer">
                                    <div class="col-12 p-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <div style="background-image:url({{ asset('medfin/images/deepak-inamdar-9.jpg') }});"
                                                    class="doc-photo"></div>
                                                <h3>Dr. Rajah Koppala</h3>
                                                <p>Interventional Radiologist</p>
                                            </div>
                                            <div class="card-body">
                                                <span class="sep"></span>
                                                <p class="small red-color">Experience: 11+ Years</p>
                                                <p>MBBS, MD - Radio Diagnosis/Radiology</p>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a class="btn btn-info btn-lg btn-block" href="javascript:void(0)">Book
                                                    now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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




    <!-- AdvaAdvantages Section Starts -->
    <section class="container-fluid advantages">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-md-5">
                    <h2>Advantages of Laser Treatment</h2>
                </div>
                <div class="col-md-7">
                    <img src="{{ asset('medfin/images/advantages-of-laser-treatment.jpg') }}"
                        class="img-fluid">
                </div>
            </div>

        </div>
    </section>
    <!-- Advantages Section Ends -->


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
                                @foreach ($testimonial as $key => $data)
                                    <div class="swiper-slide">
                                        <div class="row testimonials-outer">
                                            <div class="col-12 p-0">
                                                <div class="card">
                                                    <div class="card-header text-left">
                                                        <img src="{{ asset('medfin/images/quote.svg') }}"
                                                            height="22px">
                                                    </div>
                                                    <div class="card-body text-left">
                                                        {{ $data->message }}
                                                    </div>
                                                    <div class="card-footer text-left">
                                                        {{ $data->name }}<br><span
                                                            style="color:#777777;">{{ $data->city }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- <div class="swiper-slide">
     <div class="row testimonials-outer">
      <div class="col-12 p-0">
       <div class="card">
        <div class="card-header text-left">
         <img src="{{ asset('medfin/images/quote.svg') }}" height="22px">
        </div>
        <div class="card-body text-left">
         Thank you Medfin. They ensured the whole process from selecting a very experienced doctor to offering the latest procedure at a very reasonable price. They also arranged a follow up post my surgery with the doctor to ensure my recovery was on track. Thank you for being there throughout.
        </div>
        <div class="card-footer text-left">
         Deepa Shree<br><span style="color:#777777;">Bangalore</span>
        </div>
       </div>
      </div>
     </div>
    </div> -->
                                <!-- <div class="swiper-slide">
     <div class="row testimonials-outer">
      <div class="col-12 p-0">
       <div class="card">
        <div class="card-header text-left">
         <img src="{{ asset('medfin/images/quote.svg') }}" height="22px">
        </div>
        <div class="card-body text-left">
         Thank you Medfin. They ensured the whole process from selecting a very experienced doctor to offering the latest procedure at a very reasonable price. They also arranged a follow up post my surgery with the doctor to ensure my recovery was on track. Thank you for being there throughout.
        </div>
        <div class="card-footer text-left">
         Deepa Shree<br><span style="color:#777777;">Bangalore</span>
        </div>
       </div>
      </div>
     </div>
    </div> -->

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
                                @if (!empty($faq->que1))
                                    <div class="card">
                                        <div class="card-header" id="headingSix">
                                            <h5 class="mb-0">
                                                <button class="btn title collapsed" data-toggle="collapse"
                                                    data-target="#collapseSix" aria-expanded="false"
                                                    aria-controls="collapseSix">
                                                    <h4>{{ $faq->que1 }}?</h4>
                                                    <div class="square">
                                                        <span class="plus-ico"></span>
                                                        <span class="minus-ico"></span>
                                                    </div>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                            data-parent="#accordion3">
                                            <div class="card-body">

                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <p>{{ $faq->ans1 }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($faq->que2))
                                    <div class="card">
                                        <div class="card-header" id="headingSeven">
                                            <h5 class="mb-0">
                                                <button class="btn title collapsed" data-toggle="collapse"
                                                    data-target="#collapseSeven" aria-expanded="false"
                                                    aria-controls="collapseSix">
                                                    <h4>{{ $faq->que2 }}?</h4>
                                                    <div class="square">
                                                        <span class="plus-ico"></span>
                                                        <span class="minus-ico"></span>
                                                    </div>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                            data-parent="#accordion3">
                                            <div class="card-body">

                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <p>No, Lasik surgery is painless. Book your Lasik surgery
                                                            through Medfin to get your eye disorder cured in under 30
                                                            minutes.</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($faq->que3))
                                    <div class="card">
                                        <div class="card-header" id="headingEight">
                                            <h5 class="mb-0">
                                                <button class="btn title collapsed" data-toggle="collapse"
                                                    data-target="#collapseEight" aria-expanded="false"
                                                    aria-controls="collapseEight">
                                                    <h4>Is the outcome of a Lasik eye surgery permanent?</h4>
                                                    <div class="square">
                                                        <span class="plus-ico"></span>
                                                        <span class="minus-ico"></span>
                                                    </div>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                            data-parent="#accordion3">
                                            <div class="card-body">

                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <p>Yes, the outcome of the surgery is permanent as the vision
                                                            defects in your eyes are corrected by reshaping the cornea.
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($faq->que4))
                                    <div class="card">
                                        <div class="card-header" id="headingNine">
                                            <h5 class="mb-0">
                                                <button class="btn title collapsed" data-toggle="collapse"
                                                    data-target="#collapseNine" aria-expanded="false"
                                                    aria-controls="collapseNine">
                                                    <h4>Is the Lasik procedure painful?</h4>
                                                    <div class="square">
                                                        <span class="plus-ico"></span>
                                                        <span class="minus-ico"></span>
                                                    </div>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                            data-parent="#accordion3">
                                            <div class="card-body">

                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <p>No, Lasik surgery is painless. Book your Lasik surgery
                                                            through Medfin to get your eye disorder cured in under 30
                                                            minutes.</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($faq->que5))
                                    <div class="card">
                                        <div class="card-header" id="headingTen">
                                            <h5 class="mb-0">
                                                <button class="btn title collapsed" data-toggle="collapse"
                                                    data-target="#collapseTen" aria-expanded="false"
                                                    aria-controls="collapseTen">
                                                    <h4>Is the outcome of a Lasik eye surgery permanent?</h4>
                                                    <div class="square">
                                                        <span class="plus-ico"></span>
                                                        <span class="minus-ico"></span>
                                                    </div>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
                                            data-parent="#accordion3">
                                            <div class="card-body">

                                                <div class="row align-items-center">
                                                    <div class="col-12">
                                                        <p>Yes, the outcome of the surgery is permanent as the vision
                                                            defects in your eyes are corrected by reshaping the cornea.
                                                        </p>
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
    @if (Session::get('user_role') == 'Admin')
        <!--Faq Section edit--->
        <div class="container mb-4">
            <form action="{{ route('master.faq') }}" method="POST">
                <div class="toggle-box-region">
                    <input type="text" name="id" value="{{ $faq->Faq_ID ?? '' }}" hidden>
                    <input type="text" name="service_name" value="{{ $service->ser_name ?? '' }}" hidden>
                    <input class="toggle-box" id="toggleId-1" type="checkbox">
                    <label for="toggleId-1">Click here to Question one!</label>
                    <div class="toggle-box-content"> <input type="text" name="que1" class="form-control"
                            placeholder="Enter Question" value="{{ $faq->que1 ?? '' }}">
                        <textarea type="text" name="ans1" class="form-control"
                            placeholder="Enter Answer">{{ $faq->ans1 ?? '' }}</textarea>
                    </div>

                    <input class="toggle-box" id="toggleId-2" type="checkbox">
                    <label for="toggleId-2">Click here to Question two!</label>
                    <div class="toggle-box-content"> <input type="text" name="que2" id="que1" class="form-control"
                            value="{{ $faq->que2 ?? '' }}" placeholder="Enter Question">
                        <textarea type="text" name="ans2" id="ans2" class="form-control"
                            placeholder="Enter Answer">{{ $faq->ans2 ?? '' }}</textarea>
                    </div>

                    <input class="toggle-box" id="toggleId-3" type="checkbox">
                    <label for="toggleId-3">Click here to Question three!</label>
                    <div class="toggle-box-content">
                        <input type="text" name="que3" id="que3" class="form-control" placeholder="Enter Question"
                            value="{{ $faq->que3 ?? '' }}">
                        <textarea type="text" name="ans3" id="ans3" class="form-control"
                            placeholder="Enter Answer">{{ $faq->ans3 ?? '' }}</textarea>
                    </div>

                    <input class="toggle-box" id="toggleId-4" type="checkbox">
                    <label for="toggleId-4">Click here to Question four!</label>
                    <div class="toggle-box-content"> <input type="text" name="que4" id="que4" class="form-control"
                            placeholder="Enter Question" value="{{ $faq->que4 ?? '' }}">
                        <textarea type="text" name="ans4" id="ans4" class="form-control"
                            placeholder="Enter Answer">{{ $faq->ans4 ?? '' }}</textarea>
                    </div>

                    <input class="toggle-box" id="toggleId-5" type="checkbox">
                    <label for="toggleId-5">Click here to Question Five!</label>
                    <div class="toggle-box-content"><input type="text" name="que5" id="que5" class="form-control"
                            placeholder="Enter Question" value="{{ $faq->que5 ?? '' }}">
                        <textarea type="text" name="ans5" id="ans5" class="form-control"
                            placeholder="Enter Answer">{{ $faq->ans4 ?? '' }}</textarea>
                    </div>
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
                        data-target="#activatfaq{{ $faq->Faq_ID ?? '' }}">
                        <i class="fas fa-power-off"></i> Activate
                    </button>
                @else
                    <button class="btn btn-sm shadow-sm btn-danger text-nowrap" data-toggle="modal"
                        data-target="#deactivatefaq{{ $faq->Faq_ID ?? '' }}">
                        Deactivate
                    </button>
                @endif
                {{-- Status Activate Modal --}}
                <div class="modal fade" id="activatfaq{{ $faq->Faq_ID }}" tabindex="-1" role="dialog"
                    aria-labelledby="#activatfaqlabel{{ $faq->Faq_ID }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-sm">
                            <div class="modal-body rounded">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button><br>
                                <h5 class="text-primary">Are you Sure to Activate ?</h5>
                                <div class="group d-flex justify-content-center">
                                    <form action="{{ route('/faq_status') }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                        <input type="text" name="Faq_ID" value="{{ $faq->Faq_ID }}" hidden>
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
                <div class="modal fade" id="deactivatefaq{{ $faq->Faq_ID }}" tabindex="-1" role="dialog"
                    aria-labelledby="#deactivatefaqlabel{{ $faq->Faq_ID }}" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body rounded">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button><br>
                                <h5 class="text-primary">Are you Sure to Deactivate</h5>
                                <div class="group d-flex justify-content-center">
                                    <form action="{{ route('/faq_status') }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                                        <input type="text" name="Faq_ID" value="{{ $faq->Faq_ID ?? '' }}" hidden>
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
                    <a href="https://www.medfin.in/about-medfin" target="_blank">About
                        Medfin</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/privacy-policy"
                        target="_blank">Privacy Policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                        href="https://www.medfin.in/terms-conditions" target="_blank">Terms and
                        Conditions</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/contact-us"
                        target="_blank">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="https://www.medfin.in/faq"
                        target="_blank">FAQs</a>
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
            <a class="col btn btn-lg btn-danger" href="javascript:void(0)" data-toggle="modal"
                data-target="#appointment-form">Book a Free Consultation</a>
            <a class="col btn btn-lg btn-info" href="tel:7026200200">Call Now</a>
        </div>
    </div>
    <!-- Multi Sticky Buttons Ends -->


    <a class="btn btn-appointment btn-appointment-sticky-desktop" href="javascript:void(0)" data-toggle="modal"
        data-target="#appointment-form"><span class="left-arrow-icon"></span> Book a Free Consultation</a>

    <a href="javascript:void(0)" class="whtsap"><img width="40" src="images/whatsapp.svg"></a>




    <!-- Sidebar Form Starts -->
    <div class="modal fade sidebar-form" id="appointment-form" tabindex="-1" role="dialog"
        aria-labelledby="lead-formTitle" aria-hidden="true">
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
                                        <input type="text" class="form-control border-0" id="Name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control border-0" id="Email"
                                            placeholder="Email">
                                    </div>
                                    <div style="position: relative;" class="form-group">
                                        <div style="position: absolute; top: 7px; left: 0px;">
                                            <img src="images/indian-flag.png" alt="" width="20" class="left">
                                            <span style="font-size: 16px; color: #6e757c;">+91 </span>
                                        </div>
                                        <input style="padding-left: 60px;" type="tel" class="form-control"
                                            id="InputMobile" aria-describedby="MobileHelp" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            <a class="col btn btn-lg btn-appointment" href="javascript:void(0)">Book a Free
                                Consultation</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar Form Ends -->

    <link
        href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700|Roboto+Condensed:300,400,700|Roboto:400,500,700,900"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <script src="{{ asset('medfin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('medfin/js/popper.min.js') }}"></script>
    <script src="{{ asset('medfin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('medfin/js/swiper.min.js') }}"></script>


    <script>
        $(function() {
            $(document).scroll(function() {
                var $nav = $(".navbar-light");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });

        $(function() {
            $(document).scroll(function() {
                var $banner = $(".home-banner");
                var $nav = $(".navbar-light");
                $nav.toggleClass('scrolled2', $(this).scrollTop() > $banner.height());
            });
        });

        $(function() {
            $(document).scroll(function() {
                var $whatsappbutton = $(".whtsap");
                $whatsappbutton.toggleClass('scrolled3', $(this).scrollTop() > (2900));
            });
        });

        var myswiper = new Swiper('.swiper-doctors', {
            slidesPerView: 4,
            spaceBetween: 30,
            // init: false,
            loop: false,
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
            loop: false,
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
        CKEDITOR.replace('overview_description');
        CKEDITOR.replace('desc');
    </script>

</body>

</html>
