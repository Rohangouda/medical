<style>
    .register {
        background: rgb(2, 0, 36);
        background: linear-gradient(63deg, rgba(2, 0, 36, 1) 0%, rgb(3 13 75) 35%, rgb(0 184 255) 100%);
        margin-top: 3%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 32%;
        float: right;
    }



    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }
</style>
<!-- Modal -->
{{-- login modal --}}
<div class="modal fade mt-5" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-md" role="document">
        <!--Content-->
        <div class="modal-content register">
            <!--Header-->
            <div class="modal-body">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container register">
                    <div class="row">
                        <div class="col-md-3 register-left">
                            <img src="{{ asset('medfin/favicon.png') }}" alt="" />
                            <h5 class="font-weight-bold">Welcome to</h5>
                            <h5 class="font-weight-bold mt-4">Medfin</h5>
                        </div>
                        <div class="col-md-9 register-right">
                            <!-- <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Sign-up</a>
                                </li>
                            </ul> -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <form>
                                        <h3 class="register-heading">Login</h3>
                                        <div class="row register-form">
                                            <div class="col-md-12">
                                                <div class="error" id="auth_error"
                                                    style="display: none;font-size: 16px;color: red;"></div><br />
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email or Mobile" required>
                                                    <span class="p-viewer"
                                                        style="float: right;  margin-right:25px; margin-top:-31px; color: #blue;">
                                                        <i class="fas fa-mobile-alt"></i>
                                                    </span>
                                                    <div class="error" id="email_err"
                                                        style="display: none;font-size: 14px;color: red;"></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Password" required>
                                                    <span class="p-viewer"
                                                        style="float: right;  margin-right:25px; margin-top:-31px; color: #blue;">
                                                        <i class="fas fa-key" id="togglePassword"></i>
                                                    </span>
                                                    <div class="error" id="password_err"
                                                        style="display: none;font-size: 14px;color: red;"></div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="button" id="checkLoginBtn"
                                                        class="btn btn-primary btn-block btn-rounded z-depth-1">Log-in</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="tab-pane fade show" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <h3 class="register-heading">Sign-up</h3>
                                    <div class="row register-form">
                                        <div class="error mb-3" id="reg_auth_error"
                                            style="display: none;font-size: 17px;color: red;margin-left:20px;"><br />
                                        </div>
                                        <div class="success mb-3" id="reg_success_msg"
                                            style="display: none;font-size: 17px;color: green;margin-left:20px;"><br />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="First Name *"
                                                    id="first_name" name="first_name" required />
                                                <div class="error" id="first_name_err"
                                                    style="display:none;font-size: 14px;color:red;"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Last Name *"
                                                    id="last_name" name="last_name" required />
                                                <div class="error" id="last_name_err"
                                                    style="display:none;font-size: 14px;color:red;"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email"
                                                    id="reg_email" name="reg_email" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" maxlength="10" minlength="10" class="form-control"
                                                    placeholder="Phone *" id="mobile" name="mobile" required />
                                                <div class="error" id="mobile_err"
                                                    style="display:none;font-size: 14px;color:red;"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password *"
                                                    id="reg_password" name="reg_password" required />
                                                <div class="error" id="reg_password_err"
                                                    style="display:none;font-size: 14px;color:red;"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control"
                                                    placeholder="Confirm Password *" id="con_password"
                                                    name="con_password" required />
                                                <div class="error" id="con_password_err"
                                                    style="display:none;font-size: 14px;color:red;"></div>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option value="">--Select Gender*--</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <div class="error" id="gender_err"
                                                    style="display:none;font-size: 14px;color:red;"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Address"
                                                    name="address" id="address" />
                                            </div>
                                            <button type="button" class="btnRegister">Register</button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{--
        </div> --}}
    </div>
    <!--/.Content-->
</div>
</div>

{{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button> --}}
<!-- Modal -->

<script>
 const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle('fa-eye-slash');
        });

//     const togglePassword = document.querySelector('#togglePassword');
// const password = document.querySelector('#myInput');

