$(document).ready(function () {
    let baseUrl = $('#base_url').val();
    let page_no = 0;
    let perPage = $('#userPerPage').val();
    let search_text = $('#search_text').val();

    //---------------------------------------
    let next_page_url = '';
    let prev_page_url = '';

    get_orders_list(page_no, perPage, search_text);

    function get_orders_list(page_no, perPage, search_text) {
        $.ajax({
            url: baseUrl + '/user/my-orders',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'page': page_no,
                'perPage': perPage,
                'search_input': search_text
            },
            dataType: 'json',
            beforeSend: function () {
                $('#loader').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            success: function (res) {
                if (res.status == 200) {
                    _renderOrdersList(res.order_list.data);
                    $('.js_pagination_append').html(res.pagination)
                    if (res.order_list.data.length > 0) {
                        $('#userPerPage').css('display', 'block');
                        if (res.order_list.next_page_url != null) {
                            next_page_url = res.order_list.next_page_url.split('=')[1];
                        }
                        if (res.order_list.prev_page_url != null) {
                            prev_page_url = res.order_list.prev_page_url.split('=')[1];
                        }
                    } else {
                        $('#userPerPage').css('display', 'none');
                    }
                } else {
                    $('#userPerPage').css('display', 'none');
                    $('#orders_list').html('<tr><td colspan="5" style="text-align:center;">' + res.msg + '</td></tr>');
                }
            },
            complete: function () {
                $('#loader').modal('hide');
                $('.page-link').attr('href', 'javascript:void(0);');
            }
        });
    }

    const _renderOrdersList = (data, extra) => {
        let orders = '';
        $.each(data, function (oKey, oVal) {
            orders += '<tr>' +
                '<td>' + parseInt(oKey + 1) + '</td>' +
                '<td># ' + oVal.order_id + '</td>';
            if (oVal.order_flag == "Self_delete") {
                const flag = oVal.order_flag.replace('_', ' ');
                orders += '<td>' + flag + '</td>';
            }
            else {
                orders += '<td>' + oVal.order_flag + '</td>';
            }
            orders += '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary view_order_details" data-order_id=' + oVal.order_id + '><i class="fa fa-eye" aria-hidden="true"></i></button> ' +
                '</tr>';
        });
        $('#orders_list').html(orders);
    }

    $('#users_search_btn').click(() => {
        let search_input = $('#search_text').val();
        get_orders_list(page_no, perPage, search_input);
    });

    $(document).on('keyup', '#search_text', function (e) {
        if (e.keyCode == 13) {
            let search_text = $(this).val();
            get_orders_list(page_no, perPage, search_text);

        }
    });

    $(document).on('click', '.view_order_details', function () {
        let view_id = $(this).data('order_id');
        $.ajax({
            url: baseUrl + '/user/view-order',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'id': view_id,
            },
            dataType: 'json',
            beforeSend: function () {
                $('#loader').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            success: function (res) {
                if (res.status == 200) {
                    $('#view_order_id').html(res.data[0].order_id);
                    // console.log(res);
                    $('#ordered_user_name').html(res.data[0].get_user.first_name + ' ' + res.data[0].get_user.last_name);
                    let details = '';
                    let total_price = 0;
                    $.each(res.data, function (pKey, pVal) {
                        let order_per_price = Math.floor(pVal.order_price / pVal.order_quantity);
                        details += '<div class="col-md-6">' +
                            '<div class="card m-1">' +
                            '<div class="row">' +
                            '<div class="col-4">' +
                            '<img style="height:100px" src="' + baseUrl + '/storage/product/' + pVal.product_details[0].product_first_img.image + '" alt="Categories Image" class="img-thumbnail">' +
                            // '<div class="m-2"><button class="btn btn-sm btn-primary" id="">Re-order</button></div>'+
                            '</div>' +
                            '<div class="col-8">' +
                            '<h5>' + pVal.product_details[0].product_name + '</h5>' +
                            '<div>₹ ' + order_per_price + ' <span class="text-danger">' +
                            '<del>₹ ' + pVal.order_mrp + '</del></span></div>' +
                            ' <div>' + pVal.product_details[0].weight + '' + pVal.product_details[0].product_unit +
                            '<span class="text-success"> (discount: ₹ ' + pVal.order_discount +
                            ')</span>' +
                            '</div>' +
                            '<div>Quantity:' + pVal.order_quantity + '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="m-2"><button class="btn btn-block btn-primary reorderBtn" data-product_id="' + pVal.product_id + '" data-product_quantity="' + pVal.order_quantity + '" id="_reorder_btn_' + pVal.product_id + '">Re-order</button></div>' +
                            '<div class="m-2"><p class="text-danger text-center" style="display:none;" id="outOfStock_' + pVal.product_id + '">Out Of Stock!</p></div>' +
                            '<div class="text-center m-2 _product_operation_div" style="display:none;" id="product_operation_div' + pVal.product_id + '">' +
                            '<span><button class="btn btn-sm btn-outline-info round-left" id="remove_no_of_product_btn">-</button></span>' +
                            '<span><input type="text" name="quantity" id="quantity" readonly class="round-null text-center" value="1"></span>' +
                            '<span><button class="btn btn-sm btn-outline-info round-right" id="add_no_of_product_btn">+</button></span>' +
                            '</div>' +
                            '</div> ' +
                            '</div>';
                        total_price = (parseFloat(total_price) + parseFloat(pVal.order_price)).toFixed(2);
                    });
                    let total_price_show = '<h5 class="text-white">Total Price: ₹ ' + total_price + '</h5>';
                    let action = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                    if (res.data[0].order_flag != 'Cancel' && res.data[0].order_flag != 'Ordered' && res.data[0].order_flag != 'Self_delete') {
                        action += '<a href="' + baseUrl + '/user/invoice/print-invoice/' + res.data[0].order_id + '" target="_blank" type="button" class="btn btn-primary mx-2">Invoice</a>';
                    }
                    $('#total_price').html(total_price_show);
                    $('#pro_details').html(details);
                    $('#modal_action_btn').html(action);
                    $('#view_order_modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                } else {
                    alert(res.msg);
                }
            },
            complete: function () {
                $('#loader').modal('hide');
            }
        });
    });


    $(document).on('change', '#userPerPage', function () {
        let perPage = $(this).val();
        get_orders_list(page_no, perPage, search_text);
    });

    $(document).on('click', '.page-link', function () {
        let checkOption = $(this).attr('rel');
        let page_no = 0;
        if (checkOption == 'next') {
            page_no = next_page_url;
        } else if (checkOption == 'prev') {
            page_no = prev_page_url;
        } else {
            page_no = $(this).html();
        }
        get_orders_list(page_no, perPage, search_text);
    });

    $(document).on('click', '.reorderBtn', function () {
        let $product_id = $(this).data('product_id');
        let $product_quantity = $(this).data('product_quantity');
        if ($product_id != '') {
            $.ajax({
                url: baseUrl + '/user/check-product-for-reorder',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'product_id': $product_id
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loader').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                },
                success: function (res) {
                    if (res.status == 200) {
                        addToCart_reorder_product($product_id, $product_quantity);
                        $('#outOfStock_' + $product_id).hide();
                    } else {
                        $('#_reorder_btn_' + $product_id).hide();
                        $('#outOfStock_' + $product_id).show();
                    }
                },
                complete: function () {
                    $('#loader').modal('hide');
                }
            });
        }
    });

    function addToCart_reorder_product(product_id, product_quantity) {
        $.ajax({
            url: baseUrl + '/addtocart-before-login',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'product_id': product_id,
                'product_quantity': product_quantity
            },
            dataType: 'json',
            beforeSend: function () {
                $('#loader').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            },
            success: function (res) {
                if (res.status == 200) {
                    $('#view_order_modal').modal('hide');

                    // $('.text-center').html(res.msg);
                    // $('.close').attr('data-modal_name','success_modal');
                    // $('#successModal').modal({
                    //     backdrop: 'static',
                    //     keyboard: false
                    // });
                } else {
                    $('.text-center').html(res.msg);
                    $('#errorModal').modal('show');
                }
            },
            complete: function () {
                _getCartItems();
                $('#loader').modal('hide');
            }
        });
    }

    $(document).on('click', '.close', function () {
        let $modal = $(this).data('modal_name');
        if ($modal == 'success_modal') {
            location.reload();
        }
    });

});