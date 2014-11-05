<?php
class Data extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function select_data($from_table, $where_var1 = NULL, $where_var2 = NULL, $order_by = NULL, $order_type = NULL, $limit = NULL)
    {//$from_table VARIABLE should be always specified
		if(isset($where_var1) && isset($where_var2))
		{
			$this->db->where($where_var1, $where_var2);
		}
		if(isset($order_by) && isset($order_type))
		{
			$this->db->order_by($order_by, $order_type);
		}
		if(isset($limit))
		{
			$this->db->limit($limit);
		}
		$query = $this->db->get($from_table); 
		return $query;
    }
	
	function do_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		return $query;
	}

    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($from_table, $where_var1 = NULL, $where_var2 = NULL)
    {
		$this->db->where($where_var1, $where_var2);
		$this->db->delete($from_table);
    }
	
}
?>