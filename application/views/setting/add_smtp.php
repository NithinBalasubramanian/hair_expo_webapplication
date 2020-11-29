<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add SMTP</h1>
  
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add SMTP Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Edit_smtp/smtp/setting/add_smtp'); ?>" method="post" enctype="multipart/form-data" >
    
    <?php $profile=$this->Admin_model->table_column('smtp');
    if(count($profile) > 0)
    {
        foreach($profile as $row)
        { ?>
            <div class="box-body">
                <div class="row">
                 <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Status:</label>
                  <div class="col-sm-12">
                  <label class="switch">
                        <input type="checkbox" class="remove" data-rowid="<?php echo $row['id']; ?>" value="<?php echo $row['status']; ?>" <?php if($row['status'] != 0){ ?>
                            checked
                        <?php  } ?>>
                        <span class="slider round"></span>
                 </label>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">SMTP Port : </label>
                  <div class="col-sm-12">
                    <input type="text" name= "port" id="" class="form-control" id="inputEmail3" value="<?php echo $row['port']; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">SMTP Host : </label>
                  <div class="col-sm-12">
                    <input type="text" name= "host" id="" class="form-control" id="inputEmail3" value="<?php echo $row['host']; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">SMTP User  : </label>

                  <div class="col-sm-12">
                    <input type="text" name= "user" id="" class="form-control" id="inputEmail3" value="<?php echo $row['user']; ?>">
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">SMTP Password : </label>
                  <div class="col-sm-12">
                    <input type="text" name= "password" id="" class="form-control" id="inputEmail3" value="<?php echo $row['password']; ?>">
                  </div>
                </div>
                </div>
			

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm" style="float:right;">Submit</button>
              </div>
<?php   }
    } ?>
              
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>

</div>
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
      'tablename':'smtp'
    },
    success:function(data)
    {

    }
  });
  var url=base_url+"view/customer/delete_employee";
  windows.location.replace(url);
});
</script>
