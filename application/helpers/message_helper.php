<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
    if(isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.1.107')){
		define("API_KEY","");
	}
	else{	
		define("API_KEY","df10ed7f6e294a8e88bab5101b508874");
	}
if(!function_exists('send_message')) {
  		function send_message($mobile,$message) {
            $message=urlencode($message);
            $url="http://142.132.202.49/wapp/api/send?";
            $body="apikey=".API_KEY;
            $body.="&mobile=$mobile&msg=$message";
            $url.=$body;
            echo $url=htmlToPlainText($url);
            file_get_contents($url);
		}  
	}
    if(!function_exists('htmlToPlainText')){
        function htmlToPlainText($str){
            $str = str_replace('&nbsp;', ' ', $str);
            $str = html_entity_decode($str, ENT_QUOTES | ENT_COMPAT , 'UTF-8');
            $str = html_entity_decode($str, ENT_HTML5, 'UTF-8');
            $str = html_entity_decode($str);
            $str = htmlspecialchars_decode($str);
            $str = strip_tags($str);
return $str;
        }
    }
    
?>
