<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>


<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Customer</h1>
  
  <a href="<?php echo base_url();?>index.php/View/customer/list_customer" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> List Customers</a>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Customer Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Insert/customer/customer/add_customer/add_customer'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="row">
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Customer Name : *</label>
                  <div class="col-sm-12">
                    <input type="text" name= "customer_name" id="" class="form-control c_name" id="inputEmail3" placeholder="Customer Name" required>
                    <input type="hidden" name= "status" value="1">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Contact : *</label>
                  <div class="col-sm-12">
                    <input type="number" name= "contact" id="" class="form-control contact" id="inputEmail3" max="9999999999"  placeholder="Contact" required>
                  </div>
                </div>
                
              </div>
              <div class="row">
              
				        <div class="form-group col-md-6">
                  <label for="inputEmail3" class="col-sm-6 control-label">Email : </label>
                  <div class="col-sm-12">
                    <input type="email" name= "email" id="" class="form-control" id="inputEmail3" placeholder="Email" >
                  </div>
                </div>
              </div>
              
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm" id="submit" style="float:right;">Submit</button>
              </div>
              
      </form>
    </div>
  </div>
</div>

</div>

</div>


<?php $this->load->view('include/footer');?>
<script>
    
     $(document).on('keyup','.c_name',function(){
        var val = $(this).val();
        var ln = val.length;
        if(ln < 6){
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
        }else{
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        }
    });
    $(document).ready(function() {
      $('input[type=number][max]:not([max=""])').on('input', function(ev) {
        var $this = $(this);
        var maxlength = $this.attr('max').length;
        var value = $this.val();
        if (value && value.length >= maxlength) {
          $this.val(value.substr(0, maxlength));
          $(this).addClass('is-valid');
          $(this).removeClass('is-invalid');
          $('#submit').attr('disabled',false);
        }else{
          $(this).addClass('is-invalid');
          $(this).removeClass('is-valid');
          $('#submit').attr('disabled',true);
         
        
        }
      });
    });

</script>
