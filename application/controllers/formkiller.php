<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class formkiller extends CI_Controller {

	protected $parser_data;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_killer_library');
		$this->load->model('country_model');
		$this->parser_data['base'] = base_url();
	}

	public function index()
	{

		$countries_as_dropdown = $this->country_model->readRowForDropDownList('country_id', 'country_name');



/*		$array_name = array(
								'Ekip Üyesi Adı'		=>	'text',
								'Ekip Üyesi Soyadı'		=>	'textarea',
				 				'Ekip Üyesi Telefonu'	=>	'text',
								'Ekip Üyesi Baba Adı'	=>	'text',
								'Ülkeler'				=> $countries_as_dropdown
				 	  	   );

		$this->parser_data['form_items'] = $this->form_killer_library->create_insert_form($array_name);

		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/form_killer_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);	
*/

		$foo_array = array(
								'Ülkeler' 			=>  array('item_type' 	=> 'dropdown',
															  'item_values'	=> $countries_as_dropdown),
								'Ekip Üyesi Adı'	=> 'text'
						  ); 	

		print_r($foo_array);


	}


}
