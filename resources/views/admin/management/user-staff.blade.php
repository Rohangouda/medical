@extends('layouts.login_layout')
@section('content')

    <style>
    .modal-dialog{
    overflow-y: initial !important;
    /* margin-top: 90px; */
    /* margin-right: 190px; */
}
#myModal{
    height: 100vh;
    -ms-overflow-style: none;  
      scrollbar-width: none;  
    z-index: 9999999;
    overflow-y: scroll;
}
#myModal::-webkit-scrollbar {
    display: none;
}
    </style>
            <div class="main-panel">
                <!-- BEGIN : Main Content-->
                <div class="main-content">
                    <div class="content-overlay"></div>
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header" >
                                        
                                        <div class="row">
                                            <div class="col">
                                                <h4 class="card-title" style="margin-top: 8px;">User / Staff</h4>
                                            </div>
                                            <div class="col text-right">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#myModal">
                                                    <i class="fa fa-user-plus"></i> Staff
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            

                                      <!-- The Modal -->
                                      <div class="modal" id="myModal" style="margin-top: 50px;">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content" style="background-color: whitesmoke">   
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                              <h4 class="modal-title">Add Staff</h4>
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                        <form action="{{ route('staff') }}" method="POST"> 
                                            @csrf
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row" >
                                                            <div class="form-group col-md-6">
                                                                <label for="name">First Name</label>
                                                                <input type="text"class="form-control" name="name" id="" placeholder="Enter Your Name">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="name">Last Name</label>
                                                                <input type="text"class="form-control" name="name" id="" placeholder="Enter Your Name">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="email">Email address</label>
                                                                <input type="email" class="form-control" id="male" placeholder="Enter Your Email">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="phone">Phone </label>
                                                                <input type="text"class="form-control form-group" name="phone" id="" placeholder="Enter Your Phone Number">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="gender">Gender</label><br>
                                                                    <label class="radio-inline"><input type="radio" name="optradio" checked>  male</label>
                                                                 
                                                                    <label class="radio-inline"><input type="radio" name="optradio">  female</label>
                                                                    
                                                                    <label class="radio-inline"><input type="radio" name="optradio">   Others</label>
                                                                
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="address">Address</label>
                                                                <textarea class="form-control" rows="5" id="address"></textarea>
                                                            </div>
                                                        </div>
                                                 </div>  
                                            </div>
                                      
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                      
                                          </div>
                                        </div>
                                      </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive">
                                                     <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Gender</th>
                                                            <th>Address</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user_staff as $staff)
                                                            <tr>
                                                                <td>{{ $loop->iteration}}</td>
                                                                <td>{{$staff->first_name.' '.$staff->last_name}}</td>
                                                                <td>{{$staff->email}}</td>
                                                                <td>{{$staff->phone}}</td>
                                                                <td>{{$staff->gender}}</td>
                                                                <td>{{$staff->address}}</td>
                                                                <td class="text-nowrap">
                                                                <a class="btn btn-sm btn-primary" data-toggle="modal"
                                                                data-target="#view_staff_modal">
                                                                <i class="fa fa-eye"></i></a>
                                                                <a href="tel:{{$staff->phone}}" class="btn btn-sm btn-info"><i class="ft-phone" data-toggle="tooltip" data-placement="bottom" title="Call"></i></a>
                                                                {{-- <a href="/delete-message/{{$staff->id}}"  class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="far fa-trash-alt"></i></a>
                                                                </td>--}}
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
 </div>

@stop