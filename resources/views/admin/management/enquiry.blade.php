@extends('layouts.login_layout')
@section('content')

<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ">Enquiries List</h4>
                            <a class="heading-elements-toggle"></a>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="_enquiries"></tbody>
                                    </table>
                                    <div class="row">
                                        <div class="container">
                                            <div class="user_pagination d-flex justify-content-center">
                                                <ul class="nav">
                                                    <li class="nav-item js_pagination_append" style="padding: 10px;">
                                                    </li>
                                                    <li class="nav-item">
                                                        <div class="dataTables_length" id="DataTables_Table_0_length"
                                                            style="margin-top: 10px;">
                                                            <label> <select id="userPerPage"
                                                                    name="DataTables_Table_0_length"
                                                                    aria-controls="DataTables_Table_0"
                                                                    class="custom-select custom-select-sm form-control form-control-sm"
                                                                    style="display: block;height: 34px;">
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

<!-- view enquiry Modal -->
<div class="modal fade" id="view_enquiry_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">VIEW ENQUIRY DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="container">
                        <table class="form-group">
                            <tr>
                                <th>Name </th>
                                <td >
                                    <span class="form-control ml-3 mb-2" id="e_name"></span>
                                </td>
                            </tr>
                            <tr>
                                <th>Contact No.  </th>
                                <td>
                                     <span class="form-control ml-3 mb-2" id="e_phone"></span>
                                </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td>
                                    <span class="form-control ml-3 mb-2" id="e_email"></span>
                                </td>
                            </tr>
                            <tr>
                                <th> Message </th>
                                <td>
                                  <textarea class="form-control ml-3 mb-2" id="e_msg" cols="35" rows="5" readonly> </textarea> 
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-info">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    let baseUrl = $('#base_url').val();
    let page = 0;
    let perPage = $('#userPerPage').val();
    let search_text = '';

    let next_page_url = '';
    let prev_page_url = '';
    getAllEnquiries(page, perPage, search_text);

    function getAllEnquiries(page, perPage, search_text) {
        $.ajax({
            url: baseUrl + '/admin/enquiry/all-enquiries-list',
            type: "POST",
            data: {
                '_token': '{{csrf_token()}}',
                'page': page,
                'perPage': perPage,
                'search_text': search_text
            },
            dataType: 'json',
            beforeSend: function() {
                $('#loader').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            success: function(res) {
                if (res.status == 200) {
                    _renderEnquiriesRecords(res.enquiry_list.data);
                    $('.js_pagination_append').html(res.pagination);
                    if (res.pagination != null) {
                        if (res.enquiry_list.next_page_url != null) {
                            next_page_url = res.enquiry_list.next_page_url.split('=')[1];
                        } else {
                            next_page_url = '';
                        }
                        if (res.enquiry_list.prev_page_url != null) {
                            prev_page_url = res.enquiry_list.prev_page_url.split('=')[1];
                        } else {
                            prev_page_url = '';
                        }
                        $('#userPerPage').css('display', 'block');
                    } else {
                        $('#userPerPage').css('display', 'none');
                    }
                } else {
                    $('#_enquiries').html('<tr><td colspan="5" style="text-align:center;">' + res
                        .msg + '</td></tr>');
                }
            },
            complete: function() {
                $('#loader').modal('hide');
                $('.page-link').attr('href', 'javascript:void(0)');
            }
        });
    }

    const _renderEnquiriesRecords = (data, Extra) => {
        let x = '';
        $.each(data, function(eKey, eVal) {
            x += '<tr>' +
                '<td   >' + parseInt(eKey + 1) + '</td>' +
                '<td>' + eVal.name + '</td>' +
                '<td>' + eVal.phone + '</td>' +
                '<td>' + eVal.email + '</td>' +
                '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary view_enquiry" data-enquiry_id=' +
                eVal.id + ' data-name="'+eVal.name+'" data-phone="'+eVal.phone+'" data-email="'+eVal.email+'" data-msg="'+eVal.message+'"><i class="fa fa-eye" aria-hidden="true"></i></button> ' +
                ' <button type="button" class="btn btn-sm btn-danger delete_enquiry_record" data-enquiry_id=' +
                eVal.id + '><i class="fa fa-trash" aria-hidden="true"></i></button></td>' +
                '</tr>';
        });
        $('#_enquiries').html(x);
    }

    $(document).on('click', '.page-link', function() {
        let $checkOption = $(this).attr('rel');
        let $page = '';
        if ($checkOption == 'next') {
            $page = next_page_url;
        } else if ($checkOption == 'prev') {
            $page = prev_page_url;
        } else {
            $page = $(this).html();
        }
        getAllEnquiries($page, perPage, search_text);
    });

    $(document).on('change', '#userPerPage', function() {
        let perPage = $(this).val();
        getAllEnquiries(page, perPage, search_text);
    });

    $(document).on('click', '.view_enquiry', function() {
        $('#e_name').html($(this).data('name'));
        $('#e_phone').html($(this).data('phone'));
        $('#e_email').html($(this).data('email'));
        $('#e_msg').html($(this).data('msg'));

        $('#view_enquiry_modal').modal({
            backdrop: 'static',
            keyboard: false
        });
       
    });

    $(document).on('click', '.delete_enquiry_record', function() {
        if (confirm("Are you sure, you want to delete this enquiry on your database")) {
            let enquiry_id = $(this).data('enquiry_id');
            if (enquiry_id == '') {
                alert('OOPS! something went wrong, please re-fresh your browser.');
                location.reload();
            } else {
                $.ajax({
                    url: baseUrl + '/admin/enquiry/delete-enquiry',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': enquiry_id
                    },
                    beforeSend: function() {
                        $('#loader').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    },
                    success: function(res) {
                        if (res.status == 200) {
                            alert(res.msg);
                            location.reload();
                        } else {
                            alert(res.msg);
                        }
                    },
                    complete: function() {
                        $('#loader').modal('hide');
                    }
                });
            }
        }
    });
});
</script>
@stop