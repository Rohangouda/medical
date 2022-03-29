$(document).ready(function() {
    let baseUrl = $('#base_url').val();
    let page_no = 0;
    let perPage = $('#userPerPage').val();
    let search_text = $("#search_text").val();

    let next_page_url = '';
    let prev_page_url = '';
    
    get_search_log_report(page_no, perPage, search_text);

    function get_search_log_report(page_no, perPage, search_text){
        $.ajax({
            url: baseUrl+'/admin/reports/search-report',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'page': page_no,
                'perPage': perPage,
                'search_text': search_text
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
                    let x = '';
                    $.each(res.search_list.data, function(sKey, sVal){
                        x += '<tr>'+
                            '<td>'+parseInt(sKey+1)+'</td>'+
                            '<td>'+sVal.get_user.first_name+' '+sVal.get_user.last_name+'</td>'+
                            '<td><button type="button" class="btn btn-sm btn-info view_log_details_btn" data-user_id='+sVal.user_id+' data-first_name='+sVal.get_user.first_name+' data-last_name='+sVal.get_user.last_name+'>view detail</button></td>'+
                        '</tr>';

                    });
                    $('#search_history_tbody').html(x);

                    if(res.search_list.data.length > 0){
                        $('.js_pagination_append').html(res.pagination);

                        if(res.search_list.prev_page_url != null){
                            prev_page_url = res.search_list.prev_page_url.split('=')[1];
                        }
                        if(res.search_list.next_page_url != null){
                            next_page_url = res.search_list.next_page_url.split('=')[1];
                        }
                    }
                }else{
                    $('#search_history_tbody').html('<tr><td colspan="3" style="text-align:center;">'+res.msg+'</td></tr>');
                }
            },
            complete: function(){
                $('.page-link').attr('href','javascript:void(0);');
                $('#loader').modal('hide');
            }
        });
    }

    $(document).on('click','.page-link', function(){
        let page = 0;
        let operationFilter = $(this).attr('rel');
        if(operationFilter == 'next'){
            page = next_page_url;
        }else if(operationFilter == 'prev'){
            page = prev_page_url;
        }else{
            page = $(this).html();
        }

        get_search_log_report(page, perPage, search_text);
    });

    $(document).on('click','.view_log_details_btn', function() {
        let user_id = $(this).data('user_id');
        let first_name = $(this).data('first_name')
        let last_name = $(this).data('last_name');
        if(user_id == ''){

        }else{
            window.open('/admin/report/search-log-report/'+Math.floor(1000 + Math.random() * 9000)+'-'+user_id, '_self'); return false;
            $.ajax({
                url: baseUrl+'/admin/reports/detail-search-report-by-user',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'user_id': user_id
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
                        $('#detail_log_modal_label').html('Search Report For - '+first_name+' '+last_name);
                        $('#detail_log_modal').modal('show');
                    }
                },
                complete: function(){
                    $('#loader').modal('hide');
                }
            });
        }
    });

    $('#_search_btn').click(() => {
        let search_text = $("#search_text").val();
        get_search_log_report(page_no, perPage, search_text);
    });

    $('#userPerPage').change( () => {
        let perPage = $('#userPerPage').val();
        let search_text = $("#search_text").val();
        get_search_log_report(page_no = 0, perPage, search_text);
    });

});