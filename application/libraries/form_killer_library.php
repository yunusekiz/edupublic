<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class form_killer_library{

	// codeigniter ın orijinal class larına ulaşmak için bu deiğşken kullanılacak
	private $CI;

	private $parser_data;

	public function __construct()
	{
		$this->CI =& get_instance();
	}


	private function filterForeignChars($denek)
	{
		$denek = strtr($denek, array(	'Ü' => 'U', 'Ş' => 'S', 'Ç' => 'C',
										'İ' => 'I', 'Ğ'	=> 'G', 'Ö' => 'O', 
										'ü'	=> 'u', 'ö' => 'o', 'ş' => 's',
										'ç' => 'c', 'ı' => 'i', 'ğ' => 'g'
									));
		
		$denek = preg_replace('/\%/',' percentage',$denek); 
		$denek = preg_replace('/\@/',' at ',$denek); 
		$denek = preg_replace('/\&/',' and ',$denek); 
		$denek = preg_replace('/\s[\s]+/','-',$denek);    // Strip off multiple spaces 
		$denek = preg_replace('/[\s\W]+/','-',$denek);    // Strip off spaces and non-alpha-numeric 
		$denek = preg_replace('/^[\-]+/','',$denek); // Strip off the starting hyphens 
		$denek = preg_replace('/[\-]+$/','',$denek);
		return $denek;
	}


	private function create_insert_form_field($field_name, $field_type, $filtered_name)
	{
		switch ($field_type) 
		{
			case 'text':
				return "
				<p>
					<label> $field_name </label>               
					<input class=\"text-input large-input\" type=\"text\" 
					style=\"color:#000;\" id=\"large-input\" name=\"$filtered_name\" />
				</p><br />";
				break;

			case 'textarea':
				return "
				<p>
					<label>Detay $field_name </label>
					<textarea class=\"text-input textarea\" id=\"textarea\" name=\"$filtered_name\" cols=\"79\" rows=\"10\" style=\"color:#000;\"></textarea>
				</p><br />";
				break;

			case 'file':
				return "
				<p>
				<label><b style=\"font-size:16px;\">$field_name</b> </label>
					<input type=\"file\" name=\"$filtered_name\" accept=\"image/*\" />
				</p><br />";
				break;

			default:
				return 'bilinmeyen dosya turu....';
				break;
		}
																	
	}

	private function create_update_form_field($field_name, $field_type, $filtered_name)
	{
		switch ($field_type) 
		{
			case 'text':
				return "
				<p>
					<label> $field_name </label>               
					<input class=\"text-input large-input\" type=\"text\" 
					style=\"color:#000;\" id=\"large-input\" name=\"$filtered_name\" />
				</p><br />";
				break;

			case 'textarea':
				return "
				<p>
					<label>Detay $field_name </label>
					<textarea class=\"text-input textarea\" id=\"textarea\" name=\"$filtered_name\" cols=\"79\" rows=\"10\" style=\"color:#000;\"></textarea>
				</p><br />";
				break;

			case 'file':
				return "
				<p>
				<label><b style=\"font-size:16px;\">$field_name</b> </label>
					<input type=\"file\" name=\"$filtered_name\" accept=\"image/*\" />
				</p><br />";
				break;

			default:
				return 'bilinmeyen dosya turu....';
				break;
		}
																	
	}


	public function create_insert_form($array_name)
	{
		$stream  = '';

		foreach ($array_name as $field_name => $field_type) 
		{	
			$filtered_name = $this->filterForeignChars($field_name);
			$stream .= $this->create_insert_form_field($field_name, $field_type, $filtered_name);
		}
		return $stream;
	}


}