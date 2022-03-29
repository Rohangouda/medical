@extends('layouts.login_layout')
@section('content')

<style>
.modal-dialog {
    overflow-y: initial !important;
    /* margin-top: 90px; */
    /* margin-right: 190px; */
}

#add_staff_modal {
    height: 100vh;
    -ms-overflow-style: none;
    scrollbar-width: none;
    overflow-y: scroll;
}

#add_staff_modal::-webkit-scrollbar {
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
                        <div class="card-header">

                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title" style="margin-top: 8px;">User / Staff</h4>
                                </div>
                                <div class="col text-right">
                                    <!-- Button trigger modal -->
                                    @if(session()->get('user_role') == 'Admin')
                                        <button type="button" class="btn btn-success" id="add_staff_btn">
                                            <i class="fa fa-user-plus"></i> Staff
                                        </button>
                                    @endif
                                    
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="user_type" id="user_type" class="form-control">
                                                <option value="">--Select user type---</option>
                                                @if(session()->get('user_role') == 'Admin')
                                                <option value="Staff">Staff</option>
                                                @endif
                                                <option value="user" selected>User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" name="search_text" id="search_text"
                                                placeholder="Search user by their name or mobile">
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-info" id="users_search_btn"
                                                style="float: right;">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- The Modal -->
                        <div class="modal" id="add_staff_modal">
                            <div class="modal-dialog modal-lg mt-5">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header bg-success">
                                        <h4 class="modal-title">Add Staff</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="name">First Name</label>
                                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                                            placeholder="Enter First Name">
                                                        <div class="error" id="first_name_err" style="display:none;font-size: 14px;color:red;"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="name">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                                            placeholder="Enter Last Name">
                                                        <div class="error" id="last_name_err" style="display:none;font-size: 14px;color:red;"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email">Email address</label>
                                                        <input type="email" class="form-control text-lowercase" name="email" id="email"
                                                            placeholder="Enter Email">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="phone">Phone </label>
                                                        <input type="text" class="form-control form-group" name="mobile"
                                                            id="mobile" placeholder="Enter Phone Number">
                                                        <div class="error" id="mobile_err" style="display:none;font-size: 14px;color:red;"></div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="gender">Gender</label><br>
                                                        <label class="radio-inline mx-2"><input class="mx-1" type="radio" name="gender" value="Male"> Male</label>
                                                        <label class="radio-inline mx-2"><input class="mx-1" type="radio" name="gender" value="Female">Female</label>
                                                        <label class="radio-inline mx-2"><input class="mx-1" type="radio" name="Other">Others</label>
                                                        <div class="error" id="gender_err" style="display:none;font-size: 14px;color:red;"></div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="address">Address</label>
                                                        <textarea class="form-control" rows="5" name="address" id="address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer bg-success">
                                            <button type="button" class="btn btn-primary" id="add_staff_final_btn">Submit</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
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
                                                <th>Type</th>
                                                <th>Name</th>
                                                <!-- <th>Email</th> -->
                                                <th>Phone</th>
                                                <!-- <th>Gender</th>
                                                            <th>Address</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="users_list"></tbody>
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
<input type="hidden" id="user_role" value="{{Session::get('user_role')}}">
<script type="text/javascript">
$(document).ready(function() {
    let baseUrl = $('#base_url').val();
    let user_role = $('#user_role').val();
    if(user_role == 'Admin'){
        $('#user_type').val('');
    }
    let user_type = $('#user_type').val();
    let search_text = $('#search_text').val();
    let page = 0;
    let perPage = $('#userPerPage').val();

    let next_page_url = '';
    let prev_page_url = '';

    // getStaffUsersByFilters(page, perPage,search_text,user_type);

    function getStaffUsersByFilters(page, perPage, search_text, user_type) {
        $.ajax({
            url: baseUrl + '/admin/staff-user-records',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'page': page,
                'perPage': perPage,
                'search_text': search_text,
                'user_type': user_type
            },
            dataType: 'json',
            beforeSend: function() {
                $('#loader').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            success: function(resp) {
                if (resp.status == 200) {
                    _renderStaffUsersRecords(resp.user_list.data);
                    $('.js_pagination_append').html(resp.pagination);
                    if(resp.user_list.data.length > 0){
                       $('#userPerPage').css('display','block');
                       if(resp.user_list.next_page_url != null){
                        next_page_url = resp.user_list.next_page_url.split('=')[1];
                       }
                       if(resp.user_list.prev_page_url != null){
                        prev_page_url = resp.user_list.prev_page_url.split('=')[1];
                       }
                    }else {
                        $('#userPerPage').css('display','none');
                    }
                } else {
                    $('#users_list').html('<tr><td colspan="8" style="text-align:center;">' + resp
                        .msg + '</td></tr>');
                }
            },
            complete: function() {
                $("#loader").modal('hide');
                $('.page-link').attr('href','javascript:void(0);');
            }

        });
    }

    const _renderStaffUsersRecords = (data, extra) => {
        let u = '';
        let y = '';
        $.each(data, function(uKey, uVal) {
            u += '<tr>' +
                '<td>' + parseInt(uKey + 1) +'<button class="btn btn-sm btn-primary rowEventByClick" data-row_id='+uVal.id+' style="float:right;" type="button" data-toggle="collapse" data-target="#extra_table_' +uVal.id +'" aria-expanded="false" aria-controls="collapseExample">+</button></td>' +
                '<td>' + uVal.role + '</td>' +
                '<td>' + uVal.first_name + ' ' + uVal.last_name + '</td>'+
                '<td>' + uVal.mobile + '</td>' +
                '<td><button type="button" class="btn btn-sm btn-primary reset_pass_btn" data-user_id='+uVal.id+'>Reset password</button></td>' +
            '</tr>';
        });
        $('#users_list').html(u);
    }

    $(document).on('click','.page-link', function() {
        let user_type = $('#user_type').val();
        let search_text = $('#search_text').val();
        let checkOption = $(this).attr('rel');
        let page_no = 0;
        if(checkOption == 'next'){
            page_no = next_page_url;
        }else if(checkOption == 'prev'){
            page_no = prev_page_url;
        }else{
            page_no = $(this).html();
        }
        getStaffUsersByFilters(page_no, perPage, search_text, user_type);
    });

    $('#users_search_btn').click(() => {
        let user_type = $('#user_type').val();
        let search_text = $('#search_text').val();
        getStaffUsersByFilters(page, perPage, search_text, user_type);
    });

    $('#userPerPage').change( () => {
        let page = 0;
        let perPage = $('#userPerPage').val();
        let user_type = $('#user_type').val();
        let search_text = $('#search_text').val();
        getStaffUsersByFilters(page, perPage, search_text, user_type);
    });

    // add_staff_btn event-----
    $('#add_staff_btn').click(() => {
        $('#add_staff_modal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });

    $(document).on('click','.reset_pass_btn', function() {
        if(confirm("Are you sure, you want to reset password for this user")){
            let user_id = $(this).data('user_id');
            if(user_id != ''){
                $.ajax({
                    url: baseUrl+'/admin/master-opration/reset-password',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': user_id
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
                            alert(res.msg);
                        }else {
                            alert(res.msg);
                        }
                    },
                    complete: function(){
                        $('#loader').modal('hide');
                    }
                });
            }else{
                alert('OOPS! something went wrong, please re-fresh your browser.');
                location.reload();
            }
        }
        
    });

    $(document).on('click','.rowEventByClick', function() {
        let row_id = $(this).data('row_id');
        $('#extra_table_'+row_id).css('display','');
    });

    $('#add_staff_final_btn').click( () => {
        let first_name = $('#first_name').val();
        let last_name = $("#last_name").val();
        let mobile = $("#mobile").val();
        let gender = $('input[name="gender"]:checked').val();
        let formValid = true;
        if(first_name == ''){
            $('#first_name_err').html('Enter your first name').css('display','block');
            $("#first_name").focus();
            formValid = false;
        }else {
            $('#first_name_err').html('').css('display','none');
        }
        if(last_name == ''){
            $('#last_name_err').html('Enter your last name').css('display','block');
            $("#last_name").focus();
            formValid = false;
        }else {
            $('#last_name_err').html('').css('display','none');
        }
        if(gender == undefined){
            $('#gender_err').html('Select your gender').css('display','block');
            formValid = false;
        }else {
            $('#gender_err').html('').css('display','none');
        }
        if(mobile == ''){
            $('#mobile_err').html('Enter your mobile number').css('display','block');
            $('#mobile').focus();
            formValid = false;
        }else {
            if(mobile.length !== 10){
                $('#mobile_err').html('Mobile  number should be 10 digit').css('display','block');
                $('#mobile').focus();
                formValid = false;
            }else {
                $('#mobile_err').html('').css('display','none');
            }
            
        }

        if(formValid){
            $.ajax({
                url: baseUrl+'/admin/master-opration/add-staff',
                type: 'POST',
                data: {
                   '_token': '{{csrf_token()}}',
                   'first_name': first_name,
                   'last_name': last_name,
                   'email': $('#email').val(),
                   'mobile': mobile,
                   'gender': gender,
                   'address': $('#address').val()
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#loader").modal({backdrop:'static', keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        alert(res.msg);
                        location.reload();
                    }else{
                        alert(res.msg);
                    }
                },
                complete: function() {
                    $('#loader').modal('hide');
                }
            });
        }
    });

    $("#mobile").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		   //display error message
		   $("#mobile_err").html("Digits Only").show().fadeOut("slow");
			return false;
	    }
    });

    $(document).on('keyup','#search_text',function(e){
        if(e.keyCode == 13){
            let search_text = $(this).val();
            getStaffUsersByFilters(page, perPage,search_text,user_type);
  
        }
    });

});
</script>
@stop