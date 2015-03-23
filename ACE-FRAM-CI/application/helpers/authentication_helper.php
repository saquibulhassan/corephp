<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('loginUser'))
{
	function loginUser()
	{
		$_CI = &get_instance();
		
		$LoginName			 = $_CI->input->post('LoginName');
		$Password			 = $_CI->input->post('Password');
		$pass_md5			 = md5($Password);
		
		$model				 = $_CI->M_userinfo->findByLoginName($LoginName);
		
		if( !empty($model) && $model->dPassword  == $pass_md5) {
			setUserData($LoginName);

			$data['hasError']	= 0;
			$data['redirect']	= 'app';
		}  else  {
			$data['hasError']	= 1;
			$data['msg']		= 'User ID or Password is not Valid !';
		}

		echo json_encode($data);
	}
}



if ( ! function_exists('setUserData'))
{
	function setUserData($LoginName)
	{
		$_CI = &get_instance();
		$userData	= array(
			'LoginName'    => $LoginName
		);
		$_CI->session->set_userdata($userData);
	}
}


if ( ! function_exists('isActiveUser'))
{
	function isActiveUser()
	{
		$_CI = &get_instance();
		$LoginName = $_CI->session->userData('LoginName');
		
		if( $LoginName == NULL ) {
			redirect('login');
		}
		return true;
	}
}


if ( ! function_exists('logoutUser'))
{
	function logoutUser()
	{
		setUserData(NULL);
		
		if(!isActiveUser()){
			redirect('login');
		}
	}
}



// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */