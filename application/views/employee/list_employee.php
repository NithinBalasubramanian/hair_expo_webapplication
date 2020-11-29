<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/popup.php'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Employee </h1>
  <a href="<?php echo base_url();?>View/employee/add_employee" class=" d-sm-inline-block btn btn-sm btn-grad btn-primary shadow-sm"><i class="fas fa-add"></i> Add Employee</a>
  <a href="<?php echo base_url();?>View/employee/delete_employee" class=" d-sm-inline-block btn btn-sm btn-grad btn-warning shadow-sm"><i class="fas fa-add"></i>Deleted Employee</a>
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List Employee Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>Employee Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Secondary Contact</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $customer = $this->Admin_model->table_column($tablename='employee','status','1');
				if(count($customer) >0) {
          $i=1;
				foreach($customer as $row) { ?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <td><?php echo strtoupper($row["employee_name"]); ?></td>
                  <?php if($row["address"] != ""){ ?>
                  <td><?php echo strtoupper($row["address"]); ?></td>
                  <?php }else{ ?>
                    <td>-</td>
                  <?php } ?>
                  <td><?php echo $row["contact"]; ?></td>
                  <?php if($row["sec_contact"] != "0"){ ?>
                  <td><?php echo $row["sec_contact"]; ?></td>
                  <?php }else{ ?>
                  <td>-</td>
                  <?php } ?>
                  <td><?php echo $row['type']; ?></td>
                 <td><a href="<?php echo base_url();?>View/employee/edit_employee/<?php echo $row['id'];?>"  onclick="pop_function();" class=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:20px;"></i></a><br>
                  <a href="javascript:void(0)" class=""><i class="remove fa fa-trash-o" data-rowid="<?php echo $row['id']; ?>" aria-hidden="true" style="font-size:20px;"></i></a></td>
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
      'tablename':'employee'
    },
    success:function(data)
    {

    }
  });
  $(this).parent().parent().parent().remove();
});
</script>