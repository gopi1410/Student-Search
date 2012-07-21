<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Ip {

    public function validate_IITK()
    {
		$bool=1;
		$CI=& get_instance();
		$ip=$CI->input->ip_address();
		$arr= explode(".",$ip);
		/** INTERNAL IP ADDRESSES **/
		/*if(($arr[0]!='172') || ($arr[1]<'16') || ($arr[1]> '32' ))
		{
			$bool=0;
		}*/
		/** EXTERNAL IP ADDRESSES **/
		if(($arr[0]!='202') || ($arr[1]!='3') || ($arr[2]!='77'))
		{
			$bool=0;
		}
		if($ip==="127.0.0.1")
		{
			$bool=1;
		}
		return $bool;
    }
}

/* End of file Ip.php */