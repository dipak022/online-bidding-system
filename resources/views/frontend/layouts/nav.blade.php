<!--============= Header Section Starts Here =============-->
<header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="customer-support">
                        <li>
                            <a href="#0" class="mr-3"><i class="fas fa-phone-alt"></i><span class="ml-2 d-none d-sm-inline-block">Customer Support</span></a>
                        </li>
                        <li>
                            <i class="fas fa-globe"></i>
                            <select name="language" class="select-bar">
                                <option value="en">En</option>
                                <option value="Bn">Bn</option>
                                <option value="Rs">Rs</option>
                                <option value="Us">Us</option>
                                <option value="Pk">Pk</option>
                                <option value="Arg">Arg</option>
                            </select>
                        </li>
                    </ul>
                    <ul class="cart-button-area">   
                        @guest              
                        <li>
                            <a href="{{route('register')}}" class="user-button"><i class="flaticon-user"></i></a>
                        </li> 
                        @else
                        <li>
                            <span style="color:white;">{{auth()->user()->name}}</span>
                            <a href="{{route('user.dashboard')}}" class="user-button"><i class="flaticon-user"></i></a>
                        </li> 
                        @endguest                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('frontend')}}/assets/images/logo/logo.png" style="height: 50px;width:50px;" alt="logo">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        <li>
                            <a href="#0">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('auction.show') }}">Auction</a>
                        </li>
                        <li>
                            <a href="{{ route('about.us') }}">About Us</a>
                        </li>
                        <li>
                            <a href="{{ route('faqs') }}">Faqs</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                    <form class="search-form white">
                        <input type="text" placeholder="Search for brand, model....">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="search-bar d-md-none">
                        <a href="#0"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--============= Header Section Ends Here =============-->