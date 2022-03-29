<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{ asset('medfin/favicon.png') }}" type="image/x-icon">

  <title>@if(isset($page_title)) {{ $page_title }} @endif</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  {{-- <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" /> --}}
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
  {{-- login page css --}}
  {{-- <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script> --}}

  <!-- jQery -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
  <!-- <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script> -->
  <!-- 
  <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script> -->
  
  <style>
    .round-left {
    border-bottom-left-radius:50%;
    border-top-left-radius:50%;
    margin-right: -6px;
    margin-top:-2px;
    }
    .round-right {
        border-top-right-radius: 50%;
        border-bottom-right-radius:50%;
        margin-left: -6px;
        margin-top:-2px;
    }
    .round-null {
        height: 31px;
        border: 1px solid #31b0d5;
    }
   .footer_section {
    background-color: green;
    }

/*header section*/
  .hero_area {
        min-height: 0vh;
    }

  .feature_section .box .img-box {
    height: 120px;
   }

.user_option-box a {
     margin-left: 0px; 
}
.modal-full {
    min-width: 100%;
    margin: 0;
}

/*Right*/
@media only screen and (min-width: 600px) {
  .modal-full {
    min-width: 300px;
    margin: 0;
}
  .modal.right.fade .modal-dialog {
    right: -64%;
    -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
       -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
         -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
  }
}
  
  .modal.right.fade.in .modal-dialog {
    right: 0;
  }
/*end right*/

.modal-full .modal-content {
    min-height: 100vh;
}

  </style>
  
</head>