<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Register</h1>
 
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Register Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Insert_order/register/add_register'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
              <div class="radio">
                <label style="margin-right: 13px;"><input type="radio" id="already_id" name="member" value="1" checked style="margin-right:10px;" >Already a Member</label>
                <label style="margin-right:10px;"><input type="radio" id="new_id" name="member" value="2" style="margin-right:10px;">New Member</label>
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">Contact: *</label>

                  <div class="col-sm-12">
                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact" required>
                  </div>
                </div>
                <div class="form-group col-md-6" id="already">
                <label for="inputEmail3" class="col-sm-6 control-label">Name : *</label>
                <div class="col-sm-12">
                  <select class="form-control" name="customer_id" id="customer_id" >
                  <option value="">Select Your Name</option>
                  <?php $name=$this->Admin_model->table_column('customer');
                  if(count($name) > 0)
                  {
                      foreach($name as $row_name)
                      { ?>
                        <option value="<?php echo $row_name['id']; ?>"><?php echo strtoupper($row_name['customer_name']); ?></option>
                <?php }
                  }
                  ?>
                  </select>
                  </div>
                </div>
                <div class="form-group col-md-6" id="new" style="display:none;">
                <label for="inputEmail3" class="col-sm-6 control-label">Name: *</label>

                  <div class="col-sm-12">
                    <input type="text" name="customer_name" id="" class="form-control" id="inputEmail3" placeholder="Name" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">Email (optional): </label>

                  <div class="col-sm-12">
                    <input type="text" name="email" id="email" class="form-control"  placeholder="Email" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">Service : *</label>
                <div class="col-sm-12">
                  <select class="form-control" name="service_id">
                  <option value="">Choose Service</option>
                  <?php $name=$this->Admin_model->table_column('service');
                  if(count($name) > 0)
                  {
                      foreach($name as $row_name)
                      { ?>
                        <option value="<?php echo $row_name['id']; ?>"><?php echo strtoupper($row_name['service_type']); ?></option>
                <?php }
                  }
                  ?>
                  </select>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="form-group col-md-6">
                    <label for="inputEmail3" class="col-sm-6 control-label">Date : </label>

                    <div class="col-sm-12">
                      <input type="date" name= "date" id="" class="form-control" id="inputEmail3" placeholder="Date" >
                    </div>
                  </div>
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Time : </label>

                  <div class="col-sm-12">
                    <input type="time" name= "time" id="" class="form-control" id="inputEmail3" placeholder="Time" >
                  </div>
                </div>
                
                </div>
              </div>

              

              <!-- /.box-body -->
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
$(document).on('click','#new_id',function(){
    $('#already').css('display','none');
    $('#new').css('display','block');
});
$(document).on('click','#already_id',function(){
    $('#already').css('display','block');
    $('#new').css('display','none');
});
$(document).on('change','#customer_id',function(){
   var val = $(this).val();
   var base_url="<?php echo base_url(); ?>";
  $.ajax({
    url:base_url+"Admin/get_details",
    type:'POST',
    dataType:'json',
    data:{
      'id':val,
      'tablename':'customer'
    },
    success:function(data)
    {
      $('#email').val(data.email);
      $('#contact').val(data.contact);
    }
  });
});
$(document).on('keyup','#contact',function(){
    var contact = $(this).val();
    var base_url="<?php echo base_url(); ?>";
  $.ajax({
    url:base_url+"Admin/get_name",
    type:'POST',
    data:{
      'contact':contact,
      'tablename':'customer'
    },
    success:function(data)
    {
      $('#customer_id').html(data);
    }
  });
});
</script>
