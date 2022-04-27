@extends('layouts.login_layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
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

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
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

<!-- BEGIN : Main Content-->
<div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <!-- Zero configuration table -->
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title">Banner List</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <table id="list" class="table table-striped table-bordered zero-configuration">
                                                  <thead>
                                                  <tr class="bg-info text-light">
                                                    <th>Id</th>
                                                    <th>Tittle</th>
                                                    <th>Description</th>
                                                    <th>Creation Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(!empty($banner))
                                                    @foreach($banner as $key => $value)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$value->tittle}}</td>
                                                    <td>{{$value->description}}</td>
                                                    <td>{{date('d-m-Y',strtotime($value->created_at))}}</td>
                                                    <td> @if($value->Deactivate == 0) <span class="text-success">Activate</span>@else <span class="text-danger">Deactivate</span> @endif</td>
                                                </tr>
                                                @endforeach
                                                @endif
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
                </div>
        </section>
        <!--/ Zero configuration table -->
    </div>
</div>
<script type="text/javascript">
         $(document).ready( function () {
    $('#list').DataTable();
} );
    </script>
@stop