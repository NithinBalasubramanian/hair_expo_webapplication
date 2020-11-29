<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/popup.php'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Purchase Report </h1>
 
 </div>

<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List Purchase Report Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
         <div class="row col-md-12" style="margin-bottom:20px;">
     <div class="col-md-4">
         From :
         <?php $from = date('Y-m-01'); ?>
         <input type="date" class="form-control from" value="<?php echo $from; ?>" id="min">
     </div>
     <div class="col-md-4">
         To :
         <?php $to = date('Y-m-t'); ?>
         <input type="date" class="form-control to" value="<?php echo $to; ?>" id="max">
     </div>
 </div>
 
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>Invoice Number</th>
                  <th>Date</th>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Grand Total</th>
                  <th>Print</th>
                </tr>
                </thead>
                <tbody id="sales_reports">
                <?php $invoice = $this->Admin_model->table_column_desc($tablename='purchase');
				if(count($invoice) >0) {
                $i=1;
                $inv = '1';
				foreach($invoice as $row){ 
				    if($inv != $row['purchase_invoice_no']){
				?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <td><?php echo $row['purchase_invoice_no']; ?></td>
                  <td><?php echo $row['date']; ?></td>
				<?php $customer = $this->Admin_model->table_column('product','id',$row['product_id']);
				foreach($customer as $row_1){ ?>
                  <td><?php echo strtoupper($row_1["product_name"]); ?></td>
                  <?php } ?>
                 
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                  <td><?php echo $row['grand_total']; ?></td>

                 <td><a href="<?php echo base_url();?>View/purchase/pos_purchase/<?php echo $row['purchase_invoice_no'];?>"  class="btn btn-primary btn-sm">POS Print</a><br>
                 <a href="<?php echo base_url();?>View/purchase/print_purchase/<?php echo $row['purchase_invoice_no'];?>"  class="btn btn-sm btn-success">Invoice Print</a>
                </td>
                  <!-- <a href="<?php echo base_url();?>Admin/delete/customer/customer/<?php echo $row['id'];?>/list_customer" class=""><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td> -->
       <?php $i++; $inv = $row['purchase_invoice_no']; } } ?>
        <?php } ?>
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>

</div>

</div>
<script>
  function pop_function(){
    document.querySelector('#pop_up').style.display='block';
  }
</script>
<?php $this->load->view('include/footer');?>
<script>
$(document).on('click','.remove',function(){
  var base_url="<?php echo base_url(); ?>";
  $.ajax({
    url:base_url+"Admin/delete_list",
    type:'POST',
    dataType:'json',
    data:{
      'id':$(this).attr("data-rowid"),
      'tablename':'customer'
    },
    success:function(data)
    {

    }
  });
  
  $(this).parent().parent().parent().remove();
});
</script>
<script>
              $('#min, #max').change(function () {
                    var min = $('#min').val();
                    var max = $('#max').val();
                    var table='purchase';
                    var base_url = "<?php echo base_url(); ?>";
                    
                    $.ajax({
                    url: base_url+'Admin/date_purchase',
                    type: 'POST',
                    data: "min=" + min + "&max=" + max + "&table=" + table ,
                    success: function(data) {
                        $('#sales_reports').html(data);
                    }
                });
                });
                $('#min, #max').trigger('change');
</script>











