<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		loginredirect();
		$this->session->unset_userdata("username");
		$data['title']="Login";
		$data['body_class']=' themebg-pattern="theme1"';
        $data['styles']=array("file"=>"includes/css/pages.css");
		$this->load->view('admin/includes/top-section',$data);
		$this->load->view('admin/pages/login');
		$this->load->view('admin/includes/bottom-section');
	}
	
	public function forgotpassword(){
		$this->session->unset_userdata("username");
		$data['title']="Forgot Password";
		$data['body_class']=' themebg-pattern="theme1"';
		$this->load->view('admin/includes/top-section',$data);
		$this->load->view('admin/pages/forgotpassword');
	}
	
	public function enterotp(){
		if($this->session->userdata('username')===NULL){redirect(admin_url('login/'));}
		$data['title']="Enter OTP";
		$data['body_class']=' themebg-pattern="theme1"';
		$this->load->view('admin/includes/top-section',$data);
		$this->load->view('admin/pages/enterotp');
	}
	
	public function resetpassword(){
		if($this->session->username===NULL){redirect(admin_url('login/'));}
		$data['title']="Reset Password";
		$data['body_class']=' themebg-pattern="theme1"';
		$this->load->view('admin/includes/top-section',$data);
		$this->load->view('admin/pages/resetpassword');
	}
	
	public function logout(){
		if($this->session->user!==NULL){
			$data=array("user","name","role","project");
			$this->session->unset_userdata($data);
		}	
		redirect(admin_url('login/'));
	}
	
	
	public function validatelogin(){
        if($this->input->post('login')!==NULL){
            $data=$this->input->post();
            $data['role']='admin';
            unset($data['login']);
            $result=$this->account->login($data);
            if($result['status']===true){
                $user=$result['user'];
                $this->startsession($user);
                loginredirect();
            }
            else{ 
                $this->session->set_flashdata('logerr',$result['message']);
                redirect(admin_url('login/'));
            }
        }
        redirect(admin_url('login/'));
	}
	
	public function startsession($result){
		$data['user']=md5($result['id']);
		$data['name']=$result['name'];
		$data['role']=$result['role'];
		$data['project']=PROJECT_NAME;
		$this->session->set_userdata($data);
	}
	
	public function validateUser(){
		if($this->input->post('forgotpassword')!==NULL){
			$username=$this->input->post('username');
			$result=$this->Account_model->createotp($username);
			if($result['status']===true){
				$otp=$result['otp'];
				$verification_msg="$otp is your One Time Password to Reset password . This OTP is valid for 15 minutes.";
				$smsdata=array("mobile"=>$result['mobile'],"message"=>$verification_msg);
				
				//send_sms($smsdata);
				
				$this->session->set_userdata("username",$username);
				redirect(admin_url('enterotp/'.$otp));
			}
			else{
				$this->session->set_flashdata("logerr","Username not valid!");
				redirect(admin_url('forgotpassword/'));
			}
		}
		else{
			redirect(admin_url('login/'));
		}
	}
	
	public function validateOTP(){
		if($this->session->username===NULL){redirect(admin_url('login/'));}
		if($this->input->post('submitotp')!==NULL){
			$data['otp']=$this->input->post('otp');
			$data['username']=$this->session->username;
			$result=$this->Account_model->verifyotp($data);
			if($result['verify']===true){
				redirect(admin_url('resetpassword/'));
			}
			else{
				$this->session->set_flashdata("logerr",$result['verify']);
				redirect(admin_url('enterotp/'));
			}
		}
		redirect(admin_url('login/'));
	}
	
	public function skipreset(){
		if($this->session->username!==NULL){
			$username=$this->session->username;
			$this->session->unset_userdata("username");
			$result=$this->Account_model->getuser(array("username"=>$username));
			$this->startsession($result);
			redirect(admin_url('/'));
		}
		redirect(admin_url('login/'));
	}
	
	public function changepassword(){
		if($this->session->username!==NULL){
			$password=$this->input->post('password');
			$username=$this->session->userdata("username");
			$where['username']=$username;
			$result=$this->Account_model->changepassword($password,$where);
		}
		redirect(admin_url('login/'));
	}
	public function createadmin(){
		$data['title']="Create Admin";
		$data['body_class']=' themebg-pattern="theme1"';
		$this->load->view('admin/includes/top-section',$data);
		$this->load->view('admin/pages/createadmin');
	}
	
	public function insertadmin(){
		if($this->input->post('createadmin')!==NULL){
			$data=$this->input->post();
			unset($data['createadmin']);
			$this->Account_model->createadmin($data);
		}
		redirect(admin_url('login/'));
	}
}
