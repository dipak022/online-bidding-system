@extends('backend.superadmin.layouts.master')
@section('title')
Bid Manage
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bid All Data </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('superadmin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Bid</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

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
                    <th>Status Change</th> 
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
                            <div class="dropdown show">
                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Status
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @if($item->status!=2)
                                    <a class="dropdown-item" href="{{route('bid.delevered',$item->id)}}">delevered</a>
                                    @else
                                    
                                    <a class="dropdown-item" href="#">Deactive Done</a>
                                    @endif
                                   
                                </div>
                            </div>
                        </td>
                        <td>
                        <a type="button"  href="{{ route('bid.delete',$item->id) }}" class="btn-sm btn-danger" title="Delete">Delete</a>
                            
                            </form>
                        </td>
                    </tr>
                        <!-- branch Edit model start --> 
                        <div class="modal fade" id="edit_{{$item->id}}">
                                <div class="modal-dialog">
                                <div class="modal-content bg-info">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Tachnician  Assign </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    @php 
                                    $technicians=DB::table('problems')
                                      ->join('users','problems.service_id','users.type')
                                      ->where('users.role',4)
                                      ->select('problems.*','users.name','users.id')
                                      ->get();
                                    @endphp  
                                    <form class="add-contact-form" method="post" action="{{ route('problem.update',$item->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <!-- <input type="hidden" name="id" value="{{$item->id}}" > -->
                                        <div class="modal-body">
                                        
                                        
                                         

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-light">Tachnician  Assign</button>
                                        </div>
                                    </form>  
                                </div>
                                <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- branch Edit model end -->   



                           <!-- branch Show model start --> 
                        <div class="modal fade" id="show_{{$item->id}}">
                            @php
                                $problem = \App\Models\Product::where('id',$item->id)->first();
                            @endphp
                            <div class="modal-dialog">
                            <div class="modal-content bg-info">
                                <div class="modal-header">
                                <h4 class="modal-title">View Send Problem </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form class="add-contact-form" method="post" action="#" enctype="multipart/form-data">
                                   
                                    <!-- <input type="hidden" name="id" value="{{$item->id}}" > -->
                                    <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Name :</strong>
                                            <p>{{$problem->name}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Email :</strong>
                                            <p>{{$problem->email}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Phone :</strong>
                                            <p>{{$problem->phone}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Problem Title :</strong>
                                            <p>{{$problem->problem_title}}</p>
                                        </div>
                                    </div>

                                   

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Problem Description :</strong>
                                            <p>{{$problem->problem_details}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Room Number :</strong>
                                            <p>{{$problem->room_number}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                      
                                        <div class="col-md-6">
                                            <strong>Floor Number :</strong>
                                            <p>{{$problem->floor_number}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Equipment Number Title :</strong>
                                            <p>{{$problem->equipment_number}}</p>
                                        </div>
                                    </div>

                                   


                                  
                                   
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Status  :</strong>
                                            @if($problem->status==1)
                                            <span class="badge badge-success"> Request </span>
                                            @elseif($problem->status==2)
                                            <span class="badge badge-success"> Send Tachnician </span>
                                            @elseif($problem->status==3)
                                            <span class="badge badge-success"> Problen Solved </span>
                                            @elseif($problem->status==4)
                                            <span class="badge badge-success"> Send Officer For Equipment </span>
                                            @elseif($problem->status==5)
                                            <span class="badge badge-success"> Equipment Buying Done</span>
                                            @endif
                                          </div>
                                    </div>
                                        
                    
                                    <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light pull-right" data-dismiss="modal">Close</button>
                                    </div>
                                </form>  
                          </div>
                          <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                      <!-- Department Show  model end -->    
                  @endforeach   
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('.dltBtn').click(function(e){
       
        var form = $(this).closest('form');
        var dataId = $(this).data('id');
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
        
        

    });

</script>




@endsection