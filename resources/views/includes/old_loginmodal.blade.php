<style>
.container {
  padding: 2rem 0rem;
}

.table-image {
  
  thead {
    td, th {
      border: 0;
      color: #666;
      font-size: 0.8rem;
    }
  }
  
  td, th {
    vertical-align: middle;
    text-align: center;
    
    &.qty {
      max-width: 2rem;
    }
  }
}

.price {
  margin-left: 1rem;
}

.modal-footer {
  padding-top: 0rem;
}



 .signup_v4 .social-area {
     text-align: center;
     padding-top: 14px
 }

 .signup_v4 .social-area .title {
     font-size: 20px;
     text-transform: uppercase;
     font-weight: 600;
     display: inline-block;
     color: #007bff;
     position: relative
 }

 .signup_v4 .social-area .text {
     font-size: 17px;
     font-weight: 400;
     color: #143250
 }

 .signup_v4 .social-area .title::before {
     position: absolute;
     content: '';
     width: 40px;
     height: 1px;
     background: rgba(0, 0, 0, .2);
     top: 50%;
     -webkit-transform: translateY(-50%);
     -ms-transform: translateY(-50%);
     transform: translateY(-50%);
     left: 100%;
     margin-left: 7px
 }

 .signup_v4 .social-area .title::after {
     position: absolute;
     content: '';
     width: 40px;
     height: 1px;
     background: rgba(0, 0, 0, .2);
     top: 50%;
     -webkit-transform: translateY(-50%);
     -ms-transform: translateY(-50%);
     transform: translateY(-50%);
     right: 100%;
     margin-right: 7px
 }

 .signup_v4 ul.social-links {
     padding: 0;
     margin: 0
 }

 .signup_v4 .social-area .social-links li {
     display: inline-block
 }

 .signup_v4 .social-area .social-links li a i {
     width: 50px;
     height: 50px;
     border-radius: 50%;
     line-height: 50px;
     display: inline-block;
     color: #fff;
     margin: 0 5px;
     -webkit-box-shadow: 0 5px 10px rgb(0 0 0 / 15%);
     box-shadow: 0 5px 10px rgb(0 0 0 / 15%)
 }

 .signup_v4 .social-area .social-links li a i.fa-facebook-f {
     background: #0069f7
 }

 .signup_v4 .social-area .social-links li a i.fa-google-plus-g {
     background: #d1062c
 }

 .signup_v4 .nav-tabs .nav-link.active {
     background: #007bff
 }

 .signup_v4 .nav-tabs .nav-link {
     background: #143250
 }

 .signup_v4 .nav-tabs .nav-link {
     border: 0;
     margin: 0;
     padding: 10px 0;
     text-align: center;
     border-radius: 0;
     color: #fff
 }

 .signup_v4 .nav-tabs li.nav-item {
     width: 50%
 }

 .signup_v4 .card-body {
     padding: 0px
 }

 .signup_v4 .card-body .tab-content {
     padding: 0 1.25rem 1.75em
 }
</style>
<!-- Modal -->

<div class="modal fade mt-5" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog form-dark" role="document">
        <!--Content-->
        <div class="modal-content card card-image" style="background-image: url({{asset('k.gif')}});background-size: cover;">
            <div class="text-white rgba-stylish-strong py-4 px-4 z-depth-4">
                <!--Header-->         
                <div class="modal-body">
                    <!--Body-->
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   <!--login-register-start--> 
                    <div class="card signup_v4 mb-30">
                    <div class="card-body"  style="background-image: url({{asset('k.gif')}});background-size: cover;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation"> <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a> </li>
                            <li class="nav-item" role="presentation"> <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a> </li>
                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;color:#017adf;">Login</h4>
                                <!--register succesfull-->
                                @if(Session::get('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                @endif
                                <!--login failed--> 
                                @if(Session::get('falied'))
                                <div class="alert alert-danger">
                                    {{Session::get('falied')}}
                                </div>
                                @endif
                             <form>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" required>
                                    <div class="error" id="email_err" style="display: none;font-size: 14px;color: red;"></div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="password" required>
                                    <span class="p-viewer"
                                        style="float: right;  margin-right:25px; margin-top:-31px; color: #0b1e9c;">
                                        <i class="far fa-eye" id="togglePassword" aria-hidden="true"></i>
                                    </span>
                                    <div class="error" id="password_err" style="display: none;font-size: 14px;color: red;"></div>
                                </div>
                                <div class="form-group col-md-12">
                                    <!-- <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="custom-checkbox d-block"> <label class="custom-control custom-checkbox checkbox-lg"> <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <div class="custom-control-label text-dark" for="customCheck1">Remember Password</div> 
                                        </label> </div> <a href="#" target="_blank">Forgot Password?</a>
                                </div> -->
                                </div>
                                <div class="text-center mb-3 col-md-12">
                                    <button type="button" id="checkLoginBtn"
                                        class="btn btn-success btn-block btn-rounded z-depth-1">Log-in</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <h4 class="text-center mt-4 mb-4" style="text-transform: uppercase;color:#017adf;">Register</h4>
                                            @if(Session::get('success'))
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            {{Session::get('success')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            @endif
                            <form action="/register-user" method="post"  onsubmit="return checkCheckBox(this)">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  id="last_name" name="last_name" placeholder="Last name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  id="email" name="email" placeholder="Email" required>
                                <span class="" style="color: #f2ff0d">@error('email'){{$message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone number" required>
                                <span class="" style="color: #ff1c1c">@error('mobile'){{$message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control"  id="password" name="password" placeholder="password" required>
                                <span class="" style="color: #0d2dff">@error('password'){{$message }} @enderror</span>
                            </div>
                            
                                <div class="form-group form-row">
                                    <div class="col-md-12"> <label class="custom-control custom-checkbox checkbox-lg"> <input type="checkbox" class="custom-control-input" name="agree" id="customCheck1">
                                            <div class="custom-control-label text-dark" for="customCheck1">I agree with <a href="#" target="_blank">terms and conditions</a></div>
                                        </label> </div>
                                </div>

                                <div class="text-center mb-3 col-sm-7 col-md-12">
                                        <button type="submit" class="btn btn-success btn-block btn-rounded z-depth-1">Register</button>
                                    </div>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--login-register-end-->
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->

<script>
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#myInput');

togglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

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
                  'password': password
                },
                dataType: 'json',
                beforeSend: function() {

                },
                success: function(response){
                    if(response.status == 200){
                        if(response.data['role'] == 'Admin') {
                            window.location.href = baseUrl+"/admin/dashboard";
                        }else if(response.data['role'] == 'Staff') {
                            window.location.href = baseUrl+"/staff/dashbaord";
                        }else {
                            window.location.href = baseUrl+"/dashbaord";
                        }
                    }else {
                        console.log(response);
                    }
                }
            });
        }
    });
});
</script>