<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class school_model extends CI_Model {

	protected $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('language_school');
        $this->model_killer_library->setNameOfIdColumn('school_id');
        //$this->model_killer_library->setViewTableName('view_table_of_team');
    }


	public function insertNewSchoolDetail($country_id, $school_name, $school_summary, $school_detail, $css_filter)
	{
		$insert_data = array(
								'country_id' 		=> $country_id,
								'school_name' 		=> $school_name,
								'school_summary'	=> $school_summary,
								'school_detail'		=> $school_detail,
								'css_filter'		=> $css_filter
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}

	public function insertNewSchoolPhoto($school_big_photo, $school_thumb_photo)
	{
		$insert_data = array(
								'school_id'				=> $this->last_record_id,
								'school_big_photo'		=> $school_big_photo,
								'school_thumb_photo'	=> $school_thumb_photo
							);

		$this->model_killer_library->setTableName('language_school_photo');
		return $this->model_killer_library->insertNewRow($insert_data);
	}

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateSchoolDetail($fb_id, $fb_student_name, $fb_student_surname, $fb_title, $fb_detail, $fb_country, $fb_lang_school)
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
		$this->model_killer_library->deleteRow($row_id);
	}


}
