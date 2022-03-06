<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    private $user="";
    
	function __construct(){
		parent::__construct();
        $where="md5(id)='".$this->session->user."' and (role='member' or role='hca')";
        $result=$this->account->getuser($where);
        if($result['status']===true){
            $this->user=$result['user'];
        }
        else{
            redirect('/');
        }
	}
	
	public function index(){
        $data['title']="Profile";
        $data['user']=$this->user;
        $data['member']=$this->member->getmembers(array("t1.id"=>$data['user']['id']),"single");
        if($this->session->role=='hca'){
			$data['wards']=$this->member->getwards(array("hca_id"=>$data['user']['id']));
        }
        elseif($this->session->role=='member'){
			$data['ward']=$this->member->getwards(array("id"=>$data['member']['ward']),"single");
        }
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/profile/profile');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
	public function editprofile(){
		$data['title']="Edit Profile";
        $data['user']=$this->user;
        $data['member']=$this->member->getmembers(array("t1.id"=>$data['user']['id']),"single");
		$data['familymembers']=$this->member->getfamilymembers(array("user_id"=>$data['user']['id']));
        $user_id=$data['user']['id'];
		$states=$this->website->getstate();
		$options=array(""=>"Select State");
		if(is_array($states)){
			foreach($states as $state){
				$options[$state['state']]=$state['state'];
			}
		}
		$data['states']=$options;
        
        $memberwhere="hca_id in (select refid from ".TP."members where user_id='$user_id')";
        $wards=$this->member->getwards($memberwhere);
		$options=array(""=>"Select Ward/Panchayat");
		if(is_array($wards)){
			foreach($wards as $ward){
				$options[$ward['id']]=$ward['ward'];
			}
		}
		$data['wards']=$options;
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/profile/editprofile');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
	
	public function makepayment(){
		if($this->session->userdata("paid")==1){ redirect('profile/'); }
		$data['title']="Make Payment";
        $data['user']=$this->user;
        $data['member']=$this->member->getmembers(array("t1.id"=>$data['user']['id']),"single");
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/profile/makepayment');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
	
	public function memberlist(){
		if($this->session->role=='hca'){
			$data['title']="Member List";
            $user=$this->user;
            $member=$this->member->getmembers(array("t1.id"=>$user['id']),"single");
			$user_id=$user['id'];
			$where=array("t2.refid"=>$user_id,"t1.role"=>'member');
			$data['members']=$this->member->getmembers($where);
			$data['styles']=array("link"=>"https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css");
			$data['top_script']=array("link"=>"https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js");
            $this->load->view('website/includes/top-section',$data);
            $this->load->view('website/includes/header');
            $this->load->view('website/profile/members');
            $this->load->view('website/includes/footer');
            $this->load->view('website/includes/bottom-section');
		}
		else{ redirect('profile/'); }
	}
	
	public function exportmember(){
		$this->load->helper('excel');
		$result=array();
        $user=$this->user;
        $member=$this->member->getmembers(array("t1.id"=>$user['id']),"single");
        $user_id=$user['id'];
        $where=array("t2.refid"=>$user_id,"t1.role"=>'member');
		$members=$this->member->getmembers($where);
		
		if(is_array($members)){ $slno=0;
			foreach($members as $value){
				$slno++;
				if($value['card_no']==''){ $value['card_no']='-'; }
				else{$value['card_no']="'$value[card_no]'";}
				if($value['name']==''){ $value['name']='-'; }
				$member=array($slno,$value['card_no'],$value['name']);
				$result[]=$member;
			}
		}
		//print_r($result);
		$fieldinfo=array("Sl No","Card No","Name");
		exporttoexcel($result,$fieldinfo);
	}
	
    public function updateprofile(){
        if($this->input->post('updateprofile')!==NULL){
            $data=$this->input->post();
            unset($data['updateprofile']);
            $where=array("md5(user_id)"=>$this->session->user);
            $result=$this->member->updatemember($data,$where);
            if($result['status']===true){
                $this->session->set_flashdata('msg',$result['message']);
                redirect('profile/');
            }
            else{
                $error=$result['message'];
                $this->session->set_flashdata('err_msg',$error);
            }
        }
        redirect('profile/');
    }
    
    public function updatepassword(){
        if($this->input->post('updatepassword')!==NULL){
            $password=$this->input->post('password');
            $retype=$this->input->post('retype');
            if($password==$retype){
                $result=$this->account->getuser(array("md5(id)"=>$this->session->user));
                if($result['status']===false){
                    redirect('login/');
                }
                else{
                    $user=$result['user'];
                    $result=$this->account->updatepassword(array("password"=>$password),array("id"=>$user['id']));
                    if($result['status']===true){
                        $this->session->set_flashdata('msg',$result['message']);
                        redirect('profile/');
                    }
                    else{
                        $error=$result['message'];
                        $this->session->set_flashdata('err_msg',$error);
                    }
                }
            }
        }
        redirect('profile/');
    }
    
	public function addfamily(){
        if($this->input->post('addfamily')!==NULL){
            $data=$this->input->post();
            $data['user']=$this->session->userdata('user');
            $result=$this->member->addfamily($data);
        }
		redirect('profile/');
	}
	
}
