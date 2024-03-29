@extends('Admin.layouts.app')

@section('title', 'Create Box')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Box
        <small>Meter Your Create Box</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-archive"></i> Create Box</a></li>
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
            <form action="{{ Route('Store-Box') }}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Box</label>
                  <input type="text" class="form-control" placeholder="Enter Box Name" name="name" tabindex="1" required>
                </div>
                <div class="form-group">
                  <label>Value</label>
                  <input type="number" class="form-control" name="value" placeholder="Box Value" tabindex="2" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" tabindex="3" class="btn btn-primary col-xs-12">Create</button>
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
