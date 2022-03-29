@extends('layouts.login_layout')
@section('content')

<style>
.modal-dialog {
    overflow-y: initial !important;
}

#add_staff_modal {
    height: 100vh;
    -ms-overflow-style: none;
    scrollbar-width: none;
    z-index: 9999999;
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
                                    <h4 class="card-title text-success">Theme Slider</h4>
                                </div>
                                <div class="col text-right">
                                    <!-- Button trigger modal -->
                                    @if(session()->get('user_role') == 'Admin')
                                        <button type="button" class="btn btn-success" id="add_staff_btn">
                                            <i class="fa fa-image"></i> Add Image
                                        </button>
                                    @endif
                                    
                                </div>
                            </div>
                            <hr/>
                         
                        </div>


                        <!-- The Modal -->
                        <div class="modal" id="add_staff_modal">
                            <div class="modal-dialog mt-5">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header bg-success">
                                        <h5 class="modal-title">Add Home Slider</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row ">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-6">
                                                        <div class="form-group  col-md-12">
                                                            <label for="photo">Image</label><br>
                                                            <input type="file" class="form-control" id="photo" name="photo">
                                                            <div class="error" id="photo_err" style="display:none;font-size: 14px;color:red;"></div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="order">Order</label>
                                                                <select class="form-control" name="order" id="order">
                                                                    <option value="">Select Order</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option> 
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                </select>
                                                            <div class="error" id="order_err" style="display:none;font-size:14px;
                                                        color:red;"></div>
                                                        </div>
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
                                                <th>Image</th>
                                                <th>Order</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="home_slider"></tbody>
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

{{-- Edit Modal --}}
<div class="modal fade" id="slider_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title">Update Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{-- <form  enctype="form-data" action="" method="POST" id="updateUrl" onsubmit="return checkEditForm(this);"> --}}
           <form>
              <div class="modal-body">
                    <div class="col-md-9">
                        @csrf
                        <div class="form-group col-md-12">
                            <input type="hidden" id="theme_id">
                            <img src="" class="edit_theme_image img img-border img-padding" width="200px">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Change image</label>
                            <div class="form-group">
                                <input type="file" class="form-control-file image_name" id="image_name" name="image_name">
                            </div>
                            <div class="error" id="photo_err1" style="display:none;font-size: 14px;color:red;"></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="order_id">Order</label>
                                <select class="form-control edit_order_id" name="order_id" id="order_id">
                                    <option value="">Select Order</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option> 
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            <div class="error" id="order_err" style="display:none;font-size:14px;
                        color:red;"></div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer bg-success">
                    <button type="button"class="btn btn-primary"id="edit_slider_final_btn">Update</button>
                    <button type="button" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--end edit modal--}}

<input type="hidden" id="user_role" value="{{Session::get('user_role')}}">

