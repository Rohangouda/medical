@extends('layouts.login_layout')
@section('content')

<script src="{{asset('js/custom/admin/mst_brand.js?var=')}}{{date('YmdHis')}}"></script>
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
                                    <h4 class="card-title">Brand</h4>
                                    {{-- <input type="text" name="" value="{{URL('/')}}"> --}}
                                </div>
                                <div class="col text-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Add Brand 
                                    </button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">

                                                </div>
                                                <div class="col-sm-12 col-md-6 text-right">
                                                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                                <label>Search:<input type="search" id="search_text"
                                                                class="form-control form-control-sm" placeholder=""
                                                                aria-controls="DataTables_Table_0"></label>
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
                                                                <th>NAME</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="mst_brand_list"></tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="container">
                                                            <div class="user_pagination d-flex justify-content-center">
                                                                <ul class="nav">
                                                                    <li class="nav-item js_pagination_append"
                                                                        style="padding: 10px;"></li>
                                                                    <li class="nav-item">
                                                                        <div class="dataTables_length"
                                                                            id="DataTables_Table_0_length"
                                                                            style="margin-top: 10px;">
                                                                            <label> <select id="userPerPage"
                                                                                    name="DataTables_Table_0_length"
                                                                                    aria-controls="DataTables_Table_0"
                                                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                                                    style="display: none;height: 34px;">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('master.brand') }}" method="POST" onsubmit="return checkForm(this);">
                    @csrf
                    <div class="form-group">
                        <label>Brand name*</label>
                        <input type="text" id="brand_name" class="form-control" name="brand_name"
                            placeholder="Enter Brand Name" style="background-color: white;" required>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Submit" name="myButton">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END : End Main Content-->

{{-- Edit Modal --}}
<div class="modal fade" id="brand_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="updateUrl" onsubmit="return checkEditForm(this);">
                    @csrf
                    <div class="form-group">
                        <label>brand name</label>
                        <input type="text" class="form-control edit_brand_name" id="brand_name" name="brand_name"
                            style="background-color: white;">
                    </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-lg" value="Update" name="Update">
            </div>
            </form>

        </div>
    </div>
</div>
</div>
{{--end edit modal--}}

@stop