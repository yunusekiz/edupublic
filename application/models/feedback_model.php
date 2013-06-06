<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class feedback_model extends CI_Model {

	protected $last_record_id;

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('feedback');
        $this->model_killer_library->setNameOfIdColumn('fb_id');
        $this->model_killer_library->setViewTableName('feedback_view');
    }

	public function insertNewFeedbackDetail($fb_student_name, $fb_student_surname, $fb_title, $fb_detail, $fb_country, $fb_lang_school)
	{
		$insert_data = array(
								'fb_student_name' 		=> $fb_student_name,
								'fb_student_surname' 	=> $fb_student_surname,
								'fb_title'				=> $fb_title,
								'fb_detail'				=> $fb_detail,
								'fb_country'			=> $fb_country,
								'fb_lang_school'		=> $fb_lang_school
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}

	public function insertNewFeedbackPhoto($fb_big_photo, $fb_thumb_photo, $parent_id = NULL)
	{
		if ($parent_id == NULL) 
			$parent_id = $this->last_record_id;

		$insert_data = array(
								'fb_id'				=> $parent_id,
								'fb_big_photo'		=> $fb_big_photo,
								'fb_thumb_photo'	=> $fb_thumb_photo
							);

		$this->model_killer_library->setTableName('feedback_photo');
		return $this->model_killer_library->insertNewRow($insert_data);
	}

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateTeamMemDetail($fb_id, $fb_student_name, $fb_student_surname, $fb_title, $fb_detail, $fb_country, $fb_lang_school)
	{
		$update_data = array(
								'fb_student_name' 		=> $fb_student_name,
								'fb_student_surname' 	=> $fb_student_surname,
								'fb_title'				=> $fb_title,
								'fb_detail'				=> $fb_detail,
								'fb_country'			=> $fb_country,
								'fb_lang_school'		=> $fb_lang_school
							);

		return $this->model_killer_library->updateRow($fb_id, $update_data);

	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}

	public function deletePhotoRow($row_id)
	{
		$name_of_id_column = 'fb_photo_id';
		$table_name = 'feedback_photo';
		return $this->model_killer_library->deleteRow($row_id, $name_of_id_column, $table_name);
	}

}
