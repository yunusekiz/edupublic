<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public $table_name;
	public $id_colum_name;
	public $id_value;

	public function __construct()
	{
    	parent::__construct();
	}

	public function readSomeRow($id_value)
	{
		$query = $this->db->select('*')->from($this->table_name)->where($this->id_colum_name,$this->id_value)->get();
		if ($query->num_rows()>0)
			return $query->result_array();
		else
			return null;
	}

}