<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inherit extends CI_Controller {

	protected $parser_data;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('shared_model');

	}


	public function index()
	{
			$value = $this->shared_model->read(8);

			var_dump($value);
	}





}
