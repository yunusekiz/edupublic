<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class school extends CI_Controller {
	
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
		$this->load->model('school_model');
		
		$this->parser_data['base'] = base_url();

		$this->load->library('jquery_notification_library');
		$this->jquery_notification_library->setParserData($this->parser_data);

	}

	public function addSchool()
	{
		$this->load->model('country_model');
		$this->parser_data['countries'] = $this->country_model->readRow();		
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/add_school_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);
	}


	public function controlSchool()
	{
		$country_field 					= $this->input->post('country_field');
		$school_name_field				= $this->input->post('school_name_field');
		$school_summary_field			= $this->input->post('school_summary_field');
		$school_detail_field			= $this->input->post('school_detail_field');

		if (($country_field!=0)&&($school_name_field!='')&&($school_summary_field!='')&&($school_detail_field!='')) 
		{
			$image_name = filterForeignChars($school_name_field);
			$css_filter = filterForeignChars($school_name_field);

			$array = array(
							'image_form_field'	=>	'school_image_form_field',
							'upload_path'		=>	'assets/images/schools',
							'image_name'		=>	$image_name,
							'big_img_width'		=>	427,
							'big_img_height'	=>	426,
							'thumb_img_width'	=>	80,
							'thumb_img_height'	=>	80
					 	 );

			$this->load->library('image_upload_resize_library');
				
			$this->image_upload_resize_library->setBootstrapData($array);
		
			$this->image_upload_resize_library->display_errors = TRUE;

			$image_up_and_resize = $this->image_upload_resize_library->imageUpAndResize();

			if ($image_up_and_resize == TRUE) 
			{
				$big_img_data_for_db	= $this->image_upload_resize_library->getSizedBigImgNameForDB();
				$thumb_img_data_for_db	= $this->image_upload_resize_library->getSizedThumbImgNameForDB();

				$insert_item_detail_to_db = $this->school_model->insertNewSchoolDetail(
																						$country_field,
																						$school_name_field,
																						$school_summary_field,
																						$school_detail_field,
																						$css_filter
																					  );
				if ($insert_item_detail_to_db==TRUE) // item detail ler db ye insert edilmişse, item photo bilgilerini db ye insert eder 
				{
					$insert_item_photo_to_db = $this->school_model->insertNewSchoolPhoto($big_img_data_for_db, $thumb_img_data_for_db);
					if ($insert_item_photo_to_db==TRUE) 
					{
						$message = 'Tebrikler! Kayıt Başarılı.';
						$return_path = 'addSchool';
						$this->jquery_notification_library->successMessage($message, $return_path,2);						
					}
					else
					{
						$message = 'Fotoğraf Bilgileri Veritabanına Kaydedilemedi';
						$return_path = 'addSchool';
						$this->jquery_notification_library->errorMessage($message, $return_path,2);								
					}

				}
				else
				{
					$message = 'Form Bilgileri Veritabanına Kaydedilemedi';
					$return_path = 'addSchool';
					$this->jquery_notification_library->errorMessage($message, $return_path,2);					
				}

			}
			else
				echo "resim yüklenemedi<br/>";			
		}
		else
		{
			$message = 'Lütfen Boş Alan Bırakmayın';
			$return_path = 'addSchool';
			$this->jquery_notification_library->errorMessage($message, $return_path,0.2);
		}

	}

}

