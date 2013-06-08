<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class feedback extends CI_Controller {
	
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

		$this->load->model('feedback_model');	
		
		$this->parser_data['base'] = base_url();
		$this->parser_data['backend_base'] = base_url().'backend/';

		$this->load->library('jquery_notification_library');
		$this->jquery_notification_library->setParserData($this->parser_data);

	}

	public function addFeedback()
	{
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/add_feedback_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);
	}


	public function controlFeedback()
	{
		$fb_student_name_field 		= $this->input->post('fb_student_name_field');
		$fb_student_surname_field	= $this->input->post('fb_student_surname_field');
		$fb_title_field				= $this->input->post('fb_title_field');
		$fb_detail_field			= $this->input->post('fb_detail_field');
		$fb_country_field			= $this->input->post('fb_country_field');
		$fb_lang_school_field		= $this->input->post('fb_lang_school_field');


		if (($fb_student_name_field!='')&&($fb_student_surname_field!='')&&($fb_title_field!='')&&($fb_detail_field!='')
			&&($fb_country_field!='')&&($fb_lang_school_field!='')) 
		{
			$image_name = filterForeignChars($fb_student_name_field);

			$array = array(
							'image_form_field'	=>	'fb_photo_field',
							'upload_path'		=>	'assets/images/feedback',
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

				$insert_item_detail_to_db = $this->feedback_model->insertNewFeedbackDetail(
																							$fb_student_name_field,
																							$fb_student_surname_field,
																							$fb_title_field,
																							$fb_detail_field,
																							$fb_country_field,
																							$fb_lang_school_field
																						);
				if ($insert_item_detail_to_db==TRUE) // item detail ler db ye insert edilmişse, item photo bilgilerini db ye insert eder 
				{
					$insert_item_photo_to_db = $this->feedback_model->insertNewFeedbackPhoto($big_img_data_for_db, $thumb_img_data_for_db);
					if ($insert_item_photo_to_db==TRUE) 
					{
						$message = 'Tebrikler! Kayıt Başarılı.';
						$return_path = 'addFeedback';
						$this->jquery_notification_library->successMessage($message, $return_path,2);						
					}
					else
					{
						$message = 'Fotoğraf Bilgileri Veritabanına Kaydedilemedi';
						$return_path = 'addFeedback';
						$this->jquery_notification_library->errorMessage($message, $return_path,2);								
					}

				}
				else
				{
					$message = 'Form Bilgileri Veritabanına Kaydedilemedi';
					$return_path = 'addFeedback';
					$this->jquery_notification_library->errorMessage($message, $return_path,2);					
				}

			}
			else
				echo "resim yüklenemedi<br/>";			
		}
		else
		{
			$message = 'Lütfen Boş Alan Bırakmayın';
			$return_path = 'addFeedback';
			$this->jquery_notification_library->errorMessage($message, $return_path,0.2);
		}
	}


	public function allItems()
	{
		if ($this->feedback_model->readRow()!=NULL) 
		{
			$this->parser_data['all_items'] = $this->feedback_model->readRow();
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
		$this->parser->parse('backend_views/all_feedbacks_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);		
	}


	public function updateItemDetailForm($id)
	{
		$this->parser_data['item_detail'] = $this->feedback_model->readRow($id);
		
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/update_feedback_detail_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);			
	}


	public function updateItemDetail()
	{
		$id = $this->input->post('id');

		$fb_student_name_field 		= $this->input->post('fb_student_name_field');
		$fb_student_surname_field	= $this->input->post('fb_student_surname_field');
		$fb_title_field				= $this->input->post('fb_title_field');
		$fb_detail_field			= $this->input->post('fb_detail_field');
		$fb_country_field			= $this->input->post('fb_country_field');
		$fb_lang_school_field		= $this->input->post('fb_lang_school_field');


		if (($fb_student_name_field!='')&&($fb_student_surname_field!='')&&($fb_title_field!='')&&
			($fb_detail_field!='')&&($fb_country_field!='')&&($fb_lang_school_field!='')) 
		{
			$update_item_detail = $this->feedback_model->updateTeamMemDetail($id, $fb_student_name_field, $fb_student_surname_field,
																				 $fb_title_field, $fb_detail_field, 
																				 $fb_country_field, $fb_lang_school_field);
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
		$this->parser_data['action'] = 'feedback/changeItemPhoto';
		$this->parser_data['photo_id']	= $photo_id;

		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/photo_upload_form',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);			
	}


	public function deleteItem($id)
	{
		if ($this->deleteItemPhoto($id)==TRUE) 
		{
			if ($this->feedback_model->deleteRow($id) == TRUE)
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


	protected function deleteItemPhoto($id)
	{
		$image_paths = $this->feedback_model->readRow($id);

		$files = array($image_paths[0]['fb_big_photo'], $image_paths[0]['fb_thumb_photo']);
		
		if (unLinkFile($files) == TRUE) 
			return TRUE;
		else
			return FALSE;
	}


	public function changeItemPhoto()
	{
		$id 		= $this->input->post('id');
		$photo_id 	= $this->input->post('photo_id');

		$records 	= $this->feedback_model->readRow($id);
		$image_name = filterForeignChars($records[0]['fb_student_name']);

		$array = array(
							'image_form_field'	=>	'photo_field',
							'upload_path'		=>	'assets/images/feedback',
							'image_name'		=>	$image_name.rand(),
							'big_img_width'		=>	427,
							'big_img_height'	=>	426,
							'thumb_img_width'	=>	80,
							'thumb_img_height'	=>	80
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
				if (($this->feedback_model->deletePhotoRow($photo_id)==TRUE) &&
					($this->feedback_model->insertNewFeedbackPhoto($big_img_data_for_db, $thumb_img_data_for_db, $id) == TRUE))
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
