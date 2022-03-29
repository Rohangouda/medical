@extends('layouts.index_layout')
@section('content')
<style type="text/css">
    .feature_section .box:hover {
        background-color: #b5f3b5;
        color: blue;
    }

    .slider_section {
        background: #585481 !important;
    }

    .feature_section .box .img-box img {
        width: 140px;
    }
</style>
<script src="{{asset('js/custom/home_js.js?ver=')}}{{date('YmdHis')}}"></script>
<!-- feature section -->

<section class="feature_section layout_padding">
    <div class="container">
        <div class="heading_container text-success">
            <h2 style="color: #2f2d46">
                our Services
            </h2>
        </div>
        <hr>
        <div class="row _main_categories">

        </div>
        <div class="btn-box">
            <a class="view_more_btn" href="javascript:void(0);">
                View More
            </a>
        </div>
    </div>
</section>

<!-- end feature section -->

<!-- client section -->
{{-- <section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Testimonial
            </h2>
        </div>
        <div class="carousel-wrap ">
            <div class="owl-carousel client_owl-carousel">
                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/c1.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5>
                                        Mark Thomas
                                    </h5>
                                    <h6>
                                        Customer
                                    </h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore
                                et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse
                                cillum
                                dolore eu fugia
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/c2.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5>
                                        Alina Hans
                                    </h5>
                                    <h6>
                                        Customer
                                    </h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore
                                et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse
                                cillum
                                dolore eu fugia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- end client section -->
@stop