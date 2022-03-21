<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nurses extends CI_Controller {

	function __construct(){
		parent::__construct();
        checklogin();
	}
	
	public function index(){
        $data['title']="Nurse List";
		$data['breadcrumb']=array('/'=>"Home","active"=>$data['title']);
		$data['datatable']=true;
		
		$data['nurses']=$this->nurse->getnurses();
		$this->template->load('nurses','nurselist',$data);
	}	
    
	public function addnurse(){
        $data['title']="Add Nurse";
		$data['breadcrumb']=array('/'=>"Home","active"=>$data['title']);
		$states=$this->website->getstate();
		$options=array(""=>"Select State");
		if(is_array($states)){
			foreach($states as $state){
				$options[$state['state']]=$state['state'];
			}
		}
		$data['states']=$options;
        
		$this->template->load('nurses','addnurse',$data);
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
    
	public function nurselist(){
        $data['title']="nurse List";
		$data['breadcrumb']=array('/'=>"Home","active"=>$data['title']);
		$data['datatable']=true;
		
		$data['nurses']=$this->nurse->getnurses();
		$this->template->load('nurses','nurselist',$data);
	}	
    
	public function savenurse(){
        if($this->input->post('savenurse')!==NULL){
            $data=$this->input->post();
            $userdata=array(
                        "username"=>$data['mobile'],
                        "name"=>$data['name'],
                        "mobile"=>$data['mobile'],
                        "email"=>$data['email'],
                        "role"=>'nurse',
                        "created_on"=>date('Y-m-d H:i:s'),
                        "updated_on"=>date('Y-m-d H:i:s'),
                        "status"=>1
                        );
            $result=$this->account->register($userdata);
            if($result['status']===true){
                $message="You have been successfully registered as Nurse with ".PROJECT_NAME.". Your Login Id is ".$data['mobile']." and Password is ".$result['password'].".";
                $nursedata=array(
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
                $result2=$this->nurse->addnurse($nursedata);
                
                send_message($data['mobile'],$message);
                //$smsdata=array($data['mobile']=>$message);
                //send_sms($smsdata);
                
                $this->session->set_flashdata("msg","Nurse Added Successfully");
            }
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
		redirect(admin_url('nurses/'));
	}
	
    public function changenursestatus(){
        $id=$this->input->post('id');
        $status=$this->input->post('status');
        $result=$this->account->changeuserstatus($id,$status);
        
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
    
    public function getslug(){
        $name=$this->input->post('name');
        $slug=url_title($name,'-',true);
        echo $slug;
    }
    
	public function activatenurse(){
		$user_id=$this->input->post('user_id');
		$result=$this->nurse->updatepaidstatus($user_id);
		if($result['status']===true){
			$message="Thank You for registering as Paid nurse of ".PROJECT_NAME.". ";
			$mobile=$result['nurse']['mobile'];
			$smsdata=array($mobile=>$message);
			//send_sms($smsdata);
		}
		else{
			
		}
		redirect(admin_url('nurses/nurselist/'));
	}
	
	public function deletenurse(){
        if($this->input->post('deletenurse')!==NULL){
            $id=$this->input->post('id');
            $result=$this->nurse->deletenurse($id);
            if($result['status']===true){
                $this->session->set_flashdata("msg",$result['message']);
            }
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
	}
	
	public function getnurse(){
		$id=$this->input->post('id');
		$nurse=$this->nurse->getnurses(array("t1.id"=>$id),'Single');
		echo json_encode($nurse);
	}
	
	public function addcardno(){
        if($this->input->post('addcardno')!==NULL){
            $user_id=$this->input->post('user_id');
            $data['card_no']=$this->input->post('card_no');
            $data['issue_date']=$this->input->post('issue_date');
            $result=$this->nurse->addcardno($data,$user_id);
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
