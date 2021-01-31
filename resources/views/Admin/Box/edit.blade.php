@extends('Admin.layouts.app')

@section('title', 'Box Edit')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Box
        <small>Meter Your Edit Box</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-archive"></i> Manage Box</a></li>
        <li><a href="#"><i class="fa fa-archive"></i> Edit Box</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
                          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <form action="{{ Route('Box-Update',$Boxes->id) }}" method="POST">
              @csrf

              <div class="box-body">
                <div class="form-group">
                  <label>Box</label>
                  <input type="text" class="form-control" placeholder="Enter Box Name" value="{{ $Boxes->name }}" name="name" required>
                </div>
                <div class="form-group">
                  <label>Value</label>
                  <input type="number" class="form-control" name="value" value="{{ $Boxes->value }}" placeholder="Box Value" required >
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
