@extends('layouts.login_layout')
@section('content')

<style type="text/css">
img {
    max-width: 180px;
}

input[type=file] {
    padding: 10px;
    background: white;
}
.modal1{
    display: block !important; 
}

/* Important part */
.modal-dialog{
    overflow-y: initial !important;
    /* margin-top: 90px; */
    /* margin-right: 190px; */
}
#exampleModal{
    height: 100vh;
    -ms-overflow-style: none;  
      scrollbar-width: none;  
    z-index: 9999999;
    overflow-y: scroll;
}
#exampleModal::-webkit-scrollbar {
    display: none;
}
.productDetailsUpdateBtn {
    margin-top: 5px;
}
.img-thumbnail{
    max-height: 175px;
    max-width: 175px;
}
.clone{
    margin-left: 2px;
    margin-right: 2px;
    display: inline-block;
}
.ibox{
    width: 175px;
}
</style>
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script src="{{ asset('js/custom/jquery.table2csv.js') }} "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="{{asset('js/custom/admin/product_list.js?var=')}}{{date('YmdHis')}}"></script>

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
                                    <h4 class="card-title">Product</h4>
                                </div>
                                <div class="col text-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Add Records
                                    </button>
                                </div>

                            </div>
                            {{-- @if(Session::has('message'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                {{ Session::get('message') }}</p>
                            @endif
                            @if($errors->any())
                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                                {{ implode('', $errors->all(':message')) }}
                            </p>
                            @endif --}}
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <button type="button" class="btn btn-md btn-info exportOptionBtn" data-export_type="Excel">Excel</button>
                                                    <button type="button" class="btn btn-md btn-primary exportOptionBtn" data-export_type="PDF">PDF</button>
                                                    <button type="button" class="btn btn-md btn-warning exportOptionBtn" data-export_type="CSV">CSV</button>
                                                </div>
                                                <div class="col-sm-12 col-md-6 text-right">
                                                    <div class="dataTables_filter">
                                                        <label>Search:<input type="text" id="search_text"
                                                                class="form-control form-control-sm" placeholder=""
                                                                id="myInput" autocomplete="FALSE"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table
                                                        class="table table-striped table-bordered zero-configuration dataTable"
                                                        id="DataTables_Table_0" role="grid"
                                                        aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>ID</th>
                                                                <th>ACTION</th>
                                                                <th>NAME</th>
                                                                <th style="min-width: 200px;">PEEPAL STORE PRICE (PER
                                                                    PIECE)</th>
                                                                <th style="min-width: 200px;">MRP PRICE (PER PIECE)</th>
                                                                <th style="min-width: 200px;">QUANTITY</th>
                                                                <th>CATEGORY</th>
                                                                <th>BRAND</th>
                                                                <th>DETAIL</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="product_list"></tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="container">
                                                            <div class="user_pagination d-flex justify-content-center">
                                                                <ul class="nav" style="align-items: center">
                                                                    <li class="nav-item js_pagination_append"
                                                                        style="padding: 10px; ;"></li>
                                                                    <li class="nav-item">
                                                                        <div class="dataTables_length"
                                                                            id="DataTables_Table_0_length" style="margin-top: 10px;">
                                                                            <label> <select id="userPerPage"
                                                                                    name="DataTables_Table_0_length"
                                                                                    aria-controls="DataTables_Table_0"
                                                                                    class="custom-select custom-select-sm form-control form-control-sm" style="display: none;height: 34px;">
                                                                                    <option value="10">10</option>
                                                                                    <option value="25">25</option>
                                                                                    <option value="50">50</option>
                                                                                    <option value="100">100</option>
                                                                                </select> </label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div><br /><br />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table2excel" style="display: none;">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>S.No</th>
                                                                <th>NAME</th>
                                                                <th style="min-width: 200px;">PEEPAL STORE PRICE (PER
                                                                    PIECE)</th>
                                                                <th style="min-width: 200px;">MRP PRICE (PER PIECE)</th>
                                                                <th style="min-width: 200px;">QUANTITY</th>
                                                                <th>CATEGORY</th>
                                                                <th>BRAND</th>
                                                                <th>DETAIL</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="export_product_list"></tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- For Export option -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="exportTable" cellspacing="0" cellpadding="0" style="display: none;">
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>NAME</th>
                                                        <th style="min-width: 200px;">PEEPAL STORE PRICE (PER
                                                            PIECE)</th>
                                                        <th style="min-width: 200px;">MRP PRICE (PER PIECE)</th>
                                                        <th style="min-width: 200px;">QUANTITY</th>
                                                        <th>CATEGORY</th>
                                                        <th>BRAND</th>
                                                        <th>DETAIL</th>
                                                    </tr>
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

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('master.product') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                    @csrf
                    <div class="form-group">
                        <label>Product name*</label>
                        <input type="text" id="brand_name" class="form-control" name="brand_name"
                            placeholder="Enter Product Name" style="background-color: white;" required>
                        <div class="error" id="brand_name_err" style="display: none;font-size: 14px;color:red;"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category*</label>
                                <select name="category" id="category" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                    <option value="">----Select Option----</option>
                                    @if(!empty($cat))
                                    @foreach($cat as $val)
                                    <option value="{{$val->id}}">{{$val->ser_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="error" id="category_id_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div> <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brand</label>
                                <select name="brand" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" tabindex="-1" aria-hidden="true" id="brand">
                                    <option value="">----Select Option----</option>
                                    @if(!empty($b_data))
                                    @foreach($b_data as $value)
                                    <option value="{{$value->id}}">{{$value->brand_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <div class="error" id="brand_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div> <!-- /.form-group -->
                        </div> <!-- /.col -->
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>MRP Price (Per Piece)*</label>
                                <input ext="price" class="form-control" id="mrp_price" name="mrp_price" placeholder="Enter MRP Price"
                                    style="background-color: white;" required>
                                <div class="error" id="mrp_price_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div>
                            <div class="col-md-6">
                                <label>Peepal Store Price (Per Piece)*</label>
                                <input ext="price" id="price" class="form-control" name="price"
                                    placeholder="Enter Peepal Store Price" style="background-color: white;" required>
                                <div class="error" id="price_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                 <label>Quantity*</label>
                                <input type="text" id="quantity" class="form-control" name="quantity"
                                    placeholder="Enter Product Quantity" style="background-color: white;" required>
                                <div class="error" id="quantity_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div>
                            <div class="col-md-3">
                                 <label>Product State*</label>
                                <select id="product_state" name="product_state" class="form-control select2 select2-hidden-accessible" required>
                                    <option value="">--Select Product State--</option>
                                    <option value="0">Liquid</option>
                                    <option value="1">Solid</option>
                                </select>
                                <div class="error" id="product_state_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div>
                            <div class="col-md-3">
                                 <label>Unit</label>
                                <select id="product_unit" name="product_unit" class="form-control select2 select2-hidden-accessible" required>
                                    <option value="">--Select Product Unit--</option>
                                </select>
                                <div class="error" id="product_unit_err" style="display: none;font-size: 14px;color:red;"></div>
                            </div>
                            <div class="col-md-3" id="weight">
                               
                            </div>
                        </div>
                    </div>
                    <label>Product Image*</label>
                    <div class="btn-group">
                        <button class="btn btn-success ml-2 add" type="button">Add Photos</button>
                        <button class="btn btn-danger ml-2 remove" type="button">Remove Photos</button>
                    </div>
                    <div class="form-group images">
                        <div class="clone hide" >
                            <div class="ibox">
                                <div class="control-group input-group mt-4">
                                    <img id="blah1" class="img-thumbnail" src="{{asset('medfin/favicon.png')}}" alt="your image" />
                                    <input type="file" name="filename[]" class="form-control-file" accept="image/png, image/jpeg" onchange="readURL(this,'blah1');" required>
                                </div>
                            </div>
                        </div>
                        <div class="clone hide" id="id1">
                            <div class="ibox">
                                <div class="control-group input-group">
                                    <img id="blah2" class="img-thumbnail" src="{{asset('medfin/favicon.png')}}" alt="your image" />
                                    <input id="input2" type="file" name="filename[]" class="form-control-file" accept="image/png, image/jpeg" onchange="readURL(this,'blah2');">
                                </div>
                            </div>
                        </div>
                        <div class="clone hide" id="id2">
                            <div class="ibox">
                                <div class="control-group input-group ">
                                    <img id="blah3" class="img-thumbnail" src="{{asset('medfin/favicon.png')}}" alt="your image" />
                                    <input id="input3" type="file" name="filename[]" class="form-control-file" accept="image/png, image/jpeg" onchange="readURL(this,'blah3');">
                                </div>
                            </div>
                        </div>
                        <div class="clone hide" id="id3">
                            <div class="ibox">
                                <div class="control-group input-group">
                                    <img id="blah4" class="img-thumbnail"src="{{asset('medfin/favicon.png')}}" alt="your image" />
                                    <input id="input4" type="file" name="filename[]" class="form-control-file" accept="image/png, image/jpeg" onchange="readURL(this,'blah4');">
                                </div>
                            </div>
                        </div>
                        <div class="clone hide" id="id4">
                            <div class="ibox">
                                <div class="control-group input-group">
                                    <img id="blash5" class="img-thumbnail" src="{{asset('medfin/favicon.png')}}" alt="your image" />
                                    <input id="input5" type="file" name="filename[]" class="form-control-file" accept="image/png, image/jpeg" onchange="readURL(this,'blash5');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <div class="form-group">
                            <div style="width: 100%;min-height: 300px;background-color: white;" id="editor-container">
                                {{old('detail')}}
                            </div>
                            <textarea name="detail" style="display:none;" id="hiddenArea"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" id="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end add modal  --}}
{{-- Edit Modal --}}
<div class="modal fade " id="edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #F0F8FF">
                <form action="" method="POST" id="updateUrl" onsubmit="return checkEditForm(this);">
                    @csrf
                    <div class="form-group">
                        <label>category name</label>
                        <input type="text" class="form-control" id="edit-title" name="ser_name" value=""
                            style="background-color: white;">
                    </div>
                    {{-- <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{$users->price}}">
                     </div> --}}
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-lg" value="Update" name="Update">
            </div>
            </form>

        </div>
    </div>
</div>
</div>
{{--end edit modal--}}
<!-- END : End Main Content-->
<input type="hidden" id="edit_product">

@stop