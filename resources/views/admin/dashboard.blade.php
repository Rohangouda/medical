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
              <h3 class="font-large-1 white mb-0">{{ $total_sold_count }}</h3>
              <span>Total Sales Count</span>
            </div>
            <div class="media-right white text-right">
              <i class="ft-activity font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">{{$total_sold_amount}}</h3>
              <span>Total Sales</span>
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
              <h3 class="font-large-1 white mb-0">{{$total_stock_count}}</h3>
              <span>Item In Stock</span>
            </div>
            <div class="media-right white text-right">
              <i class="ft-layers font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">{{$total_stock_amount}}</h3>
              <span>Stock Value</span>
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
              <h3 class="font-large-1 white mb-0">{{$total_hold_count}}</h3>
              <span>Item On Hold</span>
            </div>
            <div class="media-right white text-right">
              <i class="ft-package font-large-1"></i>
            </div>
          </div>
        </div>
        <div class="card-body py-0">
          <div class="media pb-1">
            <div class="media-body white text-left">
              <h3 class="font-large-1 white mb-0">{{$total_hold_amount}}</h3>
              <span>Amount Of Hold Item</span>
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
                <h3 class="font-large-1 white mb-0">{{$user_count}}</h3>
                <span>Total Users</span>
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
                <h3 class="font-large-1 white mb-0">{{$staff_count}}</h3>
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

{{-- <div class="row match-height">
  <div class="col-lg-12 col-12">
    <div class="card" style="height: 476.875px;">
      <div class="card-header">
        <h4 class="card-title">Statistics</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <p class="font-medium-2 text-center my-2">Last 6 Months Sales</p>
          <div id="Stack-bar-chart" class="height-300 Stackbarchart mb-2"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><line x1="48.44501041666667" x2="48.44401041666667" y1="240" y2="72" class="ct-bar" ct:value="8" style="stroke-width: 5px"></line><line x1="85.33303125000002" x2="85.33203125000001" y1="240" y2="51" class="ct-bar" ct:value="9" style="stroke-width: 5px"></line><line x1="122.22105208333335" x2="122.22005208333334" y1="240" y2="135" class="ct-bar" ct:value="5" style="stroke-width: 5px"></line><line x1="159.10907291666666" x2="159.10807291666666" y1="240" y2="114" class="ct-bar" ct:value="6" style="stroke-width: 5px"></line><line x1="195.99709375" x2="195.99609375" y1="240" y2="93" class="ct-bar" ct:value="7" style="stroke-width: 5px"></line><line x1="232.88511458333335" x2="232.88411458333334" y1="240" y2="156" class="ct-bar" ct:value="4" style="stroke-width: 5px"></line></g><g class="ct-series ct-series-b"><line x1="48.44501041666667" x2="48.44401041666667" y1="72" y2="30" class="ct-bar" ct:value="2" style="stroke-width: 5px"></line><line x1="85.33303125000002" x2="85.33203125000001" y1="51" y2="30" class="ct-bar" ct:value="1" style="stroke-width: 5px"></line><line x1="122.22105208333335" x2="122.22005208333334" y1="135" y2="30" class="ct-bar" ct:value="5" style="stroke-width: 5px"></line><line x1="159.10907291666666" x2="159.10807291666666" y1="114" y2="30" class="ct-bar" ct:value="4" style="stroke-width: 5px"></line><line x1="195.99709375" x2="195.99609375" y1="93" y2="30" class="ct-bar" ct:value="3" style="stroke-width: 5px"></line><line x1="232.88511458333335" x2="232.88411458333334" y1="156" y2="30" class="ct-bar" ct:value="6" style="stroke-width: 5px"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="30" y="270" width="36.888020833333336" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 37px; height: 20px;">Jan</span></foreignObject><foreignObject style="overflow: visible;" x="66.88802083333334" y="270" width="36.888020833333336" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 37px; height: 20px;">Feb</span></foreignObject><foreignObject style="overflow: visible;" x="103.77604166666667" y="270" width="36.88802083333333" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 37px; height: 20px;">Mar</span></foreignObject><foreignObject style="overflow: visible;" x="140.6640625" y="270" width="36.88802083333334" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 37px; height: 20px;">Apr</span></foreignObject><foreignObject style="overflow: visible;" x="177.55208333333334" y="270" width="36.88802083333334" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 37px; height: 20px;">May</span></foreignObject><foreignObject style="overflow: visible;" x="214.44010416666669" y="270" width="36.888020833333314" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 37px; height: 20px;">Jun</span></foreignObject></g><defs><linearGradient id="linear" x1="0" y1="1" x2="0" y2="0"><stop offset="0" stop-color="#7441DB"></stop><stop offset="1" stop-color="#C89CFF"></stop></linearGradient></defs></svg></div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div class="row match-height">
  <div class="col-xl-4 col-md-6 col-12">
    <div class="card" style="height: 500.5px;">
      <div class="card-header">
        <h4 class="card-title mb-0">New Member <span class="ml-5"><a class="text-success" href="{{ URL('/admin/staff-users-list')}}">See All</a></span></h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          @foreach($user as $data)
          <div class="media pt-0 pb-2">
            <img class="mr-3 avatar" src="{{asset('app-assets/img/portrait/small/user.jpg')}}" alt="Avatar" width="35">
            <div class="media-body">
              <h4 class="font-medium-1 mb-0">{{$data->first_name}} {{$data->last_name}}</h4>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-8 col-lg-12 col-12">
    <div class="card shopping-cart" style="height: 476.875px;">
      <div class="card-header pb-2">
        <h4 class="card-title mb-1">Latest Product <span class="ml-5"><a class="text-success" href="{{ route('get_product') }}">See All</a></span> </h4>
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
                  <th>MRP(₹)</th>
                  <th>Peepal(₹)</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $value)
                <tr>
                  <td><img class="height-50" src="{{ asset('storage/product').'/'.$value->productImagesByMaster[0]->image }}" alt="Generic placeholder image"></td>
                  <td>{{$value->product_name}}</td>
                  <td>{{$value->productExtraProp->quantity ?? ''}}</td>
                  <td>
                    {{$value->productExtraProp->mrp_price ?? ''}}
                  </td>
                  <td><span class="badge badge-pill bg-light-success cursor-pointer">{{$value->productExtraProp->price ?? ''}}</span></td>
                 
                </tr>
                @endforeach
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    
</div>

          </div>
        </div>

@stop