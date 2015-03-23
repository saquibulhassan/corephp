<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	static $model 	= array('M_userinfo');
	static $helper	= array();
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		$this->load->library('pagination');
	}

	public function index()
	{

		$this->load->view('login');
	}

	public function action()
	{

		loginUser();
	}

	public function logout()
	{

		logoutUser();
	}
		
}