$(document).ready(function() {
    let baseUrl = $('#base_url').val();
    let page = 0;
    let perPage = $('#userPerPage').val();
    let search_text = $('#search_text').val();

    let next_page_url = '';
    let prev_page_url = '';
    getAllBrand(page, perPage, search_text);

    function getAllBrand(page, perPage, search_text){
        $.ajax({
            url: baseUrl+'/admin/master-record/get-all-brands-record',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'page': page,
                'perPage': perPage,
                'search_text': search_text
            },
            dataType: 'json',
            beforeSend: function() {
                $('#loader').modal({backdrop:'static', keyboard:false});
            },
            success: function(res){
                if(res.status == 200){
                    let x = '';
                    $.each(res.brand_list.data, function(bKey, bVal){
                        x += '<tr>'+
                            '<td>'+parseInt(bKey+1)+'</td>'+
                            '<td>'+bVal.brand_name+'</td>'+
                            '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary edit_brand_record" data-brand_id='+bVal.id+'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> ' +
                            ' <button type="button" class="btn btn-sm btn-danger delete_brand_record" data-brand_id='+bVal.id+'><i class="fa fa-trash" aria-hidden="true"></i></button></td>'+
                        '</tr>';
                    });
                    $('#mst_brand_list').html(x);
                    $('.js_pagination_append').html(res.pagination);
                    if(res.pagination != null){
                        if(res.brand_list.next_page_url != null){
                            next_page_url = res.brand_list.next_page_url.split('=')[1];
                        }
                        if(res.brand_list.current_page > 1){
                            prev_page_url = res.brand_list.prev_page_url.split('=')[1];
                        }
                        $('#userPerPage').css('display','block');
                    }else {
                        $('#userPerPage').css('display','none');
                    }
                }else {
                    $('#mst_brand_list').html('<tr><td colspan="3" style="text-align:center;">'+res.msg+'</td></tr>');
                }
            },
            complete: function(){
                $('#loader').modal('hide');
                $('.page-link').attr('href','javascript:void(0);');
            }
        });
    }

    $(document).on('click','.edit_brand_record', function() {
        let actionId = $(this).data('brand_id');
        if(actionId != ''){
            $.ajax({
                url: baseUrl+'/admin/master-record/edit-brand-detail',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'action_id': actionId
                },
                dataType: 'json',
                beforeSend: function(){$('#loader').modal({backdrop:'static',keyboard:false});},
                success: function(res){
                    if(res.status == 200){
                        $('.edit_brand_name').val(res.data.brand_name);
                        let updateUri = '/admin/master-record/update/'+res.data.id;
                        $('#updateUrl').attr('action', baseUrl+updateUri);
                        $('#brand_edit_modal').modal({backdrop:'static', keyboard:false});
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
    
    $(document).on('click','.delete_brand_record', function() {
        if(confirm("Are you sure, you want to delete this brand")){
            let actionId = $(this).data('brand_id');
            if(actionId != ''){
                $.ajax({
                    url: baseUrl+'/admin/master-record/brand_delete_modal',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'action_id': actionId
                    },
                    dataType: 'json',
                    beforeSend: function(){$('#loader').modal({backdrop:'static',keyboard:false});},
                    success: function(res){
                        if(res.status == 200){
                            alert(res.msg);
                            location.reload();
                        }else {
                            alert(res.msg);
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
        }
    });


    $('#search_text').keyup( () => {
        let search_text = $('#search_text').val();
        setTimeout(() => {
            getAllBrand(page, perPage, search_text);
        },1100);
    });

    $(document).on('change','#userPerPage', function() {
        let perPage = $(this).val();
        getAllBrand(page, perPage, search_text);
    });

    $(document).on('click','.page-link', function() {
        let checkOperation = $(this).attr('rel');
        let $page = '';
        if(checkOperation == 'next'){
            $page = next_page_url;
        }else if(checkOperation == 'prev'){
            $page = prev_page_url;
        }else {
            $page = $(this).html();
        }
        getAllBrand($page, perPage, search_text);
    });


});