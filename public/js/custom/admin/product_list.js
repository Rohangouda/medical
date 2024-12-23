// image preview
// var ImageCount = @json($imagedata->count());
// var limit = env('MAX_IMAGE') - ImageCount;
// var maxlimit = limit;
var maxlimit = 5;
console.log(maxlimit);
function readURL(input,id) {
    var img = $("#" + id);
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            img
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {

   
    // end product state
    // datatable
    // var table = $('#DataTables_Table_0').DataTable();
    // end datattable
    let baseUrl = $('#base_url').val();
    let search_text = $('#search_text').val();
    let perPage = $('#userPerPage').val();
    let page_no = 0;

    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var current_date = day+'-'+(month<10 ? '0' : '') + month + '-' +(day<10 ? '0' : '')+d.getFullYear();

    //----- Load function-----
    get_product_list(search_text, page_no, perPage);


    var quill = new Quill('#editor-container', {
        placeholder: 'Start Writing Here.....',
        theme: 'snow' // or 'bubble'
    });
    
    $("#submit").on("click", function() {
        $("#hiddenArea").val($("#editor-container").find(".ql-editor").html());
        $('#identifier').submit();
    });
    // image slot add and remove
    $("#id1").hide();
    $("#id2").hide();
    $("#id3").hide();
    $("#id4").hide();

    var pointer = 1;
            $(".add").click(function(){
                // var dynamic = $('.images').children().length;
                if (typeof limit !== 'undefined') {
                    if( limit>1 ){
                        limit = limit - 1;
                        if (pointer == 1) {
                            $("#id1").show();
                            pointer = 2;
                        }
                        else if (pointer == 2) {
                            $("#id2").show();
                            pointer = 3;
                        }
                        else if (pointer == 3) {
                            $("#id3").show();
                            pointer = 4;
                        }
                        else if (pointer == 4) {
                            $("#id4").show();
                            pointer = 5;
                        }
                    }
                }
                else{
                    if (pointer == 1) {
                        $("#id1").show();
                        pointer = 2;
                    }
                    else if (pointer == 2) {
                        $("#id2").show();
                        pointer = 3;
                    }
                    else if (pointer == 3) {
                        $("#id3").show();
                        pointer = 4;
                    }
                    else if (pointer == 4) {
                        $("#id4").show();
                        pointer = 5;
                    }
                }
            });

                $("body").on("click",".remove",function(){
                if (typeof limit !== 'undefined') {
                    if(limit<maxlimit){
                        limit = limit + 1;
                    }
                }
                if (pointer == 5) {
                    $("#id4").hide();
                    $("#id4").find('img').attr('src',"{{asset('images/product.png')}}");
                    $("#id4").find('#input5').val("");
                    pointer = 4;
                }
                else if (pointer == 4) {
                    $("#id3").hide();
                    $("#id3").find('img').attr('src',"{{asset('images/product.png')}}");
                    $("#id3").find('#input4').val("");
                    pointer = 3;
                }
                else if (pointer == 3) {
                    $("#id2").hide();
                    $("#id2").find('img').attr('src',"{{asset('images/product.png')}}");
                    $("#id2").find('#input3').val("");
                    pointer = 2;
                }
                else if (pointer == 2) {
                    $("#id1").hide();
                    $("#id1").find('img').attr('src',"{{asset('images/product.png')}}");
                    $("#id1").find('#input2').val("");
                    pointer = 1;
                }
            });

    function get_product_list(search_text, page_no, perPage) {
        $.ajax({
            url: baseUrl+'/admin/get-product-list',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'search_text': search_text,
                'page': page_no,
                'perPage': perPage
            },
            dataType: 'json',
            beforeSend: function(){
                $('#loader').modal({backdrop:'static',keyboard:false});
            },
            success: function(res){
                if(res.status == 200){
                    let x = '';
                    $.each(res.product_records.data, function(plKey, plVal){
                        // console.log(res.pagination);
                        let $brand_id = '-----';
                        if(plVal.rln_pro_cat.brand_id != null){
                            $brand_id = plVal.rln_pro_cat.brand.brand_name;
                        }
                        x+= '<tr>'+
                            '<td>'+parseInt(plKey+1)+'</td>'+
                            '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary edit_product_detail" data-product_id='+plVal.id+'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> ' +
                            ' <button type="button" class="btn btn-sm btn-danger delete_product" data-product_id='+plVal.id+'><i class="fa fa-trash" aria-hidden="true"></i></button> '+
                            ' <button type="button" class="btn btn-sm btn-info clone_product" data-product_id='+plVal.id+'><i class="fa fa-clone" aria-hidden="true"></i></button>'+
                            '</td>'+
                            '<td>'+plVal.product_name+'</td>'+
                            '<td> <input type="text" class="form-control" id="tbl_price_'+plVal.id+'" name="tbl_price_'+plVal.id+'" value='+plVal.product_details.price+'><div class="error" id="tbl_price_err" style="display:none;font-size:14px;color:red;"></div><button type="button" class="btn btn-sm btn-primary productDetailsUpdateBtn"  data-product_id = '+plVal.id+' data-column_name = "price" style="margin-top:5px;">update</button></td>'+
                            '<td> <input type="text" class="form-control" id="tbl_mrp_price_'+plVal.id+'" name="tbl_mrp_price_'+plVal.id+'" value='+plVal.product_details.mrp_price+'><div class="error" id="tbl_mrp_price_err" style="display:none;font-size:14px;color:red;"></div><button type="button" class="btn btn-sm btn-primary productDetailsUpdateBtn" data-product_id = '+plVal.id+' data-column_name = "mrp_price" style="margin-top:5px;">update</button></td>'+
                            '<td> <p>In-stoke : '+plVal.product_details.quantity+' <button type="button" class="btn btn-sm btn-info updateQuantityBtnInitial" data-update_qunatity='+plVal.id+'><i class="fa fa-plus" aria-hidden="true"></i></button></p><input type="text" style="display:none;" class="form-control tbl_quantity_cls" id="tbl_quantity_'+plVal.id+'" name="tbl_quantity_'+plVal.id+'"><div class="error" id="tbl_quantity_err" style="display:none;font-size:14px;color:red;"></div><center><button type="button" id="Initial_'+plVal.id+'" style="display:none;" class="btn btn-sm btn-primary productDetailsUpdateBtn" data-product_id = '+plVal.id+'  data-column_name = "quantity" style="margin-top:5px;">update</button></center></td>'+
                            '<td>'+plVal.rln_pro_cat.category.cat_name+'</td>'+
                            '<td>'+$brand_id+'</td>'+
                            '<td>'+plVal.detail+'</td>'+
                        '</tr>';
                    });
                    $('#product_list').html(x);
                    $('.js_pagination_append').html(res.pagination);
                    $('#userPerPage').css('display','block');
                    $('.exportOptionBtn').prop('disabled',false);
                }else {
                    $('.js_pagination_append').html('');
                    $('.exportOptionBtn').prop('disabled',true);
                    $('#product_list').html('<tr><td colspan="9" style="text-align:center;">'+res.msg+'</td></tr>');
                }
            },
            complete: function() {
                $('.page-link').attr('href','javascript:void(0);');
                $('#loader').modal('hide');
            }
        });
    }

    $(document).on('keyup','#search_text', function() {
        let search_text = $(this).val();
        setTimeout( () => {
            get_product_list(search_text, page_no, perPage);
        },1200);
    });

    $(document).on('click','.page-link', function() {
        let checkPreNext = $(this).attr('aria-label');
        let page = '';
        if(checkPreNext === 'Next »'){
            if($(this).attr('rel') == 'next'){
                $(this).html(page);
            }
            if(page_no == 0){
                page += 2;
            }else {
                page += 1;
            }
            
        }else if(checkPreNext === '« Previous'){
            if($(this).attr('rel') == 'prev'){
                $(this).html(page);
            }
            page -= 1;
        }else {
            page = $(this).html();
        }
        // alert('page : '+page_no);
        PerPage = $('.userPerPage ').val();
        get_product_list(search_text, page, perPage);
    });

    $(document).on('change','#userPerPage', function() {
        let perPage = $(this).val();
        get_product_list(search_text, page_no, perPage);
    })

    $(document).on('click','.edit_product_detail', function() {
        let id = $(this).data('product_id');
        if(id == ''){
            alert('Your had found some errors on your system, please refresh it once');
            location.reload();
        }else {
            $.ajax({
                url: baseUrl+'/admin/edit-product-record',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': id
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#loader').modal({backdrop:'static',keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        quill = '';
                        $('#edit_product').val(res.data.id);
                        $('#exampleModalLabel').html('Edit product');
                        $('#submit').hide();
                        $('#brand_name').val(res.data.product_name);
                        $('#category').val(res.data.rln_pro_cat.rln_category);
                        $('#category').select2().trigger('change');
                        $('#product_state').val(res.data.product_state);
                        $('#product_state').select2().trigger('change');
                        $('#product_unit').val(res.data.product_unit);
                        $('#product_unit').select2().trigger('change');
                        $('#weight_data').val(res.data.weight);
                        $('#brand').val(res.data.rln_pro_cat.brand_id);
                        $('#brand').select2().trigger('change');
                        $('input[name="mrp_price"]').val(res.data.product_details.mrp_price);
                        $('input[name="price"]').val(res.data.product_details.price);
                        $('input[name="quantity"]').val(res.data.product_details.quantity);

                        $('#mrp_price').attr('readonly','readonly');
                        $('#price').attr('readonly','readonly');
                        $('#quantity').attr('readonly','readonly');

                        // console.log('image length : '+res.data.product_images.length);
                        if(res.data.product_images.length > 0){
                            $('.clone').remove();
                            let pimage = '';
                            $.each(res.data.product_images, function(piKey, piVal){
                                pimage += '<div class="clone hide" id="id'+parseInt(piKey+1)+'">'+
                                                '<div class="ibox">'+
                                                    '<div class="control-group input-group mt-4">'+
                                                        '<img id="blah1" class="img-thumbnail" src="'+baseUrl+'/storage/product/'+piVal.image+'" alt="your image" />'+
                                                        '<input type="file" name="filename[]" class="form-control-file" accept="image/png, image/jpeg" onchange="readURL(this,"blah1");" required>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>';

                            });
                            $('.images').html(pimage);
                        }

                        $('#editor-container').html(res.data.detail);

                        $('.text-center').html('<button type="button" class="btn btn-info" id="update_product_detail">Update</button>');

                        $('#exampleModal').modal({backdrop:'static',keyboard:false});
                    }else {
                        quill = '';
                    }
                },
                complete: function() {
                    var quill = new Quill('#editor-container', {
                    });
                    $('#loader').modal('hide');
                }
            });
        }
    });

    // Clone productssss
    $(document).on('click','.clone_product', function() {
        let id = $(this).data('product_id');
        if(id == ''){
            alert('Your had found some errors on your system, please refresh it once');
            location.reload();
        }else {
            $.ajax({
                url: baseUrl+'/admin/edit-product-record',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': id
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#loader').modal({backdrop:'static',keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        quill = '';
                        $('#edit_product').val(res.data.id);
                        $('#exampleModalLabel').html('Clone product');
                        $('#submit').hide();
                        $('#brand_name').val(res.data.product_name);
                        $('#category').val(res.data.rln_pro_cat.rln_category);
                        $('#category').select2().trigger('change');
                        $('#product_state').val(res.data.product_state);
                        $('#product_state').select2().trigger('change');
                        $('#product_unit').val(res.data.product_unit);
                        $('#product_unit').select2().trigger('change');
                        $('#weight_data').val(res.data.weight);
                        $('#brand').val(res.data.rln_pro_cat.brand_id);
                        $('#brand').select2().trigger('change');
                        $('input[name="mrp_price"]').val(res.data.product_details.mrp_price);
                        $('input[name="price"]').val(res.data.product_details.price);
                        $('input[name="quantity"]').val(res.data.product_details.quantity);

                        // $('#mrp_price').attr('readonly','readonly');
                        // $('#price').attr('readonly','readonly');
                        // $('#quantity').attr('readonly','readonly');

                        // console.log('image length : '+res.data.product_images.length);
                        // if(res.data.product_images.length > 0){
                        //     $('.clone').remove();
                        //     let pimage = '';
                        //     $.each(res.data.product_images, function(piKey, piVal){
                        //         pimage += '<div class="clone hide" id="id'+parseInt(piKey+1)+'">'+
                        //                         '<div class="ibox">'+
                        //                             '<div class="control-group input-group mt-4">'+
                        //                                 '<img id="blah1" class="img-thumbnail" src="'+baseUrl+'/storage/product/'+piVal.image+'" alt="your image" />'+
                        //                                 '<input type="file" name="filename[]" class="form-control-file" accept="image/png, image/jpeg" onchange="readURL(this,"blah1");" required>'+
                        //                             '</div>'+
                        //                         '</div>'+
                        //                     '</div>';

                        //     });
                        //     $('.images').html(pimage);
                        // }

                        $('#editor-container').html(res.data.detail);

                        $('.text-center').html('<button type="submit" class="btn btn-info" id="clone_product_detail">Clone</button>');

                        $('#exampleModal').modal({backdrop:'static',keyboard:false});
                    }else {
                        quill = '';
                    }
                },
                complete: function() {
                    var quill = new Quill('#editor-container', {
                    });
                    $('#loader').modal('hide');
                }
            });
        }
    });


    $(document).on('click','#update_product_detail', function() {
        let $product_name = $('#brand_name').val();
        let $category_id = $('#category').val();
        let $brand = $('#brand').val();
        let $price = $('#price').val();
        let $mrp_price = $('#mrp_price').val();
        let $quantity = $('#quantity').val();
        let $detail = $('.ql-editor').html();
        
        let formValid = true;
        if($product_name == ''){
            $('#brand_name_err').html('Enter product name').css('display','block');
            $('#brand_name').focus();
            formValid = false;
        }else {
            $('#brand_name_err').html('').css('display','block');
        }
        if($category_id == ''){
            $('#category_id_err').html('Select category').css('display','block');
            formValid = false;
        }else {
            $('#category_id_err').html('').css('display','block');
        }
        if($price == ''){
            $('#price_err').html('Select category').css('display','block');
            $('#price').focus();
            formValid = false;
        }else {
            $('#price_err').html('').css('display','block');
        }
        if($mrp_price == ''){
            $('#mrp_price_err').html('Enter MRP').css('display','block');
            $('mrp_price').focus();
            formValid = false;
        }else {
            $('#mrp_price_err').html('').css('display','block');
        }
        if($quantity == ''){
            $('#quantity_err').html('Enter MRP').css('display','block');
            $('quantity').focus();
            formValid = false;
        }else {
            $('#quantity_err').html('').css('display','block');
        }
        if(formValid){
            $.ajax({
                url: baseUrl+'/admin/update-product-record',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_id': $('#edit_product').val(),
                    'product_name': $product_name,
                    'category_id': $category_id,
                    'brand': $brand,
                    'price': $price,
                    'mrp_price': $mrp_price,
                    'quantity': $quantity,
                    'details': $detail,
                    'product_state': $('#product_state').val(),
                    'product_unit': $('#product_unit').val(),
                    'weight': $('#weight_data').val()
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#loader').modal({backdrop:'static',keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        $('.text-center').html(res.msg);
                        $('.close').attr('data-modal_name','success_modal');
                        $('#successModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        // $('#exampleModalLabel').html('Add product');
                        // $('#update_product_detail').remove();
                        // $('.text-center').html('<input type="submit" id="submit" class="btn btn-primary" value="Submit">');
                        // $('#exampleModal').modal('hide');
                        // __clearModalFormData();
                        // get_product_list(search_text, page_no, perPage);
                    }else {
                        // alert(res.msg);
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
            $('#exampleModalLabel').html('Add product');
            $('#update_product_detail').remove();
            $('.text-center').html('<input type="submit" id="submit" class="btn btn-primary" value="Submit">');
            $('#exampleModal').modal('hide');
            __clearModalFormData();
            get_product_list(search_text, page_no, perPage);
        }
    });

    // clone_product_detail
    $(document).on('click','#clone_product_detail', function() {
        let $product_name = $('#brand_name').val();
        let $category_id = $('#category').val();
        let $brand = $('#brand').val();
        let $price = $('#price').val();
        let $mrp_price = $('#mrp_price').val();
        let $quantity = $('#quantity').val();
        let $detail = $('.ql-editor').html();
        
        let formValid = true;
        if($product_name == ''){
            $('#brand_name_err').html('Enter product name').css('display','block');
            $('#brand_name').focus();
            formValid = false;
        }else {
            $('#brand_name_err').html('').css('display','block');
        }
        if($category_id == ''){
            $('#category_id_err').html('Select category').css('display','block');
            formValid = false;
        }else {
            $('#category_id_err').html('').css('display','block');
        }
        if($price == ''){
            $('#price_err').html('Enter Price').css('display','block');
            $('#price').focus();
            formValid = false;
        }else {
            if($price > $mrp_price){
                $('#price_err').html('Price should be smaller then MRP price').css('display','block');
                $('#price').focus();
                formValid = false;
            }
            $('#price_err').html('').css('display','block');
        }
        if($mrp_price == ''){
            $('#mrp_price_err').html('Enter MRP').css('display','block');
            $('mrp_price').focus();
            formValid = false;
        }else {
            if($mrp_price < $price){
                $('#mrp_price_err').html('MRP should be greater than Price').css('display','block');
                $('mrp_price').focus();
                formValid = false;
            }
            $('#mrp_price_err').html('').css('display','block');
        }
        if($quantity == ''){
            $('#quantity_err').html('Enter MRP').css('display','block');
            $('quantity').focus();
            formValid = false;
        }else {
            $('#quantity_err').html('').css('display','block');
        }
        if(formValid){
            $.ajax({
                url: baseUrl+'/admin/clone-product-record',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_id': $('#edit_product').val(),
                    'product_name': $product_name,
                    'category_id': $category_id,
                    'brand': $brand,
                    'price': $price,
                    'mrp_price': $mrp_price,
                    'quantity': $quantity,
                    'details': $detail,
                    'product_state': $('#product_state').val(),
                    'product_unit': $('#product_unit').val(),
                    'weight': $('#weight_data').val()
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#loader').modal({backdrop:'static',keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        alert(res.msg);
                        $('#exampleModalLabel').html('Add product');
                        $('#update_product_detail').remove();
                        $('.text-center').html('<input type="submit" id="submit" class="btn btn-primary" value="Submit">');
                        $('#exampleModal').modal('hide');
                        __clearModalFormData();
                        get_product_list(search_text, page_no, perPage);
                    }else {
                        alert(res.msg);
                    }
                },
                complete: function() {
                    $('#loader').modal('hide');
                }
                
            });
        }
    });

    $(document).on('click','.updateQuantityBtnInitial', function() {
        let row_id = $(this).data('update_qunatity');
        $('.tbl_quantity_cls').css('display','none');
        $('.productDetailsUpdateBtn').css('display','none');

        $('#tbl_quantity_'+row_id).css('display','block');
        $('#Initial_'+row_id).css('display','block');

    });

    $(document).on('click','.productDetailsUpdateBtn', function() {
        let col_name = $(this).data('column_name');
        let edit_id = $(this).data('product_id');
        let formValid = true;
        let $price = '';
        let $mrp_price = '';
        let $quantity = '';
        if(col_name == 'price'){
            $price = parseInt($('#tbl_price_'+edit_id).val());

            if($price == ''){
                $('#tbl_price_err').html('Enter price').css('display','block');
                $('#tbl_price').focus();
                formValid = false;
            }else {
                if($price <= parseInt($('#tbl_mrp_price_'+edit_id).val())){
                    $('#tbl_price_err').html('').css('display','none');
                }else {
                    $('#tbl_price_err').html('Price should be less then MRP price').css('display','block');
                    $('#tbl_price').focus();
                    formValid = false;
                }
                
            }
        }
        if(col_name == 'mrp_price'){
            $mrp_price = parseInt($('#tbl_mrp_price_'+edit_id).val());
            if($mrp_price == ''){
                $('#tbl_mrp_price_err').html('Enter MRP price').css('display','block');
                $('#tbl_mrp_price').focus();
                formValid = false;
            }else {
                if($mrp_price >= parseInt($('#tbl_price_'+edit_id).val())){
                    $('#tbl_mrp_price_err').html('').css('display','none');
                }else {
                    $('#tbl_mrp_price_err').html('MRP price should be greater then peepal price').css('display','block');
                    $('#tbl_mrp_price').focus();
                    formValid = false;
                }
                
            }
        }
        if(col_name == 'quantity'){
            $quantity = $('#tbl_quantity_'+edit_id).val();

            if($quantity == ''){
                $('#tbl_quantity_err').html('Enter quantity').css('display','block');
                $('#tbl_quantity').focus();
                formValid = false;
            }else {
                $('#tbl_quantity_err').html('').css('display','none');
            }
        }
        if(formValid){
            $.ajax({
                url: baseUrl+'/admin/product/update-product-by-col',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'edit_id': edit_id,
                    'clicked_col': col_name,
                    'price': $price,
                    'mrp_price': $mrp_price,
                    'quantity': $quantity
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#loader').modal({backdrop:'static',keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        $('.text-center').html(res.msg);
                        $('.close').attr('data-modal_name','success_modal');
                        $('#successModal').modal('show');
                        let search_text = $('#search_text').val();
                        get_product_list(search_text, page_no, perPage);
                    }else {
                        $('.text-center').html(res.msg);
                        $('#errorModal').modal('show');
                    }
                },
                complete: function(){
                    $('#loader').modal('hide');
                }
            });
        }

    });

    $(document).on('click','.delete_product', function() {
        let id = $(this).data('product_id');
        if(confirm("Are you sure you want to Delete Product ?")){
            if(id == ''){
                alert('Your had found some errors on your system, please refresh it once');
                location.reload();
            }else {
                $.ajax({
                    url: baseUrl+'/admin/product/delete-product-by-row',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id
                    },
                    beforeSend: function() {
                        $('#loader').modal({backdrop:'static',keyboard:false});
                    },
                    success: function(res){
                        if(res.status == 200){
                            $('.text-center').html(res.msg);
                            $('.close').attr('data-modal_name','success_modal');
                            $('#successModal').modal('show');
                            let search_text = $('#search_text').val();
                            get_product_list(search_text, page_no, perPage);
                        }else {
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

    $(document).on('click','.exportOptionBtn', function() {
        let export_type = $(this).data('export_type');
        let subUrl = '';
        if(export_type == 'Excel'){
            subUrl = 'excel';
        }else if(export_type == 'PDF'){
            $('#exportTable').css('display','');
            subUrl = 'pdf';
        }else {
            subUrl = 'csv';
        }
        
        $.ajax({
            url: baseUrl+'/admin/product/download-'+subUrl,
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}'
            },
            dataType: 'json',
            beforeSend: function() {
                $('#loader').modal({backdrop:'static',keyboard:false});
            },
            success: function(res){
                if(res.status == 200){
                    let product_list = '';
                    let ypdf = '<tr>'+
                        '<th>S.No</th>'+
                        '<th>NAME</th>'+
                        '<th style="min-width: 200px;">PEEPAL STORE PRICE (PER PIECE)</th>'+
                        '<th style="min-width: 200px;">MRP PRICE (PER PIECE)</th>'+
                        '<th style="min-width: 200px;">QUANTITY</th>'+
                        '<th>CATEGORY</th>'+
                        '<th>BRAND</th>'+
                        '<th>DETAIL</th>'+
                    '</tr>';
                    $.each(res.product_records.data, function(pKey, plVal){
                        let $brand_id = '-----';
                        if(plVal.rln_pro_cat.brand_id != null){
                            $brand_id = plVal.rln_pro_cat.brand.brand_name;
                        }
                        product_list += '<tr>'+
                            '<td>'+parseInt(pKey+1)+'</td>'+
                            '<td>'+plVal.product_name+'</td>'+
                            '<td>'+plVal.product_details.price+'</td>'+
                            '<td>'+plVal.product_details.mrp_price+'</td>'+
                            '<td>'+plVal.product_details.quantity+'</td>'+
                            '<td>'+plVal.rln_pro_cat.category.cat_name+'</td>'+
                            '<td>'+$brand_id+'</td>'+
                            '<td>'+plVal.detail+'</td>'+
                        '</tr>';

                        ypdf += '<tr>'+
                            '<td>'+parseInt(pKey+1)+'</td>'+
                            '<td>'+plVal.product_name+'</td>'+
                            '<td>'+plVal.product_details.price+'</td>'+
                            '<td>'+plVal.product_details.mrp_price+'</td>'+
                            '<td>'+plVal.product_details.quantity+'</td>'+
                            '<td>'+plVal.rln_pro_cat.category.cat_name+'</td>'+
                            '<td>'+$brand_id+'</td>'+
                            '<td>'+plVal.detail+'</td>'+
                        '</tr>';
                    }); 
                    $('#exportTable').html(ypdf);
                    $('#export_product_list').html(product_list);
                }else {

                }
            },
            complete : function() {
                if(export_type == 'Excel'){
                    generateExcel();
                }else if(export_type == 'PDF'){
                    __exportAsPDF();
                }else {
                    __exportAsCSV();
                }
            }
        });
        
    });

    function __exportAsPDF() {
        html2canvas($('#exportTable')[0], {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download('product-details"'+current_date+'".pdf');
                $('#exportTable').css('display','none');
                setTimeout( () => {$('#loader').modal('hide');},1200);
            }
        });
    }

    function __exportAsCSV(){
        let text = 'product-details-'+current_date;
        tableToCSV(text);
        setTimeout( () => {$('#loader').modal('hide');},1200);
    }

    function generateExcel(){
        var table = $('.table2excel');
        if(table && table.length){
            var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: 'product-details-"'+current_date+'".xls',
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: preserveColors
            });
        }
        $('#loader').modal('hide');
    }

    $('.close').click(() => {
        __clearModalFormData();
    });

    function __clearModalFormData() {
        $('#brand_name').val('');
        $('#category').prop('selectedIndex','');
        $('#category').select2().trigger('change');
        $('#brand').prop('selectedIndex','');
        $('#brand').select2().trigger('change');
        $('#mrp_price').val('');
        $('#price').val('');
        $('#quantity').val('');
        $('.ql-editor').html('');
    }

     // product state js
    $("#product_state").change(function(){
       if($('#product_state').val()==0)
       {
         $("#product_unit")
            .find('option')
            .remove()
            .end()
            .append('<option value="ml">ml</option>')
            .append('<option value="l">l</option>');

          $('label[for=weight]').remove();
            $("#weight").find('input')
            .remove()
            .end();

         $('label[for=weight]').remove();
            $("#weight").find('input')
            .remove()
            .end()
            .append('<label for="weight">Weight/Volume*</label>'+
                               ' <input type="number" id="weight_data" class="form-control" name="weight" placeholder="Enter Weight/Volume" style="background-color: white;" required>'+
                                '<div class="error" id="weight_err" style="display: none;font-size: 14px;color:red;"></div>');

        } 

        if($('#product_state').val()==1)
        {
         $("#product_unit")
            .find('option')
            .remove()
            .end()
            .append('<option value="N">--Select Unit--</option>')
            .append('<option value="g">g</option>')
            .append('<option value="kg">kg</option>');

         $('label[for=weight]').remove();
            $("#weight").find('input')
            .remove()
            .end();
        }

    });

    
     $("#product_unit").change(function(){
        if( $("#product_unit").val() != "N")
        {
            $('label[for=weight]').remove();
            $("#weight").find('input')
            .remove()
            .end()
            .append('<label for="weight">Weight/Volume*</label>'+
                               ' <input type="number" id="weight_data" class="form-control" name="weight" placeholder="Enter Weight/Volume" style="background-color: white;" required>'+
                                '<div class="error" id="weight_err" style="display: none;font-size: 14px;color:red;"></div>');
        }
         else {
            $('label[for=weight]').remove();
            $("#weight").find('input')
            .remove()
            .end();
        }

    });


    

});