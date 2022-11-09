@extends('backend.superadmin.layouts.master')
@section('title')
Shipping Update
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipping Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Shipping update</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Shipping</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <form class="add-contact-form" method="post" action="{{ route('shipping.update',$shipping->id) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="within_10_days">Shipping Within 10 days Price</label>
                    <input type="text" id="within_10_days" class="form-control" name="within_10_days" value="{{$shipping->within_10_days}}">
                </div>
                <div class="form-group">
                    <label for="within_5_days">Shipping Within 5-7 days Price</label>
                    <input type="text" id="within_5_days" class="form-control" name="within_5_days" value="{{$shipping->within_5_days}}">
                </div>
                <div class="form-group">
                    <label for="within_2_days">Shipping Within 2-4 days Price</label>
                    <input type="text" id="within_2_days" class="form-control" name="within_2_days" value="{{$shipping->within_2_days}}">
                </div>
                <input type="submit" value="Update Shipping" class="btn btn-success float-right">
                </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

                       

@endsection

