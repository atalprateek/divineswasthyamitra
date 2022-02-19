<?php
class Account_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
    
    public function register($data){
        $username=$data['username'];
        if($this->db->get_where("users",array("username"=>$username))->num_rows()>0){
            return array("status"=>false,"message"=>"Mobile No. Already Exists!");
        }
        else{
            if(!isset($data['password'])){
                $data['password']=random_string('alnum', 6);
            }
            $vp=$password=$data['password'];
            $salt=random_string('alnum', 16);
            $password=$password.SITE_SALT.$salt;
            $password=password_hash($password,PASSWORD_DEFAULT);
            $data['salt']=$salt;
            $data['password']=$password;
            $data['vp']=$vp;
            $data['created_on']=$data['updated_on']=date('Y-m-d H:i:s');
            $result=$this->db->insert("users",$data);
            if($result){
                $user_id=$this->db->insert_id();
                return array("status"=>true,"message"=>"User added Successfully!","user_id"=>$user_id,"password"=>$vp);
            }
            else{
                $err=$this->db->error();
                return array("status"=>false,"message"=>$err['message']);
            }
        }
    }
    
    public function login($data){
        $username=$data['username'];
        $where=array("username"=>$username);
        if(isset($data['role'])){
            $where['role']=$data['role'];
        }
        $flag=true;
        $msg="Wrong Username or Password!";
        $query=$this->db->get_where("users",$where);
        if($query->num_rows()==0){
            $flag=false;
        }
        else{
            $user=$query->unbuffered_row('array');
            if($user['status']==0){
                $flag=false;
                $msg="Account not Verified!";
            }
            elseif($user['status']==2){
                $flag=false;
                $msg="Invalid Login Details!";
            }
            else{
                $salt=$user['salt'];
                $password=$user['password'];
                if(!password_verify($data['password'].SITE_SALT.$salt,$password)){
                    $flag=false;
                }
            }
        }
        if($flag===true){
            return array("status"=>true,"message"=>"Successfully Logged In!",'user'=>$user);
        }
        else{
            return array("status"=>false,"message"=>$msg);
        }
    }
    
    public function createotp($where){
		$query = $this->db->get_where('users',$where);
		if($query->num_rows()>0){
			$result=$query->unbuffered_row('array');
            if($result['status']==2){ return array("status"=>false,"message"=>"Invalid Details!"); }
            else{
                $otp=random_string('numeric',6);
                $encotp=$otp.SITE_SALT.$result['salt'];
                $encotp=password_hash($encotp,PASSWORD_DEFAULT);
                $data['otp']=$encotp;
                $data['vp']=$otp;
                $data['updated_on']=date('Y-m-d H:i:s');
                $this->db->where($where);
                if($this->db->update('users',$data)){
                    if($result['status']==1){ $type="login"; }
                    else{ $type="activate"; }
                    $array=array("otp"=>$otp, "type"=>$type, "id"=>$result['id'], "name"=>$result['name'], "email"=>$result['email'], "mobile"=>$result['mobile']);
                    return array("status"=>true,'result'=>$array);
                }
                else{
                    $err=$this->db->error();
                    return array("status"=>false,"message"=>$err['message']);
                }
            }
		}
		else{
			return array("status"=>false,"message"=>"User not Available!");
		}
    }
    
	public function verifyotp($otp,$where){
		$query = $this->db->get_where('users',$where);
		$result=$query->unbuffered_row('array');
        $flag=false;
		if(!empty($result)){
			if(time()-strtotime($result['updated_on'])<1800){
                if(password_verify($otp.SITE_SALT.$result['salt'],$result['otp'])){
					$this->db->where($where);
					$this->db->update('users',array("status"=>1,'otp'=>''));
					$flag=true;
				}
			}
			else{
				$flag='expired';
			}
		}
        if($flag===true){
            return array("status"=>true,"result"=>$result);
        }
        elseif($flag===false){
            return array("status"=>false,"message"=>'Invalid OTP!');
        }
        else{
            return array("status"=>false,"message"=>'OTP Expired!');
        }
	}
    
	public function googleoauth($data){
        $checkgoogleid=$this->db->get_where("users",array("google_id"=>$data['google_id']));
        if($checkgoogleid->num_rows()==1){
            $user=$checkgoogleid->unbuffered_row('array');
            return array("status"=>true,"user"=>$user);
        }
        else{
            $add=false;
            if($data['email']!=''){
                $getuser=$this->db->get_where("users",array("email"=>$data['email']));
                if($getuser->num_rows()==1){
                    $user=$getuser->unbuffered_row('array');
                    $name=$user['name'];
                    $google_id=$user['google_id'];
                    $updatedata=array();
                    if($name!=$data['name']){
                        $user['name']=$updatedata['name']=$data['name'];
                    }
                    if($google_id==''){
                        $user['google_id']=$updatedata['google_id']=$data['google_id'];
                    }
                    if(!empty($updatedata)){
                        $updatedata['status']=1;
                        $this->db->update("users",$updatedata,array("email"=>$data['email']));
                        return array("status"=>true,"user"=>$user);
                    }
                    else{
                        return array("status"=>true,"user"=>$user);
                    }
                }
                else{
                    $add=true;
                }
            }
            else{
                $add=true;
            }
            if($add===true){
                $data['role']='student';
                $salt=random_string('alnum', 16);
                $data['salt']=$salt;
                $data['created_on']=$data['updated_on']=date('Y-m-d H:i:s');
                $data['status']=1;
                $result=$this->db->insert("users",$data);
                if($result){
                    $user_id=$this->db->insert_id();
                    $user=$this->db->get_where("users",array("id"=>$user_id))->unbuffered_row('array');
                    return array("status"=>true,"user"=>$user);
                }
                else{
                    $err=$this->db->error();
                    return array("status"=>true,"message"=>$err['message']);
                }
            }
        }
    }
    
	public function addtoken($data,$type="single"){
        if($type!="multiple"){
			$this->db->order_by("updated_on desc");
			$getold=$this->db->get_where("tokens",array("user_id"=>$data['user_id'],"status"=>1));
			$count=$getold->num_rows();
			if($count>1){
				switch($type){
					case "single" : $this->db->update("tokens",array("status"=>0),array("user_id"=>$data['user_id']));
					break;
					case "restricted" : $checkdevice=$this->db->get_where("tokens",array("user_id"=>$data['user_id'],"device_id"=>$data['device_id']))->num_rows();
										if($checkdevice==0){
											return "User Already Logged in from Different Device";
										}
										else{
											$this->db->update("tokens",array("status"=>0),array("user_id"=>$data['user_id']));
										}
					break;
				}
				if(is_numeric($type) && $count>=$type){
					$toremove=$count-$type+1;
					$query="UPDATE ".TP."tokens set status='0' where user_id='$data[user_id]' and status='1' order by updated_on limit $toremove";
					$this->db->query($query);
				}
			}
		}
		$data['added_on']=$data['updated_on']=date("Y-m-d H:i:s");
		if($this->db->insert("tokens",$data)){
			return true;
		}
		else{
			$err=$this->db->error();
			return $err['message'];
		}
	}
	
	public function verify_token($token){
		$gettoken=$this->db->get_where('tokens',"token='$token' and status='1'");
		if($gettoken->num_rows()==1){
			$user_id=$gettoken->unbuffered_row()->user_id;
			$array=$this->db->get_where("users",array("id"=>$user_id))->unbuffered_row('array');
			if(is_array($array)){
				$updated_on=date('Y-m-d H:i:s');
				$this->db->update("tokens",array("updated_on"=>$updated_on),array("token"=>$token,"status"=>1));
				return $array;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
    
    public function getuser($where){
        $this->db->select("*");
        $this->db->where($where);
        $query=$this->db->get('users');
        if($query->num_rows()==1){
            $result=$query->unbuffered_row('array');
            return array("status"=>true,"user"=>$result);
        }
        else{
            return array("status"=>false,"message"=>"User not available!");
        }
    }
    
    public function updateuser($data,$where){
        $user=$this->db->get_where("users",$where)->unbuffered_row('array');
        $where2=array("id!="=>$user['id']);
        if(isset($data['mobile'])){
            $data['username']=$where2['username']=$data['mobile'];
        }
        if($this->db->get_where("users",$where2)->num_rows()==0){
            if($this->db->update("users",$data,$where)){
                return array("status"=>true,"message"=>"Profile Updated Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Mobile Registered to different Account!");
        }
    }
    
    public function updateuserstatus($data,$where){
        if($this->db->update("users",$data,$where)){
            return array("status"=>true,"message"=>"User Updated Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function updatepassword($data,$where){
        $vp=$password=$data['password'];
        $salt=random_string('alnum', 16);
        $password=$password.SITE_SALT.$salt;
        $password=password_hash($password,PASSWORD_DEFAULT);
        $data['salt']=$salt;
        $data['password']=$password;
        $data['vp']=$vp;
        $data['updated_on']=date('Y-m-d H:i:s');
        
        if($this->db->update("users",$data,$where)){
            return array("status"=>true,"message"=>"Password Updated Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function updatephoto($data,$where){
        $src=$this->db->get_where("users",$where)->unbuffered_row()->photo;
        if (is_readable('.'.$src) && is_file('.'.$src)) {
            unlink('.'.$src);
            //echo "The file has been deleted";
        }
        if($this->db->update("users",$data,$where)){
            return array("status"=>true,"message"=>"Photo Updated Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function saveaddress($data){
        if($this->db->insert("addressbook",$data)){
            return array("status"=>true,"message"=>"Address Added Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function updateaddress($data,$where){
        if($this->db->update("addressbook",$data,$where)){
            return array("status"=>true,"message"=>"Address Updated Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function getaddresses($where=array(),$type="all"){
        $query=$this->db->get_where("addressbook",$where);
        if($type=="all"){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function deleteaddress($id){
        if($this->db->delete("addressbook",array("id"=>$id))){
            return array("status"=>true,"message"=>"Address Deleted Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
        
    }
    
    public function addmoney($data){
        if($this->db->insert("wallet",$data)){
            return array("status"=>true,"message"=>"Money Added to Wallet Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function getwallet($where){
        $this->db->order_by("id desc");
        $query=$this->db->get_where("wallet",$where);
        $array=$query->result_array();
        return $array;
    }
    
    public function getcustomers(){
        $where=array("role"=>"customer");
        $query=$this->db->get_where("users",$where);
        $array=$query->result_array();
        return $array;
    }
    
	public function checkemail($email){
		$count=$this->db->get_where("users",array("email"=>$email))->num_rows();
		if($count==0){ return 1; }
		else{ return 0; }
	}
	
	public function checkmobile($mobile){
		$count=$this->db->get_where("users",array("mobile"=>$mobile))->num_rows();
		if($count==0){ return 1; }
		else{ return 0; }
	}
    
    public function changeuserstatus($id,$status){
        $data=array("status"=>$status);
        $where=array("id"=>$id);
		if($this->db->update("users",$data,$where)){
            return array("status"=>true,"message"=>"Status Updated");
        }
        else{
            return array("status"=>false,"message"=>"User not available!");
        }
    }
}
