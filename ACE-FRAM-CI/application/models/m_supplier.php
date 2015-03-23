<?php

	class M_supplier extends CI_Model {
	
		const TABLE	= 'supplier';
	
		public function __construct()
		{
			parent::__construct();
		}		
			
		public function save($data)
		{
			$this->db->insert(self::TABLE, $data);        
		}	
		
		public function findById($id)
		{
			$this->db->select('*');
			$this->db->from(self::TABLE);
			$this->db->where('SupID', $id);
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
			$this->db->select('*');
			$this->db->from(self::TABLE);
			$this->db->where($where);
			if($sortingKey && $sortingValue) { $this->db->order_by($sortingKey, $sortingValue); }
			if($perPage > 0) { $this->db->limit($perPage, $onset); } 
			if(!empty($filterKey)) { $this->db->like($filterKey, $filterValue); }
			$query = $this->db->get();
			return $query->result();
		}	
		
		public function update($data, $id)
		{
			$this->db->update(self::TABLE, $data, array('SupID' => $id));        
		}
		
		public function destroy($id)
		{
			$this->db->delete(self::TABLE, array('SupID' => $id));        
		}
			
	}

