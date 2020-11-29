<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Print Type</h1>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Print Type Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Edit_Print/print_type/setting/print'); ?>" method="post" enctype="multipart/form-data" >
       <?php $print=$this->Admin_model->table_column('print_type');
       if(count($print) > 0)
       {
           foreach($print as $row)
           { ?>
                 <div class="box-body">
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Print Type :</label>

                  <div class="col-sm-12">
                  <select name="type" class="form-control">
                         <?php $type=$row['type']; ?>
                        <option value="<?php echo $row['type']; ?>"><?php
                        if($type == 'Print 1')
                        { ?>Type 1 - Consumer Copy<?php }else{ ?>Type 2 - Consumer & Distributor Copy<?php } ?></option>
                       <?php
                        if($type != 'Print 1')
                        { ?>
                            <option value="Print 1">Type 1 - Consumer Copy</option>
                  <?php }else{ ?>
                            <option value="Print 2">Type 2 - Consumer & Distributor Copy</option>
                        <?php } ?>
                        
                    </select>
                  </div>
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
           
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>

</div>
<?php $this->load->view('include/footer');?>
