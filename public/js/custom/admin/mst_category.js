$(document).ready(function() {
    let baseUrl = $('#base_url').val();
    let search_text = $('#search_text').val();
    let perPage = $('#userPerPage').val();
    let page = 0;

    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var current_date = day+'-'+(month<10 ? '0' : '') + month + '-' +(day<10 ? '0' : '')+d.getFullYear();
    
    let next_page_url = '';
    let prev_page_url = '';

    getAllCategory(search_text, page, perPage);
    function getAllCategory(search_text, page, perPage){
        $.ajax({
            url: baseUrl+'/admin/master-record/get-all-category',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'edit_id': $('#edit_id').val(),
                'page': page,
                'perPage': perPage,
                'search_text': search_text
            },
            dataType: 'json',
            beforeSend: function() {
                $('#loader').modal({backdrop:'static',keyboard:false});
            },
            success: function(res){
                if(res.status == 200){
                    let x = '';
                    $.each(res.category_list.data, function(lKey, lVal){
                        x += '<tr>'+
                            '<td>'+parseInt(lKey+1)+'</td>'+
                            '<td>'+lVal.ser_name+'</td>';
                            if(lVal.image != null){
                                x += '<td><img src="'+baseUrl+'/storage/category/'+lVal.image+'" class="img-thumbnail" style="max-height:60px;"></td>';
                            }else {
                                x += '<td><img src="'+baseUrl+'/medfin/favicon.png" class="img-thumbnail" style="max-height:60px;"></td>';
                            }
                            x+= '<td class="text-truncate"><button type="button" class="btn btn-sm btn-primary edit_category_detail" data-category_id='+lVal.id+'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> ' +
                            ' <button type="button" class="btn btn-sm btn-danger delete_category" data-category_id='+lVal.id+'><i class="fa fa-trash" aria-hidden="true"></i></button></td>'+
                        '</tr>';
                    });
                    $('#category_list').html(x);
                    $('.js_pagination_append').html(res.pagination);
                    if(res.pagination != null){
                        if(res.category_list.next_page_url != null){
                            next_page_url = res.category_list.next_page_url.split('=')[1];
                        }
                        if(res.category_list.current_page > 1){
                            prev_page_url = res.category_list.prev_page_url.split('=')[1];
                        }
                        $('#userPerPage').css('display','block');
                    }else {
                        $('#userPerPage').css('display','none');
                    }
                }else {
                    $('#category_list').html('<tr><td colspan="4" style="text-align:center;">'+res.msg+'</td></tr>');
                }
            },
            complete: function() {
                $('#loader').modal('hide');
                $('.page-link').attr('href','javascript:void(0);');
            }
        });
    }



    $(document).on('click','.edit_category_detail', function() {
        let edit_id = $(this).data('category_id');
        if(edit_id != ''){
            $.ajax({
                url: baseUrl+'/admin/master-record/edit-category',
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': edit_id,
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#loader').modal({backdrop:'static',keyboard:false});
                },
                success: function(res){
                    if(res.status == 200){
                        $('#edit-title').val(res.data.ser_name);
                        let url = "{{url('/update-category')}}/" + res.data.id;
                        $('#updateUrl').attr('action', url);

                        $('#edit_modal').modal({backdrop:'static', keyboard:false});
                    }else {
                        alert(res.msg);
                    }
                },
                complete: function(){
                    $('#loader').modal('hide');
                }
            });
        }else {
            alert('OOPS! something went wrong, please re-fresh your browser.');
            location.reload();
        }
    });

    $(document).on('click','.delete_category', function() {
        if(confirm("Are you sure, you want to delete this category ?")){
            let delete_id = $(this).data('category_id');
            if(delete_id != ''){
                $.ajax({
                    url: baseUrl+'/admin/master-record/delete-category',
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': delete_id,
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#loader').modal({backdrop:'static',keyboard:false});
                    },
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
                });
            }else {
                alert('OOPS! something went wrong, please re-fresh your browser.');
                location.reload();
            }
        }
        
    });

    $(document).on('keyup','#search_text', function() {
        let search_text = $(this).val();
        setTimeout(() => {
            getAllCategory(search_text, page, perPage);
        }, 600);
    });

    $(document).on('change','#userPerPage', function() {
        let perPage = $(this).val();
        getAllCategory(search_text, page, perPage);
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
        getAllCategory(search_text, $page, perPage);
    });

});


