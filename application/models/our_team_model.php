<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class our_team_model extends CI_Model {

	protected $last_record_id;


	public function __construct()
    {
        parent::__construct();

        $this->load->library('model_killer_library');
        $this->model_killer_library->setTableName('team');
        $this->model_killer_library->setNameOfIdColumn('t_mem_id');
        $this->model_killer_library->setViewTableName('team_view');
    }


	public function insertNewTeamMemDetail($t_mem_name, $t_mem_surname, $t_mem_position_title, $t_mem_position_detail, $t_mem_facebook, $t_mem_twitter, $t_mem_linkedin)
	{
		$insert_data = array(
								't_mem_name' 			=> $t_mem_name,
								't_mem_surname' 		=> $t_mem_surname,
								't_mem_position_title'	=> $t_mem_position_title,
								't_mem_position_detail'	=> $t_mem_position_detail,
								't_mem_facebook'		=> $t_mem_facebook,
								't_mem_twitter'			=> $t_mem_twitter,
								't_mem_linkedin'		=> $t_mem_linkedin
							);

		$this->model_killer_library->insertNewRow($insert_data);
		return $this->last_record_id = $this->model_killer_library->getLastRecordId();
	}

	public function insertNewTeamMemPhoto($t_mem_big_photo, $t_mem_thumb_photo, $parent_id = NULL)
	{
		if ($parent_id == NULL) 
			$parent_id = $this->last_record_id;
		
		$insert_data = array(
								't_mem_id'			=> $parent_id,
								't_mem_big_photo'	=> $t_mem_big_photo,
								't_mem_thumb_photo'	=> $t_mem_thumb_photo
							);

		$this->model_killer_library->setTableName('team_photo');
		return $this->model_killer_library->insertNewRow($insert_data);
	}

	public function readRow($record_id = NULL)
	{
		return $this->model_killer_library->readRow($record_id);
	}

	public function updateTeamMemDetail($t_mem_id, $t_mem_name, $t_mem_surname, $t_mem_position_title, $t_mem_position_detail, $t_mem_facebook, $t_mem_twitter, $t_mem_linkedin)
	{
		$update_data = array(
								't_mem_name' 			=> $t_mem_name,
								't_mem_surname' 		=> $t_mem_surname,
								't_mem_position_title'	=> $t_mem_position_title,
								't_mem_position_detail'	=> $t_mem_position_detail,
								't_mem_facebook'		=> $t_mem_facebook,
								't_mem_twitter'			=> $t_mem_twitter,
								't_mem_linkedin'		=> $t_mem_linkedin
							);

		return $this->model_killer_library->updateRow($t_mem_id, $update_data);

	}

	public function deleteRow($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id);
	}


	public function deleteImageFromDB($row_id)
	{
		return $this->model_killer_library->deleteRow($row_id, 't_mem_photo_id', 'team_photo');
	}


}

	
	