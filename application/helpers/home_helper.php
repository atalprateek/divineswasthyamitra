<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	if(!function_exists('getbannerimages')) {
  		function getbannerimages() {
    		$CI = get_instance();
            $where=array("status"=>1);
            $array=$CI->website->getbannerimages($where);
            return $array;
		}  
	}

	if(!function_exists('getmonthlycurrentaffairs')) {
  		function getmonthlycurrentaffairs() {
    		$CI = get_instance();
            $where=array("status"=>1);
            $CI->db->where($where);
            $CI->db->group_by('month(date),year(date)');
            $CI->db->order_by('date');
            $query=$CI->db->get("current_affairs");
            $array=$query->result_array();
            return $array;
		}  
	}

	if(!function_exists('getrecruitments')) {
  		function getrecruitments() {
    		$CI = get_instance();
            $where=array("status"=>1);
            $array=$CI->website->getrecruitments($where);
            return $array;
		}  
	}

	if(!function_exists('getbookmarks')) {
  		function getbookmarks($user=NULL) {
    		$CI = get_instance();
            if($user===NULL){
                $user=$CI->session->user;
            }
            $result=$CI->account->getuser(array("md5(id)"=>$user));
            $bookmarks=array();
            if($result['status']===true){
                $user=$result['user'];
                $bookmarks=$CI->quiz->getbookmarks($user['id']);
            }
            return $bookmarks;
		}  
	}

	if(!function_exists('getbookmarkqids')) {
  		function getbookmarkqids($user=NULL) {
            $bookmarks=getbookmarks();
            $bookmarkqids=array_column($bookmarks,'question_id');
            return $bookmarkqids;
		}  
	}

	if(!function_exists('countbookmarks')) {
  		function countbookmarks() {
            $bookmarks=getbookmarks();
            $count=0;
            if(!empty($bookmarks)){
                $count=count($bookmarks);
            }
            return $count;
        }
    }

	if(!function_exists('getorderedtitles')) {
  		function getorderedtitles() {
            $CI = get_instance();
            $user=$CI->session->user;
            $result=$CI->account->getuser(array("md5(id)"=>$user));
            $titleids=array();
            if($result['status']===true){
                $user=$result['user'];
                $where=" order_id in (select id from ".TP."orders where user_id='$user[id]')";
                $items=$CI->db->get_where("order_items",$where)->result_array();
                if(!empty($items)){
                    $titleids=array_column($items,'title_id');
                }
            }
            return $titleids;
        }
    }


	if(!function_exists('userimage')) {
  		function userimage($user=NULL) {
            $CI = get_instance();
            if($user===NULL){
                $user=$CI->session->user;
            }
            $result=$CI->account->getuser(array("md5(id)"=>$user));
            $photo=file_url('assets/images/avatar/img-5.jpg');
            if($result['status']===true){
                $user=$result['user'];
                $photo=$user['photo'];
            }
            return $photo;
        }
    }

	if(!function_exists('getcart')) {
  		function getcart($data=array()) {
    		$CI = get_instance();
            $cart=$CI->cart->getcart($data);
            return $cart;
		}  
	}

	if(!function_exists('countcart')) {
  		function countcart() {
            $cart=getcart();
            $count=0;
            if(!empty($cart)){
                $count=count($cart);
            }
            return $count;
        }
    }

    if(!function_exists('computedistance')){
        function computedistance($lat1,$lng1,$lat2,$lng2){
            $radius = 6378137;
            static $x = M_PI / 180;
            $lat1 *= $x; $lng1 *= $x;
            $lat2 *= $x; $lng2 *= $x;
            $distance = 2 * asin(sqrt(pow(sin(($lat1 - $lat2) / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(($lng1 - $lng2) / 2), 2)));
            $distance*=$radius; // in meters
            $distance/=1000;
            return $distance;
        }
    }

    if(!function_exists('findneareststore')){
        function findneareststore($lat,$lng,$session=NULL){
    		$CI = get_instance();
            $stores=$CI->stores->getstorelocation();
            $result=array();
            $prev=false;
            if(!empty($stores)){
                foreach($stores as $key=>$store){
                    if(empty($store['latitude'])) $store['latitude']=0;
                    if(empty($store['longitude'])) $store['longitude']=0;
                    $distance=computedistance($lat,$lng,$store['latitude'],$store['longitude']);
                    if($distance>$store['radius']){
                        unset($stores[$key]);
                        continue;
                    }
                    $stores[$key]['distance']=$distance;
                    if($prev===false || $distance<$prev){
                        $result=$stores[$key];
                        $prev=$distance;
                    }
                }
            }
            /*    print_r($stores);
            if(!empty($stores)){
                $distances=array_column($stores,'distance');
                print_r($distances);
                asort($distances);
                $nearestkey=key($distances);
                $result=$stores[$nearestkey];
                $result['distance']="$result[distance]";
                if($session===NULL){
                    $CI->session->set_userdata('store_id',$result['store_id']);
                }
            }*/
            //$result['session']=$session;
            if($session===NULL && isset($result['store_id'])){
                //$result['latlng']=$lat.':'.$lng;
                $CI->session->set_userdata('store_id',$result['store_id']);
                $CI->session->set_userdata('latitude',$lat);
                $CI->session->set_userdata('longitude',$lng);
            }
            return $result;
        }
    }

    if(!function_exists('checkproductavailability')){
        function checkproductavailability($product_id,$store_id=NULL){
    		$CI = get_instance();
            if($store_id===NULL){
                $store_id=$CI->session->store_id;
            }
            $check=$CI->db->get_where("store_products",array("product_id"=>$product_id,"store_id"=>$store_id,"status"=>1))->num_rows();
            if($check==0){
                return false;
            }
            else{
                return true;
            }
        }
    }
    
    if(!function_exists('getfeaturedcategories')){
        function getfeaturedcategories(){
            $CI = get_instance();
            $where=array();
            if($CI->session->store_id!==NULL){
                $where=array("t1.store_id"=>$CI->session->store_id);
            }
            $CI->db->select("t2.id,t2.name,t2.slug");
            $CI->db->from("featured_category t1");
            $CI->db->join("category t2","t1.category=t2.id");
            $CI->db->where($where);
            $query=$CI->db->get();
            $count=$query->num_rows();
            if($count==0){
                $CI->db->select("t2.id,t2.name,t2.slug");
                $CI->db->from("featured_category t1");
                $CI->db->join("category t2","t1.category=t2.id");
                $CI->db->where(array("t1.store_id"=>0));
                $array=$CI->db->get()->result_array();
            }
            else{
                $array=$query->result_array();
            }
            if(is_array($array)){
                foreach($array as $key=>$value){
                    $CI->db->select("id,name,slug");
                    $getsubmenu=$CI->db->get_where("category",array("parent_id"=>$value['id']));
                    if($getsubmenu->num_rows()!=0){
                        $array[$key]['submenu']=$getsubmenu->result_array();
                    }
                }
            }
            return $array;
        }
    }

    if(!function_exists('getdeliverycharge')){
        function getdeliverycharge($amount){
    		$CI = get_instance();
            $where=array("min_amount<="=>$amount,"max_amount>="=>$amount);
            $getdeliverycharge=$CI->db->get_where("delivery_charge",$where);
            if($getdeliverycharge->num_rows()==0){
                return 0;
            }
            else{
                $array=$getdeliverycharge->unbuffered_row('array');
                return $array['amount'];
            }
        }
    }
    
    if(!function_exists('getuniquedistricts')){
        function getuniquedistricts($where=array()){
    		$CI = get_instance();
            $CI->db->select('DISTINCT `district`', FALSE);
            $CI->db->order_by("district");
            $query=$CI->db->get_where("store",$where);
            $array=$query->result_array();
            return $array;
        }
    }

    /*if(!function_exists('getuniquediscounts')){
        function getuniquediscounts($where=array("t1.discount>"=>0)){
            $default=file_url("assets/images/banners/offer-1.jpg");
            $columns='max(t1.discount) as discount,t2.name as category,t2.slug';
            $columns.=",  case when isnull(banner_image) then '$default' else concat('".file_url()."',banner_image) end as banner_image";
    		$CI = get_instance();
            $CI->db->select($columns);
            $CI->db->order_by("t1.discount");
            $CI->db->from("products t1");
            $CI->db->join("category t2","t1.category=t2.id");
            $CI->db->where($where);
            $CI->db->group_by("t1.category");
            $query=$CI->db->get();
//echo PRE;echo $CI->db->last_query();print_r($CI->db->error());
            $array=$query->result_array();
            return $array;
        }
    }*/

    if(!function_exists('getuniquediscounts')){
        function getuniquediscounts($where=array("t1.discount>"=>0)){
            $default=file_url("assets/images/banners/offer-1.jpg");
            $columns='max(t1.discount) as discount,t2.name as category,t2.slug';
            $columns.=",  case when isnull(banner_image) then '$default' else concat('".file_url()."',banner_image) end as banner_image";
    		$CI = get_instance();
            $CI->db->select($columns);
            //$CI->db->order_by("t1.discount");
            $CI->db->from("products t1");
            $CI->db->join("category t2","t1.category=t2.id");
            $CI->db->where($where);
            $CI->db->group_by("t1.category");
            $query=$CI->db->get();
            $array=$query->result_array();
            
            $discounts=array_column($array,"discount");
            asort($discounts);
            $result=array();
            foreach($discounts as $key=>$value){
                $result[]=$array[$key];
            }
            //echo PRE;echo $CI->db->last_query();print_r($result);die;
            return $result;
        }
    }

    if(!function_exists('generatereceipt')){
        function generatereceipt($table="orders"){
            $receipt=strtoupper(random_string('alpha', 4)).random_string('numeric', 4);
    		$CI = get_instance();
            if($CI->db->get_where($table,array("receipt"=>$receipt))->num_rows()==0){
                return $receipt;
            }
            else{
                return generatereceipt();
            }
        }
    }

    if(!function_exists('getstockquantity')){
        function getstockquantity($product_id,$store_id){
    		$CI = get_instance();
            $where=array("product_id"=>$product_id,"to_id"=>$store_id);
            $CI->db->select_sum("quantity","quantity");
            $instock=$CI->db->get_where("stock",$where)->unbuffered_row()->quantity;
            $instock=is_null($instock)?0:$instock;

            $where=array("product_id"=>$product_id,"from_id"=>$store_id);
            $CI->db->select_sum("quantity","quantity");
            $outstock=$CI->db->get_where("stock",$where)->unbuffered_row()->quantity;
            $outstock=is_null($outstock)?0:$outstock;

            $quantity=$instock-$outstock;
            return $quantity;
        }
    }

	if(!function_exists('walletamount')) {
  		function walletamount($user=NULL) {
    		$CI = get_instance();
            if($user===NULL){
                $user=$CI->session->user;
            }
            $result=$CI->account->getuser(array("md5(id)"=>$user));
            $amount=0;
            if($result['status']===true){
                $user=$result['user'];
                $CI->db->select_sum("amount","amount");
                $amount=$CI->db->get_where("wallet",array("user_id"=>$user['id']))->unbuffered_row()->amount;
            }
            return $amount;
		}  
	}
    
	if(!function_exists('getwalletpay')) {
  		function getwalletpay($order_id) {
    		$CI = get_instance();
            $CI->db->select_sum('amount','amount');
            $amount=$CI->db->get_where("wallet",array("order_id"=>$order_id))->unbuffered_row()->amount;
            return abs($amount);
		}  
	}
    
    if(!function_exists('logrequest')) {
  		function logrequest() {
            if(LOG_REQUEST){
                $CI = get_instance();
                $post=json_encode($CI->input->post());
                $server=json_encode($_SERVER);
                $ip= $_SERVER['REMOTE_ADDR'];
                $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                $CI->db->insert("request_log",array("url"=>$url,"ip_address"=>$ip,"post"=>$post,"server"=>$server,
                                                "added_on"=>date('Y-m-d H:i:s')));
            }
        }
    }
?>
