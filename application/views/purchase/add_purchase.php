<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Purchase</h1>
  
  <!--<a href="<?php echo base_url();?>index.php/View/customer/list_customer" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Customers</a>-->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Purchase Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url(''); ?>Purchase/purchase/purchase/add_purchase/print_purchase" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="row">
				        <div class="form-group col-md-3">
                  <label for="inputEmail3" class="col-sm-12 control-label">Purchase Invoice No: *</label>
                  <div class="col-sm-12">
                    <input type="text" name= "purchase_invoice_no" id="" class="form-control" id="inputEmail3" placeholder="Purchase Invoice No" required>
                    <input type="hidden" name= "status" value="1">
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail3" class="col-sm-6 control-label">Date : *</label>
                  <div class="col-sm-12">
                      <?php $date = date('Y-m-d'); ?>
                    <input type="date" name= "date" id="" class="form-control" id="inputEmail3"maxlength="10" value="<?php echo $date; ?>">
                  </div>
                </div>
              </div>
              <div class="container">
              <!--<div class="table-responsive">-->
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                          <th>S.No</th>
                          <th>Category</th>
                          <th>Products</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                          <th>Action</th>
                          </tr>
                      </thead>
                      <tbody class="append">
                          <tr>
                              <input type="hidden" value="1" class="count">
                              <td style="width: 5%;"><input type="text" value="1" class="form-control" readonly></td>
                              <td style="width: 20%;">
                               <select class="form-control product_type product_type_1" name="category[]" >
                                  <option value="ext">Existing Product</option>
                                  <option value="new">New Product</option>
                              </select></td>
                              <td style="width: 20%;" >
                                <select class="form-control existing existing_1" name="product_id[]">
                                  <option>Select Product</option>
                                  <?php $pro=$this->Admin_model->table_column('product');
                                  if(count($pro) > 0)
                                  {
                                      foreach($pro as $pro_row)
                                      { ?>
                                        <option value="<?php echo $pro_row['id']; ?>"><?php echo $pro_row['product_name']; ?></option>  
                                <?php }
                                  }
                                  
                                  ?>
                              </select>
                              <input type="text" class="form-control new_pro new_pro_1" name="product_name[]" style="display:none;"placeholder="Product Name"></td>
                              
                              <td><input type="text" class="form-control price_1 price" name="price[]"></td>
                              <td><input type="text" class="form-control qty qty_1" name="quantity[]"></td>
                              <td><input type="text" class="form-control total_1 total" name="total[]"></td>
                              <td><button type="button" class="btn btn-primary  btn-flat addCF"><i class="fa fa-plus-circle " aria-hidden="true"></i></td>
                          </tr>
                          <!--<?php $i++; ?>-->
                      </tbody>
                      <tbody>
                          <tr>
                              <td colspan="4"></td>
                              <td>Grand total</td>
                              <td><input type="text" class="form-control grand_total" name="grand_total"><input type="hidden" class="grand_hidden form-control" value="0"></td>
                          </tr>
                      </tbody>
                  </table>
              <!--</div>-->
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm" style="float:right;">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>

</div>
<?php $this->load->view('include/footer');?>
<script>
    $(document).on('change','.product_type',function(){
        var val = $(this).val();
        if(val == 'new'){
            $(this).parent().next().find('.new_pro').css('display','block');
            $(this).parent().next().find('.existing').css('display','none');
        }else{
            $(this).parent().next().find('.existing').css('display','block');
            $(this).parent().next().find('.new_pro').css('display','none');
        }
    });
    $(document).on('keyup','.qty',function(){
        var price = $(this).parent().prev().children().val();
        var qty = $(this).val();
        var total = price*qty;
        $(this).parent().next().children().val(total);
         var count = Number($('.count').val());
        var grand_hidden =Number($('.grand_hidden').val());
        var grand_total = total+grand_hidden;
        $('.grand_total').val(grand_total);
        
    });
</script>
<script>
    $(document).on('click','.addCF',function(){
        var grand_total = $('.grand_total').val();
        $('.grand_hidden').val(grand_total);
        var count = Number($('.count').val());
        var pres_count = count+1;
        $('.append').append('<tr><input type="hidden" value="1" class="count"><td style="width: 5%;"><input type="text" value="1" class="form-control" readonly></td><td style="width: 20%;"><select class="form-control product_type product_type_1" name="category[]" ><option value="ext">Existing Product</option><option value="new">New Product</option></select></td><td style="width: 20%;" ><select class="form-control existing existing_1" name="product_id[]"><option>Select Product</option><?php $pro=$this->Admin_model->table_column('product');if(count($pro) > 0){foreach($pro as $pro_row){ ?><option value="<?php echo $pro_row['id']; ?>"><?php echo $pro_row['product_name']; ?></option><?php } } ?></select><input type="text" class="form-control new_pro new_pro_1" name="product_name[]" style="display:none;"placeholder="Product Name"></td><td><input type="text" class="form-control price_1 price" name="price[]"></td><td><input type="text" class="form-control qty qty_1" name="quantity[]"></td><td><input type="text" class="form-control total_1 total" name="total[]"></td><td><a href="javascript:void(0);" class="Remove col-sm-1"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button> </a></td></tr>');
        $('.count').val(pres_count);
    });
</script>
<script>
    $(document).on('click','a.Remove',function(){
        var count = $('.count').val();
       var total = $(this).parent().prev().children().val();
       var grand_total = $('.grand_total').val();
       var now=grand_total-total;
       $('.grand_total').val(now);
       $(this).parent().parent().remove();
       $('.count').val(count-1);
    });
</script>
