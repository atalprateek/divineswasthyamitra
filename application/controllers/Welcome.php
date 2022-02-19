<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('template');
        $data['title']="Sample Page";
        $data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
		$this->template->load('','blank',$data);
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
