<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('filterForeignChars'))
{

	function filterForeignChars($denek)
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



}