<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shared_model extends CI_Model {

	public $CI;

	public function __construct()
	{
   	 	parent::__construct();
   	 	$this->CI =& get_instance();

    	$this->id_colum_name = 'id';
    	$this->table_name = 'country_id';
	}

	public function read($id)
	{
		return $this->CI->readSomeRow($id);
	}

}