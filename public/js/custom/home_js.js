$(document).ready(function () {
    let baseUrl = $('#base_url').val();
    let page_no = 0;
    let perPage = 8;


    getAllCategories(page_no, perPage);
    function getAllCategories(page_no, perPage) {
        $.ajax({
            url: baseUrl + '/theme-categories',
            type: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'page': page_no,
                'perPage': perPage
            },
            dataType: 'json',
            beforeSend: function () { $('#loader').modal({ backdrop: 'static', keyboard: false }); },
            success: function (res) {
                if (res.status == 200) {
                    let categories = '';
                    $.each(res.category_list.data, function (cKey, cVal) {
                        categories += '<div class="col-sm-6 col-lg-3 m-4  m-md-0">' +
                            '<div class="box rounded">' +
                            '<a href="javascript:void(0);" style="color: inherit;" class="category_click" data-category_name=' + cVal.cat_name.toLowerCase().split('/').join('-').split(' ').join('-').split("'").join("").split('&').join('-') + ' data-category_id=' + cVal.id + '>' +
                            '<div class="img-box">';
                        if (cVal.image != null) {
                            categories += '<img src="' + baseUrl + '/storage/category/' + cVal.image + '" alt="Categories Image"></img>';
                        } else {
                            categories += '<img src="' + baseUrl + '/medfin/favicon.png" alt="Categories Image"></img>';
                        }
                        categories += '</div>' +
                            '<div class="detail-box">' +
                            '<h5>' + cVal.cat_name + '</h5>' +
                            '<span>' +
                            'View Page ' +
                            '</span>' +
                            '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>' +
                            '</div>' +
                            '</a>' +
                            '</div>' +
                            '</div>';
                    });
                    $('._main_categories').html(categories);
                    perPage = res.category_list.per_page;
                    if (res.category_list.next_page_url != null) {
                        $('.view_more_btn').show();
                    } else {
                        $('.view_more_btn').hide();
                    }
                } else {
                    $('._main_categories').html('OOPs!! No Categoies to show here');
                }
            },
            complete: function () {
                $('#loader').modal('hide');
            }
        });
    }

    $('.view_more_btn').click(() => {
        let get_page = parseInt(perPage + 8);
        getAllCategories(page_no, get_page);
    });

    $(document).on('click', '.category_click', function () {
        let category_name = $(this).data('category_name');
        let category_id = $(this).data('category_id');
        window.open(baseUrl + '/medfin/' + category_name, '_self');
        // alert('category_name : '+category_name +' category_id : '+category_id);
    });
});

