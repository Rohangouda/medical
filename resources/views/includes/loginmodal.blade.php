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

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">
                    Your Shopping Cart
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-image">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-25">
                                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBQUFBcVFRUYGBcXGxgbFxoXGhsbGxoYGhoaHBsXGBgdJCwkGx0pIB0bJTYlKS4wMzMzGiI5PjkyPSwyMzABCwsLEA4QHhISHjIiIik4MDQyMjIyMjI4MjI0MjIyNDQ0MjQwMjI0MjQyMjIyMjIyMjIyMjIyMjIyNDI+MjsyMP/AABEIAOgA2QMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAAAQIEBQYDBwj/xABLEAACAQIEAwUDBwgHBwQDAAABAhEAAwQSITEFQVEGEyJhcTKBkRQVI6HB0dIHQlJUkpSx8DNDU2Jyk7IWJKKjs8LhRHOC8SU0Y//EABkBAQADAQEAAAAAAAAAAAAAAAABAgMEBf/EAC0RAAICAQMEAQIFBQEAAAAAAAABAhEDEiExBBNBUWEUcSIygZGhBUKx4fFi/9oADAMBAAIRAxEAPwD2amss06igEpaKSgFoopjOAJJAHU6UA+mkTTUuKdiD6GafQCDSnUlMNxRuR8Ry3oB9FcPlafpr+0Oe1HytP01/aFTpYO9IRNcvlKb51j/EKj/O+HmO/tTMR3izPSJ3ppYJoEUtQRxXDna9a5n212GhO9dFx9oxFxDMR4l1naNedNL9CyXRXJbqnZgd+Y5b0d8v6Q+I57VFA60hpucdR8aTvV/SHXcbdaUBwEU6uaXAZggwYMGYPQ9KfQC0UUUAUlFLQDVWKWaWigCiiigCiiigGM0Vg/yvOwwduGIm8oMcxkcweuoB91b6sJ+V2wWwKkCcl5GPoVdf4sK0wNLIrKy4PG1xTqZVip6qcp+Iiu/zxiGXK1+4yxEM7EQNhBfYVXs/r8D99KrHr9Z++vcUoc2jGmThxC5+mdTm1M+KIzasdY0muZxDQBIgbaJz91cQx8/r++nAnz+v76upwXorTO+HZmYDMBM6wvSelJcdwxGeYJEiNYO+1cp9fr++nKfX+ffUdyN3ZNfAKx6/z+zXRQfP4H8NMy+R+A++lP8AhPwX76h5YexTOysep+v8NdQ7ef8AxfdUQtHL6h99Kl6CDlB8iBBqO7D2KZaWMM7NBJGx5kkET4RGun1wNzFdmxYtkAcisgQ0gHmSvjBBkHQgyNBUXE48CBaA9coHOdBAg6KTAENMbmYSZjy/n41XXB8k0zrmM6fz/wANOUN5/A/hpqo3QV2W31j4D7qPLAimen/knf6G+vS4p+KAf9tb6vOvyTCBiQNptdN/pOnur0WvH6jfI2bw4A0imadRWJYKKKKAKKKKASlopjg8qAdS0UUAlVXaTArfwz22Eg5SY3hWDGPhVrTLiSCOoI+NQ78BHiPaHs8sZrVuD0XmPTrVFhuz9+42UW2WNy4KqPUn7Jr0nC45GmCMykq6ndWGhBHqKjcQ4mFgE76ADUk8gBzkkaVw4+ty41oe7+eUdrwQm9S2R53i+FXLRGfY7Eaj0riLPrXoON7NG8A1y6UiSEUAxO2YzvHIfGspj+GXLVwWz4i0ZCPzpMe49a9HpurUlU3TOXLh0v8ADwVlvCljAUsd4AJMe6nLb6V6bwDAW7VvII63X/SI5T+iOn31n+NcLfEXGv28io0BZJBaBGaANAeXWKiPXwc2nsvZP08q25MqEqVhuGXbnsW2YdYgfE6Ve9mODpca49yPo2yBOrDUk+QkRWrBVB0FVz9eoPTBX8kw6fUrkec4bhcFkdSrjXKwiRHL76i4nBFdh7q0va3iFubYX+kDEzzCEbH1MfCohOdA3lO3oCR1+6uddTk1a/fjwdcMUJwcGt1+4dmOzy30N25OUEhV2mNyTvHLToassZ2dtQe6JVtYEyv16/XTuzWLfxWlBYAFlIGizuGPLqPfUniK3bYBRQ7sYGsKpP5zE/mis8vV5XO06/wVj08Ixae5iwnlty866Ba02A7PW1Wbjd4x1MGFnyjU07EcGtn2RlPkSfqNd8f6pi1U7+9bHG+km1exoPyUW/o8Q3W4q/srP/dW/rFfkxWMPdMRN4j3hLYP1zW1q2Z3NmUOBaKKKzLhSUtFAFJTUB50+gEpaKKAKKKKAKKQmigPFu0vDQmMvzOtxmUDSe8IbU9PFFdcJ2buWr1q6e7fI4LJJkDyJEEjf1FXXbTAXLmOC2xqyI5JMKoBZSxPL2f4VOUaeJ5YTJRGIkTMe9Tp/wCK48rm5OjsWlQSC9eDnQ/z0PSqTidtWxFmWAcLdIBInXIJ/jVjxHhFu6DmLq4Gly2jhhGY7j2hodD1HUVSP2JtkktfusdZPdkzE+Zn2T9XUTnDBbuUq/QSyVslZZBTeR7Vu4FUaXbg1C6aqvIvHwnXkDJXuQi25chFCg+SiJ28q4Lw9cNhe7Qlhn1JXKSSw5e4e6uWGcZlk5RIBOug5nTpVMkVFaYq/ucGfrJxyKK2HLw3Dpca4r3VLElgCInnoRXTErZcQbl4ehUfXFXvynBkkgoARGqGVCkwVBVhJBAOxMcqGxGCBLHIcvsBbZ1UqoIYQAxnMfKtFH20Q+on4aM3bw2BQRkYnmzKHY+ZYzVbx/C2reHW9YzRn7sqdAAQxPhAGug9xqbxFUDvkaVk5DBHhOoEHXTb3V24dg1vWCr5svehlyRMqN9dImRUxpu2iOm6rNLI4tqq8EvguF7rDoD7TjO/+JuXuED3VD4tdEBTuzCPRdSfs99WjW1RQPpIGg2J59Brt9dVi8HRrjXTcuknTKVBCgScqiNNvrHWs5YpStnpxyJPcqOIY9rIXLqzGAJ0jmTUNuO3FQk29fWR69fdWkxHZ23cbMxumBAAyAaE/pDqPrFJieBWFVvA85WIJcbjNyB8p251OPClSaT9l5ZE73aNJ+TND8hViZLvcY+s5fsrXVmfyeR832Y55z/zGrTV6Umm20edVbC0UlANQBaKKKAKSKWigCikpaAKKSaKARlmlpaKAp+M4YHK8ajwn01K+4GfjWeTH22fIty2zjdVcEiN9BWk7SW2bCX1QgO1twhJIAcqQpJHnFeUWb6m53aIV7m7duZohVs2FCG3bP5xYxMfpSaynBN2aRk0jerSMP591Za32iuW1uG6EY93auW1UZYe5OW0TPi0gk6aA1KwPEbpe6jXLblStseAKousAWynNqiDNIOpIGutUeNpFtaLLit22ttmumLYiTBMGQBAGsyRtXI8Itf3/wBtvvrPXMS+It2LDXSbjYi4tw+HVbbEh4iIHhjkfOpHz1euXm7tgbNq4FuMVXKbarNy69zkf0Qu9WeLb9yj0t20WeMwuHtKGc3AGZUHiYyzGAIFNx2FwtoA3LjJmJAl21jfbkOZ2FUDcRa/ewz3HUWi128LYUeC3bDC27tuzMQdNtKkdo7ouXTmlbWHCrfg+NkxEFgoj2RlWY1hmioWJJpMVGuEWuNwGGtKGuF2DMFVczuXYjRQo9qp+Auo9tWtexqAIIjLIKlTqCDyqmx9/v1tW47q6LS4m02YEI6xCf3tzPlVfd7TObassWQLJv3SirLOzlFRAwIGZwSWg6EedSsdrYlVHg0XFOI2rWTvGylj4RlLbbkgbKJEnlNdcBiEuZyjZstxkfQgB1jMBO/rWVxCHE3mFy6oW1Yt96+gaC/eMqAaSSqqT5ERrAOHY17GGsqtwm5iLjM2iEoCzZigMAsx2zGJnpVu3+H5J1bm2j+ffVTbxy37Xe282Vu8AzQCcquCd9RI8/uocfxq8E7proS5btXLl4pkLFpi3aBgqGMrmj3RVpwIqMHaVfzUAY8szWi7Adfa89fTSqhpVsnVbNb+T0f/AI7D+j/9R60tU/ZVQMJaA2yn/UauK1jwZS5YGkAinUVJAUUlLQBRRSUAUxm6Ur7aUip1oBFB3rrSUtAFFFFAVHaW9ksHzZR9c/ZWAbAA5crkEXLjksAwK3Se8tnbQg6dIrb9qbCutvNsHaROh+jub1QnARtvXPkk1I1hHYiWeDYcKy92GDaMXJZiBELmOoAgQB0qRZwOGIYLbtHMoR8oHsgCFMbDQfAdKYwZdIJ/hHrWewOIOGxD+AraUqjEyQFcSpJPQ8/XrWuDH3U/xbpWl7+BOWittjRX+H4RUFtrdoJOYBoEsOcnUnX6653cFhTcFw27XeCNfDIyxl06jSNNNKo7935RiEdxNp3NtRJEqsTt1LA/VyqdxHDJ8stKV0uAswk6kB4O+nsjbpXQ+lUWk5O2m3txXgy7jdtLykTbfD8IpAW3aDK5ZdFkOYEgddBpygUt/DYW5cDulp7g0BbKW0nTXprULjPDktuuIUCFcNcUnclpzKZ3k7enQgs4Hwy3cZsQyjVybahj4YO5g6meX3wKvDDt9zU6+3n0W1vVpr/hOxFrBsqo4slbeiKSkKAAIXXQabUt+3hGhnWyfC1tSckZIgop6QYjlPnWZe3hbd+8t1SUBAtqCxjmdZ8xvUvivDEt4KZLlWDIxGUgXGQERJ5Vd9NBNLU96rb2vBCyOm6W1l0nD8MxQpbtE2v6PKFOQDbLG2tO+b7OVk7q3lc5nXIsM3UiNTVTjOCW1s99aLW7iIHBDGDAkjU6c6t+E4rvbNu4d2GsDSQSDHvFc2TGlHVFtq632aZeMt6aEXh1kZYtWx3YItwi+EMNQumgPOnvZVLZVECqoaFUBVA7tjoo+OgqS0UmMeLbZYnK0fsnz/nXrpnHcszQdmFPySzz8M+skmd6uhVZ2eslMLYQmSLdvMRzOUSfjVnWy4MnuxaKKKkgKKKSgEVpp1JFFALRRRQBSUtFAFFRcZmgZZ31idoPSn4WcuszJ33idKAru0K/Rg/otPp4HWdx161WBau+N/0L+7/UKorTSK5s3JrDgUqKyz23vNdS5aZUuqJY/mFPZiRqdj7q0OOL924QgPBymdJjTkaxeA7QuLxtXnkElcxjwuDHIDwnb4edb9LCTjKUab2+/wB0VytWkyVj8LeR7KWbJZLABDZlGdpBYNJ01WZ/vVIxqYh76XVsaWl08Sw0oZE8iCWHurjj1xK3h9MRbuMMirIEeEEMY01nrsZimcfxOJsC0/fSIVTlkS6A5iByVuYrtx6np4baaXP62ZSpXz4O2Ot4i7iEz2T3SXNAGGVhmjvG66QcsdRzosDEWb793YPdO+ozLlAzAG4vTSTEeXIV0xeHxSYUDvvpbZZ3fXxIM5y7b6r8KpLOOxXyV7xvMZZVUfnAhvEdtjpUQuUaVVxW/wC5MqT3u+f9E23exdu9dujCFu8gZcwgRAkHWZjpzpmJ+WXMK6XLTNce51UFEGVgYG4kEVFxN/G2+5DYg/TAZdtJKjxSP7w+FTMFjMRaxLW7103AltnIEQYXMIMDWKvKDSUlpbVVzbrYqmuN/wDorPjbtsWBZFpcoRrjtPh2MDzHIA/bWhwOGW1bS2uoUAT9ZPvM/GstgXxuJDXRdyKrGEXbTWABv79TV32e4i162S41VsuaIDaA/EGR7q5uog9LWyV7peGaY5JvyWv8/XTcQfo38g3+k05T9lR8e5W28bmAPVjH31yI2o3eDWLaDoqj4AV3pEWABTq3RgFFc7s5TG8GPWKi4Qvm8WaMvMHefPyoCbS0UUAUUUUAUUUk0AtJRS0AUUUUBXcbnuHjllPwYGqC1sDyIFXXaZyuExDKYItOQehCkis5gXPdpm3yqT7wK58y3s1xvwLiLnIDTSsLw/h3e3MSuzLczW26HO4I9CPhodxW5xDvkYW4z5fBtExpvVPw3BX7d3O0AOT3mqmR4joP8R5V0dK1HHNppOlXzRXKrklVmcxvELlxrSMrqbVyDO5XMmjEdMseYCnU61Z9uX+itf4z/pNWvFeG53W5biZGcExIBHi9Y089OlLxvhwxNs2yYI8SNvDCeXSCR766O9j1Y5R2q7XqzPRKmn+h34g/0Nz/ANt/9Jqr7FN/u3/zb7KrG4dxFk7hnXu4ylpGq7ROXMRWl4VgVsW1trrl3PUkyT8aymlDG42m2729F1cndFF2v/psL/jP/Ut1qLxXIc0ZYOadogzPlFZbjfC8Zeu5lKFEINqSARopM6a+Ic6vUwty5h+6vHxuhVysc5EiNNopkS7cFqW13XyxG7exmzwu9am7gbouWzrlBBJjlr4XjadDV12e4ucTbJZQroYcDY6aEA7Trp5VUYbA4/DA27QtshJIbTcgawxEGANNat+z/CDh7bZ2l7hlo220APPc6+daZ2pQbbTfhrlr5Igmnsq9/wCi0B/n3Vx4ghbugPzrtpY65iV+qZrqAZj+dqseH21a5bzcmDD1AMfXXFHk1brc1lLSUtbGIUUUUAlLRSUAtFJNFALTGWadS0AUUUUAUUUUBU9qP/08R/7Vz/SaztpttCK1PGLQexcVtmRgfQjWsfdxXTz+2sMz4RpjXkW5hAxLd5dE8lYKoPQQJHxrg/DR/aXv81+nrXW1bVpPikkncDekbCr1O0bjaI6VSMnxZo0iM/CkM/SX9P8A+1zy6GmfM6/2l/8AzrnX1qSuEQddQRv1I19w0HqetBwiH3z5TqTPrrWik/ZSkRhwdP7S9PP6a519aevCFBnvL3+dcPpzrqcKuhEgjmN+ZHrr18+tHyVM2YySSTvprrEc6nU/YpDPmpDr3t7U8rrx/Gk+al5Xb/8Amtyp4wiDXX7NBG3urqlhM2bWZJ8pMmfrPpTU/YpEf5pH9rf/AMxq5vwsH+uvf5np5VJfBpAEtoZkGDygH+eZpPkqzz5ncRMASBsNhtEHWmp+xSJGHtZQFkmNMzGW23J5mrHDkB0I5Mg+JAquwdrIoWZidY6sT9tTrJOdROmZfqINFyS+DWgRTqKStTEWiiigCikpaAaqxTqKKAKKKKAKKKKAazRS0hE0tAQuMf0Fz/A2vTTespZ4coGuprZ3rQdWVtQwKn0Ig1i+GqbYNssWCALLbysgyeuk1z5luma42K+DI1QwfMSKweI7R4xcQbDnDoVJBchsgAUtJOfTTrGpExW4x1/MCgYgEQSpg+orNp2TwytnBuhpJzC4waTMnMNZqcOlbyJnb4IyY7HFgme0HJJym1c9gXGtZpnfOp8O8a0tnF491B7yyGL20ym2dC/yeJOadDfQTlI8J1EiZ6dnLA53dGz/ANNc9sgy/te0ddd6U9mcKSSRcJOaSb1yTmjMSc2swJ6wOlba4ev4KaZeykxPHcUlo3RctkB8gVrDW2JhSZV3BEZvzQ3uqThuIY1kzm7aUBAzzbiA1sXFyszqr+EwTIAOms1at2awzSD3pDasDeukMREFgW8REDfpTP8AZfCkAFbkAEAd7cgKTqAM0AHmKnXD0NMvZSYHj+LuIH7y0uZrqqpt6nu7YuMY7wNEGNAYO5EirRrmOGb6SwQoJJ7tozLnDKYc7BCTuRI0FSF7JYMbK+kxFy4IzQGiDpI0PWuh7OWCQxa8SIg9/cJEExBLaRJjpJprh6GmXsoMXx/G27i2wbLkqjMQjBbfeAEB2znLE6kx8K2uER1Re9Ks/wCdlBUa7gCTEecz5VAfs/YlZNxioCrmuM0KDoNeW481aPWdhrItoEUsQugzGSB0noNhVJyi/wApaKfk7W10n1qRhyFe3J9q4gHmSdq4WwYj7fKm42c2HI/MvWmP+HOFPwkGqFjdUUUVsYCGkBmloAoBaKKKAKKKKASlopjGKAfRRRQBRRRQDa8z4n2jwlu5eVb6ybjEypjkGynnqDtWq7bcWOGwrsph38CRvJGpHoJ98V5hgODW1QF0BciWJ5EiconaNqwzuMYpv9DXEnJtIsv9o8PEm6COcW7h6eXr8R01YnavDH+tn0tXPKdx6/EdNcxxW5bt5raasZCjpPM1Ds4dEBz7gDz3P3VSE04219jo7O+zNr/tRhx/WN/lsOnX3/HyptvtZh2bKHcsdI7s7xr/AArFojXXW3bGZjsAAOWpPIKOv31NTs7ibDrdBtuVObKrGTG66gTpNXU4r8zSM5waf4dzYtx62J1fn/Vk/VNNsdo7NwEq50JGtttDqftHw+DMLft3UDoAQeUag81I3zTpFSb/AAO5bm53IUNGbO9tA3TdtD6j/wAZxnKV7ESUY8sk2Md3v9GWbeAttyeesDXpr5HromKxZtjNc7y2sxmezcVZMkDMQBP3H3MwIIt3EKID3iKUuMBOQMxhlPIMTpPM8q69o+G3rmGW3aw4DtcFzwur5kVHhpzaAFh8dPLqW0baMoRU8ii3Sb5+CGvG0P8AW2+caEHynpSfPSgwblvTQn+OgrO4Xs9jHRmFnwR7WZdWMQo13OYCI50tjs3infILDSWI3GmUgNOsCJEz1FZ636/g730mLxk/k1eG4mW2a2ZjXNy51ZNilZk1zAMCfDAEbaehrNW+F3rfdKtvN4LchXysWbMdBzDQYPODV/fwFxWk5VW2C75jBH0YkiPJGGtY9+bdKJzvDBcyPQ6SoHBMR3mHtPM5kQz18I1qfXXwcotFFFAFFFFAFJNNUzvT6ASloooBKWiigEpaSqLtlxBsPg71xTDABVMxqzKsjzgk+6iVugeeflG7T23xCWl1Wy0FhtJIzH08IHuPUVXjjKkdQw3n+FZzFYm0yOosKrNs/iLDxydSBOmnvPpVX3caa/w+2tc3QvJTVponFm0Xaux/GQbdwuGDZzpB1EDp0qFdxrtyj7+tdnw4Jk7+v/ml+Tj+TV8fRNKpKxLO23p2RpOy/E7Nq17Q71mOfOYPkB/diPiassZxjYtcRRyJIisUtggcoPUA/wARSdwOi/sr91YZP6W5S1WXh1WlVRZ8L4zkxveqW7oOjsF3cIya5TpJidetbzC9pMDcc94x7oZiqG24c5jm7tisjuwxcgf3tdBr5gUYGQVGkeym2+oEUB3HNfr+w11fSfhSrg5ptSdvc9KTjVgrdd7hRrl65cRchaLbqCskAicwTQbZTvXXFdoHtqr4K2WZ0uB2f2B4lylV8D7BukZudeZfLnXp8D9tSPny7kycvVf4kTUS6d6aT3LQyaZW0n8G34d2oxqe3hkgm3mCrc17szbgl22IEwDpXNe1mLV+8awoKlyGy3wPHM5gzkESxI6VjMNxa4rTByncZgfPnXfF8dJXKBqdzEc6weGSlVuvsdS6iNfkR6Lie1q58sDuwtsBldsy5AcvLUb7c2NSrnHreIt5wEJZbgaWOZQ5aISYBhysEE/CK8ptcVA/NP1H7alYHjfduWExrura+RirfRX/AHsx71f2I987HiMFYH6KZf2SV+yrqsx+T7iCX8EjIScr3VaRBBzs0EejKfeK09UnyyqFopKWqkhSUtFAFJS0UAUUlLQBRRSUA1hNZrt7gL+Iwht2EzuXQkZlXwrJJliBuB8a09FTGTi014Ias8IfsFxI/wDpv+ZZ/FXFuw3Eh/6V940ez9j177RXX9bP0iuhHz63Y/iA3wl3ntlO3o3/AN1yfszjV9rC3uR0tu2+3szr5bivoeipXXT9IdtHz5h+zmMJH+63tyNbbjWOcgafD1qRZ7FcQuOYwrqpkguyLA6QXBHpFe90VEutm/CCgjyG1+SvEkeK/aXXlnfTrJAj0qHi/wAmuOQEp3dyJ0W4wY+gdVH/ABV7VRWa6rIidCPDH/J5j4nuFJ00FxZ19XG3r8aiXPyfY8GBhm57NbI+PeV79RV/rZ+kR20fPI7I4y2wL4W8QIJCqWkT/cmfSuGL4FiMzE4W8oJMA2bunOB4Y2r6NoqfrHdtIaD5jucHugSbV0DzRgI67V0wvZ3FOYTDXWO2lt4B82Ige+vpeKWKfWf+SNHyYz8mXDL+Gwj279s22NxmUEqSVKoJ0JjUHetnRRXLKWptsulSA0iiKdRVSQopKWgCiiigEpGaK+crPGsYzKvyvFDMwWflF7mQP069Bfsfi1uLbbjOKDOYWVvwxCs+UN30E5VY+41ZwryD0kEzXSvnhcdj2e4iYzEM1ssI+VOrNlzTkRnDOYUmFBP1VJxD8RFxrdvF4i4VZF0xThiXZEU90bmcKXuIuaIkjWp0fJFnv1FeAF+KRPyjEkRm8GLL+GHbNC3CY8DidiVK76VG+W8RhycViQLao75sU6hVcBkks48TAiF9rWImmj5Fn0RSExXgl9OKoxX5TiHI/s8W7FtEJyKLmZ4zrJUGJ1pl27xBbZuHGYg5WdXC4pnCBAmpdbhWSbgXLvMdRTR8iz3+ivAsKeJPlJxeIVWRnDHFMYAtXLqZx3kori2wDNA36RS2U4ozqnyjEAswUZsW40LIucQ8tbBdPGoI13po+RZ75RXzziMXxG2udsVicsgSMU7e1mysQrkhWytlYiGjQmonz7jP1zFfvF38dO38iz6RpCYr5v8An3GfrmK/eLv46Pn3GfrmK/eLv46dsWfSIor5u+fcZ+uYr94u/jo+fcZ+uYr94u/jp2xZ9I0V83fPuM/XMV+8Xfx0fPuM/XMV+8Xfx07bFn0jQa+bvn3GfrmK/eLv46X59xn65iv3i7+OnbYs+jC010FfN3z7jP1zFfvF38dHz7jP1zFfvF38dO2LPpGivm759xn65iv3i7+Oj59xn65iv3i7+OnbFn0jRXzrheKY642VcXiZidcTdGkgfp677VLFziJBIxl4xof96uaGAYPi0Oo/mKaPkWe/AzSxXzf8+4z9cxX7xd/HSfPuM/XMV+8Xfx07YshYd8rq0TlZWjrBBivSD2+wXf8Af9zic2fPH0OXP3RtTM5oyE+HNE6xNJRV5IGLwXH7llrptqsXXLnNnkTnEHIy5hDnRpEwYBruO1d8CMtv2kb+sAJS5buCUFzITmtr4iM0SJiloqaBG4dxhrbW83sW+69geMi1ce6okmNWcgmD4TsYg87PGLi3Lt2FL3c+ac8AXJzAKrBWXX2XDLoNNKKKAlDtPeDK4W0LiAhLgV8y5ggaAXK+LIJlTEtETUduMMbb2ltWktuxdkUXCO8IUC4M9xirLlEQY1YQQSClFAdrvHWCKltFWbSW7jEMWfLauWj+dlCgXGIgAyFmYinJ2lvAowW1ntqqI+VsyopQ5AM2UglNSQT4mgidCigI2L4u9xCmS2obuwxQPmKW5FtDmdhlUGJAk5VkmKrqKKkBRRRQBRRRQBRRRQBRRRQBRRRQBUnDXbag57eczoc7LAjaANdaKKAeMRZ52J1O9xtjsNByFIL1kT9DPSXYQJ6DyooqARKKKKkH/9k="
                                    class="img-fluid img-thumbnail" alt="Sheep">
                            </td>
                            <td>Rosted & Satted mixed nuts</td>
                            <td>123 Rs</td>
                            <td class="qty"><input type="text" class="form-control" id="input1" value="2"></td>
                            <td>123 Rs</td>

                            <div class="def-number-input number-input safari_only mb-0 w-100">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                    class="minus decrease"><i class="fa fa-minus"></i></button>
                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                    class="plus increase"><i class="fa fa-plus"></i></button>
                            </div>

                            <td>
                                <a href="#" class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <h5>Total: <span class="price text-success">89$</span></h5>
                </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    </div>
</div>

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