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
  <h1 class="h3 mb-0 text-gray-800">Dashboard / Add Invoice</h1>
  
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add Customer</button>
  </div>
<div class="row">

<!-- Area Chart -->
<div class="col-xl-12">
  <div class="card shadow mb-5">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Invoice Form</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <form class="form-horizontal" action="<?php echo base_url('Add_invoice/invoice/invoice/add_invoice/print_invoice'); ?>" method="post" enctype="multipart/form-data" >
              <div class="box-body">
                <input type="hidden" name="status" value="1">
                <?php $inv = 'SA-'.date('Y-m-s'); ?>
                <div class="row">
                <div class="form-group col-md-12 row">
                <div class="col-md-2"></div>
               <div class="col-md-3">
                    <label>Invoice Number</label>
                    <input type="text" name="invoice_no" value="<?php echo $inv; ?>" readonly class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Date</label>
                    <?php $date = date('Y-m-d'); ?>
                    <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                </div>
                <div class="col-md-4"></div>
                </div><br>
                <div class="radio col-md-12">
                <label style="margin-right: 13px;"><input type="radio" id="already_id" name="member" value="1" checked style="margin-right:10px;" >Already a Member</label>
                <label style="margin-right:10px;"><input type="radio" id="new_id" name="member" value="2" style="margin-right:10px;">New Member</label>
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">Contact: *</label>

                  <div class="col-sm-10">
                    <input type="number" name="contact" id="contact" class="form-control" max-length="10" placeholder="Contact" required>
                  </div>
                </div>
                <div class="form-group col-md-6" id="already">
                <label for="inputEmail3" class="col-sm-6 control-label">Name : *</label>
                <div class="col-sm-10">
                  <select class="form-control" name="customer_id" id="customer_id" >
                  <option value="">Select Your Name</option>
                  <?php $name=$this->Admin_model->table_column('customer');
                  if(count($name) > 0)
                  {
                      foreach($name as $row_name)
                      { ?>
                        <option value="<?php echo $row_name['id']; ?>"><?php echo strtoupper($row_name['customer_name']); ?></option>
                <?php }
                  }
                  ?>
                  </select>
                  </div>
                </div>
                <div class="form-group col-md-6" id="new" style="display:none;">
                <label for="inputEmail3" class="col-sm-6 control-label">Name: *</label>

                  <div class="col-sm-10">
                    <input type="text" name="customer_name" id="" class="form-control" id="inputEmail3" placeholder="Name" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-6 control-label">Email (optional): </label>

                  <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control"  placeholder="Email" >
                  </div>
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail3" class="col-sm-12 control-label">GST Type: *</label>
                  <div class="col-sm-10">
                    <select class="col-sm-12 form-control gst" name="gst" >
                        <option value="0">Non GST</option>
                        <option value="1">GST</option>
                    </select>
                  </div>
                </div>
              
              <div class="form-group myDiv col-md-12">
              <div class="row">
                <div class="form-group col-md-6 row">
                <input type="hidden" value="0" id="total_counts">
                  <label for="inputEmail3" class="col-sm-12 control-label">Service Type: *</label>
                  <div class="col-sm-9">
                  <input type="hidden" value="0" id="counts">
                    <select class="col-sm-12 form-control services" name="service[]">
                        <option>Service Type</option>
                        <?php $service=$this->Admin_model->table_column('service');
                        if(count($service) > 0)
                        {
                            foreach($service as $row)
                            { ?>
                                <option id="service_id" value="<?php echo $row['id']; ?>"><?php echo $row['service_type']; ?></option>
                      <?php }
                        }
                        ?>
                    </select>
                  </div>
                  <a href="javascript:void(0);" class="addCF col-sm-1">
							 <button type="button" style="" id="btn1" class="btn btn-info btn-flat add"><i class="fa fa-plus-circle" aria-hidden="true"></i>
							 </button> 
						</a>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail3" class="col-sm-12 control-label"></label>
                    <span class="col-md-4 charge_0 side_list"></span>
                    <span class="col-md-4 gst_amount_0 side_list"></span>
                    <span class="col-md-4 net_amount_0 side_list"></span>
                </div>
              </div>
              </div>
              <div class="col-md-12">
              <div class="row">
                  <div class="col-md-4"></div>
                <div class="col-md-8">
                    <label for="inputEmail3" class="col-sm-12 control-label"></label>
                    <span class="col-md-4  grand_disp side_list"></span>
                    <span class="col-md-4  gst_disp side_list"></span>
                    <span class="col-md-4 grand_net  side_list"></span>
                </div>
              </div>
              <input type="hidden" id="grand" value="0">
              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm" style="float:right;">Submit</button>
              </div>
              </div>
              
              <!-- /.box-footer -->
            </form>
    </div>
  </div>
