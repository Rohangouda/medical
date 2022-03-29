<!DOCTYPE html>
<html lang="en">

@include('includes.head')

<body class="sub_page">
    <!-- <div class="modal" id="loader" style="background: #CCCCB2;background: -webkit-linear-gradient(to right, #757519, #CCCCB2);background: linear-gradient(to right, #757519, #CCCCB2);">
        <div class="modal-dialog" style="top:40%;margin:0 auto;">
            <div class="modal-content"
                style="border-radius: 10px;background: transparent;border: none;box-shadow: none !important;">
                <div align="center" class="modal-body"
                    style="border-radius: 10px;background: transparent;border: none;box-shadow: none !important;">
                    <img alt="" src="{{ asset('app-assets/img/loader.gif')}}" width="200">
                </div>
            </div>
        </div>
    </div> -->

    @include('includes.header')

    @include('includes.loginmodal')

    @yield('content')

    @include('includes.footer')

    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- custom js -->
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('app-assets/js/validation.js')}}"></script>
    <!-- <script src="{{asset('app-assets/js/scroll-top.min.js')}}"></script> -->
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
</body>
    <input type="hidden" id="user_role" value="{{Session::get('user_role')}}">
</html>