<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {

	protected $parser_data;
	
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
			$base = base_url();
			echo "<meta http-equiv=\"refresh\" content=\"0; url=$base"."login\">";
			die();
		}
		
		$base = base_url();
		$this->parser_data = array('base' => $base);
		
		$this->load->model('contact_model');
		$raw_data = $this->contact_model->readRow('1');	// admin panelinin arayüzü için gerekli datayı raw olarak alır
		$this->rawDataKiller($raw_data, $this->parser_data); // raw haldeki datayı tek boyutlu bir array olarak parser_data değişkenine atar

		$this->load->library('jquery_notification_library'); // jquery notification kütüphanesini çağırır
		$this->jquery_notification_library->setParserData($this->parser_data);
	}

	protected function rawDataKiller($raw_data, &$output_data) // raw halindeki datayı tek boyutlu array haline getiren metod
	{
		foreach ($raw_data as $middle_data) 
		{
			foreach ($middle_data as $key => $value) 
			{
				$output_data[$key] = $value;
			}
		}
		return $output_data;		
	}
	
	public function editContact()
	{
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/contact_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);
	/*	print_r($this->parser_data);*/

	}
	
	public function controlContact()
	{
		$address_field	= $this->input->post('address_field');
		$phone_field	= $this->input->post('phone_field');
		$fax_field		= $this->input->post('fax_field');
		$email_field	= $this->input->post('email_field');
		$facebook_field	= $this->input->post('facebook_field');
		$twitter_field	= $this->input->post('twitter_field');
		$gplus_field	= $this->input->post('gplus_field');
		$linkedin_field = $this->input->post('linkedin_field');
		$pinterest_field = $this->input->post('pinterest_field');
		/*$textt			= $this->input->post('textt');*/
		
		if(($address_field == '') || ($phone_field == '') || ($fax_field == '') || ($email_field == '') ||
		  ($facebook_field == '') || ($twitter_field == ''))
		{
			$message = 'Lütfen Boş Alan Bırakmayın';
			$this->jquery_notification_library->errorMessage($message, '../contact/editContact');
		}
		else
		{
			$update = $this->contact_model->updateRow('1',$address_field, null, $fax_field, $email_field, $facebook_field, $twitter_field, $gplus_field, $linkedin_field, $pinterest_field);
			if($update == TRUE)
			{
				$message = 'İletişim Bilgileri Başarıyla Değiştirildi';
				$this->jquery_notification_library->successMessage($message, '../contact/editContact');
			}
			else
			{
				$message =  'Güncelleme İşlemi Başarısız Oldu';
				$this->jquery_notification_library->errorMessage($message, '../contact/editContact');
			}			
		}			
	}

}
