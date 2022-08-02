<?php namespace App\Controller;

use App\Helper\Auth;
use App\Helper\validation;
use App\Helper\Flasher;
use App\Helper\jdf;
use App\Model\Users;


class UserController extends Controller{
   
    public $flash;
    function __construct()
    {
        global $base_url,$base_dir;
        $this->flash =new Flasher($base_url,$base_dir);
      
        if(checkLogin()){
            redirect();
        }
    }

    public function login(){
        if(!Request()->isPost())
           return;
        
       $rules=[
           "password"=>"require|min:8|max:20",
           "username"=>"require|min:5|max:72|ValidUsrname",
           "RCT"=>"Check",
           "Captcha"=>"CheckCaptcha"

       ];
       
 

       if(!$this->validation(request()->all() , $rules)) {
        echo $this->flash->alert();
        return;
         }

       $this->flash->setStatus(true);
       $user = (new Users())->find('username',Request('username'));
       if(!$user){
        $this->flash->setMessage([["!چنین ایمیلی وجود ندارد"]]);    
        return false;
      }

       $enc=new \App\Helper\ENC(Request("password"),"password-gen", 256);
      $login = ($enc->encrypt()==$user->password);
      if(!$login){
        $this->flash->setMessage([["!اطلاعات وارد شده مطابقت ندارد"]]);    
        return false;
      }
      $remember=false;
      if(!empty(Request("remember")))
        $remember=true;
        

        Auth::login($user,$remember);

           echo $this->flash->setMessage([["!با موفقیت به حساب کاربری خود وارد شدید"]])->setcolor("green")->alert();
           sleep(1);
           redirect();
           return;
 }

    public function register(){
         if(!Request()->isPost())
            return;
         
        $rules=[
            "email"=>"require|email|unique:users",
            "password"=>"require|min:8|max:20|confirm:Cpassword",
            "username"=>"require|min:5|max:72|ValidUsrname|unique:users",
            "name"=>"require|min:3|max:72|name",
            "RCT"=>"Check",
            "Captcha"=>"CheckCaptcha"

        ];
        
        $PersianName=[
            "email"=>"ایمیل",
            "name"=>"نام",
            "username"=>"نام کاربری",
            "password"=>"رمز عبور",
            "RTC"=>"توکن",
            "Captcha"=>"کد امنیتی"
        ];

      

        if(!$this->validation(request()->all() , $rules)) {
            echo $this->flash->alert();
            return;
        }

        $this->flash->setStatus(true);
        $enc=new \App\Helper\ENC(Request("password"),"password-gen", 256);
        $model=new Users();
        $success=($model)->Create([
            'name'=>Request("name"),
            'username'=>Request("username"),
            'email'=>Request("email"),
            'password'=>$enc->encrypt(),
            'created_at'=>date("y/m/d")
            
            ]);
            if($success){
            $this->flash->setMessage([["! ثبت نام با موفقیت انجام شد "]]);
            echo $this->flash->setcolor("green")->alert();
            redirect(null,true);
            }else{
                $this->flash->setMessage([["خطا در دیتابیس!"]]);
                echo $this->flash->setcolor("red")->alert();
            }
            
            return;
    }


  
}