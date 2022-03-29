@extends('layouts.'.$layout)
@section('content')
<!-- BEGIN : Main Content-->
<div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        <!-- Card sizing section start -->
        <section id="sizing">

            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 ml-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title btn btn-primary">Change Password</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="form-body">
                                        <!-- <h6 class="mt-3 text-primary"><i class="ft-edit mr-2"></i>change Password</h6> -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="old_password" class="sr-only">Old Pssword</label>
                                                    <input type="password" id="old_password" class="form-control"
                                                        placeholder="Old Password" name="old_password">
                                                        <div class="error" id="old_password_err"
                                                        style="display: none;font-size:14px;color:red;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="new_password" class="sr-only">New Password</label>
                                                    <input type="password" id="new_password" class="form-control"
                                                        placeholder="New Password" name="new_password">
                                                        <div class="error" id="new_password_err"
                                                        style="display: none;font-size:14px;color:red;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="confirm_pass" class="sr-only">Confirm Password</label>
                                                    <input type="password" id="confirm_pass" class="form-control"
                                                        placeholder="Confirm Password" name="confirm_pass">
                                                        <div class="error" id="confirm_pass_err"
                                                        style="display: none;font-size:14px;color:red;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-primary mr-1" id="change_pass_btn"><i
                                                class="ft-check mr-2"></i>Save Change</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title btn btn-primary">Profile Information</h4>
                            <button type="button" class="btn btn-info" id="edit_profile_btn" style="float: right;"><i
                                    class='fa fa-edit'></i></button>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h6>
                                            <div class="row">
                                                <div class="col-4">FIRST NAME:</div>
                                                <div class="col-8"><input class="form-control edit_profile" type="text"
                                                        name="{{$layout}}_first_name" id="{{$layout}}_first_name">
                                                    <div class="error" id="{{$layout}}_first_name_err"
                                                        style="display: none;font-size:14px;color:red;"></div>
                                                </div>
                                            </div>
                                        </h6>
                                    </li>
                                    <li class="list-group-item">
                                        <h6>
                                            <div class="row">
                                                <div class="col-4">LAST NAME:</div>
                                                <div class="col-8"><input class="form-control edit_profile" type="text"
                                                        name="{{$layout}}_last_name" id="{{$layout}}_last_name">
                                                    <div class="error" id="{{$layout}}_last_name_err"
                                                        style="display: none;font-size:14px;color:red;"></div>
                                                </div>
                                            </div>
                                        </h6>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">EMAIL:</div>
                                            <div class="col-8"><input class="form-control edit_profile" type="text"
                                                    name="{{$layout}}_email" id="{{$layout}}_email">
                                            </div>
                                        </div>

                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">CONTACT NO.:</div>
                                            <div class="col-8"><input class="form-control edit_profile" type="text"
                                                    name="{{$layout}}_mobile" id="{{$layout}}_mobile">
                                                <div class="error" id="{{$layout}}_phone_err"
                                                    style="display: none;font-size:14px;color:red;"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">GENDER:</div>
                                            <div class="col-8"><select name="{{$layout}}_gender" id="{{$layout}}_gender"
                                                    class="form-control edit_profile">
                                                    <option value="">--Select gender--</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <div class="error" id="{{$layout}}_gender_err"
                                                    style="display: none;font-size:14px;color:red;"></div>
                                            </div>
                                        </div>

                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">ADDRESS:</div>
                                            <div class="col-8"><input class="form-control edit_profile" type="text"
                                                    name="{{$layout}}_address" id="{{$layout}}_address"></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item text-center">
                                        <div class="row ">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <button type="button" class="btn btn-primary" id="profile_update_btn"
                                                    style="display: none;">Update</button>
                                                <button type="button" class="btn btn-warning" id="profile_cancel_btn"
                                                    style="display: none;">Cancel</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Card sizing section end -->

    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    let baseUrl = $('#base_url').val();
    let user_role = $('#user_role').val();
    getProfileDetails();

    function getProfileDetails() {
        let processUri  = user_role == 'user' ? '/get-profile':'/admin/get-profile';
         // alert(processUri);
        $.ajax({
            url: baseUrl + processUri,
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}'
            },
            dataType: 'json',
            beforeSend: function() {
                $('#loader').modal({
                    backdrop: 'static',
                    keybaord: false
                });
            },
            success: function(resp) {
                if (resp.status == 200) {
                    $('#{{$layout}}_first_name').val(resp.data.first_name);
                    $('#{{$layout}}_last_name').val(resp.data.last_name);
                    $('#{{$layout}}_email').val(resp.data.email);
                    $('#{{$layout}}_mobile').val(resp.data.mobile);
                    $('#{{$layout}}_gender').val(resp.data.gender);
                    $('#{{$layout}}_address').val(resp.data.address);
                } else {

                }
            },
            complete: function() {
                $('.edit_profile').attr('readonly', 'readonly');
                $('#loader').modal('hide');
            }
        });
    }

    $('#edit_profile_btn').click(() => {
        $('#loader').modal('show');
        setTimeout(() => {
            $('.edit_profile').removeAttr('readonly');
            $('#profile_update_btn').css('display', '');
            $('#profile_cancel_btn').css('display', '');
            $('#loader').modal('hide');
        }, 1300);
    });

    $('#profile_cancel_btn').click(() => {
        $('.edit_profile').attr('readonly', 'readonly');
        $('#profile_update_btn').css('display', 'none');
        $('#profile_cancel_btn').css('display', 'none');
    });

    $(document).on('click','#profile_update_btn', function() {
        let first_name = $('#{{$layout}}_first_name').val();
        let last_name = $("#{{$layout}}_last_name").val();
        let mobile = $("#{{$layout}}_mobile").val();
        let gender = $('#{{$layout}}_gender').val();
        let formValid = true;
        if (first_name == '') {
            $('#first_name_err').html('Enter your first name').css('display', 'block');
            $("#first_name").focus();
            formValid = false;
        } else {
            $('#first_name_err').html('').css('display', 'none');
        }
        if (last_name == '') {
            $('#last_name_err').html('Enter your last name').css('display', 'block');
            $("#last_name").focus();
            formValid = false;
        } else {
            $('#last_name_err').html('').css('display', 'none');
        }
        if (gender == '') {
            $('#gender_err').html('Select your gender').css('display', 'block');
            formValid = false;
        } else {
            $('#gender_err').html('').css('display', 'none');
        }
        if (mobile == '') {
            $('#phone_err').html('Enter your mobile number').css('display', 'block');
            $('#mobile').focus();
            formValid = false;
        } else {
            if (mobile.length !== 10) {
                $('#phone_err').html('Mobile  number should be 10 digit').css('display', 'block');
                $('#mobile').focus();
                formValid = false;
            } else {
                $('#phone_err').html('').css('display', 'none');
            }

        }

        if(formValid){
            let processUri  = user_role == 'user' ? '/update-profile': '/admin/update-profile';
            $.ajax({
                url: baseUrl+processUri,
                type: 'POST',
                data: {
                   '_token': '{{csrf_token()}}',
                   'first_name': first_name,
                   'last_name': last_name,
                   'email': $('#{{$layout}}_email').val(),
                   'mobile': mobile,
                   'gender': gender,
                   'address': $('#{{$layout}}_address').val()
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#loader").modal({backdrop:'static', keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        //$('.text-center').html(res.msg);
                        $('.close').attr('data-modal_name','success_modal');
                        $('#successModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    }else{
                        $('.text-center').html(res.msg);
                        $('#errorModal').modal('show');
                    }
                },
                complete: function() {
                    $('#loader').modal('hide');
                }
            });
        }
    });

    $(document).on('click','.close', function() {
        let $modal = $(this).data('modal_name');
        if($modal == 'success_modal'){
           window.location.reload();
        }
    });

    $('#change_pass_btn').click( () => {
      let old_password = $('#old_password').val();
      let new_password = $('#new_password').val();
      let confirm_pass = $('#confirm_pass').val();
      let formvalid = true;

      if(old_password == ''){
        $('#old_password_err').html('Enter your current password').css('display','block');
        $('#old_password').focus();
        formvalid = false;
      }else {
        $('#old_password_err').html('').css('display','none');
      }
      if(new_password == ''){
        $('#new_password_err').html('Enter your new password').css('display','block');
        $('#new_password').focus();
        formvalid = false;
      }else {
        $('#new_password_err').html('').css('display','none');
      }
      if(confirm_pass == ''){
        $('#confirm_pass_err').html('Enter your confirm password').css('display','block');
        $('#confirm_pass').focus();
        formvalid = false;
      }else {
        if(new_password !== confirm_pass){
          $('#confirm_pass_err').html('Your confirm password is does not match with your password' ).css('display','block');
          $('#confirm_pass').focus();
          formvalid = false;
        }else {
          $('#confirm_pass_err').html('').css('display','none');
        }
        
      }

      if(formvalid){
        let processUri  = user_role == 'user' ? '/update-password': '/admin/update-password';
        $.ajax({
          url: baseUrl+processUri,
          type: 'POST',
          data: {
            '_token': '{{csrf_token()}}',
            'old_password': old_password,
            'new_password': new_password,
            'confirm_password': confirm_pass
          },
          dataType: 'json',
          beforeSend: function(){
            $('#loader').modal({backdrop:'static',keyboard:false});
          },
          success: function(resp){
            if(resp.status == 200){
              alert(resp.msg);
              location.reload();
            }else if(resp.status == 401){
              console.log(resp);
            }else {
              alert(resp.msg);
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
		   $("#phone_err").html("Digits Only").show().fadeOut("slow");
			return false;
	    }
    });
});
</script>
@stop