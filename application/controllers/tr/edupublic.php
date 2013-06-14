<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edupublic extends CI_Controller {

	protected $parser_data;

	public function __construct()
	{
		parent::__construct();

		$this->parser_data['base'] = base_url();

	}


	public function index()
	{
		$this->header();
		//$this->sss();
		$this->contact();
		$this->promo_slider();
		$this->language_school();
		$this->visa();
		$this->feedback();
		$this->our_team();
		

		$this->ggg();
		
		$this->footer();
	}

	public function sss()
	{
		$this->parser->parse('frontend_views/sss', $this->parser_data);
	}


	protected function ggg()
	{
		$this->parser->parse('frontend_views/ggg_main_view',$this->parser_data);
	}

	protected function header()
	{
		$this->parser->parse('frontend_views/header_view',$this->parser_data);
	}

	protected function footer()
	{
		$this->parser->parse('frontend_views/footer_view',$this->parser_data);
	}

	protected function contact()
	{
		$this->load->model('contact_model');
		$this->parser_data['contact_parser_data'] = $this->contact_model->readRow();			
		//$this->parser->parse('frontend_views/contact_view',$this->parser_data);
	}

	protected function our_team()
	{
		$this->load->model('our_team_model');
		$this->parser_data['our_team_parser_data'] = $this->our_team_model->readRow();		
		//$this->parser->parse('frontend_views/our_team_view',$this->parser_data);
	}

	protected function feedback()
	{
		$this->load->model('feedback_model');
		$this->parser_data['feedbacks_parser_data'] = $this->feedback_model->readRow();		
		//$this->parser->parse('frontend_views/feedback_view',$this->parser_data);
	}

	protected function visa()
	{
		$this->load->model('visa_model');
		$this->parser_data['visas_parser_data'] = $this->visa_model->readRow();		
		//$this->parser->parse('frontend_views/visa_view',$this->parser_data);		
	}

	protected function language_school()
	{
		$this->load->model('school_slider_model');
		$this->parser_data['school_slider_parser_data_1'] = $this->school_slider_model->readRow();
		$this->parser_data['school_slider_parser_data_2'] = $this->school_slider_model->readRow();
		//$this->parser->parse('frontend_views/language_school_view',$this->parser_data);		
	}

	protected function school_slider()
	{
		$this->parser->parse('frontend_views/school_slider_view',$this->parser_data);
	}

	protected function promo_slider()
	{
		$this->load->model('promo_slider_model');
		$this->parser_data['promo_sliderr_parser_data'] = $this->promo_slider_model->readRow();		
		//$this->parser->parse('frontend_views/promo_slider_view',$this->parser_data);
	}
}
