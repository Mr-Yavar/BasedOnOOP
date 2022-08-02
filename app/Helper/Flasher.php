<?php namespace App\Helper;

class Flasher{
   
    protected $message;
    protected $color;
    protected $position;
    private $_Message;
    protected $status;
    protected $timer;
    protected $base_url;
    protected $base_dir;
        ///Flasher
    function __construct($url,$dir,string $color="#9c1414",array $message=array(),string $position="bottom right",$timer=10000)
    {
        $this->base_url=$url;
        $this->base_dir=$dir;
        $this->timer=$timer;
       $this->status=false;
        $this->color=$color;
        $this->_Message=(is_array($message)) ? $message : array();
        $this->position=$position;
    }
    
    public function loader(){
        return "<script src=\"$this->base_url$this->base_dir/assets/AmaranJs/jquery.amaran.min.js\"></script>
        <link rel=\"stylesheet\" href=\"$this->base_url$this->base_dir/assets/AmaranJs/amaran.min.css?id=1\">
       ";
    }

    public function HasMessages(){
        
        return $this->_Message;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus(bool $value)
    {
        return $this->status=$value;
    }
   
    public function setMessage($value){
        $this->_Message=$value;
        return $this;
    }
    public function setcolor($value){
        $this->color=$value;
        return $this;
    }
    public function setTimer($value){
        $this->timer=$value;
        return $this;
    }
    public function setPosition($value){
        $this->position=$value;
        return $this;
    }
    public function display(){
        $DOM="<script> $(function(){";
        foreach ($this->_Message as  $values){
          
            $DOM .=" $.amaran({
                'theme'     :'colorful',
                'content'   :{
                   bgcolor:'{$this->color}',
                   color:'#fff',
                   message:'{$values[0]}',
                        closeOnClick :true
                },  delay :{$this->timer},
                'position'  :'{$this->position}',
            
            
        });";
        }
        $DOM.=" }); </script>";
        
        return $DOM;
    }

    public function alert()
    {
        $result=$this->loader();
        if($this->HasMessages())
           $result.=$this->display();

        return $result;
    }
}