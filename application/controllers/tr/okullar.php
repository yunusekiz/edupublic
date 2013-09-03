<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class okullar extends CI_Controller {

	protected $parser_data;

	public function __construct()
	{
		parent::__construct();

		$this->parser_data['base'] = base_url();

	}


	public function index()
	{
			$base = base_url();
			echo "<meta http-equiv=\"refresh\" content=\"0; url=$base"."\".>";	
	}

	public function detay($id,$school_css_filter)
	{
		$this->header();
		$this->language_school_detail($id);
		$this->footer();
	}

	protected function header()
	{
		$this->parser->parse('frontend_views/header_view_2',$this->parser_data);
	}

	protected function footer()
	{
		$this->load->model('contact_model');
		$this->parser_data['contact_parser_data'] = $this->contact_model->readAllRow();	
		$this->parser->parse('frontend_views/footer_view_2',$this->parser_data);
	}


	public function language_school_detail($id)
	{
		$this->load->model('school_model');
		$this->parser_data['school_parser_data'] = $this->school_model->readRow($id);
		$this->parser->parse('frontend_views/school_detail_view',$this->parser_data);	
	}

}
