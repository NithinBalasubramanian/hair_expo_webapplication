<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/popup.php'); ?>
<?php $this->load->view('include/header_menu');?>

<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard / List Booked </h1>
 </div>
 
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center row">
      <h6 class="col-md-6 m-0 font-weight-bold text-primary">List Booked Table</h6>
     
</div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="table-responsive">
    <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr class="bg-secondary text-light">
                  <th>S.No</th>
                  <th>Customer Name</th>
                  <th>Contact</th>
                  <th>Service</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $customer = $this->Admin_model->table_column($tablename='booking','status','1');
                if(count($customer) >0) {
                  $i=1;
                foreach($customer as $row) { ?>
                <tr>
                  <td><?php echo $i; ?> </td>
                  <?php $customer = $this->Admin_model->table_column('customer','id',$row['customer_id']);
				          foreach($customer as $row_1){ ?>
                  <td><?php echo strtoupper($row_1["customer_name"]); ?></td>
                  <td><?php echo $row_1["contact"]; ?></td>
                  <?php } ?>
                  <td>
                  <?php $serv = explode(",",$row['service_id']); 
                  foreach($serv as $s_row){ 
                  $ser = $this->Admin_model->table_column('service','id',$s_row);
				          foreach($ser as $row_2){ ?>
                  <?php echo $row_2["service_type"]; ?>,
                  <?php } } ?>
                  </td>
                  <td><?php echo date("d-m-Y", strtotime($row['date'])); ?></td>
                  <td><?php echo date("h:i a", strtotime($row['time'])); ?></td>
                  <td><a href="<?php echo base_url(); ?>View/book/book_details/<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Invoice</a></td>
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