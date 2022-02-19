<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	function __construct(){
		parent::__construct();
        checklogin();
	}
	
	public function index(){
        $data['title']="About Us";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['page']=$this->website->getpages(array("id"=>1),"single");
		$this->template->load('website','aboutus',$data);
	}
    
	public function testimonials(){
        $data['title']="Testimonials";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['testimonials']=$this->website->gettestimonials();
        $data['datatable']=true;
		$this->template->load('website','testimonials',$data);
	}
    
    public function addtestimonial(){
        if($this->input->post('addtestimonial')!==NULL){
            $data=$this->input->post();
            unset($data['addtestimonial']);
			$upload_path='./assets/images/testimonials/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
            else{ $data['image']=''; }
            
			$result=$this->website->addtestimonial($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('website/testimonials'));
    }
    
    public function updatetestimonial(){
        if($this->input->post('updatetestimonial')!==NULL){
            $data=$this->input->post();
            unset($data['updatetestimonial']);
			$upload_path='./assets/images/testimonials/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
			$result=$this->website->updatetestimonial($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('website/testimonials'));
    }
    
    public function gettestimonial(){
        $id=$this->input->post('id');
        $testimonial=$this->website->gettestimonials(array("id"=>$id),"single");
        echo json_encode($testimonial);
    }
    
    public function updatepage(){
        if($this->input->post('updatepage')!==NULL){
            $data=$this->input->post();
            unset($data['updatepage']);
            $data['titles']=json_encode($data['titles']);
            $data['contents']=json_encode($data['contents']);
			$result=$this->website->updatepage($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
}
