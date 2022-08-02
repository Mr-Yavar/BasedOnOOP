<?php namespace App\Helper;

use App\Model\DB;

class validation{
    private $_data;
    private $_errors;
    private $_PlaceHolders;
    function __construct(array $Titles)
    {
        $this->_PlaceHolders=$Titles;
    }
    public function make(array $data , array $rules)
    {
        $valid = true;
        $this->_data =$data;
    
        foreach ($rules as $item => $rulest) {
            $rules=explode("|",$rulest);
            foreach($rules as $rule){
                $pos = strpos($rule,":");
                if($pos === false ){
                    $parameter = "";
                }else{
                    $parameter = substr($rule,$pos+1);
                    $rule = substr($rule,0,$pos);
                }
                
                $value = (isset($data[$item])) ? $data[$item] : null;
               
                $MethodName=ucfirst($rule);
              
              
                if(method_exists($this,$rule)){
                    if(!$this->{$MethodName}($item,$value,$parameter)){
                        $valid = false;
                       
                        break;
                    }  
                }
                
            
            }
        }

        return $valid;
    }

    public function getError()
    {
        return $this->_errors;
    }

    public function require($item,$value)
    {
        if(!empty($value))
        return true;
        else
        $this->_errors[$item][]=" پرکردن فیلد {$this->_PlaceHolders[$item]} الزامی است";
        
        return false;
    }

    public function Check($item,$value)
    {
        if($value==$_SESSION["TKN"])
        return true;
      
        return false;
    }
    public function CheckCaptcha($item,$value)
    {
        $enc=new \App\Helper\ENC($value,$_SERVER['REMOTE_ADDR'], 256);
      
       
        if($_SESSION["captcha"]==$enc->encrypt())
        return true;
        else
        $this->_errors[$item][]="کد امنیتی وارد شده مطابقت ندارد  ";
        
        return false;
    }
    public function email($item,$value)
    {
        
        if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
            $this->_errors[$item][]=" {$this->_PlaceHolders[$item]} را صحیح وارد کنید ";
            return false;
        }
        return true;
    }

    public function min($item,$value,$parameter)
    {
        
        if(mb_strlen($value) < $parameter){
            $this->_errors[$item][]="طول {$this->_PlaceHolders[$item]} باید بیشتر باشد ";
            return false;
        }
        return true;
    }
    /*
    *@param 
    */ 
    public function max($item,$value,$parameter)
    {
      
        if(mb_strlen($value) > $parameter){
            $this->_errors[$item][]="طول {$this->_PlaceHolders[$item]} باید کمتر باشد ";
            return false;
        }
        return true;
    }
    public function confirm($item,$value,$parameter)
    {
      
        $confirm = (isset($this->_data[$parameter])) ? $this->_data[$parameter] : null;
       
        if($value != $confirm ){
            $this->_errors[$item][]=" {$this->_PlaceHolders[$item]}  باید با فیلد تکرار آن برابر باشد";
            return false;
        }
        return true;
    }

    public function numeric($item,$value)
    {
        if (!is_numeric($this->en_number($value))) {
            $this->_errors[$item][]="فیلد {$this->_PlaceHolders[$item]} باید تنها شامل اعداد باشد"; 
        }
        return true;
    }
    public function en_number($number)
    {
      
       $en = array("0","1","2","3","4","5","6","7","8","9");
       $fa = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");
       return str_replace( $fa,$en, $number);
    }
    public function ValiddateDate($date){
        $re = '/^[0-9]{4}-(0[1-9]|1[1-2])-(0[1-9]|[1-2][0-9]|[0-1])$/';
        return preg_match($re, $date);
        
    }
    public function name($item,$name){
        
    
        if(preg_match("/^([\p{Arabic}]|\s)*$/u", $name)){
         
            return true;
        }
        $this->_errors[$item][]=" {$this->_PlaceHolders[$item]} !وارد شده غیرمجاز است"; 
        return false;
    }

    public function ValidUsrname($item,$username){
        
        if(!preg_match('/^[a-zA-Z\d_]{5,72}$/i', $username)){
            $this->_errors[$item][]=" {$this->_PlaceHolders[$item]}  وارد شده غیرمجاز است"; 
            return false;
        }
        return true;
    }

    public function unique($item,$value,$param){
        $db=new DB();
        if(is_null($param) || empty($param)){
            $this->_errors[$item][]="خطای ناشناخته"; 
            return false;
        }
        $db->From($param);

        if($db->find($item,$value)!=false){
            $this->_errors[$item][]="حسابی با این {$this->_PlaceHolders[$item]}    موجود است "; 
           return false;
        }

        return true;
    }
}