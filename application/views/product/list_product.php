<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/popup.php'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Products </h1>
  <a href="<?php echo base_url();?>View/product/add_product" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Products</a>
 
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List Products Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>Products Name</th>
                  
                  <th>Action</th>
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
                 

                 <td>
                 <a href="javascript:void(0)" class=""><i class="fa fa-trash-o remove" aria-hidden="true" data-rowid="<?php echo $row['id']; ?>" style="font-size:20px;"></i></a></td>
                  <!-- <a href="<?php echo base_url();?>Admin/delete/customer/customer/<?php echo $row['id'];?>/list_customer" class=""><i class="fa fa-trash-o" aria-hidden="true" style="font-size:20px;"></i></a></td> -->
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
<script>
$(document).on('click','.remove',function(){
  var base_url="<?php echo base_url(); ?>";
  $.ajax({
    url:base_url+"Admin/delete_list",
    type:'POST',
    dataType:'json',
    data:{
      'id':$(this).attr("data-rowid"),
      'tablename':'product'
    },
    success:function(data)
    {

    }
  });
  
  $(this).parent().parent().parent().remove();
});
</script>