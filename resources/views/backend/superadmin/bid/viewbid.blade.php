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
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Regular Price</th>
                    <th>Start Buding Price</th>
                    <th>Bid End Date</th>
                    <th>Biding Amount</th>
                    <th>Winnner</th>
                    <th>Status</th> 
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($allbids as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->regular_price}} TK</td>
                        <td>{{$item->starting_bidding_amount}} TK</td>
                        <td>{{$item->bidding_end_date}}</td>
                        <td>{{$item->amount}}</td>
                        <td>
                            @if($item->winner_status == 0)
                            <span class="badge badge-danger"> Failure </span>
                            @else
                            <span class="badge badge-success"> Winner </span>
                            @endif
                        
                        </td>
                        <td>
                            
                            @if($count_winter>0)
                            @else
                            <div class="dropdown show">
                                <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Status
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @if($item->winner_status==0)
                                    <a class="dropdown-item" href="{{route('bid.delevered',$item->id)}}">Winner</a>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </td>
                        <td>
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