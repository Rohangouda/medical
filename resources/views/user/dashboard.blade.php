@extends('layouts.login_layout')
@section('content')

<div class="wrapper">


        <!-- main menu-->
        <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
        <div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="../app-assets/img/sidebar-bg/01.jpg" data-scroll-to-active="true" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
          <!-- main menu header-->
          <!-- Sidebar Header starts-->
          <div class="sidebar-header">
            <div class="logo clearfix"><a class="logo-text float-left" href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/index.html">
                <div class="logo-img"><img src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/logo.png" alt="Peepal Logo"></div><span class="text">Peepal</span></a><a class="nav-toggle d-none d-lg-none d-xl-block is-active" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
          </div>
          <!-- Sidebar Header Ends-->
          <!-- / main menu header-->
          <!-- main menu content-->
          <div class="sidebar-content main-menu-content ps ps--active-y">
            <div class="nav-container">
              <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="has-sub nav-item open sidebar-group-active"><a href="javascript:;"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="tag badge badge-pill badge-danger float-right mr-1 mt-1">2</span></a>
                  <ul class="menu-content">
                    <li class="active"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/dashboard1.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dashboard 1">Dashboard 1</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/dashboard2.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dashboard 2">Dashboard 2</span></a>
                    </li>
                  </ul>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/app-email.html"><i class="ft-mail"></i><span class="menu-title" data-i18n="Email">Email</span></a>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/app-chat.html"><i class="ft-message-square"></i><span class="menu-title" data-i18n="Chat">Chat</span></a>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/app-taskboard.html"><i class="ft-file-text"></i><span class="menu-title" data-i18n="Task Board">Task Board</span></a>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/app-calendar.html"><i class="ft-calendar"></i><span class="menu-title" data-i18n="Calendar">Calendar</span></a>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-aperture"></i><span class="menu-title" data-i18n="UI Kit">UI Kit</span><span class="tag badge badge-pill badge-success float-right mr-1 mt-1">6</span></a>
                  <ul class="menu-content">
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/grids.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Grid">Grid</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/typography.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Typography">Typography</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/syntax-highlighter.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Syntax Highlighter">Syntax Highlighter</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/helper-classes.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Helper Classes">Helper Classes</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/text-utilities.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Text Utilities">Text Utilities</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/color-palette.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Color Palette">Color Palette</span></a>
                    </li>
                    <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Icons">Icons</span></a>
                      <ul class="menu-content">
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/icons-feather.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Feather Icon">Feather Icon</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/icons-font-awesome.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Font Awesome Icon">Font Awesome Icon</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/icons-simple-line.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Simple Line Icon">Simple Line Icon</span></a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-box"></i><span class="menu-title" data-i18n="Components">Components</span></a>
                  <ul class="menu-content">
                    <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Bootstrap">Bootstrap</span></a>
                      <ul class="menu-content">
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-buttons.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Buttons">Buttons</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-alerts.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Alerts">Alerts</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-badges.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Badges">Badges</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-dropdowns.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dropdowns">Dropdowns</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-media-objects.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Media Objects">Media Objects</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-pagination.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Pagination">Pagination</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-progress.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Progress Bars">Progress Bars</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-modals.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Modals">Modals</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-collapse.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Collapse">Collapse</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-lists.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="List">List</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-carousel.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Carousel">Carousel</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-popover.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Popover">Popover</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-tabs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tabs">Tabs</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-tooltip.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tooltip">Tooltip</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-spinner.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Spinner">Spinner</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/components-toast.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Toast">Toast</span></a>
                        </li>
                      </ul>
                    </li>
                    <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Extra">Extra</span></a>
                      <ul class="menu-content">
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-sweet-alerts.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Sweet Alert">Sweet Alert</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-toastr.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Toastr">Toastr</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-nouislider.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="NoUI Slider">NoUI Slider</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-upload.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Upload">Upload</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-dragndrop.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Drag and Drop">Drag and Drop</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-tour.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tour">Tour</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-media-player.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Media Player">Media Player</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-treeview.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Treeview">Treeview</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-swiper.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Swiper">Swiper</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-miscellaneous.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Miscellaneous">Miscellaneous</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-avatar.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Avatar">Avatar</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/ex-component-image-cropper.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Image Cropper">Image Cropper</span></a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-edit"></i><span class="menu-title" data-i18n="Forms">Forms</span></a>
                  <ul class="menu-content">
                    <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Elements">Elements</span></a>
                      <ul class="menu-content">
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-inputs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Inputs">Inputs</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-input-groups.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Input Groups">Input Groups</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-radio.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Radio">Radio</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-checkbox.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Checkbox">Checkbox</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-switch.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Switch">Switch</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-select.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Select">Select</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-editor.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Editor">Editor</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-input-tags.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Input Tag">Input Tag</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-datetimepicker.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Datepicker">Datepicker</span></a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-layout.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Layouts">Layouts</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-validation.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Validation">Validation</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/form-wizard.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Wizard">Wizard</span></a>
                    </li>
                  </ul>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-grid"></i><span class="menu-title" data-i18n="Tables">Tables</span></a>
                  <ul class="menu-content">
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/table-basic.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic">Basic</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/table-extended.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Extended">Extended</span></a>
                    </li>
                  </ul>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-layout"></i><span class="menu-title" data-i18n="Data Tables">Data Tables</span></a>
                  <ul class="menu-content">
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/dt-basic-initialization.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic">Basic</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/dt-advanced-initialization.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Advanced">Advanced</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/dt-data-sources.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Data Sources">Data Sources</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/dt-api.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="API">API</span></a>
                    </li>
                  </ul>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-layers"></i><span class="menu-title" data-i18n="Cards">Cards</span></a>
                  <ul class="menu-content">
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/cards-basic.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic Cards">Basic Cards</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/cards-advanced.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Advanced Cards">Advanced Cards</span></a>
                    </li>
                  </ul>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-map"></i><span class="menu-title" data-i18n="Maps">Maps</span></a>
                  <ul class="menu-content">
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/map-leaflet.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Leaflet Maps">Leaflet Maps</span></a>
                    </li>
                  </ul>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="Charts">Charts</span></a>
                  <ul class="menu-content">
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/charts-apex.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Apex Charts">Apex Charts</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/charts-chartjs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="ChartJs">ChartJs</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/charts-chartist.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Chartist">Chartist</span></a>
                    </li>
                  </ul>
                </li>
                <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-copy"></i><span class="menu-title" data-i18n="Pages">Pages</span></a>
                  <ul class="menu-content">
                    <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Authentication">Authentication</span></a>
                      <ul class="menu-content">
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/auth-forgot-password.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Forgot Password">Forgot Password</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/auth-login.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Login">Login</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/auth-register.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Register">Register</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/auth-lock-screen.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Lock Screen">Lock Screen</span></a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/timeline-horizontal.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Horizontal Timeline">Horizontal Timeline</span></a>
                    </li>
                    <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Vertical Timeline">Vertical Timeline</span></a>
                      <ul class="menu-content">
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/timeline-vertical-center.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Center">Center</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/timeline-vertical-left.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Left">Left</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/timeline-vertical-right.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Right">Right</span></a>
                        </li>
                      </ul>
                    </li>
                    <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Users">Users</span></a>
                      <ul class="menu-content">
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-users-list.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="List">List</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-users-view.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="View">View</span></a>
                        </li>
                        <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-users-edit.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Edit">Edit</span></a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-account-settings.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Account Settings">Account Settings</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-user-profile.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="User Profile">User Profile</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-invoice.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Invoice">Invoice</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-error.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Error">Error</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-coming-soon.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Coming Soon">Coming Soon</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-maintenance.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Maintenance">Maintenance</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-gallery.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Gallery">Gallery</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-search.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Search">Search</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-faq.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="FAQ">FAQ</span></a>
                    </li>
                    <li><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-demo-1/page-knowledge-base.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Knowledge Base">Knowledge Base</span></a>
                    </li>
                  </ul>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-documentation" target="_blank"><i class="ft-book"></i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
                </li>
                <li class=" nav-item"><a href="https://pixinvent.ticksy.com/" target="_blank"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="Support">Support</span></a>
                </li>
              </ul>
            </div>
          <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 875px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 771px;"></div></div></div>
          <!-- main menu content-->
          <div class="sidebar-background" style="background-image: url(&quot;../app-assets/img/sidebar-bg/01.jpg&quot;);"></div>
          <!-- main menu footer-->
          <!-- include includes/menu-footer-->
          <!-- main menu footer-->
          <!-- / main menu-->
        </div>

        <div class="main-panel">
          <!-- BEGIN : Main Content-->
          <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <!--Statistics cards Starts-->
              <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                  <div class="card gradient-purple-love">
                    <div class="card-content">
                      <div class="card-body py-0">
                        <div class="media pb-1">
                          <div class="media-body white text-left">
                            <h3 class="font-large-1 white mb-0">$2,156</h3>
                            <span>Total Tax</span>
                          </div>
                          <div class="media-right white text-right">
                            <i class="ft-activity font-large-1"></i>
                          </div>
                        </div>
                      </div>
                      <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                      <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="10" x2="10" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="48.97222222222222" x2="48.97222222222222" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="87.94444444444444" x2="87.94444444444444" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="126.91666666666666" x2="126.91666666666666" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="165.88888888888889" x2="165.88888888888889" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="204.86111111111111" x2="204.86111111111111" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="243.83333333333331" x2="243.83333333333331" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="282.80555555555554" x2="282.80555555555554" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="321.77777777777777" x2="321.77777777777777" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="360.75" x2="360.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line></g><g><g class="ct-series ct-series-a"><path d="M10,51.667C48.972,60.833,48.972,60.833,48.972,60.833C87.944,33.333,87.944,33.333,87.944,33.333C126.917,42.5,126.917,42.5,126.917,42.5C165.889,15,165.889,15,165.889,15C204.861,42.5,204.861,42.5,204.861,42.5C243.833,33.333,243.833,33.333,243.833,33.333C282.806,42.5,282.806,42.5,282.806,42.5C321.778,24.167,321.778,24.167,321.778,24.167C360.75,38.833,360.75,38.833,360.75,38.833" class="ct-line"></path><line x1="10" y1="51.66666666666667" x2="10.01" y2="51.66666666666667" class="ct-point" ct:value="50"></line><line x1="48.97222222222222" y1="60.833333333333336" x2="48.98222222222222" y2="60.833333333333336" class="ct-point" ct:value="45"></line><line x1="87.94444444444444" y1="33.333333333333336" x2="87.95444444444445" y2="33.333333333333336" class="ct-point" ct:value="60"></line><line x1="126.91666666666666" y1="42.5" x2="126.92666666666666" y2="42.5" class="ct-point" ct:value="55"></line><line x1="165.88888888888889" y1="15" x2="165.89888888888888" y2="15" class="ct-point" ct:value="70"></line><line x1="204.86111111111111" y1="42.5" x2="204.8711111111111" y2="42.5" class="ct-point" ct:value="55"></line><line x1="243.83333333333331" y1="33.333333333333336" x2="243.8433333333333" y2="33.333333333333336" class="ct-point" ct:value="60"></line><line x1="282.80555555555554" y1="42.5" x2="282.81555555555553" y2="42.5" class="ct-point" ct:value="55"></line><line x1="321.77777777777777" y1="24.166666666666664" x2="321.78777777777776" y2="24.166666666666664" class="ct-point" ct:value="65"></line><line x1="360.75" y1="38.83333333333333" x2="360.76" y2="38.83333333333333" class="ct-point" ct:value="57"></line></g></g><g class="ct-labels"></g></svg></div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                  <div class="card gradient-ibiza-sunset">
                    <div class="card-content">
                      <div class="card-body py-0">
                        <div class="media pb-1">
                          <div class="media-body white text-left">
                            <h3 class="font-large-1 white mb-0">$15,678</h3>
                            <span>Total Cost</span>
                          </div>
                          <div class="media-right white text-right">
                            <i class="ft-percent font-large-1"></i>
                          </div>
                        </div>
                      </div>
                      <div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                      <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="10" x2="10" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="48.97222222222222" x2="48.97222222222222" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="87.94444444444444" x2="87.94444444444444" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="126.91666666666666" x2="126.91666666666666" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="165.88888888888889" x2="165.88888888888889" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="204.86111111111111" x2="204.86111111111111" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="243.83333333333331" x2="243.83333333333331" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="282.80555555555554" x2="282.80555555555554" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="321.77777777777777" x2="321.77777777777777" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="360.75" x2="360.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line></g><g><g class="ct-series ct-series-a"><path d="M10,15C48.972,42.5,48.972,42.5,48.972,42.5C87.944,28.75,87.944,28.75,87.944,28.75C126.917,56.25,126.917,56.25,126.917,56.25C165.889,42.5,165.889,42.5,165.889,42.5C204.861,52.125,204.861,52.125,204.861,52.125C243.833,27.375,243.833,27.375,243.833,27.375C282.806,59,282.806,59,282.806,59C321.778,35.625,321.778,35.625,321.778,35.625C360.75,42.5,360.75,42.5,360.75,42.5" class="ct-line"></path><line x1="10" y1="15" x2="10.01" y2="15" class="ct-point" ct:value="80"></line><line x1="48.97222222222222" y1="42.5" x2="48.98222222222222" y2="42.5" class="ct-point" ct:value="60"></line><line x1="87.94444444444444" y1="28.75" x2="87.95444444444445" y2="28.75" class="ct-point" ct:value="70"></line><line x1="126.91666666666666" y1="56.25" x2="126.92666666666666" y2="56.25" class="ct-point" ct:value="50"></line><line x1="165.88888888888889" y1="42.5" x2="165.89888888888888" y2="42.5" class="ct-point" ct:value="60"></line><line x1="204.86111111111111" y1="52.125" x2="204.8711111111111" y2="52.125" class="ct-point" ct:value="53"></line><line x1="243.83333333333331" y1="27.375" x2="243.8433333333333" y2="27.375" class="ct-point" ct:value="71"></line><line x1="282.80555555555554" y1="59" x2="282.81555555555553" y2="59" class="ct-point" ct:value="48"></line><line x1="321.77777777777777" y1="35.625" x2="321.78777777777776" y2="35.625" class="ct-point" ct:value="65"></line><line x1="360.75" y1="42.5" x2="360.76" y2="42.5" class="ct-point" ct:value="60"></line></g></g><g class="ct-labels"></g></svg></div>

                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                  <div class="card gradient-mint">
                    <div class="card-content">
                      <div class="card-body py-0">
                        <div class="media pb-1">
                          <div class="media-body white text-left">
                            <h3 class="font-large-1 white mb-0">$45,668</h3>
                            <span>Total Sales</span>
                          </div>
                          <div class="media-right white text-right">
                            <i class="ft-trending-up font-large-1"></i>
                          </div>
                        </div>
                      </div>
                      <div id="Widget-line-chart2" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                      <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="10" x2="10" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="48.97222222222222" x2="48.97222222222222" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="87.94444444444444" x2="87.94444444444444" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="126.91666666666666" x2="126.91666666666666" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="165.88888888888889" x2="165.88888888888889" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="204.86111111111111" x2="204.86111111111111" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="243.83333333333331" x2="243.83333333333331" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="282.80555555555554" x2="282.80555555555554" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="321.77777777777777" x2="321.77777777777777" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="360.75" x2="360.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line></g><g><g class="ct-series ct-series-a"><path d="M10,60.833C48.972,42.5,48.972,42.5,48.972,42.5C87.944,49.833,87.944,49.833,87.944,49.833C126.917,24.167,126.917,24.167,126.917,24.167C165.889,51.667,165.889,51.667,165.889,51.667C204.861,29.667,204.861,29.667,204.861,29.667C243.833,37,243.833,37,243.833,37C282.806,15,282.806,15,282.806,15C321.778,55.333,321.778,55.333,321.778,55.333C360.75,38.833,360.75,38.833,360.75,38.833" class="ct-line"></path><line x1="10" y1="60.833333333333336" x2="10.01" y2="60.833333333333336" class="ct-point" ct:value="45"></line><line x1="48.97222222222222" y1="42.5" x2="48.98222222222222" y2="42.5" class="ct-point" ct:value="55"></line><line x1="87.94444444444444" y1="49.83333333333333" x2="87.95444444444445" y2="49.83333333333333" class="ct-point" ct:value="51"></line><line x1="126.91666666666666" y1="24.166666666666664" x2="126.92666666666666" y2="24.166666666666664" class="ct-point" ct:value="65"></line><line x1="165.88888888888889" y1="51.66666666666667" x2="165.89888888888888" y2="51.66666666666667" class="ct-point" ct:value="50"></line><line x1="204.86111111111111" y1="29.666666666666664" x2="204.8711111111111" y2="29.666666666666664" class="ct-point" ct:value="62"></line><line x1="243.83333333333331" y1="37" x2="243.8433333333333" y2="37" class="ct-point" ct:value="58"></line><line x1="282.80555555555554" y1="15" x2="282.81555555555553" y2="15" class="ct-point" ct:value="70"></line><line x1="321.77777777777777" y1="55.333333333333336" x2="321.78777777777776" y2="55.333333333333336" class="ct-point" ct:value="48"></line><line x1="360.75" y1="38.83333333333333" x2="360.76" y2="38.83333333333333" class="ct-point" ct:value="57"></line></g></g><g class="ct-labels"></g></svg></div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                  <div class="card gradient-king-yna">
                    <div class="card-content">
                      <div class="card-body py-0">
                        <div class="media pb-1">
                          <div class="media-body white text-left">
                            <h3 class="font-large-1 white mb-0">$32,454</h3>
                            <span>Total Earning</span>
                          </div>
                          <div class="media-right white text-right">
                            <i class="ft-credit-card font-large-1"></i>
                          </div>
                        </div>
                      </div>
                      <div id="Widget-line-chart3" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
                      <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="10" x2="10" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="48.97222222222222" x2="48.97222222222222" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="87.94444444444444" x2="87.94444444444444" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="126.91666666666666" x2="126.91666666666666" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="165.88888888888889" x2="165.88888888888889" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="204.86111111111111" x2="204.86111111111111" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="243.83333333333331" x2="243.83333333333331" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="282.80555555555554" x2="282.80555555555554" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="321.77777777777777" x2="321.77777777777777" y1="15" y2="70" class="ct-grid ct-horizontal"></line><line x1="360.75" x2="360.75" y1="15" y2="70" class="ct-grid ct-horizontal"></line></g><g><g class="ct-series ct-series-a"><path d="M10,37C48.972,53.5,48.972,53.5,48.972,53.5C87.944,15,87.944,15,87.944,15C126.917,60.1,126.917,60.1,126.917,60.1C165.889,42.5,165.889,42.5,165.889,42.5C204.861,48,204.861,48,204.861,48C243.833,28.2,243.833,28.2,243.833,28.2C282.806,53.5,282.806,53.5,282.806,53.5C321.778,26,321.778,26,321.778,26C360.75,39.2,360.75,39.2,360.75,39.2" class="ct-line"></path><line x1="10" y1="37" x2="10.01" y2="37" class="ct-point" ct:value="70"></line><line x1="48.97222222222222" y1="53.5" x2="48.98222222222222" y2="53.5" class="ct-point" ct:value="55"></line><line x1="87.94444444444444" y1="15" x2="87.95444444444445" y2="15" class="ct-point" ct:value="90"></line><line x1="126.91666666666666" y1="60.1" x2="126.92666666666666" y2="60.1" class="ct-point" ct:value="49"></line><line x1="165.88888888888889" y1="42.5" x2="165.89888888888888" y2="42.5" class="ct-point" ct:value="65"></line><line x1="204.86111111111111" y1="48" x2="204.8711111111111" y2="48" class="ct-point" ct:value="60"></line><line x1="243.83333333333331" y1="28.200000000000003" x2="243.8433333333333" y2="28.200000000000003" class="ct-point" ct:value="78"></line><line x1="282.80555555555554" y1="53.5" x2="282.81555555555553" y2="53.5" class="ct-point" ct:value="55"></line><line x1="321.77777777777777" y1="26" x2="321.78777777777776" y2="26" class="ct-point" ct:value="80"></line><line x1="360.75" y1="39.2" x2="360.76" y2="39.2" class="ct-point" ct:value="68"></line></g></g><g class="ct-labels"></g></svg></div>
                    </div>
                  </div>
                </div>
              </div>
  <!--Statistics cards Ends-->

          <!--Line with Area Chart 1 Starts-->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">PRODUCTS SALES</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="chart-info mb-3 ml-3">
                      <span class="gradient-purple-bliss d-inline-block rounded-circle mr-1" style="width:15px; height:15px;"></span>
                      Sales
                      <span class="gradient-mint d-inline-block rounded-circle mr-1 ml-2" style="width:15px; height:15px;"></span>
                      Visits
                    </div>
                    <div id="line-area" class="height-350 lineArea">
                    <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line y1="315" y2="315" x1="50" x2="1533" class="ct-grid ct-vertical"></line><line y1="255" y2="255" x1="50" x2="1533" class="ct-grid ct-vertical"></line><line y1="195" y2="195" x1="50" x2="1533" class="ct-grid ct-vertical"></line><line y1="135" y2="135" x1="50" x2="1533" class="ct-grid ct-vertical"></line><line y1="75" y2="75" x1="50" x2="1533" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="1533" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,315L50,315C120.619,275,191.238,195,261.857,195C332.476,195,403.095,255,473.714,255C544.333,255,614.952,45,685.571,45C756.19,45,826.81,195,897.429,195C968.048,195,1038.667,99,1109.286,99C1179.905,99,1250.524,154,1321.143,189C1391.762,224,1462.381,273,1533,315L1533,315Z" class="ct-area"></path><path d="M50,315C120.619,275,191.238,195,261.857,195C332.476,195,403.095,255,473.714,255C544.333,255,614.952,45,685.571,45C756.19,45,826.81,195,897.429,195C968.048,195,1038.667,99,1109.286,99C1179.905,99,1250.524,154,1321.143,189C1391.762,224,1462.381,273,1533,315" class="ct-line"></path><line x1="50" y1="315" x2="50.01" y2="315" class="ct-point" ct:value="0"></line><line x1="261.8571428571429" y1="195" x2="261.8671428571429" y2="195" class="ct-point" ct:value="20"></line><line x1="473.7142857142857" y1="255" x2="473.7242857142857" y2="255" class="ct-point" ct:value="10"></line><line x1="685.5714285714286" y1="45" x2="685.5814285714285" y2="45" class="ct-point" ct:value="45"></line><line x1="897.4285714285714" y1="195" x2="897.4385714285714" y2="195" class="ct-point" ct:value="20"></line><line x1="1109.2857142857142" y1="99" x2="1109.2957142857142" y2="99" class="ct-point" ct:value="36"></line><line x1="1321.142857142857" y1="189" x2="1321.152857142857" y2="189" class="ct-point" ct:value="21"></line><line x1="1533" y1="315" x2="1533.01" y2="315" class="ct-point" ct:value="0"></line></g><g class="ct-series ct-series-b"><path d="M50,315L50,315C120.619,305,191.238,300.455,261.857,285C332.476,269.545,403.095,183,473.714,183C544.333,183,614.952,231,685.571,231C756.19,231,826.81,123,897.429,123C968.048,123,1038.667,243,1109.286,243C1179.905,243,1250.524,147,1321.143,147C1391.762,147,1462.381,259,1533,315L1533,315Z" class="ct-area"></path><path d="M50,315C120.619,305,191.238,300.455,261.857,285C332.476,269.545,403.095,183,473.714,183C544.333,183,614.952,231,685.571,231C756.19,231,826.81,123,897.429,123C968.048,123,1038.667,243,1109.286,243C1179.905,243,1250.524,147,1321.143,147C1391.762,147,1462.381,259,1533,315" class="ct-line"></path><line x1="50" y1="315" x2="50.01" y2="315" class="ct-point" ct:value="0"></line><line x1="261.8571428571429" y1="285" x2="261.8671428571429" y2="285" class="ct-point" ct:value="5"></line><line x1="473.7142857142857" y1="183" x2="473.7242857142857" y2="183" class="ct-point" ct:value="22"></line><line x1="685.5714285714286" y1="231" x2="685.5814285714285" y2="231" class="ct-point" ct:value="14"></line><line x1="897.4285714285714" y1="123" x2="897.4385714285714" y2="123" class="ct-point" ct:value="32"></line><line x1="1109.2857142857142" y1="243" x2="1109.2957142857142" y2="243" class="ct-point" ct:value="12"></line><line x1="1321.142857142857" y1="147" x2="1321.152857142857" y2="147" class="ct-point" ct:value="28"></line><line x1="1533" y1="315" x2="1533.01" y2="315" class="ct-point" ct:value="0"></line></g></g><g class="ct-labels"><foreignobject style="overflow: visible;" x="50" y="320" width="211.85714285714286" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 212px; height: 20px;">1</span></foreignobject><foreignobject style="overflow: visible;" x="261.8571428571429" y="320" width="211.85714285714286" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 212px; height: 20px;">2</span></foreignobject><foreignobject style="overflow: visible;" x="473.7142857142857" y="320" width="211.85714285714283" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 212px; height: 20px;">3</span></foreignobject><foreignobject style="overflow: visible;" x="685.5714285714286" y="320" width="211.8571428571429" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 212px; height: 20px;">4</span></foreignobject><foreignobject style="overflow: visible;" x="897.4285714285714" y="320" width="211.85714285714278" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 212px; height: 20px;">5</span></foreignobject><foreignobject style="overflow: visible;" x="1109.2857142857142" y="320" width="211.8571428571429" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 212px; height: 20px;">6</span></foreignobject><foreignobject style="overflow: visible;" x="1321.142857142857" y="320" width="211.8571428571429" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 212px; height: 20px;">7</span></foreignobject><foreignobject style="overflow: visible;" x="1533" y="320" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">8</span></foreignobject><foreignobject style="overflow: visible;" y="255" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">0</span></foreignobject><foreignobject style="overflow: visible;" y="195" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">10</span></foreignobject><foreignobject style="overflow: visible;" y="135" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">20</span></foreignobject><foreignobject style="overflow: visible;" y="75" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">30</span></foreignobject><foreignobject style="overflow: visible;" y="15" x="10" height="60" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 60px; width: 30px;">40</span></foreignobject><foreignobject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">50</span></foreignobject></g><defs><lineargradient id="gradient" x1="0" y1="1" x2="1" y2="0"><stop offset="0" stop-color="rgba(0, 201, 255, 1)"></stop><stop offset="1" stop-color="rgba(146, 254, 157, 1)"></stop></lineargradient><lineargradient id="gradient1" x1="0" y1="1" x2="1" y2="0"><stop offset="0" stop-color="rgba(132, 60, 247, 1)"></stop><stop offset="1" stop-color="rgba(56, 184, 242, 1)"></stop></lineargradient></defs></svg></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  <!--Line with Area Chart 1 Ends-->

          <div class="row match-height">
            <div class="col-xl-4 col-lg-12 col-12">
              <div class="card" style="height: 459.875px;">
                <div class="card-header">
                  <h4 class="card-title">Statistics</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p class="font-medium-2 text-center my-2">Last 6 Months Sales</p>
                    <div id="Stack-bar-chart" class="height-300 Stackbarchart mb-2"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><line x1="63.83303125" x2="63.83203125" y1="240" y2="72" class="ct-bar" ct:value="8" style="stroke-width: 5px"></line><line x1="131.49709375" x2="131.49609375" y1="240" y2="51" class="ct-bar" ct:value="9" style="stroke-width: 5px"></line><line x1="199.16115625" x2="199.16015625" y1="240" y2="135" class="ct-bar" ct:value="5" style="stroke-width: 5px"></line><line x1="266.82521875" x2="266.82421875" y1="240" y2="114" class="ct-bar" ct:value="6" style="stroke-width: 5px"></line><line x1="334.48928125" x2="334.48828125" y1="240" y2="93" class="ct-bar" ct:value="7" style="stroke-width: 5px"></line><line x1="402.15334375" x2="402.15234375" y1="240" y2="156" class="ct-bar" ct:value="4" style="stroke-width: 5px"></line></g><g class="ct-series ct-series-b"><line x1="63.83303125" x2="63.83203125" y1="72" y2="30" class="ct-bar" ct:value="2" style="stroke-width: 5px"></line><line x1="131.49709375" x2="131.49609375" y1="51" y2="30" class="ct-bar" ct:value="1" style="stroke-width: 5px"></line><line x1="199.16115625" x2="199.16015625" y1="135" y2="30" class="ct-bar" ct:value="5" style="stroke-width: 5px"></line><line x1="266.82521875" x2="266.82421875" y1="114" y2="30" class="ct-bar" ct:value="4" style="stroke-width: 5px"></line><line x1="334.48928125" x2="334.48828125" y1="93" y2="30" class="ct-bar" ct:value="3" style="stroke-width: 5px"></line><line x1="402.15334375" x2="402.15234375" y1="156" y2="30" class="ct-bar" ct:value="6" style="stroke-width: 5px"></line></g></g><g class="ct-labels"><foreignobject style="overflow: visible;" x="30" y="270" width="67.6640625" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 68px; height: 20px;">Jan</span></foreignobject><foreignobject style="overflow: visible;" x="97.6640625" y="270" width="67.6640625" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 68px; height: 20px;">Feb</span></foreignobject><foreignobject style="overflow: visible;" x="165.328125" y="270" width="67.6640625" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 68px; height: 20px;">Mar</span></foreignobject><foreignobject style="overflow: visible;" x="232.9921875" y="270" width="67.6640625" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 68px; height: 20px;">Apr</span></foreignobject><foreignobject style="overflow: visible;" x="300.65625" y="270" width="67.6640625" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 68px; height: 20px;">May</span></foreignobject><foreignobject style="overflow: visible;" x="368.3203125" y="270" width="67.6640625" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 68px; height: 20px;">Jun</span></foreignobject></g><defs><lineargradient id="linear" x1="0" y1="1" x2="0" y2="0"><stop offset="0" stop-color="#7441DB"></stop><stop offset="1" stop-color="#C89CFF"></stop></lineargradient></defs></svg></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-12">
              <div class="card shopping-cart" style="height: 459.875px;">
                <div class="card-header pb-2">
                  <h4 class="card-title mb-1">Shopping Cart</h4>
                </div>
                <div class="card-content">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table text-center m-0">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><img class="height-50" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/01.png" alt="Generic placeholder image"></td>
                            <td>Espresso</td>
                            <td>1</td>
                            <td>
                              <span class="badge badge-pill bg-light-primary cursor-pointer">Active</span>
                            </td>
                            <td>$19.94</td>
                            <td>
                              <i class="ft-trash-2"></i>
                            </td>
                          </tr>
                          <tr>
                            <td><img class="height-50" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/15.png" alt="Generic placeholder image"></td>
                            <td>iPhone</td>
                            <td>2</td>
                            <td>
                              <span class="badge badge-pill bg-light-danger cursor-pointer">Disabled</span>
                            </td>
                            <td>$99.00</td>
                            <td>
                              <i class="ft-trash-2"></i>
                            </td>
                          </tr>
                          <tr>
                            <td><img class="height-50" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/11.png" alt="Generic placeholder image"></td>
                            <td>iMac</td>
                            <td>1</td>
                            <td>
                              <span class="badge badge-pill bg-light-info cursor-pointer">Paused</span>
                            </td>
                            <td>$299.00</td>
                            <td>
                              <i class="ft-trash-2"></i>
                            </td>
                          </tr>
                          <tr>
                            <td><img class="height-50" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/14.png" alt="Generic placeholder image"></td>
                            <td>iWatch</td>
                            <td>2</td>
                            <td>
                              <span class="badge badge-pill bg-light-success cursor-pointer">Active</span>
                            </td>
                            <td>$24.51</td>
                            <td>
                              <i class="ft-trash-2"></i>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row match-height">
            <div class="col-xl-8 col-lg-12 col-12">
              <div class="card" style="height: 520.75px;">
                <div class="card-header">
                  <h4 class="card-title mb-0">Visit &amp; Sales Statistics</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="chart-info mb-2">
                      <span class="text-uppercase mr-3"><i class="fa fa-circle success font-small-2 mr-1"></i> Sales</span>
                      <span class="text-uppercase"><i class="fa fa-circle info font-small-2 mr-1"></i> Visits</span>
                    </div>
                    <div id="line-area2" class="height-400 lineAreaDashboard">
                    <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line y1="365" y2="365" x1="50" x2="992" class="ct-grid ct-vertical"></line><line y1="277.5" y2="277.5" x1="50" x2="992" class="ct-grid ct-vertical"></line><line y1="190" y2="190" x1="50" x2="992" class="ct-grid ct-vertical"></line><line y1="102.5" y2="102.5" x1="50" x2="992" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="992" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,365L50,356.25L135.636,312.5L221.273,321.25L306.909,268.75L392.545,286.25L478.182,251.25L563.818,260L649.455,181.25L735.091,225L820.727,172.5L906.364,155L992,102.5L992,365Z" class="ct-area"></path><path d="M50,356.25L135.636,312.5L221.273,321.25L306.909,268.75L392.545,286.25L478.182,251.25L563.818,260L649.455,181.25L735.091,225L820.727,172.5L906.364,155L992,102.5" class="ct-line"></path><circle cx="50" cy="356.25" r="4" class="ct-point-circle"></circle><circle cx="135.63636363636363" cy="312.5" r="4" class="ct-point-circle"></circle><circle cx="221.27272727272728" cy="321.25" r="4" class="ct-point-circle"></circle><circle cx="306.90909090909093" cy="268.75" r="4" class="ct-point-circle"></circle><circle cx="392.54545454545456" cy="286.25" r="4" class="ct-point-circle"></circle><circle cx="478.1818181818182" cy="251.25" r="4" class="ct-point-circle"></circle><circle cx="563.8181818181819" cy="260" r="4" class="ct-point-circle"></circle><circle cx="649.4545454545455" cy="181.25" r="4" class="ct-point-circle"></circle><circle cx="735.0909090909091" cy="225" r="4" class="ct-point-circle"></circle><circle cx="820.7272727272727" cy="172.5" r="4" class="ct-point-circle"></circle><circle cx="906.3636363636364" cy="155" r="4" class="ct-point-circle"></circle><circle cx="992" cy="102.5" r="4" class="ct-point-circle"></circle></g><g class="ct-series ct-series-b"><path d="M50,365L50,225L135.636,198.75L221.273,212.75L306.909,93.75L392.545,120L478.182,107.75L563.818,137.5L649.455,50L735.091,85L820.727,58.75L906.364,76.25L992,15L992,365Z" class="ct-area"></path><path d="M50,225L135.636,198.75L221.273,212.75L306.909,93.75L392.545,120L478.182,107.75L563.818,137.5L649.455,50L735.091,85L820.727,58.75L906.364,76.25L992,15" class="ct-line"></path><circle cx="50" cy="225" r="4" class="ct-point-circle"></circle><circle cx="135.63636363636363" cy="198.75" r="4" class="ct-point-circle"></circle><circle cx="221.27272727272728" cy="212.75" r="4" class="ct-point-circle"></circle><circle cx="306.90909090909093" cy="93.75" r="4" class="ct-point-circle"></circle><circle cx="392.54545454545456" cy="120" r="4" class="ct-point-circle"></circle><circle cx="478.1818181818182" cy="107.75" r="4" class="ct-point-circle"></circle><circle cx="563.8181818181819" cy="137.5" r="4" class="ct-point-circle"></circle><circle cx="649.4545454545455" cy="50" r="4" class="ct-point-circle"></circle><circle cx="735.0909090909091" cy="85" r="4" class="ct-point-circle"></circle><circle cx="820.7272727272727" cy="58.75" r="4" class="ct-point-circle"></circle><circle cx="906.3636363636364" cy="76.25" r="4" class="ct-point-circle"></circle><circle cx="992" cy="15" r="4" class="ct-point-circle"></circle></g></g><g class="ct-labels"><foreignobject style="overflow: visible;" x="62.81818181818182" y="370" width="85.63636363636364" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Jan</span></foreignobject><foreignobject style="overflow: visible;" x="148.45454545454544" y="370" width="85.63636363636364" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Feb</span></foreignobject><foreignobject style="overflow: visible;" x="234.09090909090912" y="370" width="85.63636363636365" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Mar</span></foreignobject><foreignobject style="overflow: visible;" x="319.72727272727275" y="370" width="85.63636363636363" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Apr</span></foreignobject><foreignobject style="overflow: visible;" x="405.3636363636364" y="370" width="85.63636363636363" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">May</span></foreignobject><foreignobject style="overflow: visible;" x="491" y="370" width="85.63636363636368" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Jun</span></foreignobject><foreignobject style="overflow: visible;" x="576.6363636363637" y="370" width="85.63636363636363" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Jul</span></foreignobject><foreignobject style="overflow: visible;" x="662.2727272727273" y="370" width="85.63636363636363" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Aug</span></foreignobject><foreignobject style="overflow: visible;" x="747.909090909091" y="370" width="85.63636363636363" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Sep</span></foreignobject><foreignobject style="overflow: visible;" x="833.5454545454545" y="370" width="85.63636363636363" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Oct</span></foreignobject><foreignobject style="overflow: visible;" x="919.1818181818182" y="370" width="85.63636363636363" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 86px; height: 20px;">Nov</span></foreignobject><foreignobject style="overflow: visible;" x="977" y="370" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">Dec</span></foreignobject><foreignobject style="overflow: visible;" y="277.5" x="-5" height="87.5" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 88px; width: 30px;">0</span></foreignobject><foreignobject style="overflow: visible;" y="190" x="-5" height="87.5" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 88px; width: 30px;">50</span></foreignobject><foreignobject style="overflow: visible;" y="102.5" x="-5" height="87.5" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 88px; width: 30px;">100</span></foreignobject><foreignobject style="overflow: visible;" y="15" x="-5" height="87.5" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 88px; width: 30px;">150</span></foreignobject><foreignobject style="overflow: visible;" y="-15" x="-5" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">200</span></foreignobject></g><defs><lineargradient id="gradient2" x1="0" y1="1" x2="0" y2="0"><stop offset="0" stop-opacity="0.2" stop-color="transparent"></stop><stop offset="1" stop-opacity="0.2" stop-color="#60AFF0"></stop></lineargradient><lineargradient id="gradient3" x1="0" y1="1" x2="0" y2="0"><stop offset="0.3" stop-opacity="0.2" stop-color="transparent"></stop><stop offset="1" stop-opacity="0.2" stop-color="#6CD975"></stop></lineargradient></defs></svg></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-12">
              <div class="card gradient-purple-bliss" style="height: 520.75px;">
                <div class="card-content">
                  <div class="card-body">
                    <h4 class="card-title white">Statistics</h4>
                    <div class="p-2 text-center">
                      <a class="white font-medium-1">Month</a>
                      <a class="btn round bg-light-info mx-3 px-3">Week</a>
                      <a class="white font-medium-1">Day</a>
                    </div>
                    <div class="my-3 text-center white">
                      <div class="font-large-2 d-block mb-1">
                        <span>$78.89</span>
                        <i class="ft-arrow-up font-large-2"></i>
                      </div>
                      <span class="font-medium-1">Week2 +15.44</span>
                    </div>
                  </div>
                  <div id="lineChart" class="height-250 lineChart lineChartShadow"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M10,55C36.999,51.667,63.998,45,90.997,45C117.997,45,144.996,58.333,171.995,65C198.994,71.667,225.993,82.778,252.992,85C279.991,87.222,306.99,89,333.99,89C360.989,89,387.988,80.895,414.987,75C441.986,69.105,468.985,59,495.984,51" class="ct-line"></path><line x1="10" y1="55" x2="10.01" y2="55" class="ct-point" ct:value="80"></line><line x1="90.99739583333333" y1="45" x2="91.00739583333333" y2="45" class="ct-point" ct:value="85"></line><line x1="171.99479166666666" y1="65" x2="172.00479166666665" y2="65" class="ct-point" ct:value="75"></line><line x1="252.9921875" y1="85" x2="253.0021875" y2="85" class="ct-point" ct:value="65"></line><line x1="333.9895833333333" y1="89" x2="333.9995833333333" y2="89" class="ct-point" ct:value="63"></line><line x1="414.98697916666663" y1="75" x2="414.9969791666666" y2="75" class="ct-point" ct:value="70"></line><line x1="495.984375" y1="51" x2="495.994375" y2="51" class="ct-point" ct:value="82"></line></g></g><g class="ct-labels"><foreignobject style="overflow: visible;" x="10" y="220" width="80.99739583333333" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 81px; height: 20px;">Mon</span></foreignobject><foreignobject style="overflow: visible;" x="90.99739583333333" y="220" width="80.99739583333333" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 81px; height: 20px;">Tue</span></foreignobject><foreignobject style="overflow: visible;" x="171.99479166666666" y="220" width="80.99739583333334" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 81px; height: 20px;">Wed</span></foreignobject><foreignobject style="overflow: visible;" x="252.9921875" y="220" width="80.99739583333331" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 81px; height: 20px;">Thu</span></foreignobject><foreignobject style="overflow: visible;" x="333.9895833333333" y="220" width="80.99739583333331" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 81px; height: 20px;">Fri</span></foreignobject><foreignobject style="overflow: visible;" x="414.98697916666663" y="220" width="80.99739583333337" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 81px; height: 20px;">Sat</span></foreignobject><foreignobject style="overflow: visible;" x="495.984375" y="220" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">Sun</span></foreignobject></g></svg></div>
                </div>
              </div>
            </div>
          </div>

          <div class="row match-height">
            <div class="col-xl-4 col-md-6 col-12">
              <div class="card" style="height: 486.5px;">
                <div class="card-header">
                  <h4 class="card-title">Statistics</h4>
                </div>
                <div class="card-content">

                  <p class="font-medium-2 text-center mb-0 mt-2">Hobbies</p>
                  <div id="bar-chart" class="height-250 BarChartShadow BarChart">
                  <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><line x1="70.749046875" x2="70.748046875" y1="195" y2="38.33333333333334" class="ct-bar" ct:value="53"></line><line x1="192.245140625" x2="192.244140625" y1="195" y2="138.33333333333331" class="ct-bar" ct:value="23"></line><line x1="313.741234375" x2="313.740234375" y1="195" y2="81.66666666666666" class="ct-bar" ct:value="40"></line><line x1="435.237328125" x2="435.236328125" y1="195" y2="115" class="ct-bar" ct:value="30"></line></g></g><g class="ct-labels"><foreignobject style="overflow: visible;" x="10" y="220" width="121.49609375" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 121px; height: 20px;">Sport</span></foreignobject><foreignobject style="overflow: visible;" x="131.49609375" y="220" width="121.49609375" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 121px; height: 20px;">Music</span></foreignobject><foreignobject style="overflow: visible;" x="252.9921875" y="220" width="121.49609375" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 121px; height: 20px;">Travel</span></foreignobject><foreignobject style="overflow: visible;" x="374.48828125" y="220" width="121.49609375" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 121px; height: 20px;">News</span></foreignobject></g><defs><lineargradient id="gradient4" x1="0" y1="1" x2="0" y2="0"><stop offset="0" stop-color="#8E1A38"></stop><stop offset="1" stop-color="#FAA750"></stop></lineargradient><lineargradient id="gradient5" x1="0" y1="1" x2="0" y2="0"><stop offset="0" stop-color="#1750A5"></stop><stop offset="1" stop-color="#40C057"></stop></lineargradient><lineargradient id="gradient6" x1="0" y1="1" x2="0" y2="0"><stop offset="0" stop-color="#3B1C93"></stop><stop offset="1" stop-color="#60AFF0"></stop></lineargradient><lineargradient id="gradient7" x1="0" y1="1" x2="0" y2="0"><stop offset="0" stop-color="#562DB7"></stop><stop offset="1" stop-color="#F55252"></stop></lineargradient></defs></svg></div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col text-center">
                        <span class="gradient-starfall d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                        <span class="font-medium-4 d-block mb-2">48</span>
                        <span class="font-small-3">Sport</span>
                      </div>
                      <div class="col text-center">
                        <span class="gradient-mint d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                        <span class="font-medium-4 d-block mb-2">9</span>
                        <span class="font-small-3">Music</span>
                      </div>
                      <div class="col text-center">
                        <span class="gradient-purple-bliss d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                        <span class="font-medium-4 d-block mb-2">26</span>
                        <span class="font-small-3">Travel</span>
                      </div>
                      <div class="col text-center">
                        <span class="gradient-ibiza-sunset d-block rounded-circle mx-auto mb-2" style="width:10px; height:10px;"></span>
                        <span class="font-medium-4 d-block mb-2">17</span>
                        <span class="font-small-3">News</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12">
              <div class="card" style="height: 486.5px;">
                <div class="card-header">
                  <h4 class="card-title mb-0">User List</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="media pt-0 pb-2">
                      <img class="mr-3 avatar" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/avatar-s-12.png" alt="Avatar" width="35">
                      <div class="media-body">
                        <h4 class="font-medium-1 mb-0">Jessica Rice</h4>
                        <p class="text-muted font-small-3 m-0">UX Designer</p>
                      </div>
                      <div class="mt-1">
                        <div class="checkbox">
                          <input type="checkbox" id="dash-checkbox1" checked="">
                          <label for="dash-checkbox1"></label>
                        </div>
                      </div>
                    </div>
                    <div class="media py-2">
                      <img class="mr-3 avatar" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/avatar-s-11.png" alt="Avatar" width="35">
                      <div class="media-body">
                        <h4 class="font-medium-1 mb-0">Jacob Rios</h4>
                        <p class="text-muted font-small-3 m-0">HTML Developer</p>
                      </div>
                      <div class="mt-1">
                        <div class="checkbox">
                          <input type="checkbox" id="dash-checkbox2">
                          <label for="dash-checkbox2"></label>
                        </div>
                      </div>
                    </div>
                    <div class="media py-2">
                      <img class="mr-3 avatar" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/avatar-s-3.png" alt="Avatar" width="35">
                      <div class="media-body">
                        <h4 class="font-medium-1 mb-0">Russell Delgado</h4>
                        <p class="text-muted font-small-3 m-0">Database Designer</p>
                      </div>
                      <div class="mt-1">
                        <div class="checkbox">
                          <input type="checkbox" id="dash-checkbox3">
                          <label for="dash-checkbox3"></label>
                        </div>
                      </div>
                    </div>
                    <div class="media py-2">
                      <img class="mr-3 avatar" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/avatar-s-22.png" alt="Avatar" width="35">
                      <div class="media-body">
                        <h4 class="font-medium-1 mb-0">Sara McDonald</h4>
                        <p class="text-muted font-small-3 m-0">Team Leader</p>
                      </div>
                      <div class="mt-1">
                        <div class="checkbox">
                          <input type="checkbox" id="dash-checkbox4" checked="">
                          <label for="dash-checkbox4"></label>
                        </div>
                      </div>
                    </div>
                    <div class="media py-2">
                      <img class="mr-3 avatar" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/avatar-s-18.png" alt="Avatar" width="35">
                      <div class="media-body">
                        <h4 class="font-medium-1 mb-0">Janet Lucas</h4>
                        <p class="text-muted font-small-3 m-0">Project Manger</p>
                      </div>
                      <div class="mt-1">
                        <div class="checkbox">
                          <input type="checkbox" id="dash-checkbox5">
                          <label for="dash-checkbox5"></label>
                        </div>
                      </div>
                    </div>
                    <div class="media py-2">
                      <img class="mr-3 avatar" src="./Dashboard1 - Apex responsive bootstrap 4 admin template_files/avatar-s-21.png" alt="Avatar" width="35">
                      <div class="media-body">
                        <h4 class="font-medium-1 mb-0">Mark Carter</h4>
                        <p class="text-muted font-small-3 m-0">HTML Developer</p>
                      </div>
                      <div class="mt-1">
                        <div class="checkbox">
                          <input type="checkbox" id="dash-checkbox6" checked="">
                          <label for="dash-checkbox6"></label>
                        </div>
                      </div>
                    </div>
                    <div class="text-center mt-2">
                      <button type="button" class="btn bg-light-primary">Add New</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-12">
              <div class="card" style="height: 486.5px;">
                <div class="card-header">
                  <h4 class="card-title">Project Stats</h4>
                </div>
                <div class="card-content">

                  <p class="font-medium-2 text-center mb-0 mt-2">Project Tasks</p>
                  <div id="donut-dashboard-chart" class="height-250 donut">
                  <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-donut" style="width: 100%; height: 100%;"><g ct:series-name="done" class="ct-series ct-done"><path d="M344.783,113.72A90,90,0,0,0,255.492,35" class="ct-slice-donut" ct:value="23" style="stroke-width: 60px;"></path></g><g ct:series-name="progress" class="ct-series ct-progress"><path d="M321.099,186.609A90,90,0,0,0,344.743,113.408" class="ct-slice-donut" ct:value="14" style="stroke-width: 60px;"></path></g><g ct:series-name="outstanding" class="ct-series ct-outstanding"><path d="M167.086,141.864A90,90,0,0,0,321.314,186.38" class="ct-slice-donut" ct:value="35" style="stroke-width: 60px;"></path></g><g ct:series-name="started" class="ct-series ct-started"><path d="M255.492,35A90,90,0,0,0,167.146,142.173" class="ct-slice-donut" ct:value="28" style="stroke-width: 60px;"></path></g><g><text dx="255.4921875" dy="125" text-anchor="middle" class="ct-label">100%</text></g></svg></div>

                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col">
                        <span class="mb-1 text-muted d-block">23% - Started</span>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 23%;" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col">
                        <span class="mb-1 text-muted d-block">28% - Done</span>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 28%;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col">
                        <span class="mb-1 text-muted d-block">35% - Remaining</span>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="col">
                        <span class="mb-1 text-muted d-block">14% - In Progress</span>
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 14%;" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</div>
          <!-- END : End Main Content-->
@stop