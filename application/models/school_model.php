<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class school_model extends CI_Model {

	protected $last_record_id;

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('language_school');
        $this->model_killer_library->setNameOfIdColumn('school_id');
        $this->model_killer_library->setViewTableName('language_school_view');
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

	public function insertNewSchoolPhoto($school_big_photo, $school_thumb_photo, $parent_id = NULL)
	{
		if ($parent_id == NULL) 
			$parent_id = $this->last_record_id;

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

	public function updateSchoolDetail($school_id, $country_id, $school_name, $school_summary, $school_detail, $css_filter)
	{
		$update_data = array(
								'country_id' 		=> $country_id,
								'school_name' 		=> $school_name,
								'school_summary'	=> $school_summary,
								'school_detail'		=> $school_detail,
								'css_filter'		=> $css_filter
							);

		return $this->model_killer_library->updateRow($school_id, $update_data);
	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}

	public function deletePhotoRow($row_id)
	{
		$name_of_id_column = 'school_photo_id';
		$table_name = 'language_school_photo';
		return $this->model_killer_library->deleteRow($row_id, $name_of_id_column, $table_name);
	}	

}
