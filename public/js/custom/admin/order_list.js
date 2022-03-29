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
            url: baseUrl + '/admin/order-management/get-all-orders',
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
                '<td># ' + oVal.order_id + '</td>' +
                '<td>' + oVal.get_user.first_name + ' ' + oVal.get_user.last_name + '</td>' +
                // '<td>'+oVal.product_details.product_name.substr(0,12)+'</td>'+
                '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary view_order_details" data-order_id=' + oVal.order_id + '><i class="fa fa-eye" aria-hidden="true"></i></button> ' +
                ' <button type="button" class="btn btn-sm btn-danger delete_order_record" data-order_id=' + oVal.order_id + '><i class="fa fa-trash" aria-hidden="true"></i></button></td>' +
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
            url: baseUrl + '/admin/order-management/view-orders',
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
                            '<div class="card">' +
                            '<div class="row">' +
                            '<div class="col-4">' +
                            '<img style="height:100px" src="' + baseUrl + '/storage/product/' + pVal.product_details[0].product_first_img.image + '" alt="Categories Image" class="img-thumbnail">' +
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
                            '</div> ' +
                            '</div>';
                        total_price = (parseFloat(total_price) + parseFloat(pVal.order_price)).toFixed(2);
                    });
                    let total_price_show = '<h5 class="text-white">Total Price: ₹ ' + total_price + '</h5>';
                    let action = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                        '<button type="button" class="btn btn-danger delete_order_record" data-order_id=' + res.data[0].order_id + '><i class="fa fa-trash" aria-hidden="true"></i> Delete</button></td>' +
                        '<button type="button" class="btn btn-primary delevered"  data-order_id=' + res.data[0].order_id + '>Delivered</button>';
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

    $(document).on('click', '.delete_order_record', function () {
        if (confirm("Are you sure, you wants to delete this order")) {
            let clickedOrderId = $(this).data('order_id');
            $('#delete_order_id').val(clickedOrderId);
            $('#delete_confirmation_modal').modal({
                backdrop: 'static',
                keyboard: false
            });
        }

    });

    $(document).on('click', '.delevered', function () {
        if (confirm("Are you sure, you are delevered this order!")) {
            let payment_type = $('input[name="order_mode"]:checked').val();
            if (payment_type == undefined) {
                $('#payment_type_err').html('select payment mode first').css('display', 'block');
            } else {
                let clickedOrderId = $(this).data('order_id');
                $.ajax({
                    url: baseUrl + '/admin/order-management/delevered',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': clickedOrderId,
                        'payment_mode': payment_type
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
                            alert(res.msg);
                            window.open(baseUrl + '/admin/invoice/print-invoice/' + clickedOrderId, '_blank');
                            // get_orders_list(page_no, perPage, search_text);
                            // $('#delete_comments').val('');
                            // $('#delete_confirmation_modal').modal('hide');
                        } else {
                            alert(res.msg);
                        }
                    },
                    complete: function () {
                        $('#loader').modal('hide');
                    }
                });
            }



        }

    });

    $('#order_delete_btn').click(() => {
        let id = $('#delete_order_id').val();
        let delete_comments = $('#delete_comments').val();
        if (delete_comments != '') {
            $('#delete_comments_err').html('').css('display', 'none');
            $.ajax({
                url: baseUrl + '/admin/order-management/delete-orders',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': id,
                    'delete_comments': delete_comments
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
                        alert(res.msg);
                        get_orders_list(page_no, perPage, search_text);
                        $('#delete_comments').val('');
                        $('#delete_confirmation_modal').modal('hide');
                    } else {
                        alert(res.msg);
                    }
                },
                complete: function () {
                    $('#loader').modal('hide');
                }
            });
        } else {
            $('#delete_comments_err').html('Write comments for deleting this order').css('display', 'block');
            $('#delete_comments').focus();
        }
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

});