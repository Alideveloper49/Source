@extends('Admin.layouts.app')

@section('title', 'Edit Customer')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Customer & Party
        <small>Meter Your Customer & Party</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> Customer & Party</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form action="{{ Route('Customer-Update',$Customers->id) }}" method="POST">
              @csrf

              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Enter Box Name" value="{{ $Customers->name }}" name="name" required>
                </div>
                <div class="form-group">
                  <label>Company Name</label>
                  <input type="text" class="form-control" name="company_name" value="{{ $Customers->company_name }}" placeholder="Enter Customer Company Name" required>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ $Customers->phone }}" placeholder="Enter Phone Number" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" rows="5" placeholder="Enter Customer Address">{{ $Customers->address }}</textarea>
                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary col-xs-12">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
