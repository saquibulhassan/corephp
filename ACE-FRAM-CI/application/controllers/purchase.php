<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase extends CI_Controller {

	static $model 	= array('M_location', 'M_supplier', 'M_purchasemain');
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
		$perPage				= get_cookie('per-page') ? get_cookie('per-page') : 1;
		$sorting				= get_cookie('sorting-key') ? get_cookie('sorting-key') : 'pd';
		$sortingValue			= get_cookie('sorting-value') ? get_cookie('sorting-value') : 'asc';
		$onset					= get_cookie('onset') ? get_cookie('onset') : 0;
		$filter					= get_cookie('filter-key') ? get_cookie('filter-key') : '';
		$filterValue			= get_cookie('filter-value') ? get_cookie('filter-value') : '';

		switch ($sorting) {
			case 'pd':	$sortingKey = 'PurDate';	  break;
			case 'pn':	$sortingKey = 'PurNo';	  	  break;
			case 's':	$sortingKey = 'SupName';	  break;
			case 'sbn':	$sortingKey = 'SupBillNo';	  break;
			case 'pa':	$sortingKey = 'TotPurAmt';	  break;
		}

		switch ($filter) {			
			case 'pn':	$filterKey 	= 'PurNo';			break;
			case 'pd':	$filterKey 	= 'PurDate';	 	break;
			case 'sbn':	$filterKey 	= 'SupBillNo';	 	break;
			default:	$filterKey 	= 'PurNo'; 			break;
		}

		if($filter == 'pd') {
			$filterValue = getYMD($filterValue);
		}

		if($sortingValue == 'asc') {
			$sortingClass = 'sorting_asc';
		} else if($sortingValue == 'desc') {
			$sortingClass = 'sorting_desc';
		} else {
			$sortingClass = '';
		}

		$data					= array('perPage' => $perPage, 'sorting' => $sorting, 'sortingClass' => $sortingClass, 'filter' => $filter, 'filterValue' => $filterValue);
		
		$data['purchaseList'] 	= $this->M_purchasemain->findAll(array(), $perPage, $onset, $sortingKey, $sortingValue, $filterKey, $filterValue);

		$config['base_url'] 	= base_url();
		$config['total_rows'] 	= $this->M_purchasemain->countAll(array(), $filterKey, $filterValue);
		$config['per_page'] 	= $perPage;
		$config['cur_page'] 	= $onset;

		$this->pagination->initialize($config); 

		$this->load->view('purchase/list', $data);
	}


	public function details($id)
	{
		$purchaseInfo				= $this->M_purchasemain->findById($id);
		$purchaseInfo->location		= $this->M_location->findById($purchaseInfo->LocID);
		$purchaseInfo->supplier		= $this->M_supplier->findById($purchaseInfo->SupID);

		$data['purchaseInfo'] 		= $purchaseInfo;

		$this->load->view('purchase/details', $data);
	}


	public function new_()
	{

		$purchaseInfo 				= new stdClass();
		$purchaseInfo->PurID 		= '';
		$purchaseInfo->PurDate 		= '';
		$purchaseInfo->LocID 		= '';
		$purchaseInfo->SupID 		= '';
		$purchaseInfo->PrevBal 		= '';
		$purchaseInfo->TotPurAmt	= '';
		$purchaseInfo->TotPaidAmt 	= '';	
		$purchaseInfo->SupBillNo	= '';
		$purchaseInfo->SupBillDate 	= '';
		$purchaseInfo->RefNo 		= '';
		$purchaseInfo->RefDate 		= '';
		$purchaseInfo->Remarks 		= '';	

		$data['purchaseInfo'] 		= $purchaseInfo;
		$data['locationList'] 		= $this->M_location->findAll(array(), 0);
		$data['supplierList'] 		= $this->M_supplier->findAll(array(), 0);

		$this->load->view('purchase/form', $data);
	}

	public function edit($id)
	{

		$data['locationList'] 		= $this->M_location->findAll(array(), 0);
		$data['supplierList'] 		= $this->M_supplier->findAll(array(), 0);
		$data['purchaseInfo']		= $this->M_purchasemain->findById($id);

		$this->load->view('purchase/form', $data);
	}

	public function save()
	{
		$PurID					= $this->input->post('PurID');
		$data['LocID'] 			= $this->input->post('LocID');
		$data['PurDate'] 		= getYMD($this->input->post('PurDate'));
		$data['SupID'] 			= $this->input->post('SupID');
		$data['PrevBal'] 		= $this->input->post('PrevBal');
		$data['SupBillNo'] 		= $this->input->post('SupBillNo');
		$data['SupBillDate'] 	= getYMD($this->input->post('SupBillDate'));
		$data['RefNo'] 			= $this->input->post('RefNo');
		$data['RefDate'] 		= getYMD($this->input->post('RefDate'));
		$data['Remarks'] 		= $this->input->post('Remarks');
		$data['TotPurAmt'] 		= $this->input->post('TotPurAmt');
		$data['TotPaidAmt'] 	= $this->input->post('TotPaidAmt');

		if(!empty($PurID)) {			
			$this->M_purchasemain->update($data, $PurID);
			$message = 'Purchase update successfull';
		} else {
			$data['PurNo'] 	= $this->M_purchasemain->getNewNo();
			$PurID 			= $this->M_purchasemain->save($data);
			$message 		= 'Purchase create successfull. New purchase no is : '.$data['PurNo'];
		}

		$returnData = array('hasError' => 0, 'class' => 'success', 'message' => $message, 'detailMessage' => '' );
		echo json_encode($returnData);
	}

	public function delete()
	{
		$id = $this->input->post('id');

		$this->M_purchasemain->destroy($id);
			
		$returnData = array('hasError' => 0, 'class' => 'success', 'message' => 'Purchase delete successfull', 'detailMessage' => '' );
		echo json_encode($returnData);
	}
		
}