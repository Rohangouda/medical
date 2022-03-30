@extends('layouts.login_layout')
@section('content')

<div class="main-content">
          <div class="content-overlay"></div>
          <div class="content-wrapper"><!--Statistics cards Starts-->
          	<h3>Sales Info</h3>
<div class="row">

  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-purple-love">
      <div class="card-content">

        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">23</h3>
              <span>T</span>
            </div>
            <div class="media-right white text-right">
              <i class="ft-activity font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">25</h3>
              <span>T</span>
            </div>
            <h3 class="media-right white font-weight-bold text-right">
              ₹
            </h3>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-mint">
      <div class="card-content">
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">5</h3>
              <span>Stock</span>
            </div>
            <div class="media-right white text-right">
              <i class="ft-layers font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">9</h3>
              <span>Value</span>
            </div>
             <h3 class="media-right white font-weight-bold text-right">
              ₹
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-king-yna">
      <div class="card-content">
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">2</h3>
              <span>Hold</span>
            </div>
            <div class="media-right white text-right">
              <i class="ft-package font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">5</h3>
              <span>Amount</span>
            </div>
             <h3 class="media-right white font-weight-bold text-right">
              ₹
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
    <div class="card gradient-mint">
      <div class="card-content">
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <a style="color: inherit;" href="{{ URL('/admin/staff-users-list')}}">
                <h3 class="font-large-1 white mb-0">5</h3>
                <span>u</span>
              </a>
            </div>
            <div class="media-right white text-right">
              <i class="ft-users font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <a style="color: inherit;" href="{{ URL('/admin/staff-users-list')}}">
                <h3 class="font-large-1 white mb-0">doctor</h3>
                <span>Total Staff</span>
              <a href="{{ URL('/admin/staff-users-list')}}">
            </div>
            <div class="media-right white text-right">
              <i class="ft-users font-large-1"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!--Statistics cards Ends-->

</div>

          </div>
        </div>

@stop