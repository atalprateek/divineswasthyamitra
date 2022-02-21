<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    var $cartproducts=array();
	function __construct(){
		parent::__construct();
		//checkcookie();
        //$this->cartproducts=getcart();
	}
	
	public function index(){
        $data['title']="Login";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/login');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
    public function register(){
        if($this->input->post('register')!==NULL){
            $data=$this->input->post();
            unset($data['register'],$data['repassword']);
            $mobile=$data['mobile'];
            $data['username']=$data['mobile'];
            $data['role']='student';
            $result=$this->account->register($data);
            if($result['status']===true){
                $this->session->set_userdata('mobile',$data['mobile']);
                $where=array("username"=>$data['mobile']);
                $smsresult=$this->sendotp($where);
                if($smsresult['status']===false){
                    
                }
                $result=array("status"=>true,"otp"=>$smsresult['message']);
                echo json_encode($result);
                //redirect('enterotp/');
            }
            else{
                $error=$result['message'];
                $result=array("status"=>false,"message"=>$error);
                echo json_encode($result);
            }
        }
        //redirect('signup/');
    }
    
    public function sendotp($where){
        $array=$this->account->createotp($where);
        if($array['status']===true){
            $result=$array['result'];
            $mobile=$result['mobile'];
            $name=$result['name'];
            $otp=$result['otp'];
            $type=$result['type'];
            if($type!='activate'){
                //resetpassword($mobile,$name,$otp);
                //$sms="$otp is your OTP to activate ".PROJECT_NAME." account.";
            }
            else{
                //loginotp($mobile,$otp);
                //$sms="$otp is your OTP to login to your ".PROJECT_NAME." account.";
            }
            //send_sms($mobile,$sms);
            return array("status"=>true,"message"=>$otp);
        }
        else{
            return $array;
        }
    }
    
    public function resendotp(){
        $mobile=$this->session->mobile;
        $where=array("username"=>$mobile);
        $result=$this->sendotp($where);
    }
    
    public function verifyotp(){
        if($this->input->post('verifyotp')!==NULL){
            $otp=$this->input->post('otp');
            $mobile=$this->session->mobile;
            $where['username']=$mobile;
            $result=$this->account->verifyotp($otp,$where);
            if($result['status']===true){
                $result=$result['result'];
                $this->startsession($result);
                $this->session->unset_userdata('mobile');
                //redirect('profile/');
                $redirecturl='';
                if($this->session->redirect!==NULL){ 
                    $redirecturl=$this->session->redirect; 
                    $this->session->unset_userdata('redirect'); 
                }
                $result=array("status"=>true,"message"=>"Verified","redirecturl"=>$redirecturl);
                echo json_encode($result);
            }
            else{
                $error=$result['message'];
                $result=array("status"=>false,"message"=>$error);
                echo json_encode($result);
            }
        }
        //redirect('enterotp/');
    }
    
	public function validatelogin(){
        if($this->input->post('login')!==NULL){
            $data=$this->input->post();
            unset($data['login']);
            echo PRE; print_r($data);die;
            $data['role']='student';
            $result=$this->account->login($data);
            if($result['status']===true){
                $this->startsession($result['user']);
                $redirecturl='';
                if($this->session->redirect!==NULL){ 
                    $redirecturl=$this->session->redirect; 
                    $this->session->unset_userdata('redirect'); 
                }
                $result=array("status"=>true,"message"=>"Logged In","redirecturl"=>$redirecturl);
                echo json_encode($result);
            }
            elseif($result['status']===false && $result['message']=='Account not Verified!'){
                $this->session->set_userdata('mobile',$data['username']);
                $where=array("username"=>$data['username']);
                $smsresult=$this->sendotp($where);
                if($smsresult['status']===false){
                    
                }
                $result=array("status"=>true,"message"=>$result['message'],"otp"=>$smsresult['message']);
                echo json_encode($result);
            }
            else{ 
                $result=array("status"=>false,"message"=>$result['message']);
                echo json_encode($result);
            }
        }
        //redirect('login/');
	}
    
	public function startsession($result){
		$data['user']=md5($result['id']);
		$data['name']=$result['name'];
		$data['role']=$result['role'];
		$data['project']=PROJECT_NAME;
		$this->session->set_userdata($data);
	}
		
	public function logout(){
		if($this->session->user!==NULL){
			$data=array("user","name","role","project");
			$this->session->unset_userdata($data);
		}	
		redirect('/');
	}
    
	public function checkemail(){
		$email=$this->input->post('email');
		$result=$this->account->checkemail($email);
		echo $result;
	}
	
	public function checkmobile(){
		$mobile=$this->input->post('mobile');
		$result=$this->account->checkmobile($mobile);
		echo $result;
	}
	 
    public function captchacode(){
        $random_alpha = md5(rand());
        $captcha_code = substr($random_alpha, 0, 6);
        $this->session->set_userdata("captcha_code",$captcha_code);
        $target_layer = imagecreatetruecolor(80,37);
        
        $captcha_background = imagecolorallocate($target_layer, rand(0,200),rand(50,200),rand(0,200));
        imagefill($target_layer,0,0,$captcha_background);
        
        $captcha_text_color = imagecolorallocate($target_layer, 255, 255, 255);
        $captcha_codes=str_split($captcha_code);
        $j=0;
        $font_path = APPPATH.'/../includes/ttf/themify9f24.ttf';
        for($i=0;$i<6;$i++){
            //imagettftext($target_layer, rand(9,12), rand(-10,10), rand($i+$j,$j+8),rand(15,35), $captcha_text_color , $font_path, $captcha_codes[$i]);
            imagestring($target_layer, rand(7,10), rand($i+$j,$j+8), rand(5,20), $captcha_codes[$i], $captcha_text_color);
            $j+=12;
        }
        
        header("Content-type: image/jpeg");
        imagejpeg($target_layer);
    }
}
