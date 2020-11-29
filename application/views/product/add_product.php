<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Product</h1>
  
  <a href="<?php echo base_url();?>index.php/View/product/list_product" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Product</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Product Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Insert/product/product/add_product/add_product'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="row">
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Product Name : *</label>
                  <div class="col-sm-12">
                    <input type="text" name= "product_name" id="" class="form-control" id="inputEmail3" placeholder="Product Name" required>
                    <input type="hidden" name= "status" value="1">
                  </div>
                </div>
              </div>
              
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
