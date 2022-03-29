@extends('layouts.login_layout')
@section('content')
<script src="{{asset('js/custom/admin/mst_category.js?var=')}}{{date('YmdHis')}}"></script>
<style type="text/css">
img {
    max-width: 180px;
}

input[type=file] {
    padding: 10px;
    background: white;
}
</style>

<!-- BEGIN : Main Content-->
<div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <!-- Zero configuration table -->
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title">Services</h4>
                                </div>
                                <div class="col text-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Add Services
                                    </button>


                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    
                                                </div>
                                                <div class="col-sm-12 col-md-6 text-right">
                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search"
                                                                class="form-control form-control-sm" id="search_text" placeholder=""
                                                                aria-controls="DataTables_Table_0"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table
                                                        class="table table-striped table-bordered zero-configuration dataTable"
                                                        id="DataTables_Table_0" role="grid"
                                                        aria-describedby="DataTables_Table_0_info" style="width:100%">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>#</th>
                                                                <th>NAME</th>
                                                                <th>IMAGE</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="category_list"></tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="container">
                                                            <div class="user_pagination d-flex justify-content-center">
                                                                <ul class="nav">
                                                                    <li class="nav-item js_pagination_append"
                                                                        style="padding: 10px;"></li>
                                                                    <li class="nav-item">
                                                                        <div class="dataTables_length"
                                                                            id="DataTables_Table_0_length" style="margin-top: 10px;">
                                                                            <label> <select id="userPerPage"
                                                                                    name="DataTables_Table_0_length"
                                                                                    aria-controls="DataTables_Table_0"
                                                                                    class="custom-select custom-select-sm form-control form-control-sm" style="display: none;height: 34px;">
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
        </section>
        <!--/ Zero configuration table -->

    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            </div>
            <div class="modal-body" >
                <form action="{{ route('master.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Service*</label>
                        <select type="text" id="cat_name" class="form-control" 
                             style="background-color: white;" >
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Page name*</label>
                        <input type="text" id="cat_name" class="form-control" name="cat_name"
                            placeholder="Enter page Name" style="background-color: white;" required>
                    </div>
                    <div class="form-group">
                        <label>Enter Tags*</label>
                        <input type="text" id="cat_name" class="form-control" name="cat_name"
                            placeholder="Enter Tags" style="background-color: white;" >
                    </div>
                    <div class="form-group text-center">
                        <img class="my-2" id="blah" src="{{ asset('images/product.png') }}" alt="your image" />
                        <input type='file' name="image" onchange="readURL(this);" class="form-control" required />
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-info" value="Submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end add modal  --}}
{{-- Edit Modal --}}
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">Update</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="updateUrl" onsubmit="return checkEditForm(this);">
                    @csrf <div class="form-group">
                        <label>Service name</label>
                        <input type="text" class="form-control" id="edit-title" name="cat_name"
                            style="background-color: white;">
                    </div>
                    
            <div class="text-center">
                <input type="submit" class="btn btn-info btn-lg" value="Update" name="Update">
            </div>
            </form>

        </div>
    </div>
</div>
</div>
{{--end edit modal--}}

<input type="hidden" id="edit_id">
<!-- END : End Main Content-->
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
// $(document).ready(function() {

//     $('.edit').on('click', function() {
        // let id = $(this).attr("data-id");
        // let title = $('#title-' + id).text();
        // // let description = $('#description-' + id).text();
        // let url = "{{url('/update-category')}}/" + id;
        // $('#edit-title').val(title);
        // // $('#edit-description').val(description);
        // $('#updateUrl').attr('action', url);
//     });

//     $('.delete').on('click', function() {
//         if (confirm('Are you sure you want to Delete Category ?')) {
//             var id = $(this).attr('data-id');
//             $.ajax({
//                 url: "{{url('/category_delete_modal')}}",
//                 method: "POST",
//                 data: {
//                     "_token": "{{ csrf_token() }}",
//                     "id": id
//                 },
               
//             }).done(function(msg) {
//                 if (msg.type == 'success') {
//                     alert(msg.message);
//                     location.reload();
//                 } else {
//                     alert(msg.message);
//                     //$('.error-favourite-message').html(msg.message);
//                 }
//             });
//         } else {
//             return false;
//         }
//     });
//     @if(Session::has('message'))
//     setTimeout(function() {
//         $('.alert').fadeOut('fast')
//     }, 5000); // <-- time in milliseconds
//     @endif

//     @if($errors -> any())
//     setTimeout(function() {
//         $('.alert').fadeOut('fast')
//     }, 1300); // <-- time in milliseconds
//     @endif
// });
</script>
@stop