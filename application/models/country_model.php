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

	public function allItems()
	{
		if ($this->country_model->readRow()!=NULL) 
		{
			$this->parser_data['items'] = $this->school_model->readRow();
			$this->parser_data['all_items_header_css']  = array(array());
		}
		else
		{
			$this->parser_data['items'] = array();	
			$this->parser_data['all_items_header_css']  = array();	
		}
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/all_countries_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);		
	}

}