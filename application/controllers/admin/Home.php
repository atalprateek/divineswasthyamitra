<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index(){
        checklogin();
        $data['title']="Home";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
		$this->template->load('pages','blank',$data);
	}
    
	public function editpassword(){
        checklogin();
        $data['title']="Edit Password";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
		$this->template->load('pages','editpassword',$data);
	}
    
	public function users(){
        checklogin();
        $data['title']="User List";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['datatable']=true;
        $data['users']=$this->db->get_where("users",array("role!="=>"admin"))->result_array();
		$this->template->load('users','list',$data);
	}
    
	public function joinuslist(){
        checklogin();
        $data['title']="Join Us List";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['datatable']=true;
        $data['users']=$this->website->getjoinuslist();
		$this->template->load('users','joinuslist',$data);
	}
    
    public function updatepassword(){
        if($this->input->post('updatepassword')!==NULL){
            $password=$this->input->post('password');
            $username=$this->input->post('username');
            $result=$this->account->updatepassword(array("password"=>$password),array("username"=>$username,"role"=>"admin"));
            if($result['status']===true){
                $this->session->set_flashdata('msg',$result['message']);
            }
            else{
                $error=$result['message'];
                $this->session->set_flashdata('err_msg',$error);
            }
        }
        redirect(admin_url('logout/'));
    }
    
	public function index1()
	{
		$this->load->view('includes/top-section');
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('blank');
		$this->load->view('includes/footer');
		$this->load->view('includes/bottom-section');
	}
	public function index2()
	{
		$this->load->view('index.php');
	}
	public function index3()
	{
		$this->load->view('welcome_message');
	}
    
    public function alldata($token=''){
		$this->load->library('alldata');
		$this->alldata->viewall($token);
	}
	
	public function gettable(){
		$this->load->library('alldata');
		$this->alldata->gettable();
	}
	
	public function updatedata(){
		$this->load->library('alldata');
		$this->alldata->updatedata();
	}
}
