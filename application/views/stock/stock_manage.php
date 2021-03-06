<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/popup.php'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Stock </h1>
  <a href="javascript:void(0);" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm" data-toggle="modal" data-target="#taken_product"><i class="fas fa-add"></i>Taken Product</a>
 
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List Stock Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>Products Name</th>
                  <th>Stock Available</th>
                </tr>
                </thead>
                <tbody>
                <?php $customer = $this->Admin_model->table_column($tablename='product','status','1');
				if(count($customer) >0) {
          $i=1;
				foreach($customer as $row) { ?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <td><?php echo strtoupper($row["product_name"]); ?></td>
                  <td><?php echo $row["stock"]; ?></td>
                
       <?php $i++; } ?>
        <?php } ?>
                </tbody>
              </table>
    </div>
    </div>
  </div>
</div>

</div>

</div>
<script>
  function pop_function(){
    document.querySelector('#pop_up').style.display='block';
  }
</script>
<?php $this->load->view('include/footer');?>
