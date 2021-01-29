@extends('Admin.layouts.app')

@section('title', 'Create Box')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Box
        <small>Meter Your Manage Box</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-archive"></i> Manage Box</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Box Table</h3>
                        <a href="{{ Route('Create-Box') }}" class="btn btn-success" style="float: right">Create Box</a>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table class="table table-bordered">
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Value</th>
                            <th>Creator</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                          @if($box->count() > 0)
                          @php
                          $i =1;
                        @endphp
                        @foreach($box as $boxes)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $boxes->name }}</td>
                            <td>{{ $boxes->value }}</td>
                            <td>{{ $boxes->users->name }}</td>
                            <td  width="70">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ Route('Box-Edit',$boxes->id) }}" >
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <form method="POST" action="{{ Route('Box-delete',$boxes->id) }}">
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
                                <td colspan="5" class="text-center" style="font-size:30px;">No Boxes Yet</td>
                            </tr>
                        @endif

                        </table>
                      </div>

                      <!-- /.box-body -->
                      <div class="box-footer clearfix">
                        {{ $box->links() }}
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
