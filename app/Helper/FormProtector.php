<?php namespace App\Helper;
use  \App\Helper\ENC;
class FormProtector{

    public static function GetToken(){
        $token=base64_encode(rand(0,999999));    
        session()->set("TKN", $token);
        return  $token;
    }

    public static function CreateCaptcha(){
        $x=140;
        $ptr= substr(str_shuffle("qQAZXSWEDCVFRTGB123456789NHYUJMKILOPazwsxedcrfvtgbyhnujmikolp123456789"),0,4);
        $y=50;
        $enc=new ENC($ptr, $_SERVER['REMOTE_ADDR'], 256);

        session()->set("captcha",$enc->encrypt());

           
            $im = \imagecreate($x,$y);
          // \imagecolorallocate($im, 0,0, 0);    
            $black = \imagecolorallocate($im, 255, 255, 255);
  
            $font = dirname(__FILE__) . '/../../comicz.ttf';
  
        
           $black = \imagecolorallocate($im,  0,0, 0);
            \imagettftext($im, 28, rand(-5,5), 29, 35, $black, $font, $ptr);
  
         header("Content-type: image/png");
         
            return imagejpeg($im);
    }
    public static function GetCaptcha(){
        return "<img id=\"captcha-pack\"src=\"captcha.png?id=".rand(0,50000)."\"/>"; 
    }
}