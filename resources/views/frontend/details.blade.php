@extends('frontend.layouts.master')
@section('title')
Details Page
@endsection
@section('content')
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="#">Store</a></li>
            <li class="active">{{ $products->product_name }}</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
        

          <!-- BEGIN CONTENT -->
          <div class="col-md-2 col-sm-7"></div>
          <div class="col-md-8 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="product-main-image">
                    <img src="{{ asset($products->image) }}" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="{{ asset($products->image) }}">
                  </div>
                  <div class="product-other-images">
                    <a href="{{ asset($products->image) }}" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="{{ asset($products->image) }}"></a>
                   
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1>Cool green dress with red bell</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span> Regular Rrice : {{ $products->regular_price }} TK </span></strong>
                    </div>
                    <div class="price">
                      <strong><span> Bid Starting Amount : {{ $products->starting_bidding_amount }} TK </span></strong>
                    </div>
                    <div class="price">
                      <strong><span> Bid End Date : {{ $products->bidding_end_date }}  </span></strong>
                    </div>
                    <div class="price">
                      <strong><span> Highest Bid : {{ $products->bidding_amount }} Tk </span></strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>{{ $products->details }}.</p>
                  </div>
                  @if($products->status!=2)
                  <form class="add-contact-form" method="post" action="{{route('biding.update',$products->id)}}" enctype="multipart/form-data">
                    @csrf                 
                    <div class="form-group">
                        <label>Bidding Amount :</label>
                        <input type="text" class="form-control" placeholder="Enter product name" name="bidding_amount" value="{{old('bidding_amount')}}" />
                    </div>
                        <button class="btn btn-success" type="submit">Bid Now</button>
                    </div>
                 </form>
                 @else
                 <div class="price">
                      <strong><span> Satisfied Biding Product already sell. </span></strong>
                    </div>
                 @endif 
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

      </div>
    </div>
@endsection    