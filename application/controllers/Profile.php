<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    private $user="";
    
	function __construct(){
		parent::__construct();
        $result=$this->account->getuser(array("md5(id)"=>$this->session->user,"role"=>"student"));
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
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/profile/profile');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
	public function bookmarks(){
        $data['title']="Bookmarks";
        $data['user']=$this->user;
        $data['bookmarks']=getbookmarks();
        $data['offset']=0;
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/profile/bookmarks');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
    public function updateprofile(){
        if($this->input->post('updateprofile')!==NULL){
            $data=$this->input->post();
            unset($data['updateprofile']);
            $mobile=$data['mobile'];
            $where=array("md5(id)"=>$this->session->user);
            $result=$this->account->updateuser($data,$where);
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
            $reenter=$this->input->post('reenter');
            if($password==$reenter){
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
    
}
