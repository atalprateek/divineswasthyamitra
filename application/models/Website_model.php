<?php
class Website_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
    
	public function getstate($where=array()){
		$this->db->where($where);
		$this->db->order_by("state");
		$query=$this->db->get('state');
		$array=$query->result_array();
		return $array;
	}
	
	public function getdistrict($where=array()){
		$this->db->where($where);
		$query=$this->db->get('district');
		$array=$query->result_array();
		return $array;
	}
	
	public function getlocation($where=array()){
		$this->db->where($where);
		$query=$this->db->get('constituency');
		$array=$query->result_array();
		return $array;
	}
    
	public function getcategory($where=array()){
		$this->db->where($where);
		$query=$this->db->get("category");
		$array=$query->result_array();
		return $array;
	}
	
	public function getdiscount($category_id){
		$query=$this->db->get_where("discount_slab",array("category_id"=>$category_id));
		$array=$query->result_array();
		return $array;
	}
	
    public function addtestimonial($data){
        if($this->db->insert("testimonials",$data)){
            return array("status"=>true,"message"=>"Testimonial Added Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function gettestimonials($where=array(),$type="all"){
        $this->db->where($where);
        $query=$this->db->get("testimonials");
        if($type=='all'){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updatetestimonial($data){
        $id=$data['id'];
        unset($data['id']);
        $where=array("id"=>$id);
        if($this->db->update("testimonials",$data,$where)){
            return array("status"=>true,"message"=>"Testimonial Updated Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function getpages($where=array(),$type="all"){
        $this->db->where($where);
        $query=$this->db->get("pages");
        if($type=='all'){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updatepage($data){
        $id=$data['id'];
        unset($data['id']);
        $where=array("id"=>$id);
        if($this->db->update("pages",$data,$where)){
            return array("status"=>true,"message"=>"$data[page] Updated Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function savejoinus($data){
        $check=$this->db->get_where("joinus",array("mobile"=>$data['mobile'],"email"=>$data['email']))->num_rows();
        if($check==0){
            if($this->db->insert("joinus",$data)){
                return array("status"=>true,"message"=>"Details Added Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Details Already Added!");
        }
    }
    
    public function getjoinuslist($where=array(),$type="all"){
        $this->db->where($where);
        $query=$this->db->get("joinus");
        if($type=='all'){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
}