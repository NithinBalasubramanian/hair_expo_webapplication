<?php
class Admin_model extends CI_Model{
	
	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	public function user($user_name,$password)
		{
			$this->db->select('*');
			$this->db->from("customer");
			$this->db->where('customer_name',$user_name);
			// $this->db->where('user_type',$password);
			$result=$this->db->get();
			return $result->result_array();
		}
	public function table($table)
		{
			return $fields = $this->db->list_fields($table);
			$this->db->last_query();
		}
	public function create($tablename,$data=array())
		{
			// print_r($data);
			$this->db->insert($tablename,$data);
			return $this->db->insert_id();
		}
		public function insert_entry($data1=array(),$data2=array())
		{
			// print_r($data);
			$this->db->insert('customer',$data1);
			$data2['customer_id'] = $this->db->insert_id();
			$this->db->insert('order',$data2);
		}
	function insert($tablename,$data)
		{
			$this->db->insert_batch($tablename, $data);
		}
    public function get_info($table) {
                $query = $this->db->get($table);
                $ret = $query->result_array();
                return $ret;
                
            }
	function table_column($tablename, $column =FALSE,$val=FALSE, $column1 = FALSE, $val1 = FALSE)
		{
			$this->db->select('*');
			$this->db->from($tablename);
			if($column != FALSE){
				$this->db->where($column, $val);
			}
			if($column1 != FALSE) {
				$this->db->where($column1, $val1);
			}
			$result = $this->db->get();
		//	return $this->db->last_query();
			return $result->result_array();
		}
	function table_column_desc($tablename, $column =FALSE,$val=FALSE, $column1 = FALSE, $val1 = FALSE)
		{
			$this->db->select('*');
			$this->db->from($tablename);
			if($column != FALSE){
				$this->db->where($column, $val);
			}
			if($column1 != FALSE) {
				$this->db->where($column1, $val1);
			}
			$this->db->order_by('id','DESC');
			$result = $this->db->get();
		//	return $this->db->last_query();
			return $result->result_array();
		}
	function table_column_like($tablename, $column =FALSE, $val=FALSE , $column1 = FALSE, $val1 = FALSE)
		{
			$this->db->select('*');
			$this->db->from($tablename);
			if($column != FALSE){
				$this->db->like($column, $val);
			}
			if($column1 != FALSE) {
				$this->db->like($column1, $val1);
			}
			$result = $this->db->get();
		//	return $this->db->last_query();
			return $result->result_array();
		}
	function table_lists($tablename,$id)
		{
			$data['state']='0';
			$where['id']=$id;
			$this->update_all($tablename,$data,$where);
		}
	function invoice($tablename)
		{
			$this->db->select('*');
			$this->db->from($tablename);
			$this->db->order_by('id', 'DESC');
			$this->db->limit(1);
			$result = $this->db->get();
			return $result->result_array();
		}
	public function update_all($tablename, $data=array(),$where=array())
		{
			return $this->db->update($tablename,$data,$where);
		}
	public function delete_row($tablename ,$delete_id)
		{
			$this->db->select('*');
			$this->db->from($tablename);
			$this->db->where('id',$delete_id);
			$this->db->delete();
						  //return $query = $this->db->delete($tablename);
		}
public function get_report($tablename,$min,$max)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where('date>=', $min);
		$this->db->where('date<=', $max);
		$result = $this->db->get();
		//	return $this->db->last_query();
		return $result->result_array();
	}
	public function invoice_date($tablename,$from,$to)
	{
	    $this->db->select('*');
	    $this->db->from($tablename);
	    $this->db->where('date_created>=',$from);
	    $this->db->where('date_created<=',$to);
	    $result = $this->db->get();
	    return $result->result_array();
	}

}