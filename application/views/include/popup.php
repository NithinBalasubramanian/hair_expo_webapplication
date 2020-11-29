<div class="profile_data" id="profile">
  <div class="profile_data_cont">
  <div class="pre_header">
    <div class="sub_heading">
        <h2>Profile</h2> 
    </div>
  <div class="close_button">
  <i class="fa fa-times" aria-hidden="true"  onclick="undisp_profile()"></i>
  </div>
  </div>
  <div class="profile_data_main" >
 
  </div>
  </div>
</div>
<div class="modal fade" id="add_area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Area :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?php echo base_url('Insert/area/customer/add_customer/add_customer'); ?>" method="post" enctype="multipart/form-data" >
      <div class="form-group">
          <label for="inputEmail3" class="col-sm-5 control-label">Area Name : *</label>
            <input type="text" name= "area_name" id="" class="form-control" id="inputEmail3" placeholder="Area Name" required>
       </div>
       <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm pull-right">Submit</button>
       </div>
              <!-- /.box-footer -->
       </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Add Customer Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <form class="form-horizontal" action="<?php echo base_url('Insert/customer/invoice/add_invoice/add_invoice'); ?>" method="post" enctype="multipart/form-data" >
         <div class="row">
         <div class="form-group col-md-12">
            <label for="inputEmail3" class="col-sm-6 control-label">Customer Name : *</label>
            <div class="col-sm-10">
              <input type="text" name= "customer_name" id="" class="form-control" id="inputEmail3" placeholder="Customer Name" required>
              <input type="hidden" name= "status" value="1">
            </div>
         </div>
         <div class="form-group col-md-12">
            <label for="inputEmail3" class="col-sm-6 control-label">Phone No : </label>
            <div class="col-sm-10">
              <input type="text" name= "contact" id="" class="form-control" id="inputEmail3" maxlength="10" placeholder="Phone No" required>
             
            </div>
         </div>
         <div class="form-group col-md-12">
            <label for="inputEmail3" class="col-sm-6 control-label">Email : </label>
            <div class="col-sm-10">
              <input type="text" name= "email" id="" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
         </div>
         </div>
              <!-- /.box-footer -->
            
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-success btn-sm pull-right">Submit</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="taken_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Taken Product :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="<?php echo base_url(); ?>Admin/stock/stock/stock_manage" method="post" enctype="multipart/form-data" >
           <div class="form-group">
          <label for="inputEmail3" class="col-sm-5 control-label">Employee : *</label>
            <select class="form-control" name="emp_id" required>
                <option value="">Select Employee</option>
                <?php $pro = $this->Admin_model->table_column('employee');
                foreach($pro as $row){ ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['employee_name']; ?></option>
                <?php } ?>
            </select>
       </div>
      <div class="form-group">
          <label for="inputEmail3" class="col-sm-5 control-label">Product : *</label>
            <select class="form-control" name="product_id" required>
                <option value="">Select Prouct</option>
                <?php $pro = $this->Admin_model->table_column('product');
                foreach($pro as $row){ ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></option>
                <?php } ?>
            </select>
       </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-5 control-label" placeholder="Qualtity">Quantity : *</label>
            <input class="form-control" name="qty" placeholder="Qualtity" >
       </div>
       <div class="box-footer">
            <button type="submit" class="btn btn-success btn-sm pull-right">Submit</button>
       </div>
              <!-- /.box-footer -->
       </form>
      </div>
    </div>
  </div>
</div>
