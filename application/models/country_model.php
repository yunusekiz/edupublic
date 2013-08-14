<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class country_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('country');
        $this->model_killer_library->setNameOfIdColumn('country_id');  
    }

    public function insertRow($country_name, $css_filter)
    {
		$insert_data = array(
								'country_name' 	=> $country_name,
								'css_filter'	=> $css_filter
						 	);

		return $this->model_killer_library->insertNewRow($insert_data);    	
    }	
	
	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}
	
	public function updateRow($id,$country_name, $css_filter)
	{
		$update_data = array(
								'country_name' 	=> $country_name,
								'css_filter'	=> $css_filter
					 		);

		return $this->model_killer_library->updateRow($id, $update_data);	 
	}

	public function readRowForDropDownList($key, $value, $record_id = NULL)
	{
		return $this->model_killer_library->readRowForDropDownList($key, $value, $record_id);
	}	

}