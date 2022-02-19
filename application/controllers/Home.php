<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index(){
        $data['title']="Home";
        $this->load->view('website/test');
        /*$data['blogs']=$this->blog->getblogs(array("status"=>1),"id desc",4);
        $data['testimonials']=$this->website->gettestimonials(array("status"=>1));
        $data['subjects']=$this->masterkey->getsubjects(array("status"=>1));
        $data['package']=$this->masterkey->getpackages(array("id"=>1,"status"=>1),"single");
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/home');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');*/
	}
    
	public function syllabus(){
        //$slug=$this->uri->segment(2);
        $syllabus=$this->masterkey->getsyllabus(array("id"=>1,"status"=>1),"single");
        //if($slug!==NULL && is_array($syllabus) && !empty($syllabus)){
        if(is_array($syllabus) && !empty($syllabus)){
            $data['title']=$syllabus['title'];
            $data['syllabus']=$syllabus;
            $data['top_script']['file'][]='assets/plugins/flipbook/js/html2canvas.min.js';
            $data['top_script']['file'][]='assets/plugins/flipbook/js/three.min.js';
            $data['top_script']['file'][]='assets/plugins/flipbook/js/pdf.min.js';
            $data['top_script']['file'][]='assets/plugins/flipbook/js/3dflipbook.min.js';
            $this->load->view('website/includes/top-section',$data);
            $this->load->view('website/includes/header');
            $this->load->view('website/pages/syllabus');
            $this->load->view('website/includes/footer');
            $this->load->view('website/includes/bottom-section');
        }
        else{
            $data['title']="Syllabus";
            $syllabus=$this->masterkey->getsyllabus(array("status"=>1));
            $data['syllabus']=$syllabus;
            $this->load->view('website/includes/top-section',$data);
            $this->load->view('website/includes/header');
            $this->load->view('website/pages/syllabuslist');
            $this->load->view('website/includes/footer');
            $this->load->view('website/includes/bottom-section');
        }
	}
    
    public function test(){
        $data['title']="Test";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/test');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
    }
    
	public function joinus(){
        $data['title']="Join Us";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/joinus');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
	public function aboutus(){
        $data['title']="About Us";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/aboutus');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
	public function contactus(){
        $data['title']="Contact Us";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/contactus');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
	public function privacypolicy(){
        $data['title']="Privacy Policy";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/privacypolicy');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
    public function savejoinus(){
        if($this->input->post('savejoinus')!==NULL){
            $data=$this->input->post();
            unset($data['savejoinus']);
            $result=$this->website->savejoinus($data);
            if($result['status']===true){
                $this->session->set_flashdata('msg',$result['message']);
            }
            else{
                $error=$result['message'];
                $this->session->set_flashdata('err_msg',$error);
            }
        }
        redirect('joinus/');
    }
    
	public function index2(){
        $data['title']="Home";
		$this->load->view('website/index.php',$data);
	}
	public function index3()
	{
		$this->load->view('welcome_message');
	}
    
    public function runquery(){
        $query=array(
                    "");
        foreach($query as $sql){
            if(!$this->db->query($sql)){
                print_r($this->db->error());
            }
        }
    }
    
    public function matchcolumns(){
        $tables=$this->db->query("show tables;")->result_array();
        foreach($tables as $table){
            $tablename=$table['Tables_in_'.DB_NAME];
            $columns=$this->db->query("DESC $tablename;")->result_array();
            echo "<h1>$tablename</h1>";
            echo "<table border='1' cellspacing='0' cellpadding='5'>";
            echo "<tr>";
            foreach($columns[0] as $key=>$value){
                echo "<td>$key</td>";
            }
            echo "</tr>";
            foreach($columns as $column){
                echo "<tr>";
                foreach($column as $key=>$value){
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
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
