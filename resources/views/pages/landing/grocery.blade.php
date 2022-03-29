@extends('layouts.home_layout')
@section('content')
<style type="text/css">
    /*
    DEMO STYLE
*/

    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

    p {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1em;
        font-weight: 300;
        line-height: 1.7em;
        color: #999;
    }

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
        background: #7386D5;
        color: #fff;
        transition: all 0.3s;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: #6d7fcc;
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

    #card:hover {
        box-shadow: 1px 8px 20px grey;
        -webkit-transition: box-shadow .4s ease-in;
    }
</style>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Category</h3>
        </div>

        <ul class="list-unstyled components">

            <li>
                <a href="#">Personol Care</a>
            </li>
            <li>
                <a href="#">Vegitables</a>
            </li>
            <li>
                <a href="#">Grocery Staples</a>
            </li>
            <li>
                <a href="#">Kitchen Needs</a>
            </li>
            <li>
                <a href="#">Breakfast & Dairy</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-lg btn-info text-nowrap">
                    <i class="fas fa-align-left"></i>
                    <span>Category</span>
                </button>
                <div class="collapse navbar-collapse" style="margin-left:70%" id="navbarSupportedContent">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Sort By<span> <i class="fas fa-align-right"></i></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-primary">
                            {{-- <button class="dropdown-item" type="button">Relevence</button> --}}
                            <button class="dropdown-item" type="button">Price(Low to High)</button>
                            <button class="dropdown-item" type="button">Price(High to Low)</button>
                            {{-- <button class="dropdown-item" type="button">Discount(Hight to Low)</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="row g-2">

            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRl3758D0I5tRZoM-PbKfPhXxg2K9mzLJh59g&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center" width="200"> </div>
                    <div class="about text-center">
                        <h5>Maggie 2 minutes noodles </h5> <span>$1,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRl3758D0I5tRZoM-PbKfPhXxg2K9mzLJh59g&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center" width="200"> </div>
                    <div class="about text-center">
                        <h5>Maggie 2 minutes noodles </h5> <span>$1,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUUFNLyXFSPwIJQasMGB9RdOsQfjGw01d4Zw&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center" width="200"> </div>
                    <div class="about text-center">
                        <h5>Maggie 2 minutes noodles </h5> <span>$1,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJGVKyHjhnMl7GOzvX5zLWl7jlu_NxoJNY6g&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Tyko Running shoes</h5> <span>$99.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrGjiGjafno_rHS4yQDCLfVeAXvWJcSn3ZDg&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Dell surface book 5</h5> <span>$1,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQDREDdOA2oat1E4oWjqVc1TYKAx1qTtLGuA&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Tyko Running shoes</h5> <span>$99.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQDREDdOA2oat1E4oWjqVc1TYKAx1qTtLGuA&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Tyko Running shoes</h5> <span>$99.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3  col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJGVKyHjhnMl7GOzvX5zLWl7jlu_NxoJNY6g&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Tyko Running shoes</h5> <span>$99.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrGjiGjafno_rHS4yQDCLfVeAXvWJcSn3ZDg&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Dell surface book 5</h5> <span>$1,999.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQDREDdOA2oat1E4oWjqVc1TYKAx1qTtLGuA&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Tyko Running shoes</h5> <span>$99.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3 col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQDREDdOA2oat1E4oWjqVc1TYKAx1qTtLGuA&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Tyko Running shoes</h5> <span>$99.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>
            <div id="card" class="col-sm-3  col-md-3" style="border:3px solid rgb(255, 255, 255);">
                <div class="product py-4">
                    <div class="text-center"> <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJGVKyHjhnMl7GOzvX5zLWl7jlu_NxoJNY6g&usqp=CAU"
                            width="200"> </div>
                    <div class="about text-center">
                        <h5>Tyko Running shoes</h5> <span>$99.99</span>
                    </div>
                    <div class="cart-button mt-3 px-2 d-flex justify-content-between align-items-center"> <button
                            class="btn btn-primary text-uppercase">Add to cart</button>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
</script>
@stop