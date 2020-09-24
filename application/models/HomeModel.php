<?php
class HomeModel extends CI_Model {

	public function Getemplist(){
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('isactive','0');
		$this->db->order_by('id','desc');
		$res= $this->db->get()->result_array();
		return $res;
	}

	public function getdata($uid){
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('id',$uid);
		$res= $this->db->get()->result_array();
		return $res;
	}

	public function insert_table($tblnm,$emparr){
		return $this->db->insert($tblnm,$emparr);
	}

	public function update_table($tblnm,$emparr,$edid){
		$this->db->where('id',$edid);
		return $this->db->update($tblnm,$emparr);
	}			

}