<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterkey extends CI_Controller {

	function __construct(){
		parent::__construct();
        checklogin();
	}
	
	public function index(){
        $data['title']="Exams";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['datatable']=true;
        $data['exams']=$this->masterkey->getexams();
		$this->template->load('masterkey','exams',$data);
	}
    
	public function subjects(){
        $data['title']="Subjects";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['datatable']=true;
        $data['subjects']=$this->masterkey->getsubjects();
		$this->template->load('masterkey','subjects',$data);
	}
    
	public function chapters(){
        $data['title']="Chapters";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['datatable']=true;
        $subjects=$this->masterkey->getsubjects();
        $options=array(""=>"Select Subject");
        if(is_array($subjects)){
            foreach($subjects as $subject){
                $options[$subject['id']]=$subject['name'];
            }
        }
        $data['subjects']=$options;
        $data['chapters']=$this->masterkey->getchapters();
		$this->template->load('masterkey','chapters',$data);
	}
    
	public function syllabus(){
        $data['title']="Syllabus";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['datatable']=true;
        $data['syllabus']=$this->masterkey->getsyllabus();
		$this->template->load('masterkey','syllabus',$data);
	}
    
	public function packages(){
        $data['title']="Membership Plan";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['datatable']=true;
        $data['packages']=$this->masterkey->getpackages();
		$this->template->load('masterkey','packages',$data);
	}
    
    public function getslug(){
        $name=$this->input->post('name');
        $slug=url_title($name,'-',true);
        echo $slug;
    }
    
    public function addexam(){	
        if($this->input->post('addexam')!==NULL){
            $data=$this->input->post();
            unset($data['addexam']);
            $data['slug']=verify_slug('exams',$data['slug']);
			$upload_path='./assets/images/exams/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
			else{$data['image']='';}
			$result=$this->masterkey->addexam($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/exams/'));
    }
    
    public function updateexam(){
        if($this->input->post('updateexam')!==NULL){
            $data=$this->input->post();
            unset($data['updateexam']);
            $data['slug']=verify_slug('exams',$data['slug'],$data['id']);
			$upload_path='./assets/images/exams/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
			$result=$this->masterkey->updateexam($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/exams'));
    }
    
    public function getexam(){
        $id=$this->input->post('id');
        $exam=$this->masterkey->getexams(array("id"=>$id),"single");
        echo json_encode($exam);
    }
    
    public function addsubject(){	
        if($this->input->post('addsubject')!==NULL){
            $data=$this->input->post();
            unset($data['addsubject']);
            $data['slug']=verify_slug('subjects',$data['slug']);
			$result=$this->masterkey->addsubject($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/subjects'));
    }
    
    public function updatesubject(){
        if($this->input->post('updatesubject')!==NULL){
            $data=$this->input->post();
            unset($data['updatesubject']);
            $data['slug']=verify_slug('subjects',$data['slug'],$data['id']);
			$result=$this->masterkey->updatesubject($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/subjects'));
    }
    
    public function getsubject(){
        $id=$this->input->post('id');
        $subject=$this->masterkey->getsubjects(array("t1.id"=>$id),"single");
        echo json_encode($subject);
    }
    
    public function addchapter(){	
        if($this->input->post('addchapter')!==NULL){
            $data=$this->input->post();
            $subject_name=url_title($data['subject_name'],'-',true);
            unset($data['addchapter'],$data['subject_name']);
            $data['slug']=verify_slug('chapters',$data['slug'],"",$subject_name);
			$upload_path='./assets/images/chapters/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
			else{$data['image']='';}
			$result=$this->masterkey->addchapter($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/chapters'));
    }
    
    public function updatechapter(){
        if($this->input->post('updatechapter')!==NULL){
            $data=$this->input->post();
            $subject_name=url_title($data['subject_name'],'-',true);
            unset($data['updatechapter'],$data['subject_name']);
            $data['slug']=verify_slug('chapters',$data['slug'],$data['id'],$subject_name);
			$upload_path='./assets/images/chapters/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
			$result=$this->masterkey->updatechapter($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/chapters'));
    }
    
    public function getchapter(){
        $id=$this->input->post('id');
        $chapter=$this->masterkey->getchapters(array("t1.id"=>$id),"single");
        echo json_encode($chapter);
    }
    
    public function addsyllabus(){	
        if($this->input->post('addsyllabus')!==NULL){
            $data=$this->input->post();
            unset($data['addsyllabus']);
            $data['slug']=verify_slug('syllabus',$data['slug']);
			$upload_path='./assets/syllabus/';
			$allowed_types='pdf';
			$upload=upload_file('file',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                $data['filepath']=$upload['path'];
            }
			else{$data['filepath']='';}
			$result=$this->masterkey->addsyllabus($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/syllabus/'));
    }
    
    public function updatesyllabus(){
        if($this->input->post('updatesyllabus')!==NULL){
            $data=$this->input->post();
            unset($data['updatesyllabus']);
            $data['slug']=verify_slug('syllabus',$data['slug'],$data['id']);
			$upload_path='./assets/syllabus/';
			$allowed_types='pdf';
			$upload=upload_file('file',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                $data['filepath']=$upload['path'];
            }
			$result=$this->masterkey->updatesyllabus($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/syllabus/'));
    }
    
    public function getsyllabus(){
        $id=$this->input->post('id');
        $syllabus=$this->masterkey->getsyllabus(array("id"=>$id),"single");
        echo json_encode($syllabus);
    }
    
    public function addpackage(){	
        if($this->input->post('addpackage')!==NULL){
            $data=$this->input->post();
            unset($data['addpackage']);
            $data['slug']=verify_slug('packages',$data['slug']);
			$upload_path='./assets/images/packages/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>1600,"height"=>800));
                $data['image']=$upload['path'];
            }
			else{$data['image']='';}
			$result=$this->masterkey->addpackage($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/packages/'));
    }
    
    public function updatepackage(){
        if($this->input->post('updatepackage')!==NULL){
            $data=$this->input->post();
            unset($data['updatepackage']);
            $data['slug']=verify_slug('packages',$data['slug'],$data['id']);
			$upload_path='./assets/images/packages/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>1600,"height"=>800));
                $data['image']=$upload['path'];
            }
			$result=$this->masterkey->updatepackage($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('masterkey/packages'));
    }
    
    public function getpackage(){
        $id=$this->input->post('id');
        $package=$this->masterkey->getpackages(array("id"=>$id),"single");
        echo json_encode($package);
    }
    
}
