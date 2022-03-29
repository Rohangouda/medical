@extends('layouts.home_layout')
@section('content')
<script src="{{asset('js/custom/admin/order_list.js?var=')}}{{date('YmdHis')}}"></script>
<style type="text/css">
img {
    max-width: 180px;
}

input[type=file] {
    padding: 10px;
    background: white;
}
</style>

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
                                    <h4 class="card-title" style="padding-left: 20px; color:green; font-weight: 600">My Order</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table
                                                        class="table table-striped table-bordered zero-configuration dataTable"
                                                        id="DataTables_Table_0" role="grid"
                                                        aria-describedby="DataTables_Table_0_info" style="width:100%; color:green ">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>#</th>
                                                                <th>ORDER NO.</th>
                                                                <th>DATE</th>
                                                                <th>STATUS</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="orders_list"></tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="container">
                                                            <div class="user_pagination d-flex justify-content-center">
                                                                <ul class="nav">
                                                                    <li class="nav-item js_pagination_append"
                                                                        style="padding: 10px;"></li>
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

{{-- Order Operation Modal --}}
<!-- Modal -->
<div class="modal fade" id="view_order_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-5" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">Order Details: # <span id="view_order_id"></span><br><span id="ordered_user_name"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
        <div class="row _all_ordered_items" id="pro_details">
            
        </div>
      </div>
      <div class="modal-footer bg-success" style="display: block !important;">
        <div class="row">
            <div class="col-6 mt-1" id="total_price">
                 
            </div>
            <div class="col-6" id="modal_action_btn">
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- end Order operation Modal --}}
@stop