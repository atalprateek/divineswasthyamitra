<?php
class Listing_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
    
	public function addhospital($data,$discountdata,$working_hours,$imgdata){
		$data['slug']=verify_slug("hospital",$data['slug']);
		if($this->db->insert("hospital",$data)){
			$hospital_id=$this->db->insert_id();
            
			$imgdata['hospital_id']=$hospital_id;
			$this->db->insert("images",$imgdata);
            
			if(!empty($discountdata)){
				foreach($discountdata as $key=>$value){
					$discountdata[$key]['hospital_id']=$hospital_id;
				}
				$this->db->insert_batch('user_discounts', $discountdata);
			}
			foreach($working_hours as $key=>$value){
				$working_hours[$key]['hospital_id']=$hospital_id;
			}
            $this->db->insert_batch('working_hours', $working_hours);
            return array("status"=>true,"message"=>"Hospital Added Successfully!");
        }
        else{
            $err=$this->db->error();
            return array("status"=>false,"message"=>$err['message']);
		}
	}
	
	public function gethospital($where=array(),$order="t1.id",$count="",$offset="0"){
		$basepath=file_url();
		$default=file_url('assets/img/clinic-featured.jpg');
		$default_thumb=file_url('assets/img/clinic-list-1.jpg');
		$default_featured=file_url('assets/img/featured-img.jpg');
		$this->db->select("t1.*,concat(t2.name,',',t3.name) as location, t4.category, t4.slug as `category-slug`");
		$this->db->from('hospital t1');
		$this->db->join('constituency t2','t1.location_id=t2.id','Left');
		$this->db->join('district t3','t2.parent_id=t3.id','Left');
		$this->db->join('category t4','t1.category_id=t4.id','Left');
		if(isset($where['query']) && $where['query']!=''){ 
			$query=$where['query']; 
			unset($where['query']);
			$this->db->like("CONCAT_WS(' ', t1.name, t1.slug, t1.keywords, t1.address,t1.website)", $query, 'both');
		}
		if(isset($where['location']) && $where['location']!=''){ 
			$location=$where['location']; 
			unset($where['location']);
			$this->db->like("CONCAT_WS(' ', t1.address, t1.district, t1.state, t2.name,t3.name)", $location, 'both');
		}
		$this->db->where($where);
		$this->db->order_by($order);
		$query=$this->db->get();
		$rowcount= $query->num_rows();
		$result['rowcount']=$rowcount;
		$array=$query->result_array();
		
		if($count!=''){
			$pages=ceil($rowcount/$count);
			$result['pages']=$pages;
			$limit=$offset+$count;
		}
		else{$limit=$offset+count($array);}
		$hospitals=array();
		if(is_array($array)){
			for($i=$offset;$i<$limit;$i++){
				if(!isset($array[$i])){ break; }
				$iwhere['hospital_id']=$array[$i]['id'];
				$this->db->select("case when (`image`='') then '$default' else concat('$basepath',`image`) end as image,
						case when (`thumb_image`='') then '$default_thumb' else concat('$basepath',`thumb_image`) end as thumb_image,
						case when (`featured_image`='') then '$default_featured' else concat('$basepath',`featured_image`) end as featured_image");
				$image=$this->db->get_where("".TP."images",$iwhere)->row_array();
				if(!empty($image)){
					$array[$i]['image']=$image['image'];
					$array[$i]['thumb_image']=$image['thumb_image'];
					$array[$i]['featured_image']=$image['featured_image'];
				}else{
					$array[$i]['image']=$default;
					$array[$i]['thumb_image']=$default_thumb;
					$array[$i]['featured_image']=$default_featured;
				}
				$query="SELECT round(AVG(rating)) as rating FROM `".TP."reviews` WHERE hospital_id='$iwhere[hospital_id]'";
				$array[$i]['rating']=$this->db->query($query)->row()->rating;
				$hospitals[]=$array[$i];
			}	
		}
		$result['hospitals']=$hospitals;
		return $result;
	}
	
	public function gethospitaldetails($where){
		$basepath=file_url();
		$default=file_url('assets/images/banner_3.jpg');
		$default_thumb=file_url('assets/img/clinic-list-1.jpg');
		$default_featured=file_url('assets/img/featured-img.jpg');		
		$array=$this->db->get_where("hospital",$where)->row_array();
		$category=$this->website->getcategory(array("id"=>$array['category_id']));
		$array['category']=$category[0]['category'];
		$array['category-slug']=$category[0]['slug'];
		if(is_array($array)){
			$iwhere['hospital_id']=$array['id'];
			$this->db->select("case when (`image`='') then '$default' else concat('$basepath',`image`) end as banner,
					case when (`thumb_image`='') then '$default_thumb' else concat('$basepath',`thumb_image`) end as thumb_image,
					case when (`featured_image`='') then '$default_featured' else concat('$basepath',`featured_image`) end as featured_image");
			$images=$this->db->get_where("images",$iwhere)->row_array();
			if(!is_array($images)){
				$images['banner']=$default;
				$images['thumb_image']=$default_thumb;
				$images['featured_image']=$default_featured;
			}
			$array=array_merge($array,$images);
		}
		$array['discounts']=$this->gethospitaldiscount($array['id']);
		$array['reviews']=$this->gethospitalreviews($array['id']);
		$array['working_hours']=$this->gethospitalworkinghours($array['id']);
		$query="SELECT round(AVG(rating)) as rating FROM `".TP."reviews` WHERE hospital_id='$array[id]'";
		$array['rating']=$this->db->query($query)->row()->rating;
		return $array;
	}
	
	public function updatehospital($data,$discountdata,$working_hours,$imgdata){
		$data['slug']=verify_slug("hospital",$data['slug'],$data['id']);
		$where['id']=$where2['hospital_id']=$data['id'];
		unset($data['id']);
		if($this->db->update("hospital",$data,$where)){
            
            $timedata=$working_hours['data'];
            $timewhere=$working_hours['where'];
            $checktiming=$this->db->get_where("working_hours",$timewhere[0])->num_rows();
            if($checktiming){
                foreach($timedata as $key=>$time){
                    $this->db->update("working_hours",$time,$timewhere[$key]);
                }
            }
            else{
                $this->db->insert_batch('working_hours', $timedata);
            }
            $this->db->delete("user_discounts",$where2);
            if(!empty($discountdata)){
                $this->db->insert_batch('user_discounts', $discountdata);
            }
            
            return array("status"=>true,"message"=>"Hospital Updated Successfully!");
        }
        else{
            $err=$this->db->error();
            return array("status"=>false,"message"=>$err['message']);
		}
	}
	
	function deletehospital($where){
        $hospital=$this->db->get_where("hospital",$where)->unbuffered_row('array');
        if(is_array($hospital) && !empty($hospital)){
            $id=$hospital['id'];
            if($this->db->delete("hospital",$where)){
                $where2['hospital_id']=$id;
                $this->db->delete("images",$where2);
                $this->db->delete("reviews",$where2);
                $this->db->delete("user_discounts",$where2);
                $this->db->delete("working_hours",$where2);
                $this->db->update("featured",array("hospital_id"=>'0'),$where2);
                return array("status"=>true,"message"=>"Hospital Deleted Successfully!");
            }
            else{
                $err=$this->db->error();
                return array("status"=>false,"message"=>$err['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Hospital Not found!");
        }
	}
	
	public function gethospitaldiscount($hospital_id){
		$this->db->select("t1.name, t1.type, t1.category_id, t2.discount, t2.discount_id");
		$this->db->from('discount_slab t1');
		$this->db->join('user_discounts t2','t2.discount_id=t1.id','Left');
		$this->db->where(array("hospital_id"=>$hospital_id));
		$query=$this->db->get();
		if($query){
			$array=$query->result_array();
			if(is_array($array)){
				return $array;
			}
		}
		else{
			print_r($this->db->error());
		}
	}
	
	public function gethospitalreviews($hospital_id){
		$where['hospital_id']=$hospital_id;
		$where['comment!=']='';
		$this->db->order_by("rating desc");
		$this->db->limit(5);
		$query=$this->db->get_where("reviews",$where);
		if($query->num_rows()>0){
			return $query->result_array();	
		}
		else{return false; }
	}
	
	public function gethospitalworkinghours($hospital_id){
		$where['hospital_id']=$hospital_id;
		$query=$this->db->get_where("working_hours",$where);
		$result=array("Monday"=>'-',"Tuesday"=>'-',"Wednesday"=>'-',"Thursday"=>'-',"Friday"=>'-',"Saturday"=>'-',"Sunday"=>'-');
		if($query->num_rows()>0){
			$array=$query->result_array();
			foreach($array as $day){
				if($day['open_time']!='00:00:00' && $day['close_time']!='00:00:00'){
					$date=date('Y-m-d');
					$result[$day['day']]=date('h:i A',strtotime($date.' '.$day['open_time'])).'-'.date('h:i A',strtotime($date.' '.$day['close_time']));
				}
				elseif($day['24hours']==1){
					$result[$day['day']]="24 Hours";
					
				}
				else{
					$result[$day['day']]="Closed";
				}
			}	
		}
		return $result;
	}
	
}
