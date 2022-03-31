@extends('layouts.login_layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
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
                                    <h4 class="card-title">Order List</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <table id="table_id" class="display">
                                                  <thead>
                                                      <tr>
                                                          <th>Column 1</th>
                                                          <th>Column 2</th>
                                                          <th>Column 1</th>
                                                          <th>Column 2</th>
                                                          <th>Column 1</th>
                                                          <th>Column 2</th>
                                                          <th>Column 1</th>
                                                          <th>Column 2</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td>Row 1 fchgchgvcgcvcchgcmhgData 1</td>
                                                          <td>Row 1hcgcvhjvjvhn Data 2</td>
                                                          <td>Row 1hgfchgcgnvc nbfchgcg Data 1</td>
                                                          <td>Row 1 Data 2</td>
                                                          <td>Row 1 htdcthgcjgvhjvjData 1</td>
                                                          <td>Row 1 Data 2</td>
                                                          <td>Row 1 Data 1</td>
                                                          <td>Row 1 Data 2</td>
                                                          
                                                      </tr>
                                                      <tr>
                                                          <td>Row 2 Data 1</td>
                                                          <td>Row 2 Data 2</td>
                                                          <td>Row 1 Data 1</td>
                                                          <td>Row 1 Data 2</td>
                                                          <td>Row 1 Data 1</td>
                                                          <td>Row 1 Data 2</td>
                                                          <td>Row 1 Data 1</td>
                                                          <td>Row 1 Data 2</td>
                                                      </tr>
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
    $('#table_id').DataTable();
} );
    </script>
@stop