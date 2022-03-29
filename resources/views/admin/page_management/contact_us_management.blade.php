@extends('layouts.login_layout')
@section('content')

<!-- BEGIN : Main Content-->
<div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        <!-- Card sizing section start -->
        <section id="sizing">

            <div class="row">
                <div class="col-md-12 col-sm-12 mr-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-success">Contact Us Details</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form action="{{URL('admin/contact-us/update')}}" method="POST">
                                    <div class="form-body">
                                        <!-- <h6 class="mt-3 text-primary"><i class="ft-edit mr-2"></i>change Password</h6> -->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                   <label for="mobile">Mobile*</label> 
                                                    <input ext="mobile" id="mobile" class="form-control"
                                                        placeholder="Mobile" name="mobile" value="{{$data->mobile ?? ''}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                   <label for="mobile">Whatsapp*</label> 
                                                    <input ext="mobile" id="whatsapp" class="form-control"
                                                        placeholder="Whatsapp Number" name="whatsapp_mobile" value="{{$data->whatsapp_mobile ?? ''}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Email*</label>
                                                    <input ext="email" id="email" class="form-control"
                                                        placeholder="email" name="email" value="{{$data->email ?? ''}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="address">Address</label>
                                                <textarea class="form-control" name="address" id="address">{{$data->address ?? ''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success mt-1"><i
                                                class="ft-check mr-2"></i>Save Change</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Card sizing section end -->

    </div>
</div>

@stop