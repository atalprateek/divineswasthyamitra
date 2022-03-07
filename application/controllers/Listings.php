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
    
	public function details(){
        $slug=$this->uri->segment(2);
        
		$result=$this->listing->gethospitaldetails(array("slug"=>$slug));
		if($result==''){redirect('/');}
		
		$data['title']=$result['name'];
		
		$options=array(""=>"All Categories");
		$categories=$this->website->getcategory();
		if(is_array($categories)){
			foreach($categories as $category){
				$options[$category['slug']]=$category['category'];
			}
		}
		$data['category']=$options;
        
		$data['hospital']=$result;
		if($this->session->user!==NULL && $this->session->paid==1){
			$data['display_status']=true;
		}else{
			$data['display_status']=false;
		}
        
		$this->load->view('website/includes/top-section',$data);
		$this->load->view('website/includes/header');
		$this->load->view('website/listings/details');
		$this->load->view('website/includes/footer');
		$this->load->view('website/includes/bottom-section');
	}
    
}
