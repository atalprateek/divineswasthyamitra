<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index(){
        $data['title']="Home";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/home');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
	public function aboutus(){
        $data['title']="Home";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/aboutus');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
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
                    "ALTER TABLE `sm_users` CHANGE `otp` `otp` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;");
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
