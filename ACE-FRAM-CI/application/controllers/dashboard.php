<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	static $model 	= array();
	static $helper	= array();
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		isActiveUser();
	}

	public function index()
	{

		$this->load->view('dashboard');
	}
		
}