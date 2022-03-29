@extends('layouts.home_layout')
@section('content')
<script src="{{asset('js/custom/users/all_product_details.js?var=')}}{{date('YmdHis')}}"></script>
<style type="text/css">
    /*
    DEMO STYLE
*/

    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

    a,
    a:hover,
    a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    .navbar {
        padding: 15px 0px;
        /* background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);*/
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }

    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #a19ec0;
        color: darkgreen;
        transition: all 0.3s;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: #a19ec0;
    }

    #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        color: black !important;
    }

    #sidebar ul li a:hover {
        color: #7386D5;
        background: #fff;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
        color: #fff;
        background: #6d7fcc;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        background: #6d7fcc;
    }

    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    a.download {
        background: #fff;
        color: #7386D5;
    }

    a.article,
    a.article:hover {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    /* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

    #content {
        width: 100%;
        padding: 20px;
        min-height: 100vh;
        transition: all 0.3s;
    }

    /* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
        }

        #sidebar.active {
            margin-left: 0;
        }

        #sidebarCollapse span {
            display: none;
        }
    }

    .card1:hover {
        box-shadow: 1px 8px 10px grey;
        -webkit-transition: box-shadow .4s ease-in;
        border-radius: 12px;
        zoom: 1.05;
    }

    .img {
        transition: transform .2s;
        height: 150px;
        max-width: 100%;
    }

    .round {
        border-radius: 68px;
    }

    .round_button {
        border-radius: 10px;
    }

    .active-sidebar {
        background-color: white;
        color: darkgreen;
        border: none;
        border-left: 5px solid #2f2d46;
    }
    }

    /* 
    .ribbon {
        position: absolute;
        right: 1px;
        top: 1px;
        z-index: 1;
        overflow: hidden;
        width: 93px;
        height: 93px;
        text-align: right;
    }

    .ribbon span {
        font-size: 0.8rem;
        color: #fff;
        text-align: center;
        font-weight: bold;
        line-height: 32px;
        transform: rotate(45deg);
        width: 125px;
        display: block;
        background: #79a70a;
        background: linear-gradient(#9bc90d 0%, #79a70a 100%);
        box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
        position: absolute;
        top: 17px;
        right: -29px;
    }

    .ribbon span::before {
        content: '';
        position: absolute;
        left: 0px;
        top: 100%;
        z-index: -1;
        border-left: 3px solid #79A70A;
        border-right: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #79A70A;
    }

    .ribbon span::after {
        content: '';
        position: absolute;
        right: 0%;
        top: 100%;
        z-index: -1;
        border-right: 3px solid #79A70A;
        border-left: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-top: 3px solid #79A70A;
    }

    .red span {
        background: linear-gradient(#62f705 0%, #088f25 100%);
    }

    .red span::before {
        border-left-color: #8f0808;
        border-top-color: #8f0808;
    }

    .red span::after {
        border-right-color: #8f0808;
        border-top-color: #8f0808;
    } */

    .box {
        position: relative;
        max-width: 600px;
        width: 240px;
        height: 240px;
        background: #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, .1);
        margin-right: 20px;
    }

    .wdp-ribbon {
        display: inline-block;
        padding: 2px 15px;
        position: absolute;
        right: 0px;
        top: 0px;
        line-height: 24px;
        height: 28px;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25em;
        border-radius: 0;
        text-shadow: none;
        font-weight: normal;
        background-color: #a19ec0 !important;
        border-top-right-radius: 10px;
    }

    .wdp-ribbon-two:before,
    .wdp-ribbon-two:before {
        display: inline-block;
        content: "";
        position: absolute;
        left: -14px;
        top: 0;
        border: 9px solid transparent;
        border-width: 14px 8px;
        border-right-color: #a19ec0;
    }

    .wdp-ribbon-two:before {
        border-color: #a19ec0;
        border-left-color: transparent !important;
        left: -9px;
    }

    #product_detail_modal {
        height: 100vh;
        -ms-overflow-style: none;
        scrollbar-width: none;
        z-index: 9999999;
        overflow-y: scroll;
    }

    #product_detail_modal::-webkit-scrollbar {
        display: none;
    }
</style>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header text-center">
            <h3 class="text-dark">CATEGORY</h3>
        </div>
        <div class="input-group mr-3">
            <input type="search" class="form-control" id="category_search" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <div class="input-group-append">
                <button type="button" id="category_search_btn" class=" input-group-text btn "><i
                        class="fas fa-search"></i></button>
            </div>
        </div>

        <ul class="list-unstyled components mx-1 _left_side_mst_category">

        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
        <!-- slider section -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner append_theme_via_js">

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- end slider section -->

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn text-dark  text-nowrap"
                    style="background-color:  #e6e6e6;">
                    <i class="fas fa-align-left"></i>
                    <span>Categories</span>
                </button>
                <div class="dropdown dropleft">
                    <button class="btn text-dark dropdown-toggle" style="background-color:  #e6e6e6;" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort By
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        {{-- <button class="dropdown-item" type="button">Relevence</button> --}}
                        <button class="dropdown-item sortByBtn" data-sort_type="low_to_high" type="button">Price(Low to
                            High)</button>
                        <button class="dropdown-item sortByBtn" data-sort_type="high_to_low" type="button">Price(High to
                            Low)</button>
                        {{-- <button class="dropdown-item" type="button">Discount(Hight to Low)</button> --}}
                    </div>
                </div>
            </div>
        </nav>
        <div class="row g-2" id="_product_list"></div>

        <button type="button" class="btn btn-primary" id="global_search_view_more_btn" style="display: none;">View
            More</button>
    </div>
