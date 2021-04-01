@extends('Admin.layouts.app')

@section('title', 'Invoice Manager')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice Manager
        <small>Meter Your Invoice Manager</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file-text-o"></i> Invoice Manager</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Invoice Manager</h3>
              </div>
            <!-- form start -->
              <div class="box-body">

                <table class="table table-bordered">
                    <tr>
                      <th >#</th>
                      <th>Invoices</th>
                      <th>Customer</th>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Creator</th>
                      <th>Created_at</th>
                      <th >Action</th>
                    </tr>
                    @php
                     $i =1;
                    @endphp
                    @foreach ($invoice as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->invoices }}</td>
                        <td>
                            <div style="cursor:pointer;" data-toggle="modal" data-target="#myModal-{{ $item->customer_party->id }}">{{ $item->customer_party->name }}</div>
                            <!--MODAL -->
                        <div class="modal fade" id="myModal-{{ $item->customer_party->id }}" role="dialog">
                            <div class="modal-dialog">
                            <!-- MODAL content -->
                            <div class="modal-content" >
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Customer: </h4>
                        </div>

                        <div class="modal-body" style="padding-top:0">
                                <center>
                                    <table class="table">
                                <thead class="failed-header">
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                </thead>
                                <tr>
                                    <td>{{ $item->customer_party->name }}</td>
                                    <td>{{ $item->customer_party->company_name }}</td>
                                    <td>{{ $item->customer_party->phone }}</td>
                                    <td>{{ $item->customer_party->address }}</td>
                                </tr>
                            </tbody>
                        </center>
                        </table>
                        </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
<!-- /. modal content-->
                        </td>
                        <td>{{ $item->amount }} - PKR</td>
                        <td>
                        @if ($item->type == 'in')
                        Gate in Pass
                        @elseif($item->type == 'out')
                        Gate out Pass
                        @endif
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>{{ date_format($item->created_at, 'jS M Y') }}</td>
                        <td>{{ $item->users->name }}</td>
                        <td><div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Details</a></li>
                              <li><a href="#">Edit</a></li>
                            </ul>
                          </div></td>
                    </tr>
                    @endforeach
                  </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">


              </div>
{{ $invoice->links() }}
          </div>
          <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
@endsection