</div>

</div>
</div>
<?php $this->load->view('include/footer');?>
<script>
$(document).on('change','#cus_name',function()
{
    var cus_name = $(this).val();
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Admin/invoice_cus",
        type:'POST',
        dataType:'json',
        data:"cus_name="+cus_name,
        success:function(data)
        {
            $('#email').val(data.email);
            $('#contact').val(data.contact);
        }
    });
});
</script>
<script>
$(document).on('change','.services',function(){
    var gst_percent = '<?php $gst_data = $this->Admin_model->table_column('gst','id','1');
                            foreach($gst_data as $row_gst){
                                echo $row_gst['gst'];
                            } ?>';
    var service=$(this).val();
    var counts=$('#total_counts').val();
    var gst=$('.gst').val();
    var grand = Number($('#grand').val());
    var base_url="<?php echo base_url(); ?>";
    $.ajax({
        url:base_url+"Admin/get_services",
        type:'POST',
        dataType:'json',
        data:"service="+service,
        success:function(data)
        {
            if(gst == '1'){
                $('.charge_'+counts).html('Charge :' + data.cost);
                var gst_amount = Number((data.cost * gst_percent)/100);
                var net = (Number(data.cost) + gst_amount);
                $('.gst_amount_'+counts).html('GST Amount :' + gst_amount);
                $('.net_amount_'+counts).html('Net Amount :' + net);
                var grand_now = grand+Number(data.cost);
                $('#grand').val(grand_now);
                $('.grand_disp').html('Grand Total : '+grand_now);
                var gst_now = Number((grand_now * gst_percent)/100);
                $('.gst_disp').html('GST Total : '+gst_now);
                var grand_net = grand_now+gst_now;
                $('.grand_net').html('Grand Net Total : '+grand_net);
            }else{
                $('.net_amount_'+counts).html('Net Amount :' + data.cost);
                 var grand_now = grand+Number(data.cost);
                $('#grand').val(grand_now);
                $('.grand_disp').html('Grand Total : '+grand_now);
            }
        }
    });
          
});
</script>
<script>
$(document).ready(function(){
	$(".addCF").click(function(){
    var counts=Number($('#total_counts').val())+1;
    $(".myDiv").append('<div class="row"><div class="form-group col-md-6 row"><label for="inputEmail3" class="col-sm-12 control-label">Service Type: *</label><div class="col-sm-9"><select class="col-sm-12 form-control services" name="service[]"><option>Service Type</option><?php $service=$this->Admin_model->table_column('service');if(count($service) > 0){foreach($service as $row){ ?><option value="<?php echo $row['id']; ?>"><?php echo $row['service_type']; ?></option><?php }}?></select></div><a href="javascript:void(0);" class="Remove col-sm-1"><button type="button" style="" id="btn1" class="btn btn-danger btn-flat"><i class="fa fa-trash" aria-hidden="true"></i></button> </a></div><div class="col-md-6"><label for="inputEmail3" class="col-sm-12 control-label"></label><span class="col-md-4 charge_'+counts+' side_list"></span><span class="col-md-4 gst_amount_'+counts+' side_list"></span><span class="col-md-4 net_amount_'+counts+' side_list"></span></div></div>');
    $('#total_counts').val(counts);
    });
});
$(document).on('click', "a.Remove", function() { 
    $(this).parent().parent().remove();
});

</script>
<script>
        $(document).on('click','#new_id',function(){
            $('#already').css('display','none');
            $('#new').css('display','block');
        });
        $(document).on('click','#already_id',function(){
            $('#already').css('display','block');
            $('#new').css('display','none');
        });
        $(document).on('change','#customer_id',function(){
           var val = $(this).val();
           var base_url="<?php echo base_url(); ?>";
          $.ajax({
            url:base_url+"Admin/get_details",
            type:'POST',
            dataType:'json',
            data:{
              'id':val,
              'tablename':'customer'
            },
            success:function(data)
            {
              $('#email').val(data.email);
              $('#contact').val(data.contact);
            }
          });
        });
        $(document).on('keyup','#contact',function(){
            var contact = $(this).val();
            var base_url="<?php echo base_url(); ?>";
          $.ajax({
            url:base_url+"Admin/get_name",
            type:'POST',
            data:{
              'contact':contact,
              'tablename':'customer'
            },
            success:function(data)
            {
              $('#customer_id').html(data);
            }
          });
        });
</script>
