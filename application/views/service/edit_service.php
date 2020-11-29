<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit Service Type</h1>
  <!-- <a href="<?php echo base_url();?>index.php/View/service/list_service" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Service</a> -->
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Service Type Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    
    <form class="form-horizontal" action="<?php echo base_url('Update_all/service/service/'.$edit_id.'/edit_service/list_service'); ?>" method="post" enctype="multipart/form-data" >
    <?php $service=$this->Admin_model->table_column('service','id',$edit_id);
    
    if(count($service) > 0)
    {
      foreach($service as $row)
      { ?>
        <div class="box-body">
                <div class="row">
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Service Type : *</label>

                  <div class="col-sm-12">
                    <input type="text" name="service_type" id="" class="form-control" id="inputEmail3" value="<?php echo $row['service_type']; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Cost : *</label>

                  <div class="col-sm-12">
                    <input type="text" name= "cost" id="" class="form-control" id="inputEmail3" value="<?php echo $row['cost']; ?>">
                  </div>
                </div>

              </div>
              <div class="row">
				<div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Description (optional) : </label>

                  <div class="col-sm-12">
                    <textarea type="text" name= "description" id="" class="form-control" id="inputEmail3" value="<?php echo $row['description']; ?>" ><?php echo $row['description']; ?></textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm" style="float:right;">Submit</button>
              </div>
<?php }
    }
    
    ?>
              
            </form>
    </div>
  </div>
</div>

</div>
</div>
</div>
<?php $this->load->view('include/footer');?>
