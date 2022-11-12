@extends('frontend.layouts.master')
@section('title')
Profile Page
@endsection
@section('content')
@php
  $userfind=DB::table('users')->where('id',auth()->user()->id)->first();
 @endphp
      <!-- branch add model end --> 
 <!-- Content Wrapper. Contains page content -->
 <!-- branch add model start --> 
<!--============= Hero Section Starts Here =============-->
<div class="hero-section style-2">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>Winning Bid</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend')}}/assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <!--============= Dashboard Section Starts Here =============-->
    <section class="dashboard-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-4">
                    <div class="dashboard-widget mb-30 mb-lg-0 sticky-menu">
                        <div class="user">
                            <div class="thumb-area">
                                <div class="thumb">
                                  @if($userfind->image==null)
                                    <img src="{{asset('frontend')}}/assets/images/dashboard/user.png" alt="user">
                                  @else
                                  <img src="{{asset($userfind->image)}}" alt="user">
                                  @endif
                                </div>
                            </div>
                            <div class="content">
                                <h5 class="title"><a href="#0">{{ $userfind->name }}</a></h5>
                            </div>
                        </div>
                        <ul class="dashboard-menu">
                            <li>
                                <a href="{{route('user.dashboard')}}" ><i class="flaticon-settings"></i>Personal Profile </a>
                            </li>
                            <li>
                                <a href="{{route('my.bid')}}" ><i class="flaticon-auction"></i>My Bids</a>
                            </li>
                            <li>
                                <a href="{{route('winning.bid')}}" class="active"><i class="flaticon-best-seller"></i>Winning Bids</a>
                            </li>
                            <li>
                                <a class="getstarted scrollto" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard-widget">
                        <h5 class="title mb-10">Winning Bid</h5>
                        <div class="dashboard-purchasing-tabs">
                            
                            <div class="tab-content">
                                <div class="tab-pane show active fade" id="current">
                                    <table class="purchasing-table">
                                        <thead>
                                            <th>Item</th>
                                            <th>Bid Price</th>
                                            <th>Date</th>
                                        </thead>
                                        <tbody>
                                            @foreach($bids as $item)
                                            <tr>
                                                <td data-purchase="item">{{$item->product_name}}</td>
                                                <td data-purchase="bid price">{{number_format($item->amount,2)}} Tk</td>
                                                <td data-purchase="expires">{{date('Y-m-d',strtotime($item->date_time))}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->





@endsection

