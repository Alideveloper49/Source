@extends('Admin.layouts.app')

@section('title', 'Add GIP')
<style>

#master {display: none;}
</style>
@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add  GIP
        <small>Meter Your Add  GIP</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file-text-o"></i> Add GIP</a></li>
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
            <form action="" method="POST">
              @csrf

              <div class="box-body">
                <div class="form-group">
                    <label>Customer</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Selected</option>
                      @foreach ($Customer as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                </div>
                <input type="button" value="Add New" id="add" class="btn btn-primary" />
                <table class="table table-bordered">
                    <thead>
                      <tr>

                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Amount</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="master">

                        <td><input type="text" class="Product form-control" /></td>
                        <td><input type="text" class="Quantity form-control" /></td>
                        <td><input type="text" class="Rate form-control" /></td>
                        <td><input type="text" class="Amount form-control" /></td>
                        <td><input type="button" value="&times;" class="del btn btn-danger" /></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>

                        <th><span id="total_qty">0</span> Items</th>
                        <th></th>
                        <th colspan="3"><span id="total_amt">0</span> Pkr</th>

                      </tr>
                    </tfoot>
                  </table>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary col-xs-12">Create</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>

  <script>
    // Execute once document is ready.
$(function () {
// Execute when the #add button is clicked.
$("#add").click(function () {
// Clone the #master, remove the id from the clone and append it to body.
$("#master").clone().removeAttr("id").appendTo("tbody");
});
// Attach a click event handler on table, which listens for clicks on .del.
$("table").on("click", ".del", function () {
// Remove the parent TR tag completely from DOM.
$(this).closest("tr").remove();
});
// Attach input change event handler on table, which listens for clicks on input.
$("table").on("input", "input", function () {
// For every row...
$("tbody tr").each(function () {
  // Cache the value of the current row.
  $this = $(this);
  // Do this only if this is not the master row.
  if (this.id != "master")
    // Set the value of .Amount here (making sure you set it to integer multiplying two values).
    $this.find(".Amount").val(+$this.find(".Quantity").val() * +$(this).find(".Rate").val());
  // Set the totals to 0.
  $("#total_amt, #total_qty").text(0);
  // For every .Amount, collect the values and sum it and add it to #total_amt unless it's empty.
  $(".Amount").each(function () {
    if (this.value != "")
      $("#total_amt").text(parseInt($("#total_amt").text()) + parseInt($(this).val()));
  });
  // For every .Quantity, collect the values and sum it and add it to #total_qty unless it's empty.
  $(".Quantity").each(function () {
    if (this.value != "")
      $("#total_qty").text(parseInt($("#total_qty").text()) + parseInt($(this).val()));
  });
});
});
});
</script>
  <!-- /.content-wrapper -->
@endsection
