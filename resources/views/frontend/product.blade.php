@extends('frontend.layouts.master')
@section('title')
Search Product
@endsection
@section('content')
<div class="main">
      <div class="container">
        

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-4">
            <ul class="list-group margin-bottom-25 sidebar-menu">
                @foreach($categorys as $cat)   
                   <li class="list-group-item clearfix"><a href="{{route('category_wise_show',$cat->id)}}"><i class="fa fa-angle-right"></i>{{ $cat->category_name}}</a></li>
                @endforeach
              
            </ul>
          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8">
            <h2>Three items</h2>
            <div class="owl-carousel owl-carousel3">
                @foreach($categoryproducts as $categoryproduct)
                <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="{{asset($categoryproduct->image)}}" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="{{asset($categoryproduct->image)}}" class="btn btn-default fancybox-button">Zoom</a>
                    </div>
                  </div>
                  <h3><a href="javascript:;">{{$categoryproduct->name}}</a></h3>
                  <div class="pi-price">{{$categoryproduct->regular_price}} TK</div>
                  <a href="{{route('auction.details',$categoryproduct->id)}}" class="btn btn-default add2cart">View Biding Item </a>
                </div>
              </div>
               @endforeach
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

      </div>
    </div>
@endsection          