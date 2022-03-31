@extends('layouts.login_layout')
@section('content')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
            <div>
            @if(Session::has('message'))
                        <div class="alert flex-center alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    @if(Session::has('messagered'))
                        <div class="alert flex-center alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>{{ Session::get('messagered') }}</p>
                        </div>
                    @endif
             </div>     
                        
                    <form action="{{route('master.banner')}}" method="POST">
                          @csrf                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Select Service</label>
                                    <select class="form-select form-control" aria-label="Default select service_id"  name="service_name" Required>
                                    @foreach($service as $ser)
                                    <option value="{{$ser->ser_name}}">{{$ser->ser_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                           <!-- Card sizing section start -->
                            <section id="sizing">
                                <div class="row">
                                <form action="{{route('master.banner')}}" method="POST">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-primary">Banner</h4>
                                                <input list="magicHouses" id="myHouse" name="service_name" placeholder="type here..." />
                                                    <datalist id="magicHouses">
                                                    @foreach($service as $ser)
                                                    <option value="{{$ser->ser_name}}">{{$ser->ser_name}}</option>
                                                    @endforeach

                                                </datalist>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title">Tittle</label>
                                                                        <input type="text"  name="banner_tittle" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Description" name="banner_description">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="image">Image</label>
                                                                        <input type="file" class="form-control"
                                                                            placeholder="" name="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-primary my-5"><i
                                                                        class="ft-check mr-2"></i>Save Change</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!---overview-->
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-primary">Overview</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="tittle">Tittle</label>
                                                                        <input type="text" id="" name="overview_tittle"class="form-control"
                                                                        >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <textarea name="overview_description" id="overview_description" placeholder="Enter Description" style="background-color: white;" required></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="confirm_pass">Image</label>
                                                                        <input type="file" id="" class="form-control"
                                                                            placeholder="" name="">
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
                            <!-- CTreatment option start -->
                            <!-- <section id="sizing">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-primary">Treatment Option</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title">Heading</label>
                                                                        <input type="text"  name="heading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Description" name="description">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Subheading</label>
                                                                        <input type="text"  name="subheading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Accordion Tittle</label>
                                                                                <input type="text" name="acc_tittle_to" class="form-control" placeholder="Accordion Tittle"
                                                                                    Required>
                                                                                <input type="text" name="bullet_tittle_to" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="bullet_content_to" class="form-control" placeholder="Bullet Content"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Accordion Content</label>
                                                                        <textarea type="text"  name="acc_content_to" class="form-control"
                                                                         ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!---Causes & symptoms-->
                               <!-- <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title btn btn-primary">Causes & Symptoms</h4>
                                            </div>
                                            <div class="card-content">
                                            <div class="card-content">
                                                <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title">Heading</label>
                                                                        <input type="text"  name="heading" class="form-control"
                                                                         Required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="description">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Enter Description" name="description">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Accordion Tittle</label>
                                                                                <input type="text" name="acc_tittle_to" class="form-control" placeholder="Accordion Tittle"
                                                                                    Required>
                                                                                <input type="text" name="bullet_tittle_to" class="form-control" placeholder="Bullet Tittle" >
                                                                                <textarea type="text"  name="bullet_content_to" class="form-control" placeholder="Bullet Content"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Accordion Content</label>
                                                                        <textarea type="text"  name="acc_content_to" class="form-control"
                                                                         ></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="heading">Image</label>
                                                                        <input type="file"  name="subheading" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section> -->
                             <!-- Causes & symptoms end -->
                             <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block my-5"><i
                                        class="ft-check mr-2"></i>Save Change</button>
                            </div>
                        </form>          
                            
    </div>
</div>
<script>
    CKEDITOR.replace( 'overview_description' );
        CKEDITOR.replace( 'desc' );
</script>
@stop