</div>

{{-- detail modal --}}
<div class="modal fade " id="product_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg mt-5" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="carousel slide product_carousel_slider_option" data-ride="carousel"
                                id="carousel-1">
                                <div class="carousel-inner product_carousel_slider_imgs" role="listbox"></div>
                                <div><a class="carousel-control-prev " href="#carousel-1" role="button"
                                        data-slide="prev"><span class="carousel-control-prev-icon "></span><span
                                            class="sr-only ">Previous</span></a><a class="carousel-control-next "
                                        href="#carousel-1" role="button" data-slide="next"><span
                                            class="carousel-control-next-icon"></span><span
                                            class="sr-only">Next</span></a></div>
                                <ol class="carousel-indicators"></ol>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h4 id="product_title"></h4>
                            <div class="price">
                                <h5><span class="mr-2 text-danger"><del id="mrp_price"></del></span><span class="mr-2"
                                        id="peepal_price"></span><span class="text-success"
                                        id="total_discount_price"></span></h5>
                            </div>

                            <hr>
                            <div class="text-center"><button
                                    class="btn btn-sm btn-outline-info round _show_quantity"></button></div>
                            <div class="out_of_stock_div"></div>
                            <div class="text-center mt-2  _product_operation_div">
                                <span><button class="btn btn-sm btn-outline-info round-left"
                                        id="remove_no_of_product_btn">-</button></span>
                                <span><input type="text" name="quantity" id="quantity" readonly
                                        class="round-null text-center" value="1" style="width: 3rem"></span>
                                <span><button class="btn btn-sm btn-outline-info round-right"
                                        id="add_no_of_product_btn">+</button></span>
                            </div>



                            <div class="mt-3 text-center _product_btn_operation_div"><button
                                    class="btn btn-outline-danger mr-2 round_button add_to_cart_btn" type="button"> <i
                                        class="fas fa-cart"></i> ADD
                                    TO
                                    CART</button><button class="btn btn-outline-success round_button buy_now_btn"
                                    type="button"> <i class="fas fa-money-check-alt"></i> BUY NOW</button></div>
                            <div class="_show_total_amount text-center my-3"></div>
                        </div>
                        <div class="col-md-12">

                            <h4 class="border-bottom text-center">Product Details</h6>
                                <div class="text-center">
                                    <button id="btn" class="btn btn-outline-info mb-2 round" onclick="showDiv()" />view
                                    more</botton>
                                </div>
                                <div id="welcomeDiv" style="display:none;">
                                    <h6><strong>About this item:</strong> </h6>
                                    <p class="_product_descripton"></p>
                                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam
                                        tempora fuga tenetur placeat sapiente architecto illum soluta consequuntur,
                                        aspernatur quidem at sequi ipsa!</p>
                                    <p class="border-bottom">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p>
                                    <ul>
                                        <li>Color: <span>Black</span></li>
                                        <li>Available: <span>in stock</span></li>
                                        <li>Category: <span>Shoes</span></li>
                                        <li>Shipping Area: <span>All over the world</span></li>
                                        <li>Shipping Fee: <span>Free</span></li>
                                    </ul> --}}

                                    {{-- <div class="mt-2"> <span class="font-weight-bold">Description</span>
                                        <p class="border-bottom">The minimalist collaboration features chairs,
                                            lightening, Shelves, Sofas, Desks and various home accessories, all offering
                                            form and function at the same point.We use high-strength clamps and joinery
                                            techniques specially designed for engineered wood beds. Ergo, no irksome
                                            creaks - and you can sleep like a baby, well into adulthood!</p>
                                        <div class="bullets">
                                            <ul>
                                                <li>Best in Quality</li>
                                                <li>Anti-creak joinery</li>
                                                <li>Relocation friendly design</li>
                                                <li>Easy-access hydraulic storage</li>
                                                <li>High gloss, high style</li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- end of detail modal --}}
<input type="hidden" id="uri_category" value="{{Request::segment(2)}}">
<input type="hidden" id="uri_request" value="{{Request::segment(1)}}">

<input type="hidden" id="session_check_user" value="{{session()->get('user_id')}}">
<input type="hidden" id="login_uri" value="{{\URL::current()}}">

<script type="text/javascript">
    function showDiv() {
        document.getElementById('welcomeDiv').style.display = "block";
        document.getElementById('btn').style.display = "none";
    }
</script>
@stop