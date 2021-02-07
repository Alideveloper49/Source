<div class="modal" id="modal-add-product">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Gate In Pass</h4>
        </div>
        <div class="modal-body">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Product">Product</label>
                    <input type="text" class="form-control required" tabindex="2" name="product" id="product" value="{{old('product') }}"  placeholder="Enter Product name" >
                    <p class="product-error"></p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="Product">Quantity</label>
                    <input type="text" class="form-control required" tabindex="3" name="qty" id="qty" placeholder="Enter Quantity  " >
                    <p class="qty-error"></p>
                </div>
            </div>
            <div class="col-md-2 ">
                <div class="form-group">
                    <label for="Product">Rate</label>
                    <input type="text" class="form-control required" tabindex="4" name="rate" id="rate" placeholder="Enter Rate  " >
                    <p class="rate-error"></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Product">Type Pass</label>
                    <select name="type" id="type" class="form-control required" tabindex="5" >
                        <option value="">Select</option>
                        <option value="in">Gate In Pass</option>
                        <option value="out">Gate Out Pass</option>
                    </select>
                    <p class="type-error"></p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea name="desc" cols="30" rows="5" tabindex="6" id="desc" class="form-control" placeholder="Enter Description" ></textarea>
                    <p class="desc-error"></p>
                </div>
            </div>
        </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
          <button type="submit" id="submit"  tabindex="7" name="action" value="add"  class="btn btn-primary button-prevent-multiple-submits">Save Pass</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<script>
    var num = /^[0-9-+]+$/;
    $("#product").keyup(function(){
        var product = $.trim($("#product").val());
        if(product.length == ""){
            $(".product-error").html("Product is Required!");
            $("#product").addClass("border-red");
            $("#product").removeClass("border-green");
            $("#submit").css({ "pointer-events": "none", "cursor": "not-allowed", "color": "black", "background-color": "#ccc", "border": "solid 1px #888", "text-shadow": "1px 1px 1px #fff" });
            product = "";
        }else{
            $(".product-error").html("");
            $("#product").addClass("border-green");
            $("#submit").css({ "pointer-events": "", "cursor": "", "color": "", "background-color": "", "border": "", "text-shadow": "" });
            $("#product").removeClass("border-red");
            product = product;
        }
    });

    $("#desc").keyup(function(){
        var desc = $.trim($("#desc").val());
        if(desc.length == ""){
            $(".desc-error").html("Description is Required!");
            $("#desc").addClass("border-red");
            $("#desc").removeClass("border-green");
            $("#submit").css({ "pointer-events": "none", "cursor": "not-allowed", "color": "black", "background-color": "#ccc", "border": "solid 1px #888", "text-shadow": "1px 1px 1px #fff" });
            desc = "";
        }else{
            $(".desc-error").html("");
            $("#desc").addClass("border-green");
            $("#submit").css({ "pointer-events": "", "cursor": "", "color": "", "background-color": "", "border": "", "text-shadow": "" });
            $("#desc").removeClass("border-red");
            desc = desc;
        }
    });


    $("#qty").keyup(function () {
    var qty = $.trim($("#qty").val());

    if (qty.length == "") {
      $(".qty-error").html("Quantity is Required!");
      $("#qty").addClass("border-red");
      $("#qty").removeClass("border-green");
      qty = "";
    } else if (num.test(qty)) {
      $(".qty-error").html("");
      $("#qty").addClass("border-green");
      $("#submit").css({ "pointer-events": "", "cursor": "", "color": "", "background-color": "", "border": "", "text-shadow": "" });
      $("#qty").removeClass("border-red");
      qty = qty;
    } else {
      $(".qty-error").html("Integer is not Allowed!");
      $("#qty").addClass("border-red");
      $("#submit").css({ "pointer-events": "none", "cursor": "not-allowed", "color": "black", "background-color": "#ccc", "border": "solid 1px #888", "text-shadow": "1px 1px 1px #fff" });
      $("#qty").removeClass("border-green");
      qty = "";
    }
  })

  $("#rate").keyup(function () {
    var rate = $.trim($("#rate").val());

    if (rate.length == "") {
      $(".rate-error").html("Rate is Required!");
      $("#rate").addClass("border-red");
      $("#rate").removeClass("border-green");
      rate = "";
    } else if (num.test(rate)) {
      $(".rate-error").html("");
      $("#rate").addClass("border-green");
      $("#submit").css({ "pointer-events": "", "cursor": "", "color": "", "background-color": "", "border": "", "text-shadow": "" });
      $("#rate").removeClass("border-red");
      rate = rate;
    } else {
      $(".rate-error").html("Integer is not Allowed!");
      $("#rate").addClass("border-red");
      $("#submit").css({ "pointer-events": "none", "cursor": "not-allowed", "color": "black", "background-color": "#ccc", "border": "solid 1px #888", "text-shadow": "1px 1px 1px #fff" });
      $("#rate").removeClass("border-green");
      rate = "";
    }
  })
  $("#type").on('focus change', function(){
      var type = $('#type').val();
      if (!$('#type')[0].value) {
        $(".type-error").html("Rate is Required!");
        $("#type").addClass("border-red");
        $("#type").removeClass("border-green");
        } else {
        $(".type-error").html("");
        $("#type").removeClass("border-red");
        $("#type").addClass("border-green");
        }
  });



</script>
