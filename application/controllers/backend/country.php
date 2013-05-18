<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class country extends CI_Controller {
	
	protected $parser_data;

	protected $row_data;
	
	public function index()
	{
		return null;
	}
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');// session ın nimetlerinden faydalanabilmek için 'session' isimli library yi yükler.
		$admin = $this->session->userdata('admin_session'); // $admin diye bi değişken set edilir, değer olarak ise
															// şu aşamada olup olmadığı bilinmeyen admin_session değişkeni atanır
		if( empty($admin) ) // eğer $admin değişkenini değeri boş ise, kullanıcı login formuna geri gönderilir
		{
			echo "<meta http-equiv=\"refresh\" content=\"0; url=../../login\">";
			die();
		}

		$this->load->helper('filter_killer');
		$this->load->model('country_model');	
		
		$this->parser_data['base'] = base_url();

		$this->load->library('jquery_notification_library');
		$this->jquery_notification_library->setParserData($this->parser_data);

	}

	public function addCountry()
	{
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/add_country_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);
	}


	public function controlCountry()
	{
		$country_name_field = $this->input->post('country_name_field');

		if (($country_name_field!='')) 
		{
			$css_filter = filterForeignChars($country_name_field);
			
			$insert_item_detail_to_db = $this->country_model->insertRow($country_name_field, $css_filter);

			if ($insert_item_detail_to_db==TRUE) // item detail ler db ye insert edilmişse, item photo bilgilerini db ye insert eder 
			{
				$message = 'Tebrikler! Kayıt Başarılı.';
				$return_path = 'addCountry';
				$this->jquery_notification_library->successMessage($message, $return_path,1);
			}
			else
			{
				$message = 'Form Bilgileri Veritabanına Kaydedilemedi';
				$return_path = 'addCountry';
				$this->jquery_notification_library->errorMessage($message, $return_path,2);					
			}
		}
		else
		{
			$message = 'Lütfen Boş Alan Bırakmayın';
			$return_path = 'addCountry';
			$this->jquery_notification_library->errorMessage($message, $return_path,0.2);
		}

	}








}

