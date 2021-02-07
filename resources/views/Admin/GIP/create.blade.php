@extends('Admin.layouts.app')

@section('title', 'Add GIP && GOP')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add GIP && GOP
        <small>Meter Your Add GIP && GOP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file-text-o"></i> Add GIP && GOP</a></li>
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
                <input type="button" value="Add New" tabindex="1" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-product" data-target=".bs-example-modal-lg"/>
              </div>
            <!-- form start -->
              <div class="box-body">
                <table class="" style="width: 100%;">
                    <thead>
                      <tr>

                        <th>Product</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <td align="right"><b>Amount</b></td>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($gate_pass as $item)
                        <tr style="border-top: 1px dotted black;">
                            <td>{{ $item->product }}</td>
                            <td>{{ $item->desc }}</td>
                            <td>
                                @if ($item->type == 'in')
                                    Gate in Pass
                                @elseif($item->type == 'out')
                                Gate out Pass
                                @endif
                            </td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->rate }}</td>
                            <td align="right">{{ $item->amount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <td>Saved in draft</td>
                          <td colspan="5" align="right">
                            <h4><span id="total_qty">{{ $qty }}</span> Items</h4>
                            <h4><span id="total_amt">{{ $amount }}</span> Pkr</h4>
                          </td>
                      </tr>
                    </tfoot>
                  </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <form action="{{ Route('Delete-GTP',['type' => 'in', 'node' => '0']) }}" method="POST">
                    @csrf

                    @method('Delete')
                <button type="submit" class="btn btn-warning col-xs-5   " onclick="return confirm('Are you sure you want to Remove this data without saving ?');">Clear</button>
            </form>
                <button type="submit" class="btn btn-success  col-xs-5 " style="float: right;" data-toggle="modal" data-target="#modal-add-invoice" data-target=".bs-example-modal-lg">Saving option</button>
              </div>

          </div>
          <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <form method="POST" action="{{ route('Store-GIP') }}" id="add_prod_form">
    @csrf
  @include('Admin.GIP.add-popup')
  @include('Admin.GIP.invoice-popup')
  </form>
  <!-- /.content-wrapper -->
@endsection
