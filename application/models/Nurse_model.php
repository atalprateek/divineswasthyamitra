<?php
class Nurse_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
    
	public function addnurse($data){
		if($this->db->insert("nurses",$data)){
            return array("status"=>true,"message"=>"Nurse Added Successfully!");
		}
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
	}
	
	public function getnurses($where=array(),$type="all"){
		if(empty($where)){
			$where['t1.role']='nurse';
		}
		$this->db->select("t1.*,t2.district,t2.aadhar,t2.gender,t2.age,t2.address,t2.state");
		$this->db->from('users t1');
		$this->db->join('nurses t2','t2.user_id=t1.id','Left');
		$this->db->where($where);
		$query=$this->db->get();
		if($type=='all'){
			$array=$query->result_array();
		}
		else{
			$array=$query->unbuffered_row('array');	
		}
		return $array;
	}
	
	public function updatenurse($data,$where){
		if($this->db->update("nurses",$data,$where)){
            return array("status"=>true,"message"=>"Nurse Updated Successfully!");
		}
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
	}
	
	public function getpatients($where=array(),$type="all"){
		if(empty($where)){
			$where['t1.role']='member';
		}
        $columns="t1.*,t2.aadhar,t2.gender,t2.age,t2.address,t2.state,t2.district,t2.card_no,t2.ward,t2.referral_code,
                    t2.amobile,t2.pincode";
		$this->db->select($columns);
		$this->db->from('users t1');
		$this->db->join('members t2','t2.user_id=t1.id');
		$this->db->where($where);
		$query=$this->db->get();
		if($type=='all'){
			$array=$query->result_array();
		}
		else{
			$array=$query->unbuffered_row('array');	
		}
		return $array;
	}
    
	public function savecheckup($data){
        $data['added_on']=date('Y-m-d H:i:s');
		if($this->db->insert("monthly_checkup",$data)){
            return array("status"=>true,"message"=>"Monthly Checkup Added Successfully!");
		}
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
	}
	
}
