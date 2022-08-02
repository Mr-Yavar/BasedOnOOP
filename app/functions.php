<?php

use App\Helper\Auth;
use App\Helper\Cookie;
use App\Helper\SESSION;

function getValue($filed)
{ //sent values
    return Request($filed);
}

function old($field) {
    return request($field);
}

function Request($filed=null)
{
    $request = new \App\Helper\Request();
    if(is_null($filed)){
        return $request;
    }
    return $request->input($filed);
}

function session ($key=null){
    $session = new SESSION();
    if(is_null($key))
        return $session;

    return $session->get($key);
}
function cookie ($key=null){
    $cookie = new Cookie();
    if(is_null($key))
        return $cookie;

    return $cookie->get($key);
}
function redirect($param=null,$html=false,$time=5){
    if(!$html){
if(is_null($param)){
    $param="./";
}
header("Location: $param");
    }else{
        if(is_null($param)){
            $param="./";
        }
        echo "<meta http-equiv=\"refresh\" content=\"2; URL=$param\" />";
    }
}

function random($length=16)
{
    $string='';
    while(($len = strlen($string)) < $length){
        $size=$length - $len ;
        $bytes = random_bytes($size);
        $string .= substr(str_replace(['/','+','='],'',base64_encode($bytes)),0,$size);
    }
    return $string;
}

function checkLogin(){
    return Auth::check();
}