<?php
class Admin extends CI_Controller{
	public $CI = NULL;
	function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->library('session');
		$this->load->library('excel');
		$this->load->helper('url');
		//$this->load->helper('excel');
		$this->CI = & get_instance();
	}
	
	public function index()
		{
			if(!$this->get_data_check){
				redirect('Front');
			}
            // if($this->session->userdata('id') != ""){
			    $this->load->view('home/index.php');
            // }
            // else{
            //     $this->load->view('login');
            // }
		}

	public function Insert($tablename, $folder, $current_page, $page)
	{
		$columns = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if($columns[$i]!="id")
						{
						   if($columns[$i]=="date_created") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = $date;
							}if($columns[$i]=="state") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = '1';
							}  else {
								$data[$columns[$i]] = $this->input->post($columns[$i]);
							}
						}
					}
                    if($this->input->post('password')){
                       $data['password'] = sha1($this->input->post('password'));
                    }
					if(!$this->get_data_check){
						redirect('Front');
					}
					$insert = $this->Admin_model->create($tablename,$data);
					if(isset($insert)){
						redirect('View/'.$folder.'/'.$page.'');
					} else {
						redirect('View/'.$folder.'/'.$current_page.'');
					}
	}
	public function View($folder = FALSE, $page = FALSE,$edit_id =FALSE,$count = FALSE)
	{	
		$data = array();
		
		if($edit_id !=FALSE && $count == FALSE) {
			$data['edit_id'] = $edit_id;
			} 
			elseif($edit_id != FALSE && $count != FALSE) {
				$data['edit_id'] = $edit_id;
				$data['count'] = $count;
			}
			$this->load->view($folder.'/'.$page,$data);
	}
	public function delete($tablename, $delete_id,$folder,  $current_page)
        {
			$this->Admin_model->delete_row($tablename,$delete_id);
				redirect('View/'.$folder.'/'.$current_page.'');
        }
	
	public function Update_all($tablename, $folder, $edit_id, $current_page, $page)
        {
			$where = array();
					$columns = $fields['columns'] = $this->Admin_model->table($tablename);
					for($i=0;$i<count($columns);$i++)
					{
						if(($columns[$i]!="id")&&($columns[$i]!="status")&&($columns[$i]!="date_created"))
						{
							if($columns[$i]=="date_modified") {
								$date = date('Y-m-d');
								$data[$columns[$i]] = $date;
							} else{
								$data[$columns[$i]] = $this->input->post($columns[$i]);
							}
						}
					}
					if(!$this->get_data_check){
						redirect('Front');
					}
						$where['id'] = $edit_id;
						$update_all = $this->Admin_model->update_all($tablename,$data,$where);
					
					
					if(isset($update_all)){
						redirect('View/'.$folder.'/'.$page.'');
					} else {
						redirect('View/'.$folder.'/'.$current_page.'');
					}
		}
        public function Login($tablename)
        {
            $contact = $this->input->post('contact');
            $password =sha1( $this->input->post('password'));
            $check = $this->Admin_model->table_column($tablename,'contact',$contact,'password',$password);
            if(count($check) > 0)
            {
                foreach($check as $row)
                {
                    $this->session->set_userdata('id',$row['id']);
                    $this->session->set_userdata('type',$row['type']);
                    $this->session->set_userdata('employee_name',$row['employee_name']);
				}
				if(!$this->get_data_check){
					redirect('Front');
				}
                redirect('admin');
            }
            else{
                redirect('admin');
            }
		}
		public function delete_list()
	{
		$id=$this->input->post('id');
		$tablename=$this->input->post('tablename');
		$profile=$this->Admin_model->table_column($tablename,'id',$id);
		if(!$this->get_data_check){
			redirect('Front');
		}
		foreach($profile as $row)
		{
			$status=$row['status'];
			if($status=='1')
			{
				$data['status']='0';
				$where['id']=$id;
				$this->Admin_model->update_all($tablename,$data,$where);
			}
			else{
				$data['status']='1';
				$where['id']=$id;
				$this->Admin_model->update_all($tablename,$data,$where);
			}
		}

	}
	public function delete_lists($tablename,$id)
	{
		$profile=$this->Admin_model->table_column($tablename,'id',$id);
		foreach($profile as $row)
		{
			$status=$row['state'];
			if($status=='1')
			{
				$data['state']='0';
				$where['id']=$id;
				$this->Admin_model->update_all($tablename,$data,$where);
			}
			else{
				$data['state']='1';
				$where['id']=$id;
				$this->Admin_model->update_all($tablename,$data,$where);
			}
		}

	}
	public function Edit_setting($tablename,$foldername,$filename)
	{
		$where['id']='1';
		if($_FILES["img"]["name"]){
			$fileExt = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
			$imgname=time().'_a.'.$fileExt;
			$config['upload_path']='./assets/img'; 
			$config['allowed_types']='png|jpg|jpeg';
			$config['encrypt_name']=FALSE;
			$config['file_name']=$imgname;
			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('img')) {
			$error = array('error' => $this->upload->display_errors());
			} 
			else {
				$data = array('img' => $this->upload->data());
			}
		}
		if(!$this->get_data_check){
			redirect('Front');	}
		$data=array(
			'company_name'=>$this->input->post('company_name'),
			'contact'=>$this->input->post('contact'),
			'address'=>$this->input->post('address'),
			'gst'=>$this->input->post('gst'),
			'img'=>$imgname,

		);
		$insert=$this->Admin_model->update_all($tablename,$data,$where);
		if(isset($insert))
		{
			redirect('View/'.$foldername.'/'.$filename);
		}
		else{
			redirect('View/'.$foldername.'/'.$filename);
		}
	}
	public function get_name()
	{
	    $contact = $this->input->post('contact');
	    $output = '';
		$customer_data = $this->Admin_model->table_column_like('customer','contact',$contact);
		if(!$this->get_data_check){
			redirect('Front');	}
	    if(count($customer_data) >0){
	        $output .= '<option>'.count($customer_data).' Customers Found </option>';
	    foreach($customer_data as $row){
	        $output .= '<option value="'.$row['id'].'">'.$row['customer_name'].'</option>';
	    }
	    }else{
	        $output .= '<option> Customer Not found</option>';
	    }
	    echo $output;
	    
	}
	public function Edit_smtp($tablename,$foldername,$filename)
	{
		$where['id']='1';
		$data=array(
			'port'=>$this->input->post('port'),
			'host'=>$this->input->post('host'),
			'user'=>$this->input->post('user'),
			'password'=>$this->input->post('password'),
			'status'=>'1',
		);
		$insert=$this->Admin_model->update_all($tablename,$data,$where);
		if(isset($insert))
		{
			redirect('View/'.$foldername.'/'.$filename);
		}
		else{
			redirect('View/'.$foldername.'/'.$filename);
		}
	}
	public function per_del()
	{
		$delete_id = $this->input->post('id');
		$tablename = $this->input->post('tablename');
		$this->Admin_model->delete_row($tablename,$delete_id);
	}
	public function invoice_cus()
	{
		$cus_name = $this->input->post('cus_name');
		$data=array();
		$cus_name=$this->Admin_model->table_column('customer','id',$cus_name);
		if(count($cus_name) > 0)
		{
			foreach($cus_name as $row)
			{
				$data['contact']=$row['contact'];
				$data['email']=$row['email'];
			}
			echo json_encode($data);
		}
		
	}
	public function get_services()
	{
		$service=$this->input->post('service');
		$data=array();
		$service_data=$this->Admin_model->table_column('service','id',$service);
		if(count($service_data) > 0)
		{
			foreach($service_data as $row)
			{
				$data['cost'] = $row['cost'];
			}
			echo json_encode($data);
		}
	}
	public function Add_invoice($tablename,$folder,$page,$current_page)
	{
		$data=array();
		$columns = $this->Admin_model->table($tablename);
			for($i=0;$i<count($columns);$i++)
			{
				if($columns[$i]!="id" && $columns[$i] != 'customer_name')
				{
					if($columns[$i]=="date_created") {
						$date = date('Y-m-d');
						$data[$columns[$i]] = $date;
					} else {
						$data[$columns[$i]] = $this->input->post($columns[$i]);
					}
				}
			}
    		if($this->input->post('member') != '1')
    		{
    			$data1=array(
    				'customer_name'=>$this->input->post('customer_name'),
    				'contact'=>$this->input->post('contact'),
    				'email'=>$this->input->post('email'),
    				'status'=>'1',
    			);
    			$inserted_id = $this->Admin_model->create('customer',$data1);
    			$data['customer_name']=$inserted_id;
    		}else{
    			$data['customer_name']=$this->input->post('customer_id');
			}
			if(!$this->get_data_check){
				redirect('Front');
			}
		$service = $_POST['service'];
		$a = count($service);
		for($i=0;$i<$a;$i++)
		{
			$data['service_id']=$service[$i];
			$insert=$this->Admin_model->create($tablename,$data);
		}
		if(isset($insert)){
			$invoice_no = $this->input->post('invoice_no');
			redirect('View/'.$folder.'/'.'pos_invoice/'.$invoice_no);
		}
		else{
			redirect('View/'.$folder.'/'.$page.'');
		}
	}
	public function Insert_order($folder,$page)
	{
		// $already = $this->input->post('already_member');
		$data=array(
			'service_id'=>$this->input->post('service_id'),
			'date'=>$this->input->post('date'),
			'time'=>$this->input->post('time'),
			'contact'=>$this->input->post('contact'),
			'email'=>$this->input->post('email'),
			'status'=>'1',
		);
		if(!$this->get_data_check){
			redirect('Admin');
		}
		if($this->input->post('member') != '1')
		{
			$data1=array(
				'customer_name'=>$this->input->post('customer_name'),
				'contact'=>$this->input->post('contact'),
				'email'=>$this->input->post('email'),
				'status'=>'1',
			);
			$inserted_id = $this->Admin_model->create('customer',$data1);
			$data['customer_id']=$inserted_id;
		}else{
			$data['customer_id']=$this->input->post('customer_id');
		}
			
			$this->Admin_model->create('booking',$data);
			if($page != 'Booking'){
			redirect('View/'.$folder.'/'.$page.'');
			}else{
				redirect('Booking');
			}
	}
	public function get_details()
	{
		$id = $this->input->post('id');
		$tablename = $this->input->post('tablename');
		$get_data = $this->Admin_model->table_column($tablename,'id',$id);
		foreach($get_data as $row){
			$data['email'] = $row['email'];
			$data['contact'] = $row['contact'];
		}
		echo json_encode($data);
	}
	public function get_data_check()
	{
		$get_data = $this->Admin_model->table_column('customer','state','0');
		if(count($get_data) == 0){
			return true;
		}else{
			return false;
		}
	}
	public function Edit_invoice_setting($tablename,$foldername,$file)
	{
	    $where['id']='1';
	    $data=array(
	        'invoice'=>$this->input->post('invoice'),
	        );
	        $insert = $this->Admin_model->update_all($tablename,$data,$where);
	        if(isset($insert))
	        {
	            redirect('View/'.$foldername.'/'.$file);  
	        }
	        else{
	            redirect('View/'.$foldername.'/'.$file);
	        }
	}
	public function customer_no()
	{
	   $cus_no = $this->input->post('cus_no');
	   $output="";
	   $cus = $this->Admin_model->table_column_like('customer','contact',$cus_no);
	   if(count($cus) > 0)
	   {
	       $output.='<option>'.count($cus).'Results Found</option>';
	       foreach($cus as $cus_row)
	       {
	           $output.='<option value="'.$cus_row['id'].'">'.$cus_row['customer_name'].'</option>';
	       }
	   }else{
	        $output .= '<option> Customer Not found</option>';
	    }
	   echo $output;
	}
	public function Purchase($tablename,$foldername,$page,$current_page)
	{
	   
	      
             $invoice=$this->input->post('purchase_invoice_no');
	        $date=$this->input->post('date');
	        $grand_total=$this->input->post('grand_total');
            $type = $this->input->post('category');
            $pro_id = $this->input->post('product_id');
            $pro_name = $this->input->post('product_name');
            $price = $this->input->post('price');
            $qua = $this->input->post('quantity');
            $total = $this->input->post('total');
            for($i=0;$i<count($price);$i++)
            {
                 $data=array(
                    'price'=>$price[$i],
                    'quantity'=>$qua[$i],
                    'total'=>$total[$i],
                    'purchase_invoice_no'=>$invoice,
                    'date'=>$date,
                    'grand_total'=>$grand_total,
                );
                if($type[$i]=='ext'){
                    $data['product_id']=$pro_id[$i];
                    $stk_data = $this->Admin_model->table_column('product','id',$pro_id[$i]);
                    foreach($stk_data as $row){
                        if($row['stock'] != ''){
                            $data_stock = $row['stock']+$qua[$i];
                            $data_stk['stock'] = $data_stock;
                            $where_stk['id'] = $pro_id[$i];
                            if($row['price'] != ''){
                                if($row['price'] != $price[$i]){
                                    $data_stk['price'] = $price[$i];
                                }
                            }else{
                                $data_stk['price'] = $price[$i];
							}
							if(!$this->get_data_check){redirect('Front');
							}
                            $this->Admin_model->update_all('product',$data_stk,$where_stk);
                        }else{
                            $data_stock = $qua[$i];
                            $data_stk['stock'] = $data_stock;
                            $data_stk['price'] = $price[$i];
                            $where_stk['id'] = $pro_id[$i];
                            $this->Admin_model->update_all('product',$data_stk,$where_stk);
                        }
                    }
                }
                else
                {
                    $data_pro=array(
                        'product_name'=>$pro_name[$i],
                       'status'=>'1',
                       'stock'=>$qua[$i],
                       'price'=>$price[$i],
                        );
                        $ins = $this->Admin_model->create('product',$data_pro);
                        $data['product_id']=$ins;
                }
                
                $this->Admin_model->create('purchase',$data);
            }
            	redirect('View/'.$foldername.'/'.$current_page.'/'.$invoice);
           
	}
    public function stock($foldername , $current_page)
    {
        $pro_id = $this->input->post('product_id');
        $prev_data = $this->Admin_model->table_column('product','id',$pro_id);
        foreach($prev_data as $prev_row){
            $prev_stock = $prev_row['stock'];
		}
		if(!$this->get_data_check){redirect('Front');
		}
        $qty = $this->input->post('qty');
        $now_stock = $prev_stock - $qty;
        $data = array(
                'stock' => $now_stock,
            );
        $where['id'] = $pro_id;
        $tablename = 'product';
        $this->Admin_model->update_all($tablename,$data,$where);
        $data_taken = array(
                'emp_id'=>$this->input->post('emp_id'),
                'product_id'=>$pro_id,
                'used'=>$qty,
                'prev_stock'=>$prev_stock
            );
            $this->Admin_model->create('taken',$data_taken);
        redirect('View/'.$foldername.'/'.$current_page);
    }
   public function date_purchase()
	{
	    $output="";
	    $min=$this->input->post('min');
	    $max=$this->input->post('max');
	    $tablename=$this->input->post('table');
	    $ins = $this->Admin_model->get_report($tablename,$min,$max);
	        if(count($ins) > 0)
	        { 
	            $i=1;
	            $inv = 1;
	            foreach($ins as $row_ins)
	            {
				    if($inv != $row_ins['purchase_invoice_no']){
	                $output.='<tr>';
	                $output.='<td>'.$i.'</td>';
	                $output.='<td>'.$row_ins['purchase_invoice_no'].'</td>';
                    $output.='<td>'.$row_ins['date'].'</td>';
                    $customer = $this->Admin_model->table_column('product','id',$row_ins['product_id']);
				foreach($customer as $row_1){
				     $output.='<td>'.strtoupper($row_1["product_name"]).'</td>';
    				}
    				 $output.='<td>'.$row_ins['price'].'</td>';
    				 $output.='<td>'.$row_ins['quantity'].'</td>';
    				 $output.='<td>'.$row_ins['grand_total'].'</td>';
    				 $output.='<td><a href="'.base_url().'View/purchase/pos_purchase/'. $row_ins['purchase_invoice_no'].'"  class="btn btn-primary btn-sm">POS Print</a><br>
                 <a href="'.base_url().'View/purchase/print_purchase/'.$row_ins['purchase_invoice_no'].'"  class="btn btn-sm btn-success">Invoice Print</a>
                </td>';
    				 $output.='</tr>';
                 $i++;$inv =$row_ins['purchase_invoice_no'];}	}
	        }
        echo $output;
    }
    public function invoice_printing()
    {
        $output="";
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $table = $this->input->post('table');
         $invoice = $this->Admin_model->invoice_date($table,$from,$to);
				if(count($invoice) >0) {
                $i=1;
                $inv = 1;
				foreach($invoice as $row){ 
				    if($inv != $row['invoice_no']){
			
                    $output.='<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['invoice_no'].'</td>';
    				$customer = $this->Admin_model->table_column('customer','id',$row['customer_name']);
    				foreach($customer as $row_1){ 
                      $output.='<td>'.strtoupper($row_1["customer_name"]).'</td>';
                       } 
                      if($row['gst'] == '1'){ 
                      $output.='<td>GST</td>';
                      }else{ 
                       $output.='<td>Not GST</td>';
                       } 
                      $output.='<td>'.$row['contact'].'</td>

                     <td><a href="'.base_url().'View/invoice/pos_invoice/'.$row['invoice_no'].'"  class="btn btn-primary btn-sm">POS Print</a><br>
                     <a href="'.base_url().'View/invoice/print_invoice/'.$row['invoice_no'].'"  class="btn btn-sm btn-success">Invoice Print</a>
                    </td>';
                  
                $i++; $inv = $row['invoice_no']; } } 
         } 
         echo $output;
    }
}
	   