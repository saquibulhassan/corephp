<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adapter extends CI_Controller {
	
	static $helper   = array('url');
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
	}
	
	
	public function javascript()
	{
		$this->output->set_status_header(200);
		$this->output->set_header('Content-type: application/x-javascript; charset=utf8');
		$this->load->view('javascript');
	}
	
		
	public function css()
	{
		$this->output->set_status_header(200);
		$this->output->set_header('Content-type: text/css; charset=utf8');
		$this->load->view('css');
	}
	

	
}