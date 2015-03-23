<?php

	class M_purchasemain extends CI_Model {
	
		const TABLE	= 'purchasemain';
	
		public function __construct()
		{
			parent::__construct();
		}

		public function getNewNo()
	    {
			$query = $this->db->query("select max(cast(SUBSTRING_INDEX(PurNo,'-',-1) as UNSIGNED)) AS MaxNo from purchasemain");
		  	$query = $query->row();		
			$NewNo = "PUR-".str_pad(($query->MaxNo+1), 7, "0", STR_PAD_LEFT);		
			return $NewNo;
	    }	
			
		public function save($data)
		{
			$this->db->insert(self::TABLE, $data);   
			return $this->db->insert_id();     
		}	
		
		public function findById($id)
		{
			$this->db->select('*');
			$this->db->from(self::TABLE);
			$this->db->where('PurID', $id);
			$query = $this->db->get();
			return $query->row();
		}

		public function findByPurNo($id)
		{
			$this->db->select('*');
			$this->db->from(self::TABLE);
			$this->db->where('PurNo', $id);
			$query = $this->db->get();
			return $query->row();
		}

		public function countAll($where = array(), $filterKey = '', $filterValue = '')
	    {
	        $this->db->select('*');
	        $this->db->from(self::TABLE);
		    $this->db->where($where);
		    if(!empty($filterValue)) { $this->db->like($filterKey, $filterValue); }
			$query = $this->db->count_all_results();
	        return $query;
	    }	
	
		public function findAll($where = array(), $perPage = 10, $onset = 0, $sortingKey = '', $sortingValue = '', $filterKey = '', $filterValue = '')
		{
			$this->db->select('purchasemain.*, supplier.SupName');
			$this->db->from(self::TABLE);
			$this->db->join('supplier', 'purchasemain.SupID = supplier.SupID', 'left');
			$this->db->where($where);
			if($sortingKey && $sortingValue) { $this->db->order_by($sortingKey, $sortingValue); }
			if($perPage > 0) { $this->db->limit($perPage, $onset); } 
			if(!empty($filterKey)) { $this->db->like($filterKey, $filterValue); }
			$query = $this->db->get();
			return $query->result();
		}	
		
		public function update($data, $id)
		{
			$this->db->update(self::TABLE, $data, array('PurID' => $id));        
		}
		
		public function destroy($id)
		{
			$this->db->delete(self::TABLE, array('PurID' => $id));        
		}
			
	}

