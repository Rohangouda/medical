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

<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script src="{{ asset('js/custom/jquery.table2csv.js') }} "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="{{asset('js/custom/admin/reports/search_log_report.js?var=')}}{{date('YmdHis')}}"></script> 
{{-- <script src="{{ asset('dist/dropzone.js') }}"></script> --}}

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
                                    <h4 class="card-title">Search Report</h4>
                                </div>
                                <div class="col text-right">
                                    <!-- Button trigger modal -->
                                    <!-- <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Add Records
                                    </button> -->
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
                                                    <!-- <button type="button" class="btn btn-md btn-info exportOptionBtn" data-export_type="Excel">Excel</button>
                                                    <button type="button" class="btn btn-md btn-primary exportOptionBtn" data-export_type="PDF">PDF</button>
                                                    <button type="button" class="btn btn-md btn-warning exportOptionBtn" data-export_type="CSV">CSV</button> -->
                                                </div>
                                                <div class="col-sm-12 col-md-6 text-right">
                                                    <div class="dataTables_filter">
                                                        <label><input type="text" id="search_text"
                                                                class="form-control form-control-sm" placeholder="Search by name"
                                                                id="myInput" autocomplete="FALSE"></label>
                                                        <button type="button" class="btn btn-sm btn-primary mb-1" id="_search_btn">Search</button>
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
                                                                <th>S.No.</th>
                                                                <th>NAME</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="search_history_tbody"></tbody>
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
                                                                                    class="custom-select custom-select-sm form-control form-control-sm" style="height: 34px;">
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
<div class="modal fade" id="detail_log_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="detail_log_modal_label"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                <!-- <table class="table table-striped table-bordered zero-configuration dataTable" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id="product_order_details"></tbody>
                </table> -->
            </div>
        </div>
    </div>
</div>
{{-- end add modal  --}}
<!-- END : End Main Content-->
<input type="hidden" id="edit_product">

@stop