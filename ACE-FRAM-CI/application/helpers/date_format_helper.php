<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('getYMD'))
{
	function getYMD($date)
	{
		if(!empty($date)) {
			$array = explode('/', $date);
			return date("Y-m-d", strtotime($array[2].'-'.$array[1].'-'.$array[0]));
		} else {
			return;
		}
	}
}


if ( ! function_exists('getDMY'))
{
	function getDMY($date)
	{
		if(!empty($date) && $date != '0000-00-00 00:00:00' && $date != '0000-00-00') {
			$date = date("Y-m-d", strtotime($date));
			$array = explode('-', $date);
			return $array[2].'/'.$array[1].'/'.$array[0];
		} else {
			return;
		}
	}
}


if ( ! function_exists('getNumber'))
{
	function getNumber($n)
	{
		return number_format($n, 2, '.', ',');;
		
	}
}



// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */