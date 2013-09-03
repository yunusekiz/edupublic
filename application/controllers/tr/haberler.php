<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class haberler extends CI_Controller {

	protected $parser_data;

	public function __construct()
	{
		parent::__construct();

		$this->parser_data['base'] = base_url();
		$this->load->model('school_slider_model');

	}

	public function index()
	{
			$base = base_url();
			echo "<meta http-equiv=\"refresh\" content=\"0; url=$base"."\".>";	
	}

	public function detay($id = null, $school_css_filter = null)
	{	
		
		if (($id==null)||($school_css_filter==null)) 
		{
			$base = base_url();
			echo "<meta http-equiv=\"refresh\" content=\"0; url=$base"."tr\">";			
		}
		elseif(($this->school_slider_model->readRow($id)!= null)&&($school_css_filter!=null)) 
		{
			$this->header();	
			$this->news_slider($id);
			$this->footer();
		}
		else
		{
			$base = base_url();
			echo "<meta http-equiv=\"refresh\" content=\"0; url=$base"."tr\">";				
		}
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

	protected function news_slider($id)
	{
		$this->parser_data['news_slider_parser_data'] = $this->school_slider_model->readRow($id);
		$this->parser->parse('frontend_views/news_slider_view',$this->parser_data);
	
	}
}