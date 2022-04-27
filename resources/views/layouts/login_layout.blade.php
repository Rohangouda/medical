<!DOCTYPE html>
<html class="loading" lang="en">
  <!-- BEGIN : Head-->
    @include('includes.login_head')
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">

  @include('includes.login_header')
    
    <!-- Navbar (Header) Ends-->

    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      @include('includes.login_sidebar')

      <div class="main-panel">

        @yield('content')

        @include('includes.login_footer')

        <!-- Scroll to top button -->
        <button class="btn btn-success scroll-top" type="button"><i class="ft-arrow-up"></i></button>

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
    @include('includes.login_notify')
    <!-- END Notification Sidebar-->
    <!-- Theme customizer Starts-->
     @include('includes.login_theme_builder')
    <!-- Theme customizer Ends-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN VENDOR JS-->
    
    <script src="{{asset('app-assets/vendors/js/switchery.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    
    <!-- BEGIN PAGE VENDOR JS-->
    {{-- <script src="{{asset('app-assets/vendors/js/chartist.min.js')}}"></script> --}}
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="{{asset('app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('app-assets/js/notification-sidebar.min.js')}}"></script>
    <script src="{{asset('app-assets/js/customizer.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scroll-top.min.js')}}"></script>
    <script src="{{asset('app-assets/js/custom.js')}}"></script>

     <script src="{{asset('app-assets/vendors/js/select2.full.min.js')}}"></script>
     <script src="{{asset('app-assets/js/select2.min.js')}}"></script>
     <script src="{{asset('app-assets/js/validation.js')}}"></script>

     {{-- datatable js --}}
    {{--  <script src="{{asset('app-assets/vendors/js/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/datatable/dataTables.bootstrap4.min.js')}}"></script> --}}
    {{--end dt  --}}

    
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    {{-- <script src="{{asset('app-assets/js/dashboard1.min.js')}}"></script> --}}
    <!-- END PAGE LEVEL JS-->

    <div class="modal" id="loader" style="margin-top:170px;">
        <div class="modal-dialog modal-sm mt-5">
            <div class="modal-content">
                <div align="center" class="modal-body" >
                    <img alt="" src="https://www.lnh.edu.pk/BlueTheme/images/preloader/loader.gif" width="100">
                </div>
            </div>
        </div>
    </div>

    <!--Success Modal HTML -->
    <div id="successModal" class="modal fade">
      <div class="modal-dialog modal-confirm" style="margin-top: 80px; color: #636363;
         width: 325px;font-size: 14px;}">
        <div class="modal-content" style="padding: 20px;border-radius: 5px;border-left: 9px solid #82ce34;">
          <div class="modal-header" style="border-bottom: none; position: relative;">
            <div class="icon-box" style="color: #fff;position: absolute; margin: 0 auto;left: 0;right: 0;top: -20px;width: 75px;height: 75px;border-radius: 50%;z-index: 9;background: #82ce34;padding: 15px;text-align: center;box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);">
              <i class="ft-check" style="font-size: 40px; position: relative; top: 3px;"></i>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute;top: -5px;right: -5px;color: #cadcca;">&times;</button>
          </div>
          <div class="modal-body mt-3">
            <p class="text-center">
              @if(Session::has('message'))
                  <div>
                      <p class="text-center big text-green">{{ Session::get('message') }}</p>
                  </div>
              @endif
              @if(Session::has('messagered'))
                  <div class="alert flex-center" style="background: red;">
                      <p class="text-center big text-red">{{ Session::get('messagered') }}</p>
                  </div>
              @endif
              @if (count($errors) > 0)
                  <div>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  <br><br>
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>
    {{-- end success modal --}}
    {{-- start failed modal --}}
    <div id="failModal" class="modal fade">
      <div class="modal-dialog modal-confirm modal-sm" style="background: #eda645 !important;outline: none; color: #434e65;width: 525px;">
        <div class="modal-content" style="padding: 20px;font-size: 16px;border-radius: 5px;border-bottom: 5px solid #ffc107;">
          <div class="modal-header justify-content-center" style="background: #ffc107;border-bottom: none;   position: relative;text-align: center;margin: -20px -20px 0;border-radius: 5px 5px 0 0;">
            <div class="icon-box" style="color: #fff;width: 95px; height: 95px;display: inline-block; border-radius: 50%; z-index: 9; border: 5px solid #fff; padding: 15px; text-align: center;">
              <i class="fa fa-exclamation-triangle" style="font-size: 58px;"></i>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 15px; right: 15px; color: #fff;">&times;</button>
          </div>
          <div class="modal-body text-center">
            <p id="fail_modal_text_section">
              @if(Session::has('message'))
                  <div>
                      <p class="text-center big text-green">{{ Session::get('message') }}</p>
                  </div>
              @endif
              @if(Session::has('messagered'))
                  <div class="alert flex-center">
                      <p class="text-center big text-danger">{{ Session::get('messagered') }}</p>
                  </div>
              @endif
              @if (count($errors) > 0)
                  <div>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  <br><br>
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>
    {{-- end failed modal --}}
    {{-- start error modal --}}
    <div id="errorModal" class="modal fade">
      <div class="modal-dialog modal-confirm modal-sm" style="margin-top: 50px; color: #434e65; width: 525px;">
        <div class="modal-content" style="padding: 20px;font-size: 16px;border-radius: 5px;border-bottom: 5px solid #dc3545;">
          <div class="modal-header justify-content-center bg-danger" style="background: #e85e6c;border-bottom: none;   position: relative;text-align: center;margin: -20px -20px 0;border-radius: 5px 5px 0 0;">
            <div class="icon-box" style="color: #fff;   width: 90px;height: 90px;display: inline-block;border-radius: 50%;z-index: 9;border: 5px solid #fff;padding: 15px;text-align: center;">
              <i class="ft-alert-triangle" style="font-size: 51px;">&#xE5CD;</i>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 15px; right: 15px; color: #fff;">&times;</button>
          </div>
          <div class="modal-body text-center">
           <p>
              @if(Session::has('message'))
                  <div>
                      <p class="text-center big text-green">{{ Session::get('message') }}</p>
                  </div>
              @endif
              @if(Session::has('messagered'))
                  <div class="alert flex-center">
                      <p class="text-center big text-danger">{{ Session::get('messagered') }}</p>
                  </div>
              @endif
              @if (count($errors) > 0)
                  <div>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  <br><br>
              @endif
            </p>
          </div>
        </div>
      </div>
    </div>
    {{-- end error modal --}}

  </body>
  <!-- END : Body-->
  <input type="hidden" id="base_url" value="{{URL('/')}}">
  <input type="hidden" id="user_role" value="{{Session::get('user_role')}}">
</html>