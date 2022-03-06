<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listings extends CI_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$data['title']="Listing";
		if($this->uri->segment(3)!==NULL){
			$page=$this->uri->segment(3);
		}
		if(empty($page)){$page=1;}
		$count=10;
		$offset=($page-1)*$count;
		$order="t1.id";
		$where=$pagefilters=array();
        
		if(isset($_GET['query']) && $_GET['query']!=''){ 
			$query=$_GET['query']; 
			$where['query']=$query;
			$pagefilters['query']=$query;
		}
		if(isset($_GET['location']) && $_GET['location']!=''){ 
			$location=$_GET['location']; 
			$where['location']=$location;
			$pagefilters['location']=$location;
		}
		if(isset($_GET['category']) && $_GET['category']!=''){ 
			$slug=$_GET['category']; 
			$where["t4.slug"]=$slug;
			$pagefilters['category']=$slug;
		}
		$data['offset']=$offset;
		$data['page']=$page;
		$result=$this->listing->gethospital($where,$order,$count,$offset);
		$data['hospitals']=$result['hospitals'];
		$data['rowcount']=$result['rowcount'];
		$link=base_url("listings/");
		$config['url']=$link;
		$config['pages']=$result['pages'];
		$config['page']=$page;
		$config['link_class']=array("pagination","pagination-sm");
		$config['display_type']=2;
		$config['num_links']=2;
		$config['pagefilters']=$pagefilters;
		$skip=array("num"=>5,"skip_prev"=>"&lt; Skip 5","skip_next"=>"Skip 5 &gt;");
		$config['skip']=$skip;
		$config['display_links']=array('pages','prevnext');
		if($result['pages']>15){
			$config['display_links'][]='skip';
		}
		if($result['pages']>25){
			$config['display_links'][]='firstlast';
		}
        $this->load->library('paging');
		$this->paging->initialize($config);
		$pagination=$this->paging->pagination();
		$data['pagination']=$pagination;
        
		$options=array(""=>"All Categories");
		$categories=$this->website->getcategory();
		if(is_array($categories)){
			foreach($categories as $category){
				$options[$category['slug']]=$category['category'];
			}
		}
		$data['category']=$options;
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/listings/list');
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
    
	public function gallery(){
        $data['title']="Gallery";
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/pages/gallery');
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
                    "ALTER TABLE `sm_users` ADD `paid` BOOLEAN NOT NULL DEFAULT FALSE AFTER `status`;");
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
