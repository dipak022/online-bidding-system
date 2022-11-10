@extends('frontend.layouts.master')
@section('title')
Auction Page
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
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">Pages</a>
                </li>
                <li>
                    <span>Vehicles</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend')}}/assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


   

    <!--============= Product Auction Section Starts Here =============-->
    <div class="product-auction padding-bottom">
        <div class="container">
            <div class="product-header mb-40">
                <div class="product-header-item">
                    <div class="item">Sort By : </div>
                    <select name="sort-by" class="select-bar">
                        <option value="all">All</option>
                        <option value="name">Name</option>
                        <option value="date">Date</option>
                        <option value="type">Type</option>
                        <option value="car">Car</option>
                    </select>
                </div>
                <div class="product-header-item">
                    <div class="item">Show : </div>
                    <select name="sort-by" class="select-bar">
                        <option value="09">09</option>
                        <option value="21">21</option>
                        <option value="30">30</option>
                        <option value="39">39</option>
                        <option value="60">60</option>
                    </select>
                </div>
                <form class="product-search ml-auto">
                    <input type="text" placeholder="Item Name">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="row mb-30-none justify-content-center">
                @foreach($products as $row)
                <div class="col-sm-10 col-md-6 col-lg-4">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="{{route('auction.details',$row->id)}}"><img src="{{asset($row->image)}}" alt="product"></a>
                            <a href="#0" class="rating"><i class="far fa-star"></i></a>
                            <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                        </div>
                        <div class="auction-content">
                            <h6 class="title">
                                <a href="{{route('auction.details',$row->id)}}">{{$row->product_name}}</a>
                            </h6>
                            <div class="bid-area">
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-auction"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Biding Pric</div>
                                        <div class="amount">{{number_format($row->starting_bidding_amount,2)}}</div>
                                    </div>
                                </div>
                                <div class="bid-amount">
                                    <div class="icon">
                                        <i class="flaticon-money"></i>
                                    </div>
                                    <div class="amount-content">
                                        <div class="current">Regular Price</div>
                                        <div class="amount">{{number_format($row->regular_price,2)}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="countdown-area">
                                <div class="countdown">
                                    <div style="display: none;" class="show_date"  id="show_date{{$loop->iteration -1 }}">{{date('Y/m/d',strtotime($row->bidding_end_date))}}</div>
                                    <div id="bid_counter{{$loop->iteration -1 }}"></div>
                                </div>
                                @php 
                                    $total_biding=DB::table('bidings')->where('product_id',$row->id)->where('status',1)->count();
                                @endphp
                                <span class="total-bids">{{$total_biding}} Bids</span>
                            </div>
                            <div class="text-center">
                            @if($row->product_location=="time")
                                <a href="{{route('auction.details',$row->id)}}" class="custom-button">Submit a bid</a>
                            @else
                            <a href="#" class="custom-button">Upcomming Bid</a>
                            @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <ul class="pagination">
                <li>
                    <a href="#0"><i class="flaticon-left-arrow"></i></a>
                </li>
                <li>
                    <a href="#0">1</a>
                </li>
                <li>
                    <a href="#0" class="active">2</a>
                </li>
                <li>
                    <a href="#0">3</a>
                </li>
                <li>
                    <a href="#0"><i class="flaticon-right-arrow"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!--============= Product Auction Section Ends Here =============-->

@endsection    