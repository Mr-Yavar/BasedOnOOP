<?php namespace App\Helper;

class Pages{
    protected $Pages = array();
    protected $Page;
    protected $addrs;
    protected $base_url;
    protected $base_dir;
    public function __construct($url,$dir)
    {
        $this->base_url=$url;
        $this->base_dir=$dir;
        if(checkLogin()){
            $user = Auth::user();
            $this->Pages =["Home","Contact","About","Panel","Log Out"];
             if($user->type != 'admin'){
               
                $this->addrs =["Home"=>$this->base_url.$this->base_dir,"Contact"=>"$this->base_url.$this->base_dir/contact.php","About"=>"$this->base_url.$this->base_dir/about.php","Panel"=>"$this->base_url.$this->base_dir/user","Log Out"=>"$this->base_url.$this->base_dir/logout.php"];
                
             }else{
           
            $this->addrs =["Home"=>$this->base_url.$this->base_dir,"Contact"=>"$this->base_url.$this->base_dir/contact.php","About"=>"$this->base_url.$this->base_dir/about.php","Panel"=>"$this->base_url.$this->base_dir/admin","Log Out"=>"$this->base_url.$this->base_dir/logout.php"];
             }
        } else{
            $this->Pages =["Home","Contact","About","SignUp","Login"];
            $this->addrs =["Home"=>"$this->base_url.$this->base_dir","Contact"=>"$this->base_url.$this->base_dir/contact.php","About"=>"$this->base_url.$this->base_dir/about.php","SignUp"=>"$this->base_url.$this->base_dir/signup.php","Login"=>"$this->base_url.$this->base_dir/login.php"];
        
         }
    }

    public function setPage($name){
        $this->Page=$name;
    }

    public function NavBar(){
        $str="";
        foreach ($this->Pages as $key => $value) {
            $str.= "<li class=\"nav-item ";
            if($value == $this->Page)  
            $str.="active" ;
            $str.="\"><a class=\"nav-link\" href=\"{$this->addrs[$value]}\">{$value}";
            if($value == $this->Page)  
                $str.="<span class=\"sr-only\">(current)</span>" ;
            $str.= "</a></li>";
        
        }
      
        return $str;
    }

    public function Loader(){
        
        $str= "<link href=\"$this->base_url.$this->base_dir/assets/vendors/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
        <script src=\"$this->base_url.$this->base_dir/assets/vendors/jquery/jquery.min.js\"></script>
        <script src=\"$this->base_url.$this->base_dir/assets/vendors/bootstrap/js/bootstrap.bundle.min.js\"></script><link href=\"$this->base_url.$this->base_dir/assets/css/{$this->Page}-page.css\" rel=\"stylesheet\">";
        return $str;
    }
}