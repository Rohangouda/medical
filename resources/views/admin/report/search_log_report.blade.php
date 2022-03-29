@extends('layouts.login_layout')
@section('content')

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
                                    <h4 class="card-title">Search Result For- {{$get_user->user_name}}</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <!-- <div class="col-sm-12 col-md-6 text-right">
                                                    <div class="dataTables_filter">
                                                        <label><input type="text" id="search_text"
                                                                class="form-control form-control-sm" placeholder="Search by name"
                                                                id="myInput" autocomplete="FALSE"></label>
                                                        <button type="button" class="btn btn-sm btn-primary mb-1" id="_search_btn">Search</button>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No.</th>
                                                                <th>Date</th>
                                                                <th>Search Keyword</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="_search_history"></tbody>
                                                        <!-- <tbody>
                                                            <tr>
                                                                <td>123</td>
                                                                <td>qwe</td>
                                                                <td>xyz</td>
                                                            </tr>
                                                        </tbody> -->
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


<input type="hidden" id="user_id" value="{{Request::segment(4)}}">

<script type="text/javascript">
    $(document).ready(function() {
        let baseUrl = $('#base_url').val();


        let user_id = $('#user_id').val().split('-')[1];
        if(user_id == ''){

        }else{
            $.ajax({
                url: baseUrl+'/admin/reports/detail-search-report-by-user',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'user_id': user_id
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#loader').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                },
                success: function(res){
                    if(res.status == 200){
                        let xy = '';
                        $.each(res.data, function(xyKey, xyVal){
                            xy += '<tr>'+
                                '<td>'+parseInt(xyKey+1)+'</td>'+
                                '<td>'+xyVal.search_date.split('-').reverse().join('-')+'</td>'+
                                '<td>'+
                                    '<ul>';
                                    if(xyVal[0].length > 0){
                                        $.each(xyVal[0], function(iKey, iVal){
                                            xy += '<li>'+iVal.search_keyword+' ('+iVal.total+')</li>';
                                        });
                                    }
                                    xy += '</ul>'+
                                '</td>'+
                            '</tr>';
                        });
                        $('#_search_history').html(xy);
                    }
                },
                complete: function(){
                    $('#loader').modal('hide');
                }
            });
        }
    });
</script>
@stop
