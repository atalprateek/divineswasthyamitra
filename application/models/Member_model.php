<?php
class Member_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
    
	public function addmember($data){
		$data['referral_code']=strtoupper(random_string('alnum', 8));
		$data['referral_code']=$this->verifyrefcode($data['referral_code']);
		if($this->db->insert("members",$data)){
            return array("status"=>true,"message"=>"Member Added Successfully!");
		}
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
	}
	
	public function verifyrefcode($referral_code){
		$check=$this->db->get_where("members","referral_code='$referral_code'")->num_rows();
		if($check){
			$referral_code=strtoupper(random_string('alnum', 8));
			return $this->verifyrefcode($referral_code);
		}
		else{
			return $referral_code;
		}
	}
	
	public function insertward($warddata){
		if($this->db->insert_batch("ward",$warddata)){
            return array("status"=>true,"message"=>"Ward Added Successfully!");
		}
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
	}
	
	public function getwards($where=array(),$type="all"){
		$this->db->where($where);
		$query=$this->db->get("ward");
		if($type=='all'){ $array=$query->result_array(); }
		else{ $array=$query->unbuffered_row('array'); }
		return $array;
	}
	
	public function gethcas($where=array(),$type="all"){
		if(empty($where)){
			$where['t1.role']='hca';
		}
		$this->db->select("t1.*,t2.referral_code,t2.district");
		$this->db->from('users t1');
		$this->db->join('members t2','t2.user_id=t1.id','Left');
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
	
    public function getrefid($refcode){
        $query=$this->db->get_where("members",array("referral_code"=>$refcode));
        if($query->num_rows()==1){
            $user_id=$query->unbuffered_row()->user_id;
            return array("status"=>true,"user_id"=>$user_id);
        }
        else{
            return array("status"=>false);
        }
    }
    
	public function getmembers($where=array(),$type="all"){
		if(empty($where)){
			$where['t1.role']='member';
		}
        $columns="t1.*,t2.aadhar,t2.gender,t2.age,t2.address,t2.state,t2.district,t2.card_no,t2.ward,t2.referral_code,
                    t2.amobile,t2.pincode,t2.nurse_id";
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
    
	public function getfamilymembers($where){
		$query = $this->db->get_where("member_family",$where);
		$result=$query->result_array();
		return $result;
	}
    
	public function updatemember($data,$where){
		if($this->db->update("members",$data,$where)){
            return array("status"=>true,"message"=>"Profile Updated Successfully!");
		}
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
	}
	
	public function addfamily($data){
		$user=$data['user'];
		$member=$this->account->getuser(array("md5(id)"=>$user));
		$user_id=$member['user']['id'];
		$ids=$data['id'];
		$names=$data['name'];
		$relations=$data['relation'];
		$ages=$data['age'];
		$genders=$data['gender'];
		$data=array();
		$updata=array();
		$where=array();
		foreach($names as $key=>$name){
			if($name=='' && $ids[$key]==''){ continue; }
			if($ids[$key]==''){
				$data[]=array("name"=>$name,"relation"=>$relations[$key],"age"=>$ages[$key],"gender"=>$genders[$key],"user_id"=>$user_id);
			}
			else{
				$updata[]=array("name"=>$name,"relation"=>$relations[$key],"age"=>$ages[$key],"gender"=>$genders[$key],"user_id"=>$user_id);
				$where[]=array('id'=>$ids[$key]);
			}
		}
		if(!empty($data)){
			$this->db->insert_batch("member_family",$data);
		}
		if(!empty($updata)){
			foreach($updata as $key=>$value){
				$this->db->update("member_family",$value,$where[$key]);
			}
		}
		return true;
	}
	
	public function updatepaidstatus($id){
		$result=array();
		if($this->db->update("users",array("paid"=>'1'),array("id"=>$id))){
			$result['status']	=true;
			$result['member']=$this->db->get_where("users",array("id"=>$id))->unbuffered_row('array');
		}
		else{ $result=$this->db->error();$result['status']=false; }
		return $result;
	}
	
	public function deletemember($id){
		if($this->db->delete("users",array("id"=>$id))){
            $this->db->delete("members",array("user_id"=>$id));
            $this->db->delete("member_family",array("user_id"=>$id));
            return array("status"=>true,"message"=>"Member Deleted Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
	}
	
	public function addcardno($data,$id){
		$where['user_id']=$id;
		$array=$this->db->get_where("members",$where)->unbuffered_row('array');
		$filename=generate_slug($array['name'].'-'.$data['card_no']).'.jpg';
		$data['cardfile']="assets/images/cards/".$filename;
		if($this->db->update("members",$data,$where)){
			$salt=$this->db->get_where("users",array("id"=>$id))->row()->salt;
			$data=array("id"=>$id,"card_no"=>$data['card_no'],"name"=>$array['name'],"issue"=>$data['issue_date'],"aadhar"=>$array['aadhar'],"salt"=>$salt);
            $hce=$this->db->get_where("members",array("user_id"=>$array['refid']))->unbuffered_row()->name;
			$getfamily=$this->db->get_where("member_family",array("user_id"=>$id));
			$family=array();
			if($getfamily->num_rows()>0){
				$members=$getfamily->result_array();
				foreach($members as $member){
					$family[]=$member['name'];
				}
			}
			//$address=explode(',',$array['address']);
			$address=$array['address'];
			$data['hce']=$hce;
			$data['members']=$family;
			$data['address']=$address;
			$data['address2']=$array['district'].','.$array['state'];
			$data['mobile']=$array['mobile'];
			//createverticalcard($data);
            return array("status"=>true,"message"=>"Member Card Added Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
		}
	}
	
}
