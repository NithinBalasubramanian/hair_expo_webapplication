<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/popup.php'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Service Invoice </h1>
  
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List Service Invoice Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="row col-md-12" style="margin-bottom:20px;">
        <div class="col-md-4">
            From :
            <?php $date=date('Y-m-01'); ?>
            <input type="date" class="form-control" id="from" value="<?php echo $date; ?>">
        </div>
        <div class="col-md-4">
            To :
            <?php $date=date('Y-m-t'); ?>
            <input type="date" class="form-control" id="to" value="<?php echo $date; ?>">
        </div>
    </div>
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>Invoice Number</th>
                  <th>Customer Name</th>
                  <th>Bill Type</th>
                  <th>Contact</th>
                  <th>Print</th>
                </tr>
                </thead>
                <tbody id="display">
                <?php $invoice = $this->Admin_model->table_column_desc($tablename='invoice');
				if(count($invoice) >0) {
                $i=1;
                $inv = '1';
				foreach($invoice as $row){ 
				    if($inv != $row['invoice_no']){
				?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <td><?php echo $row['invoice_no']; ?></td>
				<?php $customer = $this->Admin_model->table_column('customer','id',$row['customer_name']);
				foreach($customer as $row_1){ ?>
                  <td><?php echo strtoupper($row_1["customer_name"]); ?></td>
                  <?php } ?>
                  <?php if($row['gst'] == '1'){ ?>
                  <td>GST</td>
                  <?php }else{ ?>
                   <td>Not GST</td>
                  <?php } ?>
                  <td><?php echo $row['contact']; ?></td>

                 <td><a href="<?php echo base_url();?>View/invoice/pos_invoice/<?php echo $row['invoice_no'];?>"  class="btn btn-primary btn-sm">POS Print</a><br>
                 <a href="<?php echo base_url();?>View/invoice/print_invoice/<?php echo $row['invoice_no'];?>"  class="btn btn-sm btn-success">Invoice Print</a>
                </td>
                  <!-- <a href="<?php echo base_url();?>Admin/delete/customer/customer/<?php echo $row['id'];?>/list_customer" class=""><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td> -->
       <?php $i++; $inv = $row['invoice_no']; } } ?>
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
   $('#from,#to').change(function(){
       var from = $('#from').val();
       var to = $('#to').val();
       var table = 'invoice';
       var base_url="<?php echo base_url(); ?>";
       $.ajax({
           url:base_url+"Admin/invoice_printing",
           type:'POST',
           data:'from='+from+'&to='+to+'&table='+table,
           success:function(data)
           {
               $('#display').html(data);
           }
       });
      
   });
    $('#from,#to').trigger('change');
</script>
