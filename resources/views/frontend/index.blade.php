@extends('frontend.layouts.master')
@section('title')
Home Page
@endsection
@section('content')

@include('frontend.layouts.slider')

       <!--============= Feture Auction Section Starts Here =============-->
       <section class="feature-auction-section padding-bottom padding-top bg_img" style="background-image: url({{asset('frontend')}}/assets/images/auction/featured/featured-bg-1.jpg);
}" data-background="{{asset('frontend')}}/assets/images/auction/featured/featured-bg-1.jpg">
        <div class="container">
            <div class="section-header">
                <h2 class="title">New Items</h2>
                <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
            </div>
            <div class="row justify-content-center mb-30-none">
                @foreach($allproducts as $allproduct)
                    <div class="col-sm-10 col-md-6 col-lg-4">
                        <div class="auction-item-2">
                            <div class="auction-thumb">
                                <a href="{{route('auction.details',$allproduct->id)}}"><img src="{{asset($allproduct->image)}}" alt="jewelry"></a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                                <a href="#0" class="bid"><i class="flaticon-auction"></i></a>
                            </div>
                            <div class="auction-content">
                                <h6 class="title">
                                    <a href="{{route('auction.details',$allproduct->id)}}">{{$allproduct->product_name}}</a>
                                </h6>
                                <div class="bid-area">
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-auction"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Biding Price</div>
                                            <div class="amount">{{number_format($allproduct->starting_bidding_amount,2)}}</div>
                                        </div>
                                    </div>
                                    <div class="bid-amount">
                                        <div class="icon">
                                            <i class="flaticon-money"></i>
                                        </div>
                                        <div class="amount-content">
                                            <div class="current">Regular Price</div>
                                            <div class="amount">{{number_format($allproduct->regular_price,2)}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="countdown-area">
                                    <div class="countdown">
                                        <div style="display: none;" class="show_date"  id="show_date{{$loop->iteration -1 }}">{{date('Y/m/d',strtotime($allproduct->bidding_end_date))}}</div>
                                        <div id="bid_counter{{$loop->iteration -1 }}"></div>
                                    </div>
                                    @php 
                                        $total_biding=DB::table('bidings')->where('product_id',$allproduct->id)->where('status',1)->count();
                                    @endphp
                                    <span class="total-bids">{{$total_biding}} Bids</span>
                                </div>
                                <div class="text-center">
                                    @if($allproduct->product_location=="time")
                                    <a href="{{route('auction.details',$allproduct->id)}}" class="custom-button">Submit a bid</a>
                                    @else
                                    <a href="#" class="custom-button">Upcomming Bid</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="load-wrapper">
                <a href="#0" class="normal-button">See All Auction</a>
            </div>
        </div>
    </section>
    <!--============= Feture Auction Section Ends Here =============-->


    <!--============= Upcoming Auction Section Starts Here =============-->
    <section class="upcoming-auction padding-bottom">
        <div class="container">
            <div class="section-header">
                <h2 class="title">Auctions</h2>
                <p>You are welcome to attend and join in the action at any of our upcoming auctions.</p>
            </div>
        </div>
        <div class="filter-wrapper">
            <div class="container">
                <ul class="filter">
                    <li class="active" data-check="*">
                        <span><i class="flaticon-right-arrow"></i>All</span>
                    </li>
                    <li data-check=".live">
                        <span><i class="flaticon-auction"></i>Live Auction</span>
                    </li>
                    <li data-check=".time">
                        <span><i class="flaticon-time"></i>Upcoming Auction</span>
                    </li>
                    <li data-check=".buy">
                        <span><i class="flaticon-bag"></i>Papular Auction</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="auction-wrapper-5 m--15">
                @foreach($productslocation as $rows)
                    <div class="auction-item-5 {{$rows->product_location}}">
                        <div class="auction-inner">
                            <div class="upcoming-badge" title="Upcoming Auction">
                                <i class="flaticon-auction"></i>
                            </div>
                            <div class="auction-thumb">
                                <a href="{{route('auction.details',$rows->id)}}"><img src="{{asset('frontend')}}/assets/images/auction/upcoming/upcoming-1.png" alt="upcoming"></a>
                                <a href="#0" class="rating"><i class="far fa-star"></i></a>
                            </div>
                            <div class="auction-content">
                                <div class="title-area">
                                    <h6 class="title">
                                        <a href="{{route('auction.details',$rows->id)}}">{{$rows->product_name}}</a>
                                    </h6>
                                </div>
                                <div class="bid-area">
                                    <div class="bid-inner">
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-auction"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Biding Price</div>
                                                <div class="amount">{{number_format($rows->starting_bidding_amount,2)}}</div>
                                            </div>
                                        </div>
                                        <div class="bid-amount">
                                            <div class="icon">
                                                <i class="flaticon-money"></i>
                                            </div>
                                            <div class="amount-content">
                                                <div class="current">Regular Price</div>
                                                <div class="amount">{{number_format($rows->regular_price,2)}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bid-count-area">
                                    <span class="item">
                                        @php 
                                            $total_biding=DB::table('bidings')->where('product_id',$rows->id)->where('status',1)->count();
                                        @endphp
                                        <span class="left">Total Bids</span>{{$total_biding}} Bids
                                    </span>
                                    <span class="item">
                                        <span class="left">Last Bid </span>7 mins ago
                                    </span>
                                </div>
                            </div>
                            <div class="auction-bidding">
                                <span class="bid-title">Bidding ends in</span>
                                <div class="countdown">
                                    <div id="bid_counter3"></div>
                                </div>
                                <div class="bid-incr">
                                    <span class="title">Height Biding Amount </span>
                                    @php 
                                    $max_biding_amount=DB::table('bidings')->where('product_id',$rows->id)->where('status',1)->max('amount');
                                    @endphp
                                    <h4>{{number_format($max_biding_amount,2)}} TK</h4>
                                </div>
                                @if($rows->product_location=="time")
                                <a href="{{route('auction.details',$rows->id)}}" class="custom-button">Submit a bid</a>
                                @else
                                <a href="#" class="custom-button">Upcomming Bid</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--============= Upcoming Auction Section Ends Here =============-->

    @include('frontend.layouts.how_it_work')

   

@endsection