@extends('company.layouts.master')
@section('title')
Post Manage
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post All Data </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('company.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
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
                <h3 class="card-title">Total Company Post : {{\App\Models\Product::count()}} </h3>
                <div class="pull-right" style="text-align:right;">
                    <button type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#branch-info">
                    Add New Post
                    </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Regular Price </th>
                    <th>Budding Price </th>
                    <th>Budding End Date </th>
                    <th>New Post</th>
                    <th>Papular Post</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{asset($item->image)}}" style="height: 100px;width: 100px;"/></td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->category_name}}</td>
                        <td>{{$item->regular_price}}</td>
                        <td>{{$item->starting_bidding_amount}}</td>
                        <td>{{$item->bidding_end_date}}</td>
                        <td>
                           <input type="checkbox" name="new" value="{{$item->id}}" data-toggle="switchbutton" {{$item->new == 1 ? 'checked' : ''}}  data-onlabel="ON" data-offlabel="OFF" data-onstyle="success" data-size="sm" data-offstyle="danger">
                        </td>
                        <td>
                           <input type="checkbox" name="featured" value="{{$item->id}}" data-toggle="switchbutton" {{$item->featured == 1 ? 'checked' : ''}}  data-onlabel="ON" data-offlabel="OFF" data-onstyle="success" data-size="sm" data-offstyle="danger">
                        </td>
                        <td>
                            <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->active == 1 ? 'checked' : ''}}  data-onlabel="Active" data-offlabel="Inactive" data-onstyle="success" data-size="sm" data-offstyle="danger">
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#show_{{$item->id}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                            </a>

                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_{{$item->id}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                            </a>
                            <form class="float-left px-2" action="{{ route('company-product.destroy',$item->id) }}" method="POST">
                                @csrf 
                                @method('delete')
                                <a type="button" data-type="confirm" class="dltBtn btn-sm btn-danger js-sweetalert" title="Delete">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                                </a>

                            </form>
                            
                        </td>
                    </tr>
                        <!-- branch Edit model start --> 
                        <div class="modal fade" id="edit_{{$item->id}}">
                                @php
                                  
                                  $product=DB::table('products')
                                  ->join('categories','products.category_id','categories.id')
                                  ->where('products.id',$item->id)
                                  ->select('products.*','categories.category_name')
                                  ->first();
                                  
                                @endphp
                                <div class="modal-dialog">
                                <div class="modal-content bg-secondary">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Update Post </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form class="add-contact-form" method="post" action="{{ route('company-product.update',$item->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <!-- <input type="hidden" name="id" value="{{$item->id}}" > -->
                                        <div class="modal-body">
                                          
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Post Title :</label>
                                                  <input type="text" class="form-control" placeholder="Enter post title" name="product_name" value="{{$product->product_name}}" />
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label>Select Category :</label>
                                                <select class="form-control show-tick" name="category_id">
                                                    <option selected disabled>--Select Category--</option>
                                                    @foreach($categorys as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Regular price  :</label>
                                                  <input type="text" class="form-control" placeholder="Enter regular price" name="regular_price" value="{{$product->regular_price}}" />
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Starting bidding price   :</label>
                                                    <input type="text" class="form-control" placeholder="Enter starting bidding price" name="starting_bidding_amount" value="{{$product->starting_bidding_amount}}" />
                                                </div>
                                            </div>
                                          </div>


                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Bidding end date  :</label>
                                                  <input type="date" class="form-control" placeholder="Enter regular price" name="bidding_end_date" value="{{$product->bidding_end_date}}" />
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                    <label>Image   :</label>
                                                    <input type="file" class="form-control" name="image"  />
                                                    <img src="{{asset($product->image)}}" alt="" style="pull:right; height: 50px; width: 50px;" >
                                                    <input type="hidden" class="form-control" name="oldimage" value="{{ ($product->image) }}"  />
                                                    
                                                </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                                <label>Description  :</label>
                                                <textarea class="form-control" placeholder="Enter description...." rows="5" name="details" >{{$product->details}}</textarea>
                                          </div>


                                          <div class="row">
                                            <div class="col-md-4">
                                              <div class="form-group">
                                              <div class="form-group">
                                                      <label>New Post :</label>
                                                      <select class="form-control show-tick" name="new">
                                                          <option selected disabled>--New Post--</option>
                                                          <option value="1" {{$product->new == 1 ? "selected" : "" }}>Yes</option>
                                                          <option value="0" {{$product->new == 0 ? "selected" : "" }}>No</option>
                                                      </select>
                                                    </div>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                              <div class="form-group">
                                                      <label>Papular Post :</label>
                                                      <select class="form-control show-tick" name="featured">
                                                          <option selected disabled>--Papular Post--</option>
                                                          <option value="1" {{$product->featured == 1 ? "selected" : "" }}>Yes</option>
                                                          <option value="0" {{$product->featured == 0 ? "selected" : "" }}>No</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                              <div class="form-group">
                                                    <div class="form-group">
                                                      <label>Post status :</label>
                                                      <select class="form-control show-tick" name="active">
                                                          <option selected disabled>--Select Status--</option>
                                                          <option value="1" {{$product->active == 1 ? "selected" : "" }}>Active</option>
                                                          <option value="0" {{$product->active == 0 ? "selected" : "" }}>Inactive</option>
                                                      </select>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                            
                                            
                                            
                                        
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-outline-light">Update Post</button>
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
                           
                            <div class="modal-dialog">
                            <div class="modal-content bg-secondary">
                                <div class="modal-header">
                                <h4 class="modal-title">View Post </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form class="add-contact-form" method="post" action="#" enctype="multipart/form-data">
                                @php
                                 $productdata=DB::table('products')
                                  ->join('categories','products.category_id','categories.id')
                                  ->where('products.id',$item->id)
                                  ->select('products.*','categories.category_name')
                                  ->first();
                                 
                                @endphp
                                    <!-- <input type="hidden" name="id" value="{{$item->id}}" > -->
                                    <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Category Name :</strong>
                                            <p>{{$productdata->category_name}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Title :</strong>
                                            <p>{{$productdata->product_name}}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Regular Price :</strong>
                                            <p>{{$productdata->regular_price}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Bidding Start Price :</strong>
                                            <p>{{$productdata->starting_bidding_amount}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong>Bidding End Date :</strong>
                                            <p>{{$productdata->bidding_end_date}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Status  :</strong>
                                            @if($productdata->active==1)
                                            <p>
                                              <span class="right badge badge-success">Active</span>
                                            </p>
                                            @else
                                            <p>
                                              <span class="right badge badge-success">Inactive</span>
                                            </p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <strong>Description :</strong>
                                            <p>{{$productdata->details}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Image :</strong>
                                            <img src="{{asset($productdata->image)}}" alt="" style=" height: 50px; width: 50px;">
                                        </div>
                                        
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

<!-- branch add model start --> 
  <div class="modal fade" id="branch-info">
        <div class="modal-dialog" >
          <div class="modal-content  bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Create New Post </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="add-contact-form" method="post" action="{{ route('company-product.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Post Title  :</label>
                          <input type="text" class="form-control" placeholder="Enter post title" name="product_name" value="{{old('product_name')}}" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Select Category :</label>
                        <select class="form-control show-tick" name="category_id">
                            <option selected disabled>--Select Category--</option>
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}" {{ old('id') == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Regular price  :</label>
                          <input type="text" class="form-control" placeholder="Enter regular price" name="regular_price" value="{{old('regular_price')}}" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label>Starting bidding price   :</label>
                            <input type="text" class="form-control" placeholder="Enter starting bidding price" name="starting_bidding_amount" value="{{old('starting_bidding_amount')}}" />
                        </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Bidding end date  :</label>
                          <input type="date" class="form-control" placeholder="Enter regular price" name="bidding_end_date" value="{{old('bidding_end_date')}}" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label>Image   :</label>
                            <input type="file" class="form-control" name="image"  />
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                        <label> Description  :</label>
                        <textarea class="form-control" placeholder="Enter description...." rows="5" name="details" >{{old('details')}}</textarea>
                  </div>


                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                      <div class="form-group">
                              <label>New Post :</label>
                              <select class="form-control show-tick" name="new">
                                  <option selected disabled>--New Post--</option>
                                  <option value="1" {{old("new") == 1 ? "selected" : "" }}>Yes</option>
                                  <option value="0" {{old("new") == 0 ? "selected" : "" }}>No</option>
                              </select>
                            </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                      <div class="form-group">
                              <label>Papular Post :</label>
                              <select class="form-control show-tick" name="featured">
                                  <option selected disabled>--Papular Post--</option>
                                  <option value="1" {{old("featured") == 1 ? "selected" : "" }}>Yes</option>
                                  <option value="0" {{old("featured") == 0 ? "selected" : "" }}>No</option>
                              </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                            <div class="form-group">
                              <label>Post status :</label>
                              <select class="form-control show-tick" name="active">
                                  <option selected disabled>--Select Status--</option>
                                  <option value="1" {{old("active") == 1 ? "selected" : "" }}>Active</option>
                                  <option value="0" {{old("active") == 0 ? "selected" : "" }}>Inactive</option>
                              </select>
                            </div>
                        </div>
                    </div>
                  </div>
                    
                    
                    
                
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Save Post</button>
                </div>
            </form>  
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- branch add model end --> 



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

<script>
$('input[name=toogle]').change(function(){
   var mode = $(this).prop('checked');
   var id = $(this).val();
   //alert(id);
   $.ajax({
       url:"{{ route('company.product.status')}}",
       type:"POST",
       data:{
           _token:'{{csrf_token()}}',
           mode:mode,
           id:id,
       },
       success:function(response){
           console.log(response.status);

       }
   })
});
</script>

<script>
$('input[name=new]').change(function(){
   var mode = $(this).prop('checked');
   var id = $(this).val();
   //alert(id);
   $.ajax({
       url:"{{ route('company.new.status')}}",
       type:"POST",
       data:{
           _token:'{{csrf_token()}}',
           mode:mode,
           id:id,
       },
       success:function(response){
           console.log(response.status);

       }
   })
});
</script>

<script>
$('input[name=featured]').change(function(){
   var mode = $(this).prop('checked');
   var id = $(this).val();
   //alert(id);
   $.ajax({
       url:"{{ route('company.featured.status')}}",
       type:"POST",
       data:{
           _token:'{{csrf_token()}}',
           mode:mode,
           id:id,
       },
       success:function(response){
           console.log(response.status);

       }
   })
});
</script>


@endsection