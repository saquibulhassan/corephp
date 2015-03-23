<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NotFound extends CI_Controller {

	static $model 	= array();
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

		$this->load->view('notFound');
	}
		
}