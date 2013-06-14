<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class school_slider_model extends CI_Model {

	protected $last_record_id;

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('school_slider');
        $this->model_killer_library->setNameOfIdColumn('slider_id');
        $this->model_killer_library->setViewTableName('school_slider_view');
    }

	public function insertNewSchoolSlider($school_id, $slider_caption, $css_filter)
	{
		$insert_data = array(
								'school_id' 		=> $school_id,
								'slider_caption' 	=> $slider_caption,
								'css_filter'		=> $css_filter
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}

	public function insertNewSchoolSliderPhoto($slider_big_photo, $slider_thumb_photo, $parent_id=NULL)
	{
		if ($parent_id == NULL) 
			$parent_id = $this->last_record_id;

		$insert_data = array(
								'slider_id'				=> $parent_id,
								'slider_big_photo'		=> $slider_big_photo,
								'slider_thumb_photo'	=> $slider_thumb_photo
							);

		$this->model_killer_library->setTableName('school_slider_photo');
		return $this->model_killer_library->insertNewRow($insert_data);
	}

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateSchoolSliderDetail($slider_id, $school_id, $slider_caption, $css_filter)
	{
		$update_data = array(
								'school_id' 		=> $school_id,
								'slider_caption' 	=> $slider_caption,
								'css_filter'		=> $css_filter
							);

		return $this->model_killer_library->updateRow($slider_id, $update_data);
	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}

	public function deletePhotoRow($row_id)
	{
		$name_of_id_column = 'slider_photo_id';
		$table_name = 'school_slider_photo';
		return $this->model_killer_library->deleteRow($row_id, $name_of_id_column, $table_name);
	}

	public function readParentRow()
	{
        $this->model_killer_library->setTableName('language_school');
        $this->model_killer_library->setNameOfIdColumn('school_id');
        return $this->model_killer_library->readParentRow();		
	}

}
