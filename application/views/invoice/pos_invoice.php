<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard /Bill</h1>
</div>
<div class="row">
<!-- Area Chart -->
<div class="" style="width:330px;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Bill</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body" style="font-size:10px;padding:0px;">
    <div id="page_pdf" style="width:100%;height:auto;">
         <div class="bill" style="width:100%;height:100%;">
            <div class="bill_head" style="width:100%;height:auto;">
            <div class="img1 row" style="width:100%;height:auto;margin-left:0px;">
            
                <div class="gas_img col-md-12 text-left" >
                <img src="<?php echo base_url(); ?>>" alt="" width="100%" height="100px">
                <!-- <p style="font-weight:bold;margin-bottom: 0px;">Saloon</p>
                <p>Combatore<br> Ph:88888888<br>
                GSTIN / UIN : 33333</p> -->
                </div>
                <div class="col-md-12 text-center"> <h5 ><b>INVOICE</b></h5></div>
                <div class="col-md-12 text-center">
                    <h4><b>Saloon</b></h4>
                    <p>24/12 Saravanapatti , Kaplapatti pirivu ,Combatore<br>GSTIN :34YHINJSISNH89DF89</p>
                </div>
            </div>
            <div class="cus_detail" style="width:100%;height:auto;">
            <div class="container" style="padding-top:10px;padding-bottom:10px;">
            <?php $invoice = $this->Admin_model->table_column('invoice','invoice_no',$edit_id);
                    if(count($invoice) > 0)
                    {
                        foreach($invoice as $row)
                        {
                            $customer_id = $row['customer_name'];
                        }
                    }
                    ?>
                    <div class="row">
                    <div class="col-md-12 text-left"><p style="margin-bottom:0px;margin-top:20px;">To,</p>
                    <?php $customer_data = $this->Admin_model->table_column('customer','id',$customer_id);
                    foreach($customer_data as $cus_row){ ?>
                    <p style="margin-left:30px;"><?php echo strtoupper($cus_row['customer_name']); ?><br><br>
                    <?php echo strtoupper($cus_row['contact']); ?><br>
                    <?php if($cus_row['email'] != ''){ ?>
                    <?php echo $cus_row['email']; ?><br>
                    <?php } ?>
                    <?php } ?>
                    </p></div>
                    <div class="col-md-12 text-center">
                    <P>Invoice No :<?php echo $edit_id; ?> <br>
                    Invoice Date :<?php echo $row['date_created']; ?><br></div>
                </div>
                </div>
            </div>
                <div class="bill_cont" style="width:100%;height:auto;margin-bottom:20px;padding-bottom:20px;">
   <div class="" style="padding-top:20px;">
   <div class="bill_table">
    <table class="table" style="font-size:10px;">
    <thead>
        <tr style="border:dotted 1px solid black;" >
            <th>S.NO</th>
            <th >Service Type</th>
            <th>Service Count</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
    <?php $gst=$this->Admin_model->table_column('gst');
    if(count($gst) > 0)
    {
        foreach($gst as $row)
        { 
            $gst = $row['gst'];
            $cgst = $row['gst']/2;
        }
    }  ?>
    <?php 
    $amount=0;
    $total=0;
    $gst_amount=0;
    $cgst=0;
    $cgst_amount=0;
    $final_amount=0;
    $i=1; ?>
    
        <tr style="border:none;">
<?php    if(count($invoice) > 0)
    {
        foreach($invoice as $row)
        { ?>
            <td><?php echo $i; ?></td>
            <?php $service=$this->Admin_model->table_column('service','id',$row['service_id']);
            if(count($service) > 0)
            {
                foreach($service as $row_service)
                {  ?>
                    <td><?php echo strtoupper($row_service['service_type']); ?></td>
          <?php }
            }
            ?>
           
            
            <td><?php echo $i=1;?></td>
            <td><?php echo $row_service['cost']; ?></td>
            <td><?php echo $row_service['cost'];$amount += $row_service['cost'];?></td>
        </tr>
        <?php $i++;  }
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td>Total</td>
            <td></td>
            <td><?php echo $amount; ?></td>
        </tr>
        <?php if($row['gst'] == '1'){ 
             $gst_amount = ($amount*$gst)/100;
             $cgst_amount = $gst_amount/2;
             $final_amount=$cgst_amount+$cgst_amount+$amount; ?>
        <tr>
            <td></td>
            <td style="margin-left:auto;">CGST <?php echo $gst/2; ?>.00%</td>
            <td></td>
            <td></td>
            <td><?php echo $cgst_amount; ?></td>
        </tr>
        <tr>
            <td></td>
            <td style="margin-left:auto;" >SGST <?php echo $gst/2; ?>.00%</td>
            <td></td>
            <td></td>
            <td><?php echo $cgst_amount; ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td >Net Total</td>
            <td style="margin-left:auto;"></td>
            <td><?php echo $final_amount; ?></td>
        </tr>
        <?php } ?>
        
    </tbody>
    </table>
    <?php if($row['gst'] != '1'){
        $final_amount = $amount;
    } ?>
    <p style="font-size: 16px;"> <?php
                                $number =  $final_amount; 
                                $no = round($number);
                                $point = round($number - $no, 2) * 100;
                                $hundred = null;
                                $digits_1 = strlen($no);
                                $i = 0;
                                $str = array();
                                $words = array('0' => '', '1' => 'One', '2' => 'Two',
                                '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                                '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                                '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                                '13' => 'Thirteen', '14' => 'Fourteen',
                                '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                                '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
                                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                                '60' => 'Sixty', '70' => 'Seventy',
                                '80' => 'Eighty', '90' => 'Ninety');
                                $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
                                while ($i < $digits_1) {
                                    $divider = ($i == 2) ? 10 : 100;
                                    $number = floor($no % $divider);
                                    $no = floor($no / $divider);
                                    $i += ($divider == 10) ? 1 : 2;
                                    if ($number) {
                                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                    $str [] = ($number < 21) ? $words[$number] .
                                        " " . $digits[$counter] . $plural . " " . $hundred
                                        :
                                        $words[floor($number / 10) * 10]
                                        . " " . $words[$number % 10] . " "
                                        . $digits[$counter] . $plural . " " . $hundred;
                                    } else $str[] = null;
                                }
                                $str = array_reverse($str);
                                $result = implode('', $str);
                                echo $number_val =  $result . "Rupees Only";

                            ?></p>
    
   <div class="row">
       <div class="col-md-6 text-center">Receivers Signiture</div>
       <div class="col-md-6 text-center">Authorised Signatory</div>
   </div>        </div>
                            </div>
                          
    </div>
    </div>
  </div>
  
</div>
</div>
</div>  
<div style="float:right;padding:20px;">
    <button type="submit" class="btn btn-success pull-right" onclick="printDiv('page_pdf')">Print</button>
    </div>
</div>
</div>
<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php $this->load->view('include/footer'); ?>
 