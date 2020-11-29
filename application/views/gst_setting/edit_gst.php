<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Edit GST</h1>
  
 
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit GST Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Update_all/gst/gst_setting/'.$edit_id.'/add_gst/list_gst'); ?>" method="post" enctype="multipart/form-data" >
    <?php $gst=$this->Admin_model->table_column('gst');
    if(count($gst) > 0)
    {
        foreach($gst as $row)
        { ?>
            <div class="box-body">
                <div class="row">
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">GST% : *</label>
                  <div class="col-sm-12">
                    <input type="text" name= "gst" id="" class="form-control" id="inputEmail3" value="<?php echo $row['gst']; ?>">
                    <input type="hidden" name= "status" value="1">
                  </div>
                </div>

                
              </div>
              
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm" style="float:right;">Submit</button>
              </div>
 <?php }
    }
    
    ?>
              
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>

</div>
<?php $this->load->view('include/footer');?>
