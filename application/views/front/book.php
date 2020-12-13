<?php $this->load->view('front/include/header'); ?>
<?php $this->load->view('front/include/header_menu'); ?>

<section class="booking container mt-5 mb-5 bg-gray pb-5 pt-8" >
    <h1 class="text-center">Book Service </h1>
<form class="form-horizontal" action="<?php echo base_url(''); ?>Insert_order/register/Booking" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                 <div class="row">
              <div class="radio col-md-6" style="padding-left:30px;">
                <label style="margin-right: 13px;"><input type="radio" id="already_id" name="member" value="1" checked style="margin-right:10px;" >Already a Member</label>
                <label style="margin-right:10px;"><input type="radio" id="new_id" name="member" value="2" style="margin-right:10px;">New Member</label>
                </div>
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
                
              <div class="col-md-6 row">
              <div class="form-group col-md-6">
                    <label for="inputEmail3" class="col-sm-7 control-label">Date : </label>

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
                <div class="col-md-6">
                </div>
              </div>
                </div>
              </div>
              <div class="row add_more col-md-12">
              <div class="form-group col-md-6 row">
                <label for="inputEmail3" class="col-sm-6 control-label">Service : *</label>
                <div class="col-sm-8">
                  <select class="form-control" name="service_id[]">
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
                <a href="javascript:void(0);" class="addCF col-sm-1 ">
                  <button type="button" style="" id="btn1" class="btn btn-info btn-flat add"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                  </button> 
                </a>
                </div>
                </div>

              

              <!-- /.box-body -->
                <input type="submit" class="btn akame-btn active" style="float:right;" value="Book">
              <!-- /.box-footer -->
            </form>
</section>

<?php $this->load->view('front/include/footer'); ?>
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
$(document).ready(function(){
	$(".addCF").click(function(){
    $(".add_more").append(' <div class="form-group col-md-8 row"><label for="inputEmail3" class="col-sm-6 control-label">Service : *</label><div class="col-sm-8"><select class="form-control" name="service_id[]"><option value="">Choose Service</option><?php $name=$this->Admin_model->table_column('service');if(count($name) > 0){foreach($name as $row_name){ ?><option value="<?php echo $row_name['id']; ?>"><?php echo strtoupper($row_name['service_type']); ?></option><?php }}?></select></div><a href="javascript:void(0);" class="Remove col-sm-1 "><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button> </a></div></div>');
    });
});
$(document).on('click', "a.Remove", function() { 
    $(this).parent().remove();
});
</script>
