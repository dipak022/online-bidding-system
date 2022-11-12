@extends('frontend.layouts.master')
@section('title')
Home Page
@endsection
@section('content')
@php
  $userfind=DB::table('users')->where('id',auth()->user()->id)->first();
 @endphp
<!--============= Hero Section Starts Here =============-->
<div class="hero-section style-2 pb-lg-400">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="#0">My Account</a>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        <div class="bg_img hero-bg bottom_center" style="background-image: url({{asset('frontend/assets/images/banner/hero-bg.png');
}}" data-background="{{asset('frontend')}}/assets/images/banner/hero-bg.png"></div>
    </div>
    <!--============= Hero Section Ends Here =============-->


    <div class="modal fade" id="account_{{$userfind->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Update Account </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="add-contact-form" method="post" action="{{ route('account.update',$userfind->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Name :</label>
                        <input type="text" class="form-control" placeholder="name" name="name" value="{{$userfind->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email :</label>
                        <input class="form-control" placeholder="Email" name="email" value="{{$userfind->email}}" readonly></input>
                    </div>

                    <div class="form-group">
                        <label>Phone :</label>
                        <input class="form-control" placeholder="phone" name="phone" value="{{$userfind->phone}}" ></input>
                    </div>

                     <div class="form-group">
                        <label> Image  :</label>
                        <input type="file" class="form-control"  name="image" value="{{old('image')}}"></input>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-outline-light">Update </button>
                
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                </div>
            </form>  
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




      <!-- password change model  -->

 <div class="modal fade" id="password_{{$userfind->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Change Password </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="add-contact-form" method="post" action="{{ route('change.password') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    
                <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-outline-light">Update </button>
                
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                </div>
            </form>  
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



 

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
                                <a href="{{route('user.dashboard')}}" class="active"><i class="flaticon-settings"></i>Personal Profile </a>
                            </li>
                            <li>
                                <a href="{{route('my.bid')}}"><i class="flaticon-auction"></i>My Bids</a>
                            </li>
                            <li>
                                <a href="{{route('winning.bid')}}"><i class="flaticon-best-seller"></i>Winning Bids</a>
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
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="dash-pro-item mb-30 dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Personal Details</h4>
                                    <span class="edit">
                                    <a type="button" class="flaticon-edit" data-toggle="modal" data-target="#account_{{$userfind->id}}">
                                    Edit
                                    </a>
                                    </span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Name</div>
                                        <div class="info-value">{{ $userfind->name }}</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Email</div>
                                        <div class="info-value">{{ $userfind->email }}</div>
                                    </li>
                                    <li>
                                        <div class="info-name">Phone</div>
                                        <div class="info-value">{{ $userfind->phone }}</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                      
                        <div class="col-12">
                            <div class="dash-pro-item dashboard-widget">
                                <div class="header">
                                    <h4 class="title">Change Password</h4>
                                    <span class="edit">
                                    <a type="button" class="flaticon-edit" data-toggle="modal" data-target="#password_{{$userfind->id}}">
                                    Edit
                                    </a>
                                    </span>
                                </div>
                                <ul class="dash-pro-body">
                                    <li>
                                        <div class="info-name">Password</div>
                                        <div class="info-value">xxxxxxxxxxxxxxxx</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->
@endsection