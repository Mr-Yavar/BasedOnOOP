<?php namespace App\Helper;

use \App\Contracts\Requestinterface;

class Request implements Requestinterface{
    
public function input($filed,$post=true){
if($this->isPost() && $post){
    return (isset($_POST[$filed])) ? htmlspecialchars($_POST[$filed]) : "";
}else{
    return (isset($_GET[$filed])) ? htmlspecialchars($_GET[$filed]) : "";
}
}

public function all($post=true){
    if($this->isPost() && $post){
        return (isset($_POST)) ? array_map('htmlspecialchars',$_POST) : null;
    }else{
        return (isset($_GET)) ? array_map('htmlspecialchars',$_GET) : null;
    }   
}

public function isPost(){
    return $_SERVER['REQUEST_METHOD']=='POST';
}

}