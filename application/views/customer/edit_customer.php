<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Customer</h1>
  <a href="<?php echo base_url();?>index.php/View/customer/list_customer" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Customers</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Customer Form</h6>
      
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Update_all/customer/customer/'.$edit_id.'/edit_customer/list_customer'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <?php $customer=$this->Admin_model->table_column($tablename='customer',$column='id',$val=$edit_id);
                if(count($customer)>0){
                    foreach($customer as $customer_row){?>
                 <div class="row">
               
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Customer Name : *</label>
                  <div class="col-sm-12">
                    <input type="text" name="customer_name" id="" class="form-control" id="inputEmail3" placeholder="Customer Name" value="<?php echo $customer_row['customer_name']; ?>" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Contact : *</label>
                  <div class="col-sm-12">
                    <input type="text" name= "contact" id="" class="form-control" id="inputEmail3" value="<?php echo $customer_row['contact']; ?>" required>
                  </div>
                </div>
               
              </div>
              
              <div class="row">
              
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Email : </label>
                  <div class="col-sm-12">
                    <input type="email" name= "email" id="" class="form-control" id="inputEmail3" value="<?php echo $customer_row['email']; ?>">
                  </div>
                </div>
              </div>
              
                <?php } } ?>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Update</button>
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
  function display_gst(){
    document.getElementById("gst_disp").style.display='block';
  }
  function hide_gst(){
    document.getElementById("gst_disp").style.display='none';
  }
</script>