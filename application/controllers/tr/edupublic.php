<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edupublic extends CI_Controller {

	protected $base_data;

	public function __construct()
	{
		parent::__construct();

		$this->base_data['base'] = base_url();

	}


	public function index()
	{
		$this->header();

		$this->our_team();
		
		$this->footer();
	}


	protected function header()
	{
		$this->parser->parse('frontend_views/header_view',$this->base_data);
	}

	protected function footer()
	{
		$this->parser->parse('frontend_views/footer_view',$this->base_data);
	}

	protected function our_team()
	{
		$this->parser->parse('frontend_views/our_team_view',$this->base_data);
	}
}