// togglePassword.addEventListener('click', function(e) {
//     // toggle the type attribute
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     // toggle the eye slash icon
//     this.classList.toggle('fa-eye-slash');
// });

$(document).ready(() => {
    let baseUrl = $('#base_url').val();

    $(document).on('keyup','#password',function(e){
        if(e.keyCode == 13){
            $('#checkLoginBtn').trigger('click');    
        }
    });

    $('#checkLoginBtn').click(() => {
        let email = $('#email').val();
        let password = $('#password').val();
        let formValid = true;

        if(email == ''){
            $('#email_err').html('Enter your email or mobile no.').css('display','block');
            formValid = false;
        }else {
            $('#email_err').html('').css('display','none');
        }

        if(password == ''){
            $('#password_err').html('Enter your password.').css('display','block');
            formValid = false;
        }else {
            $('#password_err').html('').css('display','none');
        }

        if(formValid){
            $.ajax({
                url: baseUrl+'/verifyLoginCredential',
                type: 'POST',
                data: {
                  '_token': '{{csrf_token()}}',
                  'username': email,
                  'password': password,
                  'login_uri': $('#login_uri').val()
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#loader').modal({backdrop:'static', keyboard:false});
                },
                success: function(response){
                    if(response.status == 200){
                        if(response.data['role'] == 'Admin') {
                            window.location.href = baseUrl+"/admin/dashboard";
                        }else if(response.data['role'] == 'Staff') {
                            window.location.href = baseUrl+"/staff/dashbaord";
                        }else {
                            if(response.data.login_uri != undefined){
                                window.location.href = response.data.login_uri;
                            }else {
                                window.location.href = baseUrl;
                            }
                            
                        }
                    }else {
                        $('#auth_error').html(response.msg).css('display','block');
                    }
                },
                complete: function() {
                    $('#loader').modal('hide');
                }
            });
        }
    });

    $('.btnRegister').click( () => {
        let first_name = $('#first_name').val();
        let last_name = $("#last_name").val();
        let mobile = $("#mobile").val();
        let gender = $('#gender').val();
        let password = $('#reg_password').val();
        let con_password = $('#con_password').val();
        
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
        if(gender == ''){
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
        if(password == ''){
            $('#reg_password_err').html('Create your password').css('display','block');
            $('#reg_password').focus();
            formValid = false;
        }else {
            $('#reg_password_err').html('').css('display','none');
        }
        if(con_password == ''){
            $('#con_password_err').html('Enter your confirm password').css('display','block');
            $('#con_password').focus();
            formValid = false;
        }else {
            if(password !== con_password){
                $('#con_password_err').html('Confirm password does not match with your password').css('display','block');
                $('#con_password').focus();
                formValid = false;
            }else {
                $('#con_password_err').html('').css('display','none');
            }
            
        }

        if(formValid){
            $.ajax({
                url: baseUrl+'/user-self-registration',
                type: 'POST',
                data: {
                   '_token': '{{csrf_token()}}',
                   'first_name': first_name,
                   'last_name': last_name,
                   'email': $('#reg_email').val(),
                   'mobile': mobile,
                   'password': password,
                   'gender': gender,
                   'address': $('#address').val()
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#loader").modal({backdrop:'static', keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        // alert(res.msg);
                        _reset_registration_form();
                        $('#reg_success_msg').html(res.msg).css('display','block');
                    }else{
                        $("#mobile").focus();
                        $('#reg_auth_error').html(res.msg).css('display','block');
                    }
                },
                complete: function() {
                    $('#loader').modal('hide');
                }
            });
        }
        

    });

    function _reset_registration_form(){
        $('#first_name').val('');
        $('#last_name').val('');
        $('#reg_email').val('');
        $('#mobile').val('');
        $('#reg_password').val('');
        $('#gender').val('');
        $('#address').val('');
        $('#con_password').val('');
    }

    $("#mobile").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		   //display error message
		   $("#mobile_err").html("Digits Only").show().fadeOut("slow");
			return false;
	    }
    });

});
</script>