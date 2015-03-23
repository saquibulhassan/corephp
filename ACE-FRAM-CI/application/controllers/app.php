<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

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
		$data  		= array();
		$this->load->view('app', $data);
	}
		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */