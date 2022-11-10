@extends('frontend.layouts.master')
@section('title')
Details Page
@endsection
@section('content')
@php
 $shippings= DB::table('shippings')->first();
@endphp
    <!--============= Hero Section Starts Here =============-->
    <div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="#0">Bid Details</a>
                </li>
                <li>
                    <span>{{ $products->product_name }}</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend')}}/assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Product Details Section Starts Here =============-->
    <section class="product-details padding-bottom mt--240 mt-lg--440">
        <div class="container">
            <div class="product-details-slider-top-wrapper">
                <div class="product-details-slider owl-theme owl-carousel" id="sync1">
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-top-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-slider-wrapper">
                <div class="product-bottom-slider owl-theme owl-carousel" id="sync2">
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                    <div class="slide-bottom-item">
                        <div class="slide-inner">
                            <img src="{{ asset($products->image) }}" alt="product">
                        </div>
                    </div>
                </div>
                <span class="det-prev det-nav">
                    <i class="fas fa-angle-left"></i>
                </span>
                <span class="det-next det-nav active">
                    <i class="fas fa-angle-right"></i>
                </span>
            </div>
            <div class="row mt-40-60-80">
                <div class="col-lg-8">
                    <div class="product-details-content">
                        <div class="product-details-header">
                            <h2 class="title">{{ $products->product_name }}</h2>
                        </div>
                        <ul class="price-table mb-30">
                            <li class="header">
                                <h5 class="current">Selling Price</h5>
                                <h3 class="price">{{number_format($products->regular_price,2)}} TK</h3>
                            </li>
                            <li>
                                <span class="details">Current height biding amount</span>
                                @php 
                                    $max_biding=DB::table('bidings')->where('product_id',$products->id)->where('status',1)->max('amount');
                                @endphp
                                <h5 class="info">{{ number_format($max_biding,2)}} Tk</h5>
                            </li>
                            <li>
                                <span class="details">Start Biding amount</span>
                                @php 
                                  $start_biding=DB::table('bidings')->where('product_id',$products->id)->where('status',1)->first();
                                @endphp
                                <h5 class="info">
                                  @if($start_biding)
                                    {{ number_format($start_biding->amount,2)}} Tk
                                  @else
                                   0.00 TK
                                  @endif
                                </h5>
                            </li>
                        </ul>
                        @if($products->product_location=="time")
                        <a href="#" class="custom-button">Upcomming Bid</a>
                        @else
                        <div class="product-bid-area">
                            <form class="product-bid-form" method="post" action="{{route('biding.create',$products->id)}}" enctype="multipart/form-data">
                              @csrf 
                                <div class="search-icon">
                                    <img src="{{asset('frontend')}}/assets/images/product/search-icon.png" alt="product">
                                </div>
                                <input type="number" placeholder="Enter you bid amount" name="amount" value="{{old('bidding_amount')}}" required>
                                <button type="submit" class="custom-button">Submit a bid</button>
                            </form>
                        </div>
                        @endif
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product-sidebar-area">
                        <div class="product-single-sidebar mb-3">
                            <h6 class="title">This Auction Ends in:</h6>
                            <div class="countdown">
                                <div style="display: none;" class="show_date"  id="show_date0">{{date('Y/m/d',strtotime($products->bidding_end_date))}}</div>
                                <div id="bid_counter0"></div>
                            </div>
                            <div class="side-counter-area">
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/product/icon1.png" alt="product">
                                    </div>
                                    <div class="content">
                                        <h3 class="count-title"><span class="counter">61</span></h3>
                                        <p>Active Bidders</p>
                                    </div>
                                </div>
                                <div class="side-counter-item">
                                    <div class="thumb">
                                        <img src="{{asset('frontend')}}/assets/images/product/icon3.png" alt="product">
                                    </div>
                                    <div class="content">
                                        @php 
                                          $total_biding=DB::table('bidings')->where('product_id',$products->id)->where('status',1)->count();
                                        @endphp
                                        <h3 class="count-title"><span class="counter">{{ $total_biding }}</span></h3>
                                        <p>Total Bids</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#0" class="cart-link">Payment & Auction Policies</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-menu-area mb-40-60 mt-70-100">
            <div class="container">
                <ul class="product-tab-menu nav nav-tabs">
                    <li>
                        <a href="#details" class="active" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{asset('frontend')}}/assets/images/product/tab1.png" alt="product">
                            </div>
                            <div class="content">Description</div>
                        </a>
                    </li>
                    <li>
                        <a href="#delevery" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{asset('frontend')}}/assets/images/product/tab2.png" alt="product">
                            </div>
                            <div class="content">Delivery Options</div>
                        </a>
                    </li>
                    <li>
                        <a href="#history" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{asset('frontend')}}/assets/images/product/tab3.png" alt="product">
                            </div>
                            <div class="content">Bid History ({{$total_biding}})</div>
                        </a>
                    </li>
                    <li>
                        <a href="#questions" data-toggle="tab">
                            <div class="thumb">
                                <img src="{{asset('frontend')}}/assets/images/product/tab4.png" alt="product">
                            </div>
                            <div class="content">Questions </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="details">
                    <div class="tab-details-content">
                        <div class="header-area">
                            <h3 class="title">Biding details please read, Thank you.</h3>
                            <div class="item">
                               {{ $products->details }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="delevery">
                    <div class="shipping-wrapper">
                        <div class="item">
                            <h5 class="title">shipping</h5>
                            <div class="table-wrapper">
                                <table class="shipping-table">
                                    <thead>
                                        <tr>
                                            <th>Available delivery methods </th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Customer Pick-up (within 10 days)</td>
                                            <td>{{number_format($shippings->within_10_days,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Standard Shipping (within 5-7 days)</td>
                                            <td>{{number_format($shippings->within_5_days,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Expedited Shipping (within 2-4 days)</td>
                                            @if($shippings->within_2_days)
                                            <td>{{number_format($shippings->within_10_days,2)}}</td>
                                            @else
                                            <td>Not Applicable</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="item">
                            <h5 class="title">Notes</h5>
                            <p>Please carefully review our shipping and returns policy before committing to a bid.
                            From time to time, and at its sole discretion, Sbidu may change the prevailing fee structure for shipping and handling.</p>
                        </div>
                    </div>
                </div>
                @php 
                  $biding_information=DB::table('bidings')
                  ->leftjoin('users','bidings.user_id','users.id')
                  ->where('product_id',$products->id)
                  ->where('status',1)
                  ->select('bidings.*','users.name')
                  ->get();
                @endphp
                <div class="tab-pane fade show" id="history">
                    <div class="history-wrapper">
                        <div class="item">
                            <h5 class="title">Bid History</h5>
                            <div class="history-table-area">
                                <table class="history-table">
                                    <thead>
                                        <tr>
                                            <th>Bidder</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>unit price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($biding_information as $info)
                                        <tr>
                                            <td data-history="bidder">
                                                <div class="user-info">
                                                    <div class="thumb">
                                                        <img src="{{asset('frontend')}}/assets/images/history/01.png" alt="history">
                                                    </div>
                                                    <div class="content">
                                                        {{$info->name}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-history="date">{{date('Y-m-d',strtotime($info->date_time))}}</td>
                                            <td data-history="time">{{date('h:i:s A',strtotime($info->date_time))}}</td>
                                            <td data-history="unit price">{{$info->amount}} TK</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center mb-3 mt-4">
                                    <a href="#0" class="button-3">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="questions">
                        <h5 class="faq-head-title">Frequently Asked Questions</h5>
                        <div class="faq-wrapper">
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{asset('frontend')}}/assets/css/img/faq.png" alt="css"><span class="title">How to start bidding?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{asset('frontend')}}/assets/css/img/faq.png" alt="css"><span class="title">Security Deposit / Bidding Power </span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{asset('frontend')}}/assets/css/img/faq.png" alt="css"><span class="title">Delivery time to the destination port </span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{asset('frontend')}}/assets/css/img/faq.png" alt="css"><span class="title">How to register to bid in an auction?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item open active">
                                <div class="faq-title">
                                    <img src="{{asset('frontend')}}/assets/css/img/faq.png" alt="css"><span class="title">How will I know if my bid was successful?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-title">
                                    <img src="{{asset('frontend')}}/assets/css/img/faq.png" alt="css"><span class="title">What happens if I bid on the wrong lot?</span><span class="right-icon"></span>
                                </div>
                                <div class="faq-content">
                                    <p>All successful bidders can confirm their winning bid by checking the “Sbidu”. In addition, all successful bidders will receive an email notifying them of their winning bid after the auction closes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Product Details Section Ends Here =============-->
@endsection    