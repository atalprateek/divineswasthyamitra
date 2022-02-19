<?php
class Masterkey_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
    
    public function addexam($data){
        $check=$this->db->get_where("exams",array("name"=>$data['name']))->num_rows();
        if($check==0){
            if($this->db->insert("exams",$data)){
                return array("status"=>true,"message"=>"Exam Added Successfully");
            }
            else{
                $err=$this->db->error();
                return array("status"=>false,"message"=>$err['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Exam Already Added!");
        }
    }
    
    public function getexams($where=array(),$type="all"){
        $this->db->where($where);
        $query=$this->db->get("exams");
        if($type=="all"){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updateexam($data){
        $check=$this->db->get_where("exams",array("name"=>$data['name'],"id!="=>$data['id']))->num_rows();
        if($check==0){
            $where=array("id"=>$data['id']);
            unset($data['id']);
            if($this->db->update("exams",$data,$where)){
                return array("status"=>true,"message"=>"Exam Updated Successfully");
            }
            else{
                $err=$this->db->error();
                return array("status"=>false,"message"=>$err['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Exam Already Added!");
        }
    }

    public function addsubject($data){
        $check=$this->db->get_where("subjects",array("name"=>$data['name']))->num_rows();
        if($check==0){
            if($this->db->insert("subjects",$data)){
                return array("status"=>true,"message"=>"Subject Uploaded Successfully");
            }
            else{
                $err=$this->db->error();
                return array("status"=>false,"message"=>$err['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Subject Already Added!");
        }
    }
    
    public function getsubjects($where=array(),$type="all"){
        $this->db->select("t1.*");
        $this->db->where($where);
        $this->db->from("subjects t1");
        $this->db->order_by("t1.id");
        $query=$this->db->get();
        if($type=="all"){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updatesubject($data){
        $check=$this->db->get_where("subjects",array("name"=>$data['name'],"id!="=>$data['id']))->num_rows();
        if($check==0){
            $where=array("id"=>$data['id']);
            unset($data['id']);
            if($this->db->update("subjects",$data,$where)){
                return array("status"=>true,"message"=>"Subject Updated Successfully");
            }
            else{
                $err=$this->db->error();
                return array("status"=>false,"message"=>$err['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Subject Already Added!");
        }
    }
    
    public function addchapter($data){
        $check=$this->db->get_where("chapters",array("name"=>$data['name'],"subject_id"=>$data['subject_id']))->num_rows();
        if($check==0){
            if($this->db->insert("chapters",$data)){
                return array("status"=>true,"message"=>"Chapter Saved Successfully");
            }
            else{
                $err=$this->db->error();
                return array("status"=>false,"message"=>$err['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Chapter Already Added!");
        }
    }
    
    public function getchapters($where=array(),$type="all"){
        $this->db->select("t1.*,t2.name as subject_name");
        $this->db->where($where);
        $this->db->from("chapters t1");
        $this->db->join("subjects t2","t1.subject_id=t2.id");
        $this->db->order_by("t1.id");
        $query=$this->db->get();
        if($type=="all"){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updatechapter($data){
        $where1=array("name"=>$data['name'],"subject_id"=>$data['subject_id'],"id!="=>$data['id']);
        $check=$this->db->get_where("chapters",$where1)->num_rows();
        if($check==0){
            $where=array("id"=>$data['id']);
            unset($data['id']);
            if($this->db->update("chapters",$data,$where)){
                return array("status"=>true,"message"=>"Chapter Updated Successfully");
            }
            else{
                $err=$this->db->error();
                return array("status"=>false,"message"=>$err['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Chapter Already Added!");
        }
    }
    
    public function addsyllabus($data){
        $data['added_on']=$data['updated_on']=date('Y-m-d H:i:s');
        if($this->db->insert("syllabus",$data)){
            return array("status"=>true,"message"=>"Syllabus Added Successfully");
        }
        else{
            $err=$this->db->error();
            return array("status"=>false,"message"=>$err['message']);
        }
    }
    
    public function getsyllabus($where=array(),$type="all"){
        $this->db->where($where);
        $query=$this->db->get("syllabus");
        if($type=="all"){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updatesyllabus($data){
        $data['updated_on']=date('Y-m-d H:i:s');
        $where=array("id"=>$data['id']);
        unset($data['id']);
        if($this->db->update("syllabus",$data,$where)){
            return array("status"=>true,"message"=>"Syllabus Updated Successfully");
        }
        else{
            $err=$this->db->error();
            return array("status"=>false,"message"=>$err['message']);
        }
    }

    public function addpackage($data){
        if($this->db->insert("packages",$data)){
            return array("status"=>true,"message"=>"Package Added Successfully");
        }
        else{
            $err=$this->db->error();
            return array("status"=>false,"message"=>$err['message']);
        }
    }
    
    public function getpackages($where=array(),$type="all"){
        $this->db->where($where);
        $query=$this->db->get("packages");
        if($type=="all"){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updatepackage($data){
        $where=array("id"=>$data['id']);
        unset($data['id']);
        if($this->db->update("packages",$data,$where)){
            return array("status"=>true,"message"=>"Package Updated Successfully");
        }
        else{
            $err=$this->db->error();
            return array("status"=>false,"message"=>$err['message']);
        }
    }

    
}
