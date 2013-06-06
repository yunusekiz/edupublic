<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class visa_model extends CI_Model {

	protected $last_record_id;

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('visa');
        $this->model_killer_library->setNameOfIdColumn('visa_id');
        $this->model_killer_library->setViewTableName('visa_view');
    }

	public function insertNewVisaDetail($visa_title, $visa_detail, $visa_css_filter = NULL)
	{
		$insert_data = array(
								'visa_title' 		=> $visa_title,
								'visa_detail' 		=> $visa_detail,
								'visa_css_filter'	=> $visa_css_filter
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}

	public function insertNewVisaPhoto($visa_big_photo, $visa_thumb_photo, $parent_id = NULL)
	{
		if ($parent_id == NULL) 
			$parent_id = $this->last_record_id;

		$insert_data = array(
								'visa_id'				=> $parent_id,
								'visa_big_photo'		=> $visa_big_photo,
								'visa_thumb_photo'		=> $visa_thumb_photo
							);

		$this->model_killer_library->setTableName('visa_photo');
		return $this->model_killer_library->insertNewRow($insert_data);
	}

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateVisaDetail($visa_id, $visa_title, $visa_detail, $visa_css_filter = NULL)
	{
		$update_data = array(
								'visa_title' 		=> $visa_title,
								'visa_detail' 		=> $visa_detail,
								'visa_css_filter'	=> $visa_css_filter
							);

		return $this->model_killer_library->updateRow($visa_id, $update_data);

	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}

	public function deletePhotoRow($row_id)
	{
		$name_of_id_column = 'visa_photo_id';
		$table_name = 'visa_photo';
		return $this->model_killer_library->deleteRow($row_id, $name_of_id_column, $table_name);
	}	

}
