@extends('frontend.layouts.master')
@section('title')
Faqs Page
@endsection
@section('content')

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
                    <span>Faqs</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend')}}/assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->

    @php 
      $faqs=App\Models\FAQ::orderBy('id','DESC')->get(); 
    @endphp

    <!--============= Faq Section Starts Here =============-->
    <section class="faq-section padding-bottom mt--240 mt-lg--440 pos-rel">
        <div class="container">
            <div class="section-header cl-white mw-100 left-style">
                <h2 class="title">FAQ</h2>
                <p>Do not hesitate to send us an email if you can't find what you're looking for.</p>
            </div>
            <div class="row mb--50">
               
                <div class="col-lg-12 mb-50">
                @foreach($faqs as $faq)
                    <div class="faq-wrapper">
                        <div class="faq-item">
                            <div class="faq-title">
                                <img src="{{asset('frontend')}}/assets/css/img/faq.png" alt="css"><span class="title">{{$faq->title}}</span><span class="right-icon"></span>
                            </div>
                            <div class="faq-content">
                                <p>{{$faq->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
              
            </div>
        </div>
    </section>
    <!--============= Faq Section Ends Here =============-->

@endsection          