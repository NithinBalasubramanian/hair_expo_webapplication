<?php $this->load->view('include/header_part'); ?>
<?php $this->load->view('include/header_menu');?>
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard /Bill</h1>
</div>
<div class="row">
<!-- Area Chart -->
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Bill</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div id="page_pdf" style="width:100%;height:auto;">
         <div class="bill" style="width:100%;height:100%;">
            <div class="bill_head" style="width:100%;height:auto;">
            <div class="img1 row" style="width:100%;height:160px;margin-left:0px;">
            
                <div class="gas_img col-md-5 text-left" >
                <img src="<?php echo base_url(); ?>>" alt="" width="100%" height="100px">
                <!-- <p style="font-weight:bold;margin-bottom: 0px;">Saloon</p>
                <p>Combatore<br> Ph:88888888<br>
                GSTIN / UIN : 33333</p> -->
                </div>
                <div class="col-md-2 text-right"> <h5 style="margin-top:100px;"><b>INVOICE</b></h5></div>
                <div class="col-md-5 text-center">
                    <h4><b>Saloon</b></h4>
                    <p>24/12 Saravanapatti , Kaplapatti pirivu ,Combatore<br>GSTIN :34YHINJSISNH89DF89</p>
                </div>
            </div>
            <div class="cus_detail" style="width:100%;height:auto;">
            <div class="container" style="padding-top:10px;padding-bottom:10px;">
             <?php $invoice = $this->Admin_model->table_column('purchase','purchase_invoice_no',$edit_id);
                     if(count($invoice) > 0)
                    {
                         foreach($invoice as $row)
                         {
                            //  $customer_id = $row['customer_name'];
                        }
                    }
                    ?>
                    <div class="row">
                   
                    <div class="col-md-5 text-left">
                        <P>Invoice No :<?php echo $row['purchase_invoice_no']; ?> <br>
                    Invoice Date :<?php echo $row['date']; ?><br><br>
                  
                </div>
                </div>
            </div>
        
                <div class="bill_cont" style="width:100%;height:auto;margin-bottom:20px;padding-bottom:20px;">
   <div class="container" style="padding-top:20px;">
   <div class="bill_table">
    <table class="table" >
    <thead>
        <tr style="border:dotted 1px solid black;" >
            <th>S.NO</th>
            <th >Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
   
    <?php 
    $amount=0;
    $total=0;
    $i=1; ?>
    
        <tr style="border:none;">
<?php    if(count($invoice) > 0)
    {
        foreach($invoice as $row)
        { $grand_total = $row['grand_total'];
      
        
        ?>
            <td><?php echo $i; ?></td>
            <?php $service=$this->Admin_model->table_column('product','id',$row['product_id']);
            if(count($service) > 0)
            {
                foreach($service as $row_service)
                {  ?>
                    <td><?php echo strtoupper($row_service['product_name']); ?></td>
          <?php }
            }
            ?>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
           <td><?php echo $row['total']; ?></td>
        </tr>
        <?php $i++;  }
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td><?php echo $grand_total; ?></td>
        </tr>
       
       
        
    </tbody>
    </table>
    
    <p style="font-size: 16px;"> <?php
                                $number =  $grand_total; 
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
     
        <!--<div class="col-md-2" style="font-size: 16px;text-align:center;">Description :</div><div class="col-md-10" style="text-align:center;font-size:16px;padding-left:0px;">-->
        <!--    We declare that this invoice shows actual price of goods describes and that all particulars are true and correct.</div>-->
    </div>
   </div>
   </div>
   </div>
   <div class="row">
       <div class="col-md-6 text-center">Receivers Signiture</div>
       <div class="col-md-6 text-center">Authorised Signatory</div>
   </div>        </div>
                            </div>
                  
    </div>
    </div>
  </div>
            <div style="float:right;padding:20px;">
    <button type="submit" class="btn btn-success pull-right" onclick="printDiv('page_pdf')">Print</button>
    </div>
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
 