<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promo_slider_model extends CI_Model {

	protected $last_record_id;

	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('promo_slider');
        $this->model_killer_library->setNameOfIdColumn('slider_id');
        //$this->model_killer_library->setViewTableName('view_table_of_team');
    }

	public function insertNewPromoSlider($big_text, $little_text_1, $little_text_2)
	{
		$insert_data = array(
								'big_text' 			=> $big_text,
								'little_text_1' 	=> $little_text_1,
								'little_text_2'		=> $little_text_2
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updatePromoSlider($slider_id, $big_text, $little_text_1, $little_text_2)
	{
		$update_data = array(
								'big_text' 			=> $big_text,
								'little_text_1' 	=> $little_text_1,
								'little_text_2'		=> $little_text_2
							);

		return $this->model_killer_library->updateRow($slider_id, $update_data);
	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}

}