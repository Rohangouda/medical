@if(Session::get('user_role') != 'user')
<!-- main menu-->
<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
<div class="app-sidebar menu-fixed" data-background-color="info"
  data-image="https://st.depositphotos.com/1014674/3519/i/450/depositphotos_35197079-stock-photo-the-doctor.jpg" data-scroll-to-active="true">
  <!-- main menu header-->
  <!-- Sidebar Header starts-->
  <div class="sidebar-header">
    <div class="logo clearfix" style="background: white;">
      <a class="text-center" href="{{URL('/admin/dashboard')}}">
        <div class="my-2"><img src="{{ asset('medfin/medfin-logo.svg') }}" width="120" alt="Apex Logo" /></div>
      </a>
      {{-- <a style=" margin-top: 8px; " class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle"
        href="javascript:;"><i class="toggle-icon  ft-toggle-right" style="color: darkgreen;"
          data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose"
        href="javascript:;"><i class="ft-x"></i></a> --}}
    </div>
  </div>
  <!-- Sidebar Header Ends-->
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="sidebar-content main-menu-content">
    <div class="nav-container">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{URL('/admin/dashboard')}}"><i class="ft-home"></i><span class="menu-title"
              data-i18n="Dashboard">Dashboard</span></a>
        </li>
        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-settings"></i><span class="menu-title"
              data-i18n="UI Kit">Store Management</span>
            {{-- <span class="tag badge badge-pill badge-success float-right mr-1 mt-1">6</span> --}}
          </a>
          <ul class="menu-content">
            <li><a href="{{URL('/admin/master-record/category-list')}}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Grid">Master Category</span></a>
            </li>
            <li><a href="{{ URL('/admin/master-record/brand_list') }}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Typography">Master Brand</span></a>
            </li>
            <li><a href="{{ URL('/admin/product_list') }}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Syntax Highlighter">Product</span></a>
            </li>
            {{-- <li><a href=""><i class="ft-arrow-right submenu-icon"></i><span class="menu-item"
                  data-i18n="Enquiry">Enquiry</span></a>
            </li> --}}

          </ul>
        </li>
        <li class="nav-item"><a href="{{ URL('/admin/order-list')}}"><i class="ft-package"></i><span class="menu-title"
              data-i18n="User/Staff">Order Management</span></a>
        </li>
        <li class="nav-item"><a href="{{ URL('/admin/staff-users-list')}}"><i class="ft-user"></i><span
              class="menu-title" data-i18n="User/Staff">User/Staff</span></a>
        </li>
        <li class="nav-item"><a href="{{ URL('/admin/all-enquiries')}}"><i class="ft-message-square"></i><span
              class="menu-title" data-i18n="Enquiry">Enquiry</span></a>
        </li>
        @if(Session::get('user_role') != 'Staff')
        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-settings "></i><span class="menu-title"
              data-i18n="UI Kit">Page Management</span>
            {{-- <span class="tag badge badge-pill badge-success float-right mr-1 mt-1">6</span> --}}
          </a>
          <ul class="menu-content">
            <li><a href="{{URL('/admin/contact-us-management')}}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Grid">Contact Us</span></a>
            </li>
          </ul>
        </li>
        {{-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-settings "></i><span class="menu-title"
              data-i18n="UI Kit">Sliders</span>
          </a>
          <ul class="menu-content">
            <li><a href="{{URL('/admin/theme-slider')}}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Grid">Home Slider</span></a>
            </li>
            <li><a href="{{URL('/admin/theme-slider')}}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Grid">Product Slider</span></a>
            </li>
          </ul>
        </li> --}}

        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-book-open"></i><span class="menu-title"
              data-i18n="UI Kit">Sliders </span>
            {{-- <span class="tag badge badge-pill badge-success float-right mr-1 mt-1">6</span> --}}
          </a>
          <ul class="menu-content">
            <li><a href="{{URL('/admin/sliders/home-slider')}}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Grid">Home Sliders</span></a></li>
            <li><a href="{{URL('/admin/sliders/product-slider')}}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Grid">Product Sliders</span></a></li>
          </ul>
        </li>
        @endif
        <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-file-text"></i><span class="menu-title"
              data-i18n="UI Kit">Report</span>
            {{-- <span class="tag badge badge-pill badge-success float-right mr-1 mt-1">6</span> --}}
          </a>
          <ul class="menu-content">
            <li><a href="{{URL('/admin/report/order-report')}}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Grid">Order Report</span></a>
            </li>
            <li><a href="{{ URL('/admin/report/product-report') }}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Typography">Product Report</span></a>
            </li>
            <li><a href="{{ URL('/admin/report/search-report') }}"><i class="ft-arrow-right submenu-icon"></i><span
                  class="menu-item" data-i18n="Syntax Highlighter">Search Report</span></a>
              <!-- <li><a href="{{ URL('/admin/report/all-search-report') }}"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Syntax Highlighter">Search Product Report</span></a> -->
            </li>

          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- main menu content-->
  <div class="sidebar-background"></div>

</div>
@endif