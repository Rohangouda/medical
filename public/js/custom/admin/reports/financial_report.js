$(document).ready(function() {

    $("#start_date,#end_date,#mode").change(function(){
        let baseUrl = $('#base_url').val();
        // date validation
        // $('#end_date').val('');
        let start_date = $('#start_date').val();
        $('#end_date').attr('min',start_date);
        let end_date = $('#end_date').val();

        //other validation
        let page_no = 0;
        let perPage = $('#userPerPage').val();
        let search_text = $('#search_text').val();
        let mode = $("#mode option:selected").val(); 

        let next_page_url = '';
        let prev_page_url = '';

        get_orders_list(page_no, perPage, search_text, mode, start_date, end_date);
        function get_orders_list(page_no, perPage, search_text, mode, start_date, end_date){

            $.ajax({
                url: baseUrl+'/admin/report/get-all-orders-report',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'page': page_no,
                    'perPage': perPage,
                    'search_input': search_text,
                    'payment_mode': mode,
                    'start': start_date,
                    'end': end_date
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
                        _renderOrdersList(res.order_list.data);
                        $('.js_pagination_append').html(res.pagination)
                        if(res.order_list.data.length > 0){
                           $('#userPerPage').css('display','block');
                           if(res.order_list.next_page_url != null){
                            next_page_url = res.order_list.next_page_url.split('=')[1];
                           }
                           if(res.order_list.prev_page_url != null){
                            prev_page_url = res.order_list.prev_page_url.split('=')[1];
                           }
                        }else {
                            $('#userPerPage').css('display','none');
                        }
                    }else {
                        $('#userPerPage').css('display','none');
                        $('#orders_list').html('<tr><td colspan="5" style="text-align:center;">'+res.msg+'</td></tr>');
                    }
                },
                complete: function(){
                    $('#loader').modal('hide');
                    $('.page-link').attr('href', 'javascript:void(0);');
                }
            });
        }

        const _renderOrdersList = (data, extra) => {
            let orders = '';
            $.each(data, function(oKey, oVal){
                orders += '<tr>'+
                    '<td>'+parseInt(oKey+1)+'</td>'+
                    '<td># '+oVal.order_id+'</td>'+
                    '<td>'+oVal.get_user.first_name+' '+oVal.get_user.last_name+'</td>'+
                    '<td>'+oVal.order_mode+'</td>'+
                    '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary view_order_details" data-order_id='+oVal.order_id+'><i class="fa fa-eye" aria-hidden="true"></i></button> ' +
                '</tr>';
            });
            $('#orders_list').html(orders);
        }
        $('#users_search_btn').click(() => {
            let mode = $("#mode option:selected").val();
            let search_input = $('#search_text').val();
            $("#order_list").remove();
            get_orders_list(page_no, perPage, search_input);
        });

         $(document).on('click','.view_order_details', function() {
            let view_id = $(this).data('order_id');
            $.ajax({
                url: baseUrl+'/admin/report/view-orders-detail',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': view_id,
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#loader').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                },
                success: function(result){
                    if(result.status == 200){
                        $('#view_order_id').html(result.data[0].order_id);
                        // console.log(res);
                        $('#ordered_user_name').html(result.data[0].get_user.first_name+' '+result.data[0].get_user.last_name);
                        let details = '';
                        let total_price = 0;
                        $.each(result.data, function(pKey, pVal){
                            let order_per_price = Math.floor(pVal.order_price/pVal.order_quantity);
                            details += '<div class="col-md-6">'+
                                        '<div class="card">'+
                                          '<div class="row">'+
                                            '<div class="col-4">'+
                                              '<img style="height:100px" src="'+baseUrl+'/storage/product/'+ pVal.product_details[0].product_first_img.image +'" alt="Categories Image" class="img-thumbnail">'+
                                            '</div>'+
                                            '<div class="col-8">'+
                                              '<h5>'+ pVal.product_details[0].product_name +'</h5>'+
                                              '<div>₹ '+ order_per_price +' <span class="text-danger">'+
                                              '<del>₹ '+ pVal.order_mrp +'</del></span></div>'+
                                             ' <div>'+ pVal.product_details[0].weight +''+ pVal.product_details[0].product_unit+ 
                                             '<span class="text-success"> (discount: ₹ '+ pVal.order_discount +
                                             ')</span>'+
                                             '</div>'+
                                              '<div>Quantity:'+ pVal.order_quantity +'</div>'+
                                            '</div>'+
                                          '</div>'+
                                        '</div> '+
                                    '</div>';
                            total_price = (parseFloat(total_price)+parseFloat(pVal.order_price)).toFixed(2);       
                        });
                        let total_price_show = '<h5 class="text-white">Total Price: ₹ '+ total_price +'</h5>';
                        let action = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                        if(result.data[0].order_flag != 'Cancel' && result.data[0].order_flag != 'Ordered' && result.data[0].order_flag != 'Self_delete')
                            {
                            action += '<a href="'+ baseUrl +'/admin/invoice/print-invoice/' + result.data[0].order_id +'" target="_blank" type="button" class="btn btn-primary mx-2">Invoice</a>'; 
                            }
                        $('#total_price').html(total_price_show);
                        $('#pro_details').html(details);
                        $('#modal_action_btn').html(action);
                        $('#view_order_modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    }else {
                        alert(result.msg);
                    }
                },
                complete: function(){
                    $('#loader').modal('hide');
                }
            });
        });
    
         $(document).on('change','#userPerPage', function() {
            let perPage = $(this).val();
            get_orders_list(page_no, perPage, search_text, mode, start_date, end_date);
        }); 

        $(document).on('click','.page-link', function() {
            let checkOption = $(this).attr('rel');
            let page_no = 0;
            if(checkOption == 'next'){
                page_no = next_page_url;
            }else if(checkOption == 'prev'){
                page_no = prev_page_url;
            }else{
                page_no = $(this).html();
            }
            get_orders_list(page_no, perPage, search_text, mode, start_date, end_date);
        });

    });

});
   