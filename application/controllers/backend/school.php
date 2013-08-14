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
			$base = base_url();
			echo "<meta http-equiv=\"refresh\" content=\"0; url=$base"."login\">";
			die();
		}

		$this->load->helper('filter_killer');
		$this->load->helper('delete_file_killer');

		$this->load->model('school_model');
		
		$this->parser_data['base'] = base_url();
		$this->parser_data['backend_base'] = base_url().'backend/';			

		$this->load->library('jquery_notification_library');
		$this->jquery_notification_library->setParserData($this->parser_data);
	}

	public function addSchool()
	{
		$this->parser_data['countries'] = $this->school_model->readParentRow();	
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
							'big_img_width'		=>	800,
							'big_img_height'	=>	600,
							'thumb_img_width'	=>	225,
							'thumb_img_height'	=>	225
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

	public function allItems()
	{
		if ($this->school_model->readRow()!=NULL) 
		{
			$this->parser_data['items'] = $this->school_model->readRow();
			$this->parser_data['all_items_header_css']  = array(array());
		}
		else
		{
			$this->parser_data['items'] = array();	
			$this->parser_data['all_items_header_css']  = array();	
		}
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/all_schools_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);		
	}

	public function updateItemDetailForm($id)
	{
		$this->parser_data['item_detail']	= $this->school_model->readRow($id);
		$this->parser_data['countries']		= $this->school_model->readParentRow();
		
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/update_school_detail_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);			
	}

	public function updateItemDetail()
	{
		$id = $this->input->post('id');

		$country_field 			= $this->input->post('country_field');
		$country_id_hidden 		= $this->input->post('country_id_hidden');

		$school_name_field		= $this->input->post('school_name_field');
		$school_summary_field	= $this->input->post('school_summary_field');
		$school_detail_field	= $this->input->post('school_detail_field');

		if (($school_name_field!='')&&($school_summary_field!='')&&($school_detail_field!='')) 
		{
			if ($country_field!=0)
				$country_id = $country_field;
			else
				$country_id = $country_id_hidden;

			$css_filter = filterForeignChars($school_name_field);
			$update_item_detail = $this->school_model->updateSchoolDetail($id,$country_id,$school_name_field,
																		$school_summary_field,$school_detail_field,
																		$css_filter);
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


	public function changeItemPhotoForm($id, $photo_id)
	{
		$this->parser_data['id'] = $id;
		$this->parser_data['action'] = 'school/changeItemPhoto';
		$this->parser_data['photo_id']	= $photo_id;

		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/photo_upload_form',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);			
	}

	protected function deleteItemPhoto($id)
	{
		$image_paths = $this->school_model->readRow($id);

		$files = array($image_paths[0]['school_big_photo'], $image_paths[0]['school_thumb_photo']);
		
		if (unLinkFile($files) == TRUE) 
			return TRUE;
		else
			return FALSE;
	}	


	public function deleteItem($id)
	{
		if ($this->deleteItemPhoto($id)==TRUE) 
		{
			if ($this->school_model->deleteRow($id) == TRUE)
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

	public function changeItemPhoto()
	{
		$id 		= $this->input->post('id');
		$photo_id 	= $this->input->post('photo_id');

		$records 	= $this->school_model->readRow($id);
		$image_name = filterForeignChars($records[0]['school_name']);

		$array = array(
							'image_form_field'	=>	'photo_field',
							'upload_path'		=>	'assets/images/schools',
							'image_name'		=>	$image_name.rand(),
							'big_img_width'		=>	800,
							'big_img_height'	=>	600,
							'thumb_img_width'	=>	225,
							'thumb_img_height'	=>	225
					 );

		$this->load->library('image_upload_resize_library');
				
		$this->image_upload_resize_library->setBootstrapData($array);
		
		$this->image_upload_resize_library->display_errors = FALSE;
			
		$image_up_and_resize = $this->image_upload_resize_library->imageUpAndResize();

		if (($this->image_upload_resize_library->isSelectedAnyFile()==TRUE)&&($image_up_and_resize == TRUE)) 
		{
			$big_img_data_for_db	= $this->image_upload_resize_library->getSizedBigImgNameForDB();
			$thumb_img_data_for_db	= $this->image_upload_resize_library->getSizedThumbImgNameForDB();

			$unlink_files = $this->deleteItemPhoto($id);

			if ($unlink_files==TRUE) 
			{
				if (($this->school_model->deletePhotoRow($photo_id)==TRUE) &&
					($this->school_model->insertNewSchoolPhoto($big_img_data_for_db, $thumb_img_data_for_db, $id) == TRUE))
				{
					$message = 'Fotoğraf Yenileme Başarılı..!';
					$return_path = 'allItems';
					$this->jquery_notification_library->successMessage($message, $return_path,1);
				}
				else
				{
					$message = 'HATA:: kayıt yenilenemedi!';
					$return_path = "changeItemPhotoForm/$id/$photo_id";
					$this->jquery_notification_library->errorMessage($message, $return_path,2);	
				}
			}
			else
				echo 'resim silinemedi';
		}	
		elseif ($this->image_upload_resize_library->isSelectedAnyFile()!=TRUE) 
		{
			$message = 'HATA:: Fotoğraf Seçilmedi!';
			$return_path = "changeItemPhotoForm/$id/$photo_id";
			$this->jquery_notification_library->errorMessage($message, $return_path,2);				
		}
		else
		{
			$message = 'HATA:: Fotoğraf Yüklenemedi!';
			$return_path = "changeItemPhotoForm/$id/$photo_id";
			$this->jquery_notification_library->errorMessage($message, $return_path,2);				
		}
	}					

}