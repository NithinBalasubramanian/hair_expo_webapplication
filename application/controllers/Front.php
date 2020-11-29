<?php
class Front extends CI_Controller{
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
	
	public function index($data = FALSE)
		{
             if($data == FALSE){
                $this->load->view('front/index.php');
             }else{
                redirect('Admin/get_data_check');
             }
            // }
            // else{
            //     $this->load->view('login');
            // }
        }
    
    public function View($pg_name)
        {
            $this->load->view('front/'.$pg_name.'');
        }
    }
    
?>