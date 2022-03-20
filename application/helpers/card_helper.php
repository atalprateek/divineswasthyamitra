<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	if(!function_exists('createverticalcard')) {
  		function createverticalcard($data) {
			
			// Create Image From Existing File
			$jpg_image = imagecreatefromjpeg(file_url('assets/images/vertical.jpg'));
			
			// Allocate A Color For The Text
			$white = imagecolorallocate($jpg_image, 255, 255, 255);
			$black = imagecolorallocate($jpg_image, 0, 0, 0);
			
			// Set Path to Font File
			$font_path = dirname(__FILE__).'/font/CREDC___.ttf';
			
			// Set Text to Be Printed On Image
			
			$card_no = $data['card_no'];
			$name = strtoupper($data['name']);
			$issue = date('d/m/Y',strtotime($data['issue']));
			$valid = date('m/y',strtotime($data['issue']."+1 year -1 day"));
			
			$filename=generate_slug($name.$card_no).'.jpg';
			$carray=str_split($card_no);
			$card_no='';
			$i=0;
            $left=450;
			foreach($carray as $char){
				$i++;
				$card_no.=$char.'';
				if($i%4==1){$card_no.='  '; $left+=12; }
                imagettftext($jpg_image, 12, 0, $left, 437, $white , $font_path, $char);
                $left+=17;
			}
			// Print Text On Image
			//imagettftext($jpg_image, 12, 0, 460, 437, $white , $font_path, $card_no);
			imagettftext($jpg_image, 20, 0, 96, 395, $white , $font_path, $name);
			imagettftext($jpg_image, 11, 0, 95, 435, $black , $font_path, "VALID TILL");
			imagettftext($jpg_image, 11, 0, 185, 437, $black , $font_path, $valid);
			$height=635;
			
			//imagecopy($jpg_image, $code, 0, 100, 0, 0, 100, 100);
			
            if(!is_dir('./assets/images/cards')){
                mkdir('./assets/images/cards');
            }
            
            // Output image
            //header('Content-type: image/jpeg');
            
			// Send Image to Browser
			imagejpeg($jpg_image,'./assets/images/cards/'.$filename);
			
			// Clear Memory
			imagedestroy($jpg_image);
		}  
	}
	
	if(!function_exists('wrapaddress')) {
  		function wrapaddress($address) {		
			$address=str_replace(',,',',',$address);
			$address=str_replace('..',',',$address);
			$address=strtolower($address);
			$address=ucwords($address,',');
			$array=array();
			if(strpos($address,',')===false){
				$array=explode(' ',$address);
			}
			else{
				for($i=0;$i<3;$i++){
					$length=strlen($address);
					if($length>25){	
						$pos=strpos($address,',');
						$line=substr($address,0,$pos);
						$address=substr($address,++$pos);
						if($pos<=10){
							$pos=strpos($address,',');
							if($pos===false){
								$pos=strrpos($address,' ');
							}
							$line.=' '.substr($address,0,$pos);
							$address=substr($address,++$pos);
							$array[]=ucwords($line);
						}
						else{
							$array[]=ucwords($line);
						}
					}
					else{
						if(array_search(ucwords($address),$array)===false)
							$array[]=ucwords($address);
					}
				}
			}
			$address=array();
			if(count($array)>3){
				$nextkey=10000;
				$i=0;
				foreach($array as $key=>$value){
					if($key==$nextkey || empty($value)){ continue; }
					if(strlen($value)<15 && isset($array[$key+1])){
						$newvalue=$value.','.$array[$key+1];
						if(strlen($newvalue)>25){
							$address[]=ucwords($value,',');
							$i++;
						}
						else{
							$address[]=ucwords($newvalue,',');
							$i++;
							$nextkey=$key+1;
						}
					}
					else{
						$address[]=ucwords($value,',');
						$i++;
					}
					if($i==3){break;}
				}
			}
			else{
				$address=$array;
			}
			return $address;
		}
	}

	
?>