<div class="modal" id="modal-add-invoice">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Gate In Pass</h4>
        </div>
        <div class="modal-body">


        <div class="row">
            <div class="col-lg-6">
                 <div class="form-group">
                            <label>Customer</label>
                            <select class="form-control select2" style="width: 100%;" name="customer" >
                              <option value="">Selected</option>
                              @foreach ($Customer as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                        </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="Product">Type Pass</label>
                    <select name="type2"  class="form-control "  >
                        <option value="">Select</option>
                        <option value="in">Gate In Pass</option>
                        <option value="out">Gate Out Pass</option>
                    </select>
                </div>
            </div>
        </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" name="action" value="invoice" class="btn btn-primary">Save invoice</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