<script>
    $(document).ready(function(){
        let baseUrl = $('#base_url').val();
        getThemeData();
        function getThemeData() {

            $.ajax({
                url: baseUrl + '/admin/theme-slider/get-theme-records',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}'
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loader').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                },
                success: function (resp) {
                    if (resp.status == 200) {
                        let x = '';
                        $.each(resp.data, function(iKey, iVal){
                            x+= '<tr>'+
                                '<td>'+parseInt(iKey+1)+'</td>'+
                                '<td><img src="'+ baseUrl +'/storage/theme_images/'+ iVal.image_name +'" style="max-height:60px;"></td>'+
                                '<td>'+iVal.order_id+'</td>'+
                                '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary edit_slider_record" data-slider_id='+iVal.id+'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> ' +
                                ' <button type="button" class="btn btn-sm btn-danger delete_slider_data" data-slider_id=' +
                                iVal.id + '><i class="fa fa-trash" aria-hidden="true"></i></button></td>' 
                            '</tr>';
                        });
                        $("#home_slider").html(x);
                    }
                    else {
                    }
                },
                complete: function () {
                    $("#loader").modal('hide');
                },

            });

        }

        $('#add_staff_btn').click(()=>{
            $('#add_staff_modal').modal('show');
        });

        $('#add_staff_final_btn').click(()=>{
           let order =  $('#order').val();
           var image = $('#photo').val();
           var formvalid = true;

           if(image==''){
            $('#photo_err').html('Select an Image').css('display', 'block');
                    return false;
           }
            if (image) {

                //-----get image extention-------------
                var img_ext = image.split('.').pop().toUpperCase();
                //-----get image size-----------------
                var img_size = $('#photo')[0].files[0].size;
                //------validate extention-----------
                if (img_ext != 'JPG' && img_ext != 'JPEG' && img_ext != 'PNG') {
                    $('#photo_err').html('wrong file formate.').css('display', 'block');
                    return false;
                } else {
                    $('#photo_err').css('display', 'none');
                }
                if (img_size >= '1000000') { //-----size validation-----------
                    $('#photo_err').html('file size should be less than 1mb.').css('display', 'block');
                    return false;
                } else {
                    $('#photo_err').css('display', 'none');
                }
            }
            var formdata = new FormData();
                // formdata.append('old_image', $('#old_image').val());
                formdata.append('image', $('#photo')[0].files[0]);
                formdata.append('order', $('#order').val());
            
         $.ajax({
            url: baseUrl + '/admin/theme-slider/add-theme-image',
            type: 'POST',
            data: formdata,
            dataType: 'json',
            beforeSend: function() {
                $('#loader').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            success: function(resp) {
                if(resp.status == 200) {
                    $('.text-center').html(resp.msg);
                    $('.close').attr('data-modal_name','success_modal');
                    $('#successModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                }
                else{
                    $('.text-center').html(resp.msg);
                    $('#errorModal').modal('show');
                }
            },
            complete: function() {
                $("#loader").modal('hide');
              
            },
            cache: false,
            processData: false,
            contentType: false

        });
        });


        $('#edit_slider_final_btn').click(()=>{    
         var image_name = $('#photo').val();
         var order_id = $('#order').val();
         var formvalid = true;

        //   if(image_name==''){
        //   $('#photo_err1').html('Select an Image').css('display', 'block');
        //           return false;
        //  }
          if (image_name) {

              //-----get image extention-------------
              var img_extention = image_name.split('.').pop().toUpperCase();
              //-----get image size-----------------
              var img_size = $('#image_name')[0].files[0].size;
              //------validate extention-----------
              if (img_extention != 'JPG' && img_extention != 'JPEG' && img_extention != 'PNG') {
                  $('#photo_err1').html('wrong file formate.').css('display', 'block');
                  return false;
              } else {
                  $('#photo_err1').css('display', 'none');
              }
              if (img_size >= '1000000') { //-----size validation-----------
                  $('#photo_err1').html('file size should be less than 1mb.').css('display', 'block');
                  return false;
              } else {
                  $('#photo_err1').css('display', 'none');
              }
          }

          var formdata = new FormData();
              // formdata.append('old_image', $('#old_image').val());
              formdata.append('update_id',$('#theme_id').val());
              formdata.append('image_name', $('#image_name')[0].files[0]);
              formdata.append('order_id', $('#order_id').val());

        $.ajax({
            url: baseUrl + '/admin/theme-slider/update',
            type: 'POST',
            data: formdata,
            dataType: 'json',
            beforeSend: function() {
                $('#loader').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            success: function(resp) {
                if(resp.status == 200) {
                    $('.text-center').html(resp.msg);
                    $('.close').attr('data-modal_name','success_modal');
                    $('#successModal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                }
                else{
                    $('.text-center').html(resp.msg);
                    $('#errorModal').modal('show');
                }
            },
            complete: function() {
                $("#loader").modal('hide');
            },
            cache: false,
            processData: false,
            contentType: false

        });
        });

        $(document).on('click','.close', function() {
            let $modal = $(this).data('modal_name');
            if($modal == 'success_modal'){
                location.reload();
            }
        });
        
        $(document).on('click','.edit_slider_record', function() {
            let slider_edit = $(this).data('slider_id');
            if(slider_edit != ''){
                $.ajax({
                    url: baseUrl+'/admin/theme-slider/edit-slider-detail',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'action_id': slider_edit
                    },
                    dataType: 'json',
                    beforeSend: function(){$('#loader').modal({backdrop:'static',keyboard:false});},
                    success: function(res){
                        if(res.status == 200){
                            $('#theme_id').val(res.data.id);
                            $('.edit_theme_image').attr('src',baseUrl+'/storage/theme_images/'+res.data.image_name);
                            $('#order_id').val(res.data.order_id);
                            // $('#order_id').select2().trigger('change');
                            // let updateUri = '/admin/theme-slider/'+res.data.order_id;
                            // $('#updateUrl').attr('action', baseUrl+updateUri);
                            $('#slider_edit_modal').modal({backdrop:'static', keyboard:false});

                            
                        }
                            },
                            complete: function(){
                                $('#loader').modal('hide');
                            }
                        })

                    }else{
                        alert('OOPS! something went wrong, please re-fresh your browser.');
                        location.reload();
                    }
                });
            
        $(document).on('click', '.delete_slider_data', function() {
        if (confirm("Are you sure, you want to delete this slider on your database")) {
            let slider_id = $(this).data('slider_id');
            if (slider_id == '') {
                alert('OOPS! something went wrong, please re-fresh your browser.');
                location.reload();
            } else {
                $.ajax({
                    url: baseUrl + '/admin/theme-slider/delete-slider',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': slider_id
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