    <!--============= Banner Section Starts Here =============-->
    <section class="banner-section-2 bg_img" style="background-image: url({{asset('frontend')}}/assets/images/banner/banner-bg-3.png);
}" data-background="{{asset('frontend')}}/assets/images/banner/banner-bg-3.png">
        <div class="container">
            <div class="row align-items-center justify-content-between align-items-center">
                <div class="col-md-10 col-lg-6 col-xl-6">
                    <div class="banner-content cl-white">
                        <h5 class="cate">Enjoy Exclusive</h5>
                        <h1 class="title"><span class="d-xl-block">{{$banners->title}}</span></h1>
                        <p>
                            {{$banners->description}}.
                        </p>
                        <a href="#0" class="custom-button yellow btn-large">Get Started</a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-6 col-xl-6 d-none d-lg-block">
                    <div class="banner-thumb-3">
                        <img src="{{asset($banners->image)}}" alt="banner">
                    </div>
                </div>                
            </div>
        </div>
        <div class="banner-shape-2 d-none d-lg-block">
            <img src="{{asset('frontend')}}/assets/css/img/banner-shape-3.png" alt="css">
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->

    <!--============= Hightlight Slider Section Starts Here =============-->
    <div class="browse-slider-section mt--140">
        <div class="container">
            <div class="section-header-2 mb-4">
                <div class="left">
                    <h6 class="title cl-white cl-lg-black pl-0">Browse the highlights</h6>
                </div>
                <div class="slider-nav">
                    <a href="#0" class="bro-prev"><i class="flaticon-left-arrow"></i></a>
                    <a href="#0" class="bro-next active"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="m--15">
                <div class="browse-slider owl-theme owl-carousel">
                    @foreach($categorys as $cat) 
                        <a href="{{route('category_wise_show',$cat->id)}}" class="browse-item">
                            <img src="{{asset($cat->image)}}" alt="auction">
                            <span class="info">{{ $cat->category_name}}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--============= Hightlight Slider Section Ends Here =============-->