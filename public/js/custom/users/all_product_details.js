$(document).ready(function () {
    let baseUrl = $('#base_url').val();
    let category_search = $('#category_search').val();
    let uri_request = $('#uri_request').val();
    let uri_category = $('#uri_category').val();
    let uri_id = uri_category.split('=')[1];
    let uri_name = uri_category.split('=')[0];
    let page_no = 0;

    let sort_type = '';

    let initial_price = 0.00;
    let initial_discount = 0.00;
    let initial_mrp = 0.00;
    let total_product_quantity = 0;

    //-----Add to cart section-----
    let add_to_cart_product_id = '';
    let product_name = '';
    let product_img = '';
    let product_price = 0.00;
    let product_mrp_price = 0.00;
    let product_quantity = 0;
    let product_unit = '';
    let product_weight = 0;

    let checkQuantity = $('#quantity').val();
    checkRemovalState(checkQuantity);

    //-----Toggle event-----
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    //----- Left side main category-----
    _getCartItems();
    categorySearch(category_search);
    _product_themes();
    let gsearch_click_count = 1;

    if (uri_request == 'search-in-peepal-store') {
        $('#global_search_text').val(uri_category);
        AllProductListByGlobalSearch($('#global_search_text').val(), gsearch_click_count);
    } else {
        //----- Product by category-----
        AllProductListByCategory(uri_category, page_no, sort_type);
    }

    function categorySearch(category_search) {
        $.ajax({
            url: baseUrl + '/product/get-all-category',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'search_text': category_search
            },
            dataType: 'json',
            beforeSend: function () {
                $('#loader').modal({ backdrop: 'static', keyboard: false });
            },
            success: function (res) {
                if (res.status == 200) {
                    let x = '';
                    $.each(res.category_list, function (cKey, cVal) {
                        let $activeCategory = '';
                        if (uri_request == 'shop-by-category') {
                            if (uri_id == cVal.id) {
                                $activeCategory = 'active-sidebar';
                            }
                        }
                        x += '<li><a href="javascript:void(0);" class="mst_category_clicked ' + $activeCategory + '" data-category_name=' + cVal.cat_name.trim().toLowerCase().replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-') + ' data-category_id=' + cVal.id + '>' + cVal.cat_name + '</a></li>';
                    });
                    $('._left_side_mst_category').html(x);
                } else {
                    $('._left_side_mst_category').html('<li><a href="#">Comming soon</a></li>');
                }
            },
            complete: function () {
                $('#loader').modal('hide');
            }
        });
    }

    $('#category_search_btn').click(() => {
        let search_text = $('#category_search').val();
        categorySearch(search_text);
    });

    $(document).on('click', '.mst_category_clicked', function () {
        let category_name = $(this).data('category_name');
        let category_id = $(this).data('category_id');
        window.open(baseUrl + '/shop-by-category/' + category_name + '=' + category_id, '_self');
    });

    //----- Product record by category -----
    function AllProductListByCategory(uri_category, page_no, sort_type) {
        $.ajax({
            url: baseUrl + '/get-product-by-category',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'uri_category': uri_category,
                'page': page_no,
                'sort_type': sort_type
            },
            dataType: 'json',
            beforeSend: function () { $('#loader').modal({ backdrop: 'static', keyboard: false }); },
            success: function (res) {
                if (res.status == 200) {
                    __renderAllProductRecords(res.product_list.data);
                } else {
                    $('#_product_list').html('<div class="text-center">' + res.msg + '</div>');
                }
            },
            complete: function () {
                $('#loader').modal('hide');
            }
        });

    }

    const __renderAllProductRecords = (data, extra) => {
        let product_list = '';
        $.each(data, function (pKey, pVal) {
            // alert(baseUrl+'/storage/product/'+pVal.get_product.productImages.id);
            let product_name = '';
            if (pVal.get_product.product_name.length > 12) {
                product_name = pVal.get_product.product_name.substr(0, 10) + '..';
            } else {
                product_name = pVal.get_product.product_name;
            }
            let discount = '';
            discount = pVal.get_product.product_extra_prop.mrp_price - pVal.get_product.product_extra_prop.price;
            let toolTipText = '';
            if (pVal.get_product.detail != null) {
                toolTipText = pVal.get_product.detail;
            }

            product_list += '<div class="card1 col-sm-3 col-md-3 m-2" style="border:1px solid lightgrey; border-radius:10px">';
            if (pVal.get_product.product_unit != "N") {
                product_list += '<div class="box "><span class="wdp-ribbon wdp-ribbon-two font-weight-bold">' + pVal.get_product.weight + ' ' + pVal.get_product.product_unit + '</span></div>';
            }
            product_list += '<div class="product py-4">' +
                '<div class="text-center img">' +
                '<img src="' + baseUrl + '/storage/product/' + pVal.get_product.product_images_by_master[0]['image'] + '" style="max-height: 150px;max-width: 150px;">' +
                '</div>' +
                '<div class="about text-center" width="150"> </div>' +
                '<div class="about text-center">' +
                '<h5 class="mt-1">' + product_name + '</h5>' +
                '<h6 class="text-primary">Peepal' + "'" + 's Price: ' + pVal.get_product.product_extra_prop.price + ' ₹ ' + '</h6>' +
                '<div class="d-flex flex-row mt-3 " style="margin-left: 4.5rem;">' +
                '<p style="font-family: ' + "Poppins" + ', sans-serif;font-size: .8em;font-weight: 300;line-height: .3em;" class="text-danger"><del><b> MRP:  ' + pVal.get_product.product_extra_prop.mrp_price + '₹ </b></del></p>' +
                '<p class="ml-2" style="font-family: ' + "Poppins" + ', sans-serif;font-size: .8em;font-weight: 300;line-height: .3em; " class="text-success"><ins><b> Discount:  ' + discount + ' ₹ </b></ins></p>' +
                '</div>' +
                '</div>' +
                '<div class="cart-button mt-3 text-center">' +
                '<button  data-product_id=' + pVal.id + ' class="btn btn-block btn-sm btn-outline-info round product_details_btn" style="width:30%; margin:0 auto"><i class="fa fa-cart-plus" aria-hidden="true"> Add</i></button>' +
                '</div>' +
                '</div>' +
                '</div>';
        });
        $('#_product_list').html(product_list);
    }

    $(document).on('click', '.product_details_btn', function () {
        let product_id = $(this).data('product_id');
        if (product_id != '') {
            $.ajax({
                url: baseUrl + '/get-product-details-by-event',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': product_id
                },
                dataType: 'json',
                beforeSend: function () {
                    $('.add_to_cart_btn').attr('data-product_id', '');
                    $('#quantity').val('');
                    add_to_cart_product_id = '';
                    $('#loader').modal({ backdrop: 'static', keyboard: false });
                },
                success: function (res) {
                    if (res.status == 200) {
                        $('#quantity').val(1);
                        total_product_quantity = res.data.product_extra_prop.quantity;
                        initial_mrp = parseFloat(res.data.product_extra_prop.mrp_price).toFixed(2);
                        $('#product_title').html(res.data.product_name);
                        $('#mrp_price').html('₹ ' + parseFloat(res.data.product_extra_prop.mrp_price).toFixed(2));
                        initial_price = parseFloat(res.data.product_extra_prop.price).toFixed(2);
                        $('#peepal_price').html('₹ ' + parseFloat(res.data.product_extra_prop.price).toFixed(2));
                        let $total_discount = parseFloat(res.data.product_extra_prop.mrp_price).toFixed(2) - parseFloat(res.data.product_extra_prop.price).toFixed(2);
                        initial_discount = $total_discount;
                        $("#total_discount_price").html('(You Save: ₹ ' + parseFloat($total_discount).toFixed(2) + ')');
                        $('._product_descripton').html(res.data.detail);
                        if (res.data.product_unit != 'N') {
                            $('._show_quantity').html(res.data.weight + '' + res.data.product_unit);
                        } else {
                            $('._show_quantity').remove();
                        }

                        //----- Checking out of stock-----
                        if (parseInt(res.data.product_extra_prop.quantity) == 0) {
                            $('._product_operation_div').hide();
                            $('._product_btn_operation_div').hide();
                            $('.out_of_stock_div').html('<div class="text-center"><button class="btn btn-sm" style="color:red;font-size:20px;">Out of stock</button></div>');
                        } else {
                            $('._product_operation_div').show();
                            $('._product_btn_operation_div').show();
                            $('.out_of_stock_div').html('');
                        }
                        //------------------------
                        add_to_cart_product_id = res.data.id;
                        product_name = res.data.product_name;
                        product_img = res.data.product_images_by_master[0]['image'];
                        product_price = parseFloat(res.data.product_extra_prop.price).toFixed(2);
                        product_mrp_price = parseFloat(res.data.product_extra_prop.mrp_price).toFixed(2);
                        product_quantity = res.data.product_extra_prop.quantity;
                        product_unit = res.data.product_unit;
                        product_weight = res.data.weight;

                        $('.add_to_cart_btn').attr('data-product_id', res.data.id);
                        $('.buy_now_btn').attr('data-product_id', res.data.id);

                        let show_img = '';
                        let show_options = '';
                        $.each(res.data.product_images_by_master, function (ikey, ival) {
                            let checkActive = '';
                            let loadingStyle = '';
                            if (ikey == 0) {
                                checkActive = 'active';
                                loadingStyle = 'lazy';
                            }
                            show_img += '<div class="carousel-item ' + checkActive + '"><img class="img-thumbnail w-100 d-block" src="' + baseUrl + '/storage/product/' + ival.image + '" alt="Slide Image" loading="' + loadingStyle + '"></div>';

                            show_options += '<li data-target="#carousel-1" data-slide-to="' + parseInt(ikey + 1) + '" class="' + checkActive + '"></li>';
                        });
                        $('.product_carousel_slider_imgs').html(show_img);
                        $('.carousel-indicators').html(show_options);

                        $('#product_detail_modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    } else {

                    }
                },
                complete: function () {
                    $('#loader').modal('hide');
                }
            });
        } else {
            alert('OOPS! something went wrong, please re-fresh your browser.');
            location.reload();
        }
    });

    let clicksCount = 1;
    let clickedPrice = 0.00;
    let clickedDiscount = 0.00
    $(document).on('click', '#add_no_of_product_btn', function () {
        if (clicksCount < total_product_quantity) {
            // if(clicksCount < 5){
            clicksCount += 1;
            $('#quantity').val(clicksCount);
            clickedPrice = parseFloat(initial_price * clicksCount).toFixed(2);
            clickedDiscount = parseFloat(initial_discount * clicksCount).toFixed(2);
            $('._show_total_amount').html('  Total price : ' + clickedPrice + ' (You Save: ₹ ' + clickedDiscount + ') ');
            checkRemovalState(clicksCount);
        }

    });

    $(document).on('click', '#remove_no_of_product_btn', function () {
        clicksCount -= 1;
        $('#quantity').val(clicksCount);
        clickedPrice = parseFloat(clickedPrice - initial_price).toFixed(2);
        clickedDiscount = parseFloat(clickedDiscount - initial_discount).toFixed(2);
        $('._show_total_amount').html('Total price : ' + clickedPrice + ' (You Save: ₹ ' + clickedDiscount + ') ');
        checkRemovalState(clicksCount);
    });

    function checkRemovalState(counts) {
        if (counts == 1) {
            $('#remove_no_of_product_btn').prop('disabled', true);
        } else if (counts > 1) {
            $('#remove_no_of_product_btn').prop('disabled', false);
        }
    }

    let add_items_to_cart = [];

    $(document).on('click', '.add_to_cart_btn', function () {
        let session_check_user = $('#session_check_user').val();
        let p_price = clickedPrice;
        let p_clickedDiscount = clickedDiscount;
        if (clickedPrice == 0) {
            p_price = initial_price;
        }
        if (p_clickedDiscount == 0) {
            p_clickedDiscount = initial_discount;
        }
        if (session_check_user != '') {
            //-----DB operation-----
            $.ajax({
                url: baseUrl + '/addtocart-before-login',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': add_to_cart_product_id,
                    'product_name': product_name,
                    'product_img': product_img,
                    'product_price': p_price,
                    'product_mrp_price': product_mrp_price,
                    'total_discount': p_clickedDiscount,
                    'product_quantity': $('#quantity').val(),
                    'product_unit': product_unit,
                    'product_weight': product_weight,
                    'initial_price': initial_price
                },
                dataType: 'json',
                async: false,
                success: function (res) {
                    if (res.status == 200) {
                        console.log(res.msg);
                    }
                },
                complete: function () {
                    _getCartItems();
                    $('#product_detail_modal').modal('hide');
                    clicksCount = 1;
                    clickedPrice = 0.00;
                    clickedDiscount = 0.00;
                    $('._show_total_amount').html('');
                }
            });
        } else {
            // alert('product id : '+add_to_cart_product_id);return false;
            $.ajax({
                url: baseUrl + '/addtocart-before-login',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'product_id': add_to_cart_product_id,
                    'product_name': product_name,
                    'product_img': product_img,
                    'product_price': p_price,
                    'product_mrp_price': product_mrp_price,
                    'total_discount': p_clickedDiscount,
                    'product_quantity': $('#quantity').val(),
                    'product_unit': product_unit,
                    'product_weight': product_weight,
                    'initial_price': initial_price
                },
                dataType: 'json',
                async: false,
                success: function (res) {
                    if (res.status == 200) {
                        console.log(res.msg);
                    }
                },
                complete: function () {
                    _getCartItems();
                    $('#product_detail_modal').modal('hide');
                    clicksCount = 1;
                    clickedPrice = 0.00;
                    clickedDiscount = 0.00;
                    $('._show_total_amount').html('');
                }
            });
        }
    });

    $(document).on('click', '.buy_now_btn', function () {
        let session_check_user = $('#session_check_user').val();
        if (session_check_user != '') {
            //-----DB operation-----
            if (confirm("Please confirm to buying this product")) {
                let $quantity = $('#quantity').val();
                let product_id = $(this).data('product_id');
                let order_price = clickedPrice;
                if (clickedPrice == 0) {
                    order_price = initial_price;
                }
                let total_save = clickedDiscount;
                if (clickedDiscount == 0) {
                    total_save = initial_discount;
                }
                if ($quantity != '') {
                    $.ajax({
                        url: baseUrl + '/buy-individual-products',
                        type: 'POST',
                        data: {
                            '_token': '{{csrf_token()}}',
                            'product_id': product_id,
                            'quantity': $quantity,
                            'order_price': order_price,
                            'order_mrp': parseFloat(initial_mrp * $quantity).toFixed(2),
                            'total_save': total_save
                        },
                        dataType: 'json',
                        beforeSend: function () {
                            $('#loader').modal({ backdrop: 'static', keyboard: false });
                        },
                        success: function (res) {
                            if (res.status == 200) {
                                alert(res.msg);
                                $('#product_detail_modal').modal('hide');
                            } else {
                                alert(res.msg);
                            }
                        },
                        complete: function () {
                            $('#loader').modal('hide');
                        }
                    });
                } else {
                    alert('OOPS! something went wrong, please re-fresh your browser.');
                    location.reload();
                }
            }

        } else {
            // alert('Please login first to purchase this product!');
            $('#product_detail_modal').modal('hide');
            $('#confirmModal').modal('show');
            $(document).on('click', '#confirm_login_btn', function () {
                $('#confirmModal').modal('hide');
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
            });
        }
    });

    $(document).on('click', '.sortByBtn', function () {
        let sort_type = $(this).data('sort_type');
        // console.log('sort type : '+sort_type);
        AllProductListByCategory(uri_category, page_no, sort_type);
    });


    function AllProductListByGlobalSearch($search_text, gsearch_click_count) {
        if ($search_text != '') {
            $.ajax({
                url: baseUrl + '/get-record-by-gsearch',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'search_text': $search_text,
                    'page': 1,
                    'perPage': gsearch_click_count
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loader').modal({ backdrop: 'static', keyboard: false });
                },
                success: function (res) {
                    if (res.status == 200) {
                        if (res.data.filter_status == 'category') {
                            __renderAllProductRecordsByCategory(res.data.category_wise_product.data);
                            if (res.data.category_wise_product.next_page_url != null) {
                                $('#global_search_view_more_btn').css('display', 'block');
                            } else {
                                $('#global_search_view_more_btn').css('display', 'none');
                            }
                        } else if (res.data.filter_status == 'brand') {
                            __renderAllProductRecordsByBrands(res.data.brand_wise_product.data);
                            if (res.data.brand_wise_product.next_page_url != null) {
                                $('#global_search_view_more_btn').css('display', 'block');
                            } else {
                                $('#global_search_view_more_btn').css('display', 'none');
                            }
                        } else {
                            __renderAllProductRecordsByBrands(res.data.product_records.data);
                            if (res.data.product_records.next_page_url != null) {
                                $('#global_search_view_more_btn').css('display', 'block');
                            } else {
                                $('#global_search_view_more_btn').css('display', 'none');
                            }
                        }

                    } else {

                    }
                },
                complete: function () {
                    $('#loader').modal('hide');
                }
            });
        } else {
            alert('OOPS! something went wrong, please re-fresh your browser.');
            location.reload();
        }
    }

    $(document).on('click', '#global_search_view_more_btn', function () {
        gsearch_click_count += 1;
        // console.log('clicked_btn : '+gsearch_click_count);
        AllProductListByGlobalSearch($('#global_search_text').val(), gsearch_click_count)
    });

    const __renderAllProductRecordsByCategory = (data, extra) => {
        let product_list = '';
        $.each(data, function (pKey, pVal) {
            let product_name = '';
            if (pVal.get_product.product_name.length > 12) {
                product_name = pVal.get_product.product_name.substr(0, 10) + '..';
            } else {
                product_name = pVal.get_product.product_name;
            }
            let discount = '';
            discount = pVal.get_product.product_extra_prop.mrp_price - pVal.get_product.product_extra_prop.price;
            let toolTipText = '';
            if (pVal.get_product.detail != null) {
                toolTipText = pVal.get_product.detail;
            }

            product_list += '<div class="card1 col-sm-3 col-md-3 m-2" style="border:0px solid rgb(255, 255, 255);">';
            if (pVal.get_product.product_unit != "N") {
                product_list += '<div class="box "><span class="wdp-ribbon wdp-ribbon-two font-weight-bold">' + pVal.get_product.weight + ' ' + pVal.get_product.product_unit + '</span></div>';
            }
            product_list += '<div class="product py-4">' +
                '<div class="text-center img">' +
                '<img src="' + baseUrl + '/storage/product/' + pVal.get_product.product_first_img['image'] + '" style="max-height: 150px;max-width: 150px;">' +
                '</div>' +
                '<div class="about text-center" width="150"> </div>' +
                '<div class="about text-center">' +
                '<h5 class="mt-1">' + product_name + '</h5>' +
                '<h6 class="text-primary">Peepal' + "'" + 's Price:<br>₹ ' + pVal.get_product.product_extra_prop.price + '</h6>' +
                '<p style="font-family: ' + "Poppins" + ', sans-serif;font-size: .8em;font-weight: 300;line-height: .3em;" class="text-danger"><del><b> MRP: ₹ ' + pVal.get_product.product_extra_prop.mrp_price + '</b></del></p>' +
                '<p style="font-family: ' + "Poppins" + ', sans-serif;font-size: .8em;font-weight: 300;line-height: .3em;" class="text-success"><ins><b> Discount: ₹ ' + discount + '</b></ins></p>' +
                '</div>' +
                '<div class="cart-button mt-3 px-2 text-center">' +
                '<button  data-product_id=' + pVal.id + ' class="btn btn-block btn-sm btn-outline-info round product_details_btn"><i class="fa fa-cart-plus" aria-hidden="true"> Add</i></button>' +
                '</div>' +
                '</div>' +
                '</div>';
        });
        $('#_product_list').html(product_list);
    }

    const __renderAllProductRecordsByBrands = (data, extra) => {
        let product_list = '';
        $.each(data, function (pKey, pVal) {
            let product_name = '';
            if (pVal.product_name.length > 12) {
                product_name = pVal.product_name.substr(0, 10) + '..';
            } else {
                product_name = pVal.product_name;
            }
            let discount = '';
            discount = pVal.product_extra_prop.mrp_price - pVal.product_extra_prop.price;
            let toolTipText = '';
            if (pVal.detail != null) {
                toolTipText = pVal.detail;
            }

            product_list += '<div class="card1 col-sm-3 col-md-3 m-2" style="border:0px solid rgb(255, 255, 255);">';
            if (pVal.product_unit != "N") {
                product_list += '<div class="box "><span class="wdp-ribbon wdp-ribbon-two font-weight-bold">' + pVal.weight + ' ' + pVal.product_unit + '</span></div>';
            }
            product_list += '<div class="product py-4">' +
                '<div class="text-center img">' +
                '<img src="' + baseUrl + '/storage/product/' + pVal.product_first_img['image'] + '" style="max-height: 150px;max-width: 150px;">' +
                '</div>' +
                '<div class="about text-center" width="150"> </div>' +
                '<div class="about text-center">' +
                '<h5 class="mt-1">' + product_name + '</h5>' +
                '<h6 class="text-primary">Peepal' + "'" + 's Price:<br>₹ ' + pVal.product_extra_prop.price + '</h6>' +
                '<p style="font-family: ' + "Poppins" + ', sans-serif;font-size: .8em;font-weight: 300;line-height: .3em;" class="text-danger"><del><b> MRP: ₹ ' + pVal.product_extra_prop.mrp_price + '</b></del></p>' +
                '<p style="font-family: ' + "Poppins" + ', sans-serif;font-size: .8em;font-weight: 300;line-height: .3em;" class="text-success"><ins><b> Discount: ₹ ' + discount + '</b></ins></p>' +
                '</div>' +
                '<div class="cart-button mt-3 px-2 text-center">' +
                '<button  data-product_id=' + pVal.id + ' class="btn btn-block btn-sm btn-outline-info round product_details_btn"><i class="fa fa-cart-plus" aria-hidden="true"> Add</i></button>' +
                '</div>' +
                '</div>' +
                '</div>';
        });
        $('#_product_list').html(product_list);
    }

    function _product_themes() {
        $.ajax({
            url: baseUrl + '/get-product-sliders',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
            },
            dataType: 'json',
            success: function (res) {
                if (res.status == 200) {
                    let x = '';
                    let xbot = '';
                    $.each(res.data, function (xKey, xVal) {
                        let activeCls = '';
                        let $title = '';
                        let $contents = '';
                        if (xKey == 0) {
                            activeCls = 'active';
                            $title = 'Peepal Store';
                            $contents = '<ul><li> To People</li><li> For People</li><li>By People</li></ul>';
                        } else if (xKey == 1) {
                            $title == '';
                            $contents = ' Well, today the internet is overflowed with online shopping sites but with the' +
                                'latest trends, premium quality and affordable prices, PEEPAL STORE has become' +
                                'everyone’s' +
                                'favourite place to buy best groccery brands in India. So just like' +
                                'everyone, if you are the one who wants to shop from the best online shopping for' +
                                'family then your search is over because PEEPAL STORE gives an amazing Groccery collection.';
                        }
                        x += '<div class="carousel-item ' + activeCls + '">' +
                            '<img class="d-block w-100" src="' + baseUrl + '/storage/product_themes/' + xVal.image_name + '" style="height: 200px;" alt="' + parseInt(xKey) + '">' +
                            '</div>';
                    });
                    $('.append_theme_via_js').html(x);
                }
            }
        });
    }
});