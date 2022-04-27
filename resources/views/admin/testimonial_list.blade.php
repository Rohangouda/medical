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
        
    {{-- start add modal --}}
                    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog mt-3" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class="modal-title text-light" id="exampleModalLabel">Add Testimonial <i class="ft-message-circle"></i></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" >
                                    <form action="{{route('master.testimonials')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input type="text" id="name" class="form-control" name="name"
                                                placeholder="Enter customer Name" style="background-color: white;" required>
                                        </div> 
                                         <div class="form-group">
                                            <label>Message*</label>
                                            <textarea type="text" id="content" class="form-control" name="message"
                                                placeholder="Enter Message ..." style="background-color: white;"  rows="4" cols="50" required></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>City*</label>
                                            <input type="text" id="city" class="form-control" name="city" 
                                                placeholder="Enter City" style="background-color: white;" required>
                                        </div>                   
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-info" value="Submit" name="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end add modal --}}
        <!-- Zero configuration table -->
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title">What Customers Says</h4>
                                    <button class="btn btn-primary float-right mr-3" data-toggle="modal"
                                        data-target="#customerModal">Add New <i class="ft-plus-circle"></i></button>
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
                                                          <th>#</th>
                                                          <th style="width: 113.6375px;">Full Name</th>
                                                          <th>Message</th>
                                                          <th>City</th>
                                                          <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                  @if(!empty($customer))
                                                     @foreach($customer as $key => $val)
                                                      <tr>
                                                      <td>{{$loop->iteration}}</td>
                                                          <td>{{$val->name}} </td>
                                                          <td>{{$val->message}}</td>
                                                          <td>{{$val->city}}</td>
                                                          <td>
                                                            <button type="button" class="btn btn-info ml-2 mb-1" data-toggle="modal"
                                                                data-target="#EditModal{{$val->id}}"><i class="ft-edit-2 text-light"></i></button>
                                                            <button type="button" class="btn btn-danger ml-2" data-toggle="modal"
                                                                data-target="#DelModal{{$val->id}}"><i class="ft-trash-2 text-light"></i></button>
                                                            </td>
                                                      </tr>
                                                       <!-- Update partner Details-->
                    <div class="modal fade" id="EditModal{{$val->id}}" tabindex="-1"
                        aria-labelledby="EditModalLabel{{$val->id}}" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog mt-2">
                            <div class="modal-content">

                                <div class="modal-header bg-info">
                                    <h5 class="modal-title h4" id="EditModalLabel{{$val->id}}">
                                        Update
                                        Testimonials Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update.testimonials') }}" method="POST">
                                        @csrf
                                        <input type="text" name="id" value="{{$val->id}}" hidden>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="group">
                                                    <label>Costomer Name</label>
                                                    <input class="form-control" name="name"
                                                    value="{{$val->name}}" required>
                                                </div>
                                            </div>                                      
                                </div>
                                  <div class="row">
                                            <div class="col-md">
                                                <div class="group">
                                                <label>Message</label>
                                                    <textarea class="form-control" name="message"  rows="4" cols="50"
                                                     required>{{$val->message}}</textarea>
                                                </div>
                                            </div>                                      
                                </div>
                                   <div class="row">
                                            <div class="col-md">
                                                <div class="group">
                                                <label>City</label>
                                                    <input class="form-control" name="city" value="{{$val->city}}"
                                                     required>
                                                </div>
                                            </div>                                      
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
               </div>  
           </div>
            {{--Update modal end--}}
            {{--delete modal start--}}
                 <div class="modal fade" id="DelModal{{$val->id}}" tabindex="-1"
                        aria-labelledby="DelModalLabel{{$val->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="DelModalLabel{{$val->id}}">Delete
                                        Record
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <h5 class="ml-5 mt-2">Are you sure to delete this record?</h5><br>
                                <div class="modal-footer d-flex justify-content-center">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('delete.testimonials') }}" method="POST">
                                        @csrf
                                        <input type="text" name="id" value="{{$val->id}}" hidden>
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                   </div>
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