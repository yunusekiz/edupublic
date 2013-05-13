<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kik extends CI_Controller {

	public function index()
	{
		$this->load->model('contact_model');

		$records = $this->contact_model->updateRow('1','yeni', 'bir', 'bas', 'lan', 'gic', 'icin', 'hay', 'di');
		$records = $this->contact_model->readRow();

		print_r($records);
		
	}


}
	
	