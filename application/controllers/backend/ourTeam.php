<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ourTeam extends CI_Controller {
	
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
		$this->load->model('our_team_model');	
		
		$this->parser_data['base'] = base_url();

		$this->load->library('jquery_notification_library');
		$this->jquery_notification_library->setParserData($this->parser_data);

	}


	public function addTeamMember()
	{
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/add_team_member_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);
	}

	public function controlTeam()
	{
		$t_mem_name_field 				= $this->input->post('t_mem_name_field');
		$t_mem_surname_field			= $this->input->post('t_mem_surname_field');
		$t_mem_position_title_field		= $this->input->post('t_mem_position_title_field');
		$t_mem_position_detail_field	= $this->input->post('t_mem_position_detail_field');
		$t_mem_facebook_field			= $this->input->post('t_mem_facebook_field');
		$t_mem_twitter_field			= $this->input->post('t_mem_twitter_field');
		$t_mem_linkedin_field			= $this->input->post('t_mem_linkedin_field');

		if (($t_mem_name_field!='')&&($t_mem_surname_field!='')&&($t_mem_position_title_field!='')&&($t_mem_position_detail_field!='')
			&&($t_mem_facebook_field!='')&&($t_mem_twitter_field!='')&&($t_mem_linkedin_field!='')) 
		{
			$image_name = filterForeignChars($t_mem_name_field);

			$array = array(
							'image_form_field'	=>	't_mem_photo_field',
							'upload_path'		=>	'assets/images/team',
							'image_name'		=>	$image_name.rand(),
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

				$insert_item_detail_to_db = $this->our_team_model->insertNewTeamMemDetail(
																							$t_mem_name_field,
																							$t_mem_surname_field,
																							$t_mem_position_title_field,
																							$t_mem_position_detail_field,
																							$t_mem_facebook_field,
																							$t_mem_twitter_field,
																							$t_mem_linkedin_field
																						);
				if ($insert_item_detail_to_db==TRUE) // item detail ler db ye insert edilmişse, item photo bilgilerini db ye insert eder 
				{
					$insert_item_photo_to_db = $this->our_team_model->insertNewTeamMemPhoto($big_img_data_for_db, $thumb_img_data_for_db);
					if ($insert_item_photo_to_db==TRUE) 
					{
						$message = 'Tebrikler! Kayıt Başarılı.';
						$return_path = 'allTeam';
						$this->jquery_notification_library->successMessage($message, $return_path,2);						
					}
					else
					{
						$message = 'Fotoğraf Bilgileri Veritabanına Kaydedilemedi';
						$return_path = 'addTeamMember';
						$this->jquery_notification_library->errorMessage($message, $return_path,2);								
					}

				}
				else
				{
					$message = 'Form Bilgileri Veritabanına Kaydedilemedi';
					$return_path = 'addTeamMember';
					$this->jquery_notification_library->errorMessage($message, $return_path,2);					
				}

			}
			else
				echo "resim yüklenemedi<br/>";			
		}
		else
		{
			$message = 'Lütfen Boş Alan Bırakmayın';
			$return_path = 'addTeamMember';
			$this->jquery_notification_library->errorMessage($message, $return_path,0.2);
		}

	}



	public function allTeam()
	{
		$all_team_members = $this->our_team_model->readRow();
		if ($all_team_members != NULL) 
		{
			$this->parser_data['all_team_members'] = $all_team_members;
			$this->parser_data['submit_button_css']=  array(array());
			$this->parser_data['all_team_members_header_css']=  array(array());
		}
		else
		{
			$this->parser_data['all_team_members'] = array();
			$this->parser_data['submit_button_css'] = array();
			$this->parser_data['all_team_members_header_css'] = array();
		}
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/all_team_members_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);		
	}



	public function updateForm($t_mem_id)
	{
		$this->parser_data['single_record'] = $this->our_team_model->readRow($t_mem_id);

		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/update_team_members_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);			
	}



	public function updateTeam()
	{
		$t_mem_id 						= $this->input->post('t_mem_id');
		$t_mem_name_field 				= $this->input->post('t_mem_name_field');
		$t_mem_surname_field			= $this->input->post('t_mem_surname_field');
		$t_mem_position_title_field		= $this->input->post('t_mem_position_title_field');
		$t_mem_position_detail_field	= $this->input->post('t_mem_position_detail_field');
		$t_mem_facebook_field			= $this->input->post('t_mem_facebook_field');
		$t_mem_twitter_field			= $this->input->post('t_mem_twitter_field');
		$t_mem_linkedin_field			= $this->input->post('t_mem_linkedin_field');

		if (($t_mem_name_field!='')&&($t_mem_surname_field!='')&&($t_mem_position_title_field!='')&&($t_mem_position_detail_field!='')
			&&($t_mem_facebook_field!='')&&($t_mem_twitter_field!='')&&($t_mem_linkedin_field!='')) 
		{

				$update_item_detail = $this->our_team_model->updateTeamMemDetail(
																					$t_mem_id,
																					$t_mem_name_field,
																					$t_mem_surname_field,
																					$t_mem_position_title_field,
																					$t_mem_position_detail_field,
																					$t_mem_facebook_field,
																					$t_mem_twitter_field,
																					$t_mem_linkedin_field
																				);
				if ($update_item_detail == TRUE) 
				{
					$message = 'Tebrikler! Güncelleme Başarılı.';
					$return_path = 'allTeam';
					$this->jquery_notification_library->successMessage($message, $return_path,2);					
				}
				else
				{
					$message = 'HATA:: Güncelleme Başarısız..!';
					$return_path = "updateForm/$t_mem_id";
					$this->jquery_notification_library->errorMessage($message, $return_path,2);					
				}																				
		}
		else 
		{
			$message = 'Lütfen Boş Alan Bırakmayınız..!';
			$return_path = "updateForm/$t_mem_id";
			$this->jquery_notification_library->errorMessage($message, $return_path,2);				
		}		

	}


	public function photoUploadForm($t_mem_id, $photo_id)
	{
		$this->parser_data['id'] = $t_mem_id;
		$this->parser_data['photo_id']	= $photo_id;
		
		$this->parser_data['action'] = 'ourTeam/photoUpload';

		$this->parser->parse('backend_views/admin_header_view',$this->parser_data);
		$this->parser->parse('backend_views/admin_main_view',$this->parser_data);
		$this->parser->parse('backend_views/photo_upload_form',$this->parser_data);
		$this->parser->parse('backend_views/admin_footer_view',$this->parser_data);			
	}


	public function photoUpload()
	{
		$id 		= $this->input->post('id');
		$photo_id 	= $this->input->post('photo_id');

		$records = $this->our_team_model->readRow($id);
		$image_name = filterForeignChars($records[0]['t_mem_name']);

		$array = array(
							'image_form_field'	=>	'photo_field',
							'upload_path'		=>	'assets/images/team',
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
				if (($this->our_team_model->deletePhotoRow($photo_id)==TRUE) &&
					($this->our_team_model->insertNewTeamMemPhoto($big_img_data_for_db, $thumb_img_data_for_db, $id) == TRUE))
				{
					$message = 'Fotoğraf Yenileme Başarılı..!';
					$return_path = 'allTeam';
					$this->jquery_notification_library->successMessage($message, $return_path,1);
				}
				else
				{
					$message = 'HATA:: kayıt yenilenemedi!';
					$return_path = "photoUploadForm/$id/$photo_id";
					$this->jquery_notification_library->errorMessage($message, $return_path,2);	
				}
			}
			else
				echo 'resim silinemedi';
		}	
		elseif ($this->image_upload_resize_library->isSelectedAnyFile()!=TRUE) 
		{
			$message = 'HATA:: Fotoğraf Seçilmedi!';
			$return_path = "photoUploadForm/$id/$photo_id";
			$this->jquery_notification_library->errorMessage($message, $return_path,2);				
		}
		else
		{
			$message = 'HATA:: Fotoğraf Yüklenemedi!';
			$return_path = "photoUploadForm/$id/$photo_id";
			$this->jquery_notification_library->errorMessage($message, $return_path,2);				
		}	
	

	}


	public function deleteItem($id)
	{
		if ($this->deleteItemPhoto($id)==TRUE) 
		{
			if ($this->our_team_model->deleteRow($id) == TRUE)
			{
				$message = 'Kayıt Silme Başarılı..!';
				$return_path = '../allTeam';
				$this->jquery_notification_library->successMessage($message, $return_path,1);					
			}
			else
			{
				$message = 'HATA:: Kayıt Silme Başarısız..!';
				$return_path = '../allTeam';
				$this->jquery_notification_library->errorMessage($message, $return_path,1);					
			}
		}
	}


	protected function deleteItemPhoto($id)
	{
		$image_paths = $this->our_team_model->readRow($id);

		$files = array($image_paths[0]['t_mem_big_photo'], $image_paths[0]['t_mem_thumb_photo']);
		
		if (unLinkFile($files) == TRUE) 
			return TRUE;
		else
			return FALSE;
	}


}		