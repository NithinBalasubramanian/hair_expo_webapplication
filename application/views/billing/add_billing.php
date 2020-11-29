<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Bill</h1>
  
 
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Bill Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="row col-md-12">
        <div class="col-md-3">
            <label>Invoice Number</label>
            <input type="text" name="invoice_no" class="form-control">
        </div>
        <div class="col-md-3">
            <label>Date</label>
            <?php $date = date('Y-m-d'); ?>
            <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
        </div>
        <div class="col-md-6">
             <label>Sales Person</label>
            <select class="form-control">
                <option>Sales Person</option>
                <?php $sales=$this->Admin_model->table_column('employee');
                if(count($sales) > 0)
                {
                    foreach($sales as $row_sales)
                    { ?>
                        <option value="$row_sales['id']"><?php echo $row_sales['employee_name']; ?></option>
              <?php }
                }
                
                ?>
            </select>
        </div>
         <div class="radio col-md-12" style="margin-top:20px;">
            <label style="margin-right: 13px;"><input type="radio" id="non_gst" name="gst" style="margin-right:10px;" checked value="1" >Non GST</label>
            <label style="margin-right:10px;"><input type="radio" id="gst" name="gst" style="margin-right:10px;" value="2">GST</label>
        </div>
        <div class="col-md-12 row">
            <div class="col-md-6">
                <label>Customer Number</label>
                <input type="text" name="customer_no" placeholder="Customer Number" class="form-control cus_no" >
            </div>
            <div class="col-md-6">
                <label>Customer Name</label>
                <select class="form-control cus_name" >
                    <option>Customer Name</option>
                    <?php $cus=$this->Admin_model->table_column('customer');
                    if(count($cus) > 0)
                    {
                        foreach($cus as $cus_row)
                        { ?>
                          <option value="<?php $cus_row['id']; ?>"><?php echo $cus_row['customer_name']; ?></option>  
                  <?php }
                    }
                    
                    
                    ?>
                </select>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>

</div>

</div>
<?php $this->load->view('include/footer');?>
<script>
    $(document).on('click','.cus_no',function(){
        var cus_no= $(this).val();
        var base_url="<?php echo base_url(); ?>";
        $.ajax({
            url:base_url+"Admin/customer_no",
            type:'POST',
            data:'cus_no='+cus_no,
            success:function(data)
            {
                $('.cus_name').html(data);
            }
        });
    });
</script>
