@extends('frontend.layouts.master')
@section('title')
Profile Page
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <!-- branch add model start --> 
 @php
  $userfind=DB::table('users')->where('id',auth()->user()->id)->first();
 @endphp
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
                      <label>User status :</label>
                      <select class="form-control show-tick" name="active">
                            <option selected disable>--Select Status--</option>
                            <option value="1" {{$userfind->active == 1 ? "selected" : "" }}>Active</option>
                            <option value="0" {{$userfind->active == 0 ? "selected" : "" }}>Inactive</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Update </button>
                </div>
            </form>  
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- branch add model end --> 
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-md-2"></div>
          <div class="col-sm-8">
            <h1>Bid All Data </h1>
            <div class="pull-right" style="text-align:right;">
                    <button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#account_{{$userfind->id}}" style="color:white;background:black;">
                      Account Update
                    </button>
                </div>
</br>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8">
          

            <div class="card">
              <div class="card-header">
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Image</th>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Email</th>
                    <th>Regular Price</th>
                    <th>Start Buding Price</th>
                    <th>Bid Amount</th>
                    <th>Bid End Date</th>
                    <th>Status</th> 
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($allbids as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset($item->image)}}" style="height: 100px;width: 100px;"/></td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->regular_price}} TK</td>
                        <td>{{$item->starting_bidding_amount}} TK</td>
                        <td>{{$item->bidding_amount}} TK</td>
                        <td>{{$item->bidding_end_date}}</td>
                        <td>
                          @if($item->status==1)
                            <span class="badge badge-success"> Request </span>
                           @elseif($item->status==2)
                           <span class="badge badge-success"> Biding Done </span>
                          
                           @endif
                        </td>
                        
                        <td>
                        <a type="button"  href="{{ route('user.bid.delete',$item->id) }}" class="btn-sm btn-danger" title="Delete">Delete</a>
                            
                            </form>
                        </td>
                    </tr>
                          
                  @endforeach   
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-2"></div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





@endsection

