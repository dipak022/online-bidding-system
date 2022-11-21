@extends('frontend.layouts.master')
@section('title')
About Us Page
@endsection
@section('content')

    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>About Us</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend')}}/assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= About Section Starts Here =============-->
    <section class="about-section">
        <div class="container">
            <div class="about-wrapper mt--100 mt-lg--440 padding-top">
                <div class="row">
                    <div class="col-lg-7 col-xl-6">
                        <div class="about-content">
                            <h4 class="subtitle">About Us</h4>
                            <h2 class="title"><span class="d-block">OVER 60</span> YEARS EXPERIENCE</h2>
                            <p>Innovation have made us leaders in auctions platform</p>
                            <div class="item-area">
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/about/01.png" alt="about">
                                    </div>
                                    <p>award-winning team</p>
                                </div>
                                <div class="item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/about/02.png" alt="about">
                                    </div>
                                    <p>AFFILIATIONS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-thumb">
                    <img src="{{asset('frontend')}}/assets/images/about/about.png" alt="about">
                </div>
            </div>
        </div>
    </section>
    <!--============= About Section Ends Here =============-->


    <!--============= Counter Section Starts Here =============-->
    <div class="counter-section padding-top mt--10">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <h3 class="counter-header">
                            <span class="title counter">62</span><span class="title">M</span>
                        </h3>
                        <p>ITEMS AUCTIONED</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <h3 class="counter-header">
                            <span>$</span><span class="title counter">887</span><span class="title">M</span>
                        </h3>
                        <p>IN SECURE BIDS</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <h3 class="counter-header">
                            <span class="title counter">63</span><span class="title">M</span>
                        </h3>
                        <p>ITEMS AUCTIONED</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-item">
                        <h3 class="counter-header">
                            <span>0</span><span class="title counter">5</span><span class="title">K</span>
                        </h3>
                        <p>AUCTION EXPERTS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============= Counter Section Ends Here =============-->


    <!--============= Overview Section Starts Here =============-->
    <section class="overview-section padding-top">
        <div class="container mw-lg-100 p-lg-0">
            <div class="row m-0">
                <div class="col-lg-6 p-0">
                    <div class="overview-content">
                        <div class="section-header text-lg-left">
                            <h2 class="title">What can you expect?</h2>
                            <p>Voluptate aut blanditiis accusantium officiis expedita dolorem inventore odio reiciendis obcaecati quod nisi quae</p>
                        </div>
                        <div class="row mb--50">
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/overview/01.png" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Real-time Auction</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/overview/02.png" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Supports Multiple Currency</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/overview/03.png" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Winner Announcement</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/overview/04.png" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Supports Multiple Currency</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/overview/05.png" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Show all bidders history</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="expert-item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/overview/06.png" alt="overview">
                                    </div>
                                    <div class="content">
                                        <h6 class="title">Add to watchlist</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pl-30 pr-0">
                    <div class="w-100 h-100 bg_img" data-background="{{asset('frontend')}}/assets/images/overview/overview-bg.png"></div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Overview Section Ends Here =============-->



@endsection          