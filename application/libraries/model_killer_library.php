<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_killer_library extends CI_Model {

	// codeigniter ın orijinal class larına ulaşmak için bu deiğşken kullanılacak
	protected $CI;

	// tablo adının tutulduğu değişken
	protected $table_name;

	// eğer veritabanında ilişkili tablolar varsa,
	// bu ilişkili tabloların tek bir tabloda birleştiği sanak tablo olan VIEW in adının tutulduğu değişken
	protected $view_table_name;
	
	// tablodaki id sütünunun """sütun adının""" tutulduğu değişken
	protected $name_of_id_column;
	
	// tablodaki tüm sütun adlarının array olarak tutulduğu değişken
	protected $table_colums;

	// tabloya girilen son kayıta ait id numarasının tutulduğu değişken
	protected $last_record_id;

	public function __construct()
	{
		parent::__construct();
		$this->CI =& get_instance();
	}

	// tablo adını set eder
	public function setTableName($table_name)
	{
		$this->table_name = $table_name;
	}
	public function getTableName()
	{
		return $this->table_name;
	}

	public function setViewTableName($view_table_name)
	{
		$this->view_table_name = $view_table_name;
	}
	public function getViewTableName()
	{
		return $this->view_table_name;
	}

	// tablodaki id sütünunun """sütun adını""" set eder
	public function setNameOfIdColumn($name_of_id_column)
	{
		$this->name_of_id_column = $name_of_id_column;
	}
	public function getNameOfIdColumn()
	{
		return $this->name_of_id_column;
	}


	// tabloya yeni kayıt ekler. hangi tabloya kayıt ekleyeceğini class instance edilirken ki girilen parametrelerden bulur.
	public function insertNewRow($insert_data = array())
	{
		$query = $this->db->insert($this->table_name, $insert_data);

		if ($this->db->affected_rows()>0)
		{
			$this->last_record_id = $this->db->insert_id();
			return TRUE;			
		}
		else
			return FALSE;
	}
	public function getLastRecordId()
	{
		return $this->last_record_id;
	}
	public function setLastRecordId($last_record_id)
	{
		$this->last_record_id = $last_record_id;
	}


	// tablodan satır veya satırlar okur. hangi tabloyu okuyacağını class instance edilirken ki girilen parametrelerden bulur.
	public function readRow($record_id = NULL)
	{
		if (($this->view_table_name == NULL) && ($record_id == NULL))
		{
			$query = $this->db->select('*')->from($this->table_name)->get();
			if ($query->num_rows()>0)
				return $query->result_array();
			else
				return NULL;
		}
		elseif (($this->view_table_name == NULL) && ($record_id != NULL)) 
		{
			$query = $this->db->select('*')->from($this->table_name)->where($this->name_of_id_column, $record_id)->get();
			if($query->num_rows()>0)
				return $query->result_array();
			else
				return NULL;			
		}
		elseif(($this->view_table_name != NULL) && ($record_id != NULL))
		{
			$query = $this->db->select('*')->from($this->view_table_name)->where($this->name_of_id_column, $record_id)->get();
			if($query->num_rows()>0)
				return $query->result_array();
			else
				return NULL;				
		}
		else // ($this->view_table_name != NULL) && ($record_id == NULL)
		{
			$query = $this->db->select('*')->from($this->view_table_name)->get();
			if($query->num_rows()>0)
				return $query->result_array();
			else
				return NULL;				
		}
	}


	// tabloda update işlemi yapar. hangi tabloyu update edeceğini class instance edilirken ki girilen parametrelerden bulur.
	public function updateRow($record_id, $update_data)
	{
		$query = $this->db->where($this->name_of_id_column, $record_id)->update($this->table_name, $update_data);

		if ($this->db->_error_message() == NULL)
			return TRUE;
		else
			return FALSE;	
	}


	// tablodan kayıt siler. hangi tablodan kayıt sileceğini class instance edilirken ki girilen parametrelerden bulur.
	public function deleteRow($row_id)
	{
		$query = $this->db->where($this->name_of_id_column, $row_id)->delete($this->table_name);

		if($this->db->affected_rows()>0)
			return TRUE;
		else
			return FALSE;
	}


	public function __destruct()
	{
		unset($this->table_name);
	}


}
