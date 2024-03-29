@extends('Admin.layouts.app')

@section('title', 'Customer Manage')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Customer
        <small>Meter Your Manage Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-archive"></i> Manage Customer</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Customer Table</h3>
                        <a href="{{ Route('Create-Customer') }}" class="btn btn-success" style="float: right">Create Customer</a>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table class="table table-bordered">
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Creator</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                          @php
                          $i = 1;
                          @endphp
                          @if($Customer->count() > 0)
                          @foreach($Customer as $customers)
                          <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $customers->name }}</td>
                              <td>{{ $customers->company_name }}</td>
                              <td>{{ $customers->phone }}</td>
                              <td>{{ $customers->address }}</td>
                              <td>{{ $customers->users->name }}</td>
                              <td  width="70">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ Route('Customer-Edit',$customers->id) }}" >
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form method="POST" action="{{ Route('Delete-Customer',$customers->id) }}">
                                            @csrf

                                            @method('DELETE')

                                        <button type="submit" title="Delete" class="btn btn-xs btn-danger delete-row">
                                        <i class="fa fa-times " aria-hidden="true"></i>
                                        </button>
                                        </form>
                                    </div>
                                </div>
                                </td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                            <td colspan="7" class="text-center" style="font-size:30px;">No Customers Yet</td>
                          </tr>
                          @endif
                        </table>
                      </div>

                      <!-- /.box-body -->
                      <div class="box-footer clearfix">
                         {{ $Customer->links() }}
                      </div>
                    </div>


          <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
