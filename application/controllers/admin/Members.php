<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	function __construct(){
		parent::__construct();
        checklogin();
	}
	
	public function index(){
        $data['title']="HCA List";
		$data['breadcrumb']=array('/'=>"Home","active"=>$data['title']);
		$data['datatable']=true;
		
		$data['members']=$this->member->gethcas();
		$this->template->load('members','hcalist',$data);
	}	
    
	public function addhca(){
        $data['title']="Add HCA";
		$data['breadcrumb']=array('/'=>"Home","active"=>$data['title']);
		$states=$this->website->getstate();
		$options=array(""=>"Select State");
		if(is_array($states)){
			foreach($states as $state){
				$options[$state['state']]=$state['state'];
			}
		}
		$data['states']=$options;
        
		$this->template->load('members','addhca',$data);
	}
    
	public function edit($id=NULL){
		if($id===NULL){ redirect(admin_url('listings/')); }
		$data['hospital']=$this->listing->gethospital(array("md5(t1.id)"=>$id));
		if($data['hospital']['rowcount']==0){ redirect(admin_url('listings/')); }
		$data['hospital']=$this->listing->gethospitaldetails(array("md5(id)"=>$id));
        
        $data['title']="Edit Listing";
		$data['breadcrumb']=array('/'=>"Home","active"=>$data['title']);
		$states=$this->website->getstate();
		$options=array(""=>"Select State");
		if(is_array($states)){
			foreach($states as $state){
				$options[$state['state']]=$state['state'];
			}
		}
		$data['states']=$options;
        
		$categories=$this->website->getcategory();
		$options=array(""=>"Select Category");
		if(is_array($categories)){
			foreach($categories as $category){
				$options[$category['id']]=$category['category'];
			}
		}
		$data['categories']=$options;
		$data['discounts']=$this->website->getdiscount($data['hospital']['category_id']);
        $data['ckeditor']=true;
        
		$this->template->load('listings','edit',$data);
	}
    
	public function savehca(){
        if($this->input->post('savehca')!==NULL){
            $data=$this->input->post();
            $wards=$data['ward'];
            $userdata=array(
                        "username"=>$data['mobile'],
                        "name"=>$data['name'],
                        "mobile"=>$data['mobile'],
                        "email"=>$data['email'],
                        "role"=>'hca',
                        "created_on"=>date('Y-m-d H:i:s'),
                        "updated_on"=>date('Y-m-d H:i:s'),
                        "status"=>1
                        );
            $result=$this->account->register($userdata);
            if($result['status']===true){
                $message="You have been successfully registered as Health Care Advisor with ".PROJECT_NAME.". Your Login Id is your Email id and Password is ".$result['password'].".";
                $memberdata=array(
                            "name"=>$data['name'],
                            "mobile"=>$data['mobile'],
                            "amobile"=>$data['amobile'],
                            "email"=>$data['email'],
                            "aadhar"=>$data['aadhar'],
                            "address"=>$data['address'],
                            "district"=>$data['district'],
                            "state"=>$data['state'],
                            "pincode"=>$data['pincode'],
                            "gender"=>$data['gender'],
                            "age"=>$data['age'],
                            "user_id"=>$result['user_id']
                            );
                $result2=$this->member->addmember($memberdata);
                $warddata=array();
                foreach($wards as $ward){
                    $warddata[]=array("ward"=>$ward,"hca_id"=>$result['user_id']);
                }
                $result3=$this->member->insertward($warddata);
                
                //$smsdata=array($data['mobile']=>$message);
                //send_sms($smsdata);
                
                $this->session->set_flashdata("msg","HCA Added Successfully");
            }
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
		redirect(admin_url('members/'));
	}
	
    public function changememberstatus(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $result=$this->account->changeuserstatus($id,$status);
        
    }
	public function updatehospital(){
        $id="";
        if($this->input->post('updatehospital')!==NULL){
            $data=$this->input->post();
            $id=$data['id'];
            $data['slug']=generate_slug($data['name']);
            unset($data['updatehospital']);
            $discountarray=array();
            if(isset($data['discount_id'])){
                $discount_ids=$data['discount_id'];
                $discounts=$data['discount'];
                unset($data['discount_id']);
                unset($data['discount']);
                foreach($discount_ids as $key=>$discount_id){
                    $discountarray[]=array("hospital_id"=>$data['id'],"discount_id"=>$discount_id,
                                           "discount"=>$discounts[$key]);
                }
            }
            $working_hours=array();

            $schedule=$data['schedule'];
            unset($data['schedule']);
            $days=$data['day'];
            $open_times=$data['open_time'];
            $close_times=$data['close_time'];
            unset($data['day']); unset($data['open_time']); unset($data['close_time']);
            foreach($days as $key=>$day){
                if($schedule=='daily'){
                    $working_hours['data'][]=array("hospital_id"=>$data['id'],"day"=>$day,"open_time"=>$open_times[$key],
                                                   "close_time"=>$close_times[$key],"24hours"=>0);
                }
                else{
                    $working_hours['data'][]=array("hospital_id"=>$data['id'],"day"=>$day,"24hours"=>1,"open_time"=>'',"close_time"=>'');
                }
                $working_hours['where'][]=array("hospital_id"=>$data['id'],"day"=>$day);
            }
            
            $file_name=$data['name'];
            $imgdata=array();
            $upload_path='./assets/images/hospital/';
            $allowed_types='gif|jpg|jpeg|png|svg';
            $image=upload_file('image',$upload_path,$allowed_types,$file_name);
            if($image['status']===true){
                create_image_thumb('.'.$image['path'],'',true,array("width"=>450,"height"=>250));
                $imgdata['image']=$image['path'];
                preg_match('/(\.[a-z]+)$/', $image['path'], $match);
                $imgdata['featured_image']=preg_replace("/(\.[a-z]+)$/", "_thumb".$match[0], $image['path']);;
            }

            $thumb_image=upload_file('thumb_image',$upload_path,$allowed_types,$file_name."-thumb");
            if($thumb_image['status']===true){
                create_image_thumb('.'.$thumb_image['path'],'',false,array("width"=>200,"height"=>200));
                $imgdata['thumb_image']=$thumb_image['path'];
            }
            
            $result=$this->listing->updatehospital($data,$discountarray,$working_hours,$imgdata);
            if($result['status']===true){
                $this->session->set_flashdata("msg",$result['message']);
            }
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
		redirect(admin_url('listings/edit/'.md5($id)));
	}
	
	public function delete($id=NULL){
		if($id===NULL){ admin_url('listings/'); }
        $where=array("md5(id)"=>$id);
		$result=$this->listing->deletehospital($where);
        if($result['status']===true){
            $this->session->set_flashdata("msg",$result['message']);
        }
        else{
            $this->session->set_flashdata("err_msg",$result['message']);
        }
		redirect(admin_url('listings/'));
	}
	
	public function getdiscount(){
		$category_id=$this->input->post('category_id');
		$discounts=$this->website->getdiscount($category_id);
        $table ='<table class="table">';
        if(!empty($discounts) && is_array($discounts)){ 
            $i=0;
			foreach($discounts as $discount){
				$placeholder="";
				if($discount['type']=='percent'){
					$placeholder="Enter Discount Percent(%)";
				}
				elseif($discount['type']=='amount'){
					$placeholder="Enter Discount Amount";
				}
				$value='';
                
				if(isset($hospital['discounts'][$i])){$value=$hospital['discounts'][$i]['discount'];}
                
				$i++;
                $table .= '<tr><td>'.$discount['name'].'</td>';
                $table .= '<td>'.form_hidden('discount_id[]', $discount['id']);
                $data = array('name' => 'discount[]', 'class'=>'form-control form-control-sm', 'placeholder'=>$placeholder,'value'=>$value);
                $table .= form_input($data); 
                $table .= '</td></tr>';
			}
		}
		else{
			$table .= "<tr><td>No Discount Available!</td></tr>";
		}
        $table .= '</table>';
        echo $table;
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
