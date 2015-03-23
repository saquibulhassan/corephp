<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

	static $model 	= array('M_supplier', 'M_location');
	static $helper	= array();
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		$this->load->library('pagination');
		isActiveUser();
	}

	public function index()
	{
		$perPage				= get_cookie('per-page') ? get_cookie('per-page') : 10;
		$sorting				= get_cookie('sorting-key') ? get_cookie('sorting-key') : 's';
		$sortingValue			= get_cookie('sorting-value') ? get_cookie('sorting-value') : 'asc';
		$onset					= get_cookie('onset') ? get_cookie('onset') : 0;
		$filter					= get_cookie('filter-key') ? get_cookie('filter-key') : '';
		$filterValue			= get_cookie('filter-value') ? get_cookie('filter-value') : '';

		switch ($sorting) {
			case 's':	$sortingKey = 'SupName';	  break;
			case 'e':	$sortingKey = 'Email';	  break;
			case 'c':	$sortingKey = 'ContPerson';	  break;
			case 'b':	$sortingKey = 'CurBalance';	  break;
		}

		switch ($filter) {
			case 's':	$filterKey 	= 'SupName';	break;
			case 'e':	$filterKey 	= 'Email';	 	break;
			case 'm':	$filterKey 	= 'Mobile';	 	break;
			case 'c':	$filterKey 	= 'ContPerson';	break;
			default:	$filterKey 	= 'SupName'; 	break;
		}

		if($sortingValue == 'asc') {
			$sortingClass = 'sorting_asc';
		} else if($sortingValue == 'desc') {
			$sortingClass = 'sorting_desc';
		} else {
			$sortingClass = '';
		}

		$data					= array('perPage' => $perPage, 'sorting' => $sorting, 'sortingClass' => $sortingClass, 'filter' => $filter, 'filterValue' => $filterValue);
		
		$data['supplierList'] 	= $this->M_supplier->findAll(array(), $perPage, $onset, $sortingKey, $sortingValue, $filterKey, $filterValue);

		$config['base_url'] 	= base_url();
		$config['total_rows'] 	= $this->M_supplier->countAll(array(), $filterKey, $filterValue);
		$config['per_page'] 	= $perPage;
		$config['cur_page'] 	= $onset;

		$this->pagination->initialize($config); 

		$this->load->view('supplier/list', $data);
	}


	public function new_()
	{

		$supplierInfo 				= new stdClass();
		$supplierInfo->SupID 		= '';
		$supplierInfo->SupType 		= '';
		$supplierInfo->SupName 		= '';
		$supplierInfo->Address 		= '';
		$supplierInfo->Tel 			= '';
		$supplierInfo->Fax 			= '';
		$supplierInfo->Email 		= '';
		$supplierInfo->Mobile 		= '';
		$supplierInfo->OpenBal 		= '';
		$supplierInfo->OpenDate 	= '';
		$supplierInfo->ContPerson 	= '';
		$supplierInfo->LocID 		= '';
		$supplierInfo->Remarks 		= '';

		$data['supplierInfo'] = $supplierInfo;
		$data['locationList'] = $this->M_location->findAll(array(), 0);

		$this->load->view('supplier/form', $data);
	}

	public function edit($id)
	{

		$data['supplierInfo'] = $this->M_supplier->findById($id);
		$data['locationList'] = $this->M_location->findAll(array(), 0);

		$this->load->view('supplier/form', $data);
	}

	public function save()
	{
		$SupID					= $this->input->post('SupID');
		$data['SupType'] 		= $this->input->post('SupType');
		$data['SupName'] 		= $this->input->post('SupName');
		$data['Address'] 		= $this->input->post('Address');
		$data['Tel'] 			= $this->input->post('Tel');
		$data['Fax'] 			= $this->input->post('Fax');
		$data['Email'] 			= $this->input->post('Email');
		$data['Mobile'] 		= $this->input->post('Mobile');
		$data['OpenBal'] 		= $this->input->post('OpenBal');
		$data['OpenDate'] 		= getYMD($this->input->post('OpenDate'));
		$data['ContPerson'] 	= $this->input->post('ContPerson');
		$data['LocID'] 			= $this->input->post('LocID');
		$data['Remarks'] 		= $this->input->post('Remarks');

		if(!empty($SupID)) {
			$this->M_supplier->update($data, $SupID);
			$message = 'Supplier update successfull';
		} else {
			$data['CurBalance'] = $this->input->post('OpenBal');
			$this->M_supplier->save($data);
			$message = 'Supplier add successfull';
		}
			
		$returnData = array('hasError' => 0, 'class' => 'success', 'message' => $message, 'detailMessage' => '' );
		echo json_encode($returnData);
	}

	public function delete()
	{
		$id = $this->input->post('id');

		if(!empty($id)) {
			$this->M_supplier->destroy($id);
		}
			
		$returnData = array('hasError' => 0, 'class' => 'success', 'message' => 'Supplier delete successfull', 'detailMessage' => '' );
		echo json_encode($returnData);
	}
		
}