<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promo_slider extends CI_Controller {
	
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

		$this->load->helper('filter_killer');
		$this->load->helper('delete_file_killer');

		$this->load->model('promo_slider_model');
		
		$this->parser_data['base'] = base_url();
		$this->parser_data['backend_base'] = base_url().'backend/';

		$this->load->library('jquery_notification_library');
		$this->jquery_notification_library->setParserData($this->parser_data);
	}

	public function addPromoSlider()
	{
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/add_promo_slider_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);
	}

	public function controlPromoSlider()
	{
		$big_text_field 		= $this->input->post('big_text_field');
		$little_text_1_field 	= $this->input->post('little_text_1_field');
		$little_text_2_field 	= $this->input->post('little_text_2_field');

		if (($big_text_field!='') && ($little_text_1_field!='') && ($little_text_2_field!='')) 
		{
			$this->load->model('promo_slider_model');

			$add_promo_slider = $this->promo_slider_model->insertNewPromoSlider(
																				 $big_text_field,
																				 $little_text_1_field,
																				 $little_text_2_field
																				);
			if ($add_promo_slider == TRUE) 
			{
				$message = 'Tebrikler! Kayıt Başarılı.';
				$return_path = 'addPromoSlider';
				$this->jquery_notification_library->successMessage($message, $return_path,2);				
			}
			else
			{
				$message = 'Form Bilgileri Veritabanına Kaydedilemedi';
				$return_path = 'addPromoSlider';
				$this->jquery_notification_library->errorMessage($message, $return_path,2);					
			}
		}
		else
		{
			$message = 'Lütfen Boş Alan Bırakmayın';
			$return_path = 'addPromoSlider';
			$this->jquery_notification_library->errorMessage($message, $return_path,0.2);
		}	

	}	

	public function allItems()
	{
		if ($this->promo_slider_model->readRow()!=NULL) 
		{
			$this->parser_data['all_items'] = $this->promo_slider_model->readRow();
			$this->parser_data['all_items_header_css']  = array(array());
		}
		else
		{
			$this->parser_data['all_items'] = array();	
			$this->parser_data['all_items_header_css']  = array();	
		}

		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/all_promo_sliders_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);		
	}

	public function updateItemDetailForm($id)
	{
		$this->parser_data['item_detail'] = $this->promo_slider_model->readRow($id);
		
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/update_promo_slider_detail_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);			
	}

	public function updateItemDetail()
	{
		$id = $this->input->post('id');

		$big_text_field 		= $this->input->post('big_text_field');
		$little_text_1_field 	= $this->input->post('little_text_1_field');
		$little_text_2_field 	= $this->input->post('little_text_2_field');

		if (($big_text_field!='') && ($little_text_1_field!='') && ($little_text_2_field!='')) 
		{

			$update_item_detail = $this->promo_slider_model->updatePromoSlider($id, $big_text_field,
																			   $little_text_1_field, $little_text_2_field
																			  );
			if ($update_item_detail == TRUE) 
			{
				$message = 'Kayıt Güncelleme Başarılı..!';
				$return_path = 'allItems';
				$this->jquery_notification_library->successMessage($message, $return_path,1);	
			}
			else
			{
				$message = 'HATA:: Kayıt Güncellenemedi..!';
				$return_path = 'updateItemDetailForm/'.$id;
				$this->jquery_notification_library->errorMessage($message, $return_path,1);		
			}
		}
		else
		{
			$message = 'Lütfen Boş Alan Bırakmayın';
			$return_path = 'updateItemDetailForm/'.$id;
			$this->jquery_notification_library->errorMessage($message, $return_path,1);			
		}
	}

	public function deleteItem($id)
	{
		if ($this->promo_slider_model->deleteRow($id) == TRUE)
		{
			$message = 'Kayıt Silme Başarılı..!';
			$return_path = '../allItems';
			$this->jquery_notification_library->successMessage($message, $return_path,1);					
		}
		else
		{
			$message = 'HATA:: Kayıt Silme Başarısız..!';
			$return_path = '../allItems';
			$this->jquery_notification_library->errorMessage($message, $return_path,1);					
		}
	}

}

