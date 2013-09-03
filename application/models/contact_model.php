<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('contact');
        $this->model_killer_library->setNameOfIdColumn('id');
    }

    public function insertRow($address, $phone, $fax, $email, $facebook, $twitter, $gplus, $linkedin, $pinterest)
    {
		$insert_data = array(
						'address' 	=> $address,
						'phone'		=> $phone,
						'fax'		=> $fax,
						'email'		=> $email,
						'facebook'	=> $facebook,
						'twitter'	=> $twitter,
						'gplus'		=> $gplus,
						'linkedin'	=> $linkedin,
						'pinterest'	=> $pinterest
					 );

		$this->model_killer_library->insertNewRow($insert_data);    	
    }	
	
	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}
	
	
	public function updateRow($id ,$address, $phone, $fax, $email, $facebook, $twitter, $gplus, $linkedin, $pinterest)
	{
		$update_data = array(
						'address' 	=> $address,
						'phone'		=> $phone,
						'fax'		=> $fax,
						'email'		=> $email,
						'facebook'	=> $facebook,
						'twitter'	=> $twitter,
						'gplus'		=> $gplus,
						'linkedin'	=> $linkedin,
						'pinterest'	=> $pinterest
					 );
		
		return $this->model_killer_library->updateRow($id, $update_data);			
					 
	}

	public function readAllRow()
	{
		$query = $this->db->select('*')->from('contact')->get();
		if ($query->num_rows()>0)
			return $query->result_array();
		else
			return null;
	}

	
}