<?php
session_start();
require "./vendor/autoload.php";
use App\Helper\Pages;
use \App\Controller\HomeController;
use \App\Helper\FormProtector;
use App\Helper\Auth;
$base_url = "http://localhost/";
$base_dir = "";
$Handler = new Pages($base_url,$base_dir);




$tmp = explode("?", $_SERVER['REQUEST_URI']);
$current_route = ltrim(strtolower(str_replace($base_dir."/", '', $tmp[0])),'/');
$current_route_array = explode('/',ltrim(str_replace($base_dir, '', $tmp[0])));
unset($tmp);




switch (strtolower($current_route)) {
    case 'user':
        $Handler->setPage("Panel");
        include "views/Additional/header.php";
        include "views/user-panel.php";
        include "views/Additional/footer.php";
    break;
    case 'logout.php':
        Auth::logout();
    break;
    case 'about.php':
        $Handler->setPage("About");
        include "views/Additional/header.php";
        include "views/about.php";
    break;
    case 'contact.php':
        $Handler->setPage("Contact");
        
        include "views/Additional/header.php";
        include "views/contact.php";
    break;
    case 'home.php':
    case 'index.php':
    case '':
    case '/':
        $Handler->setPage("Home");
        include "views/Additional/header.php";
        $Controller = new HomeController();
        
        include "views/Home.php";
        include "views/Additional/footer.php";
        break;
    case 'login.php':
        $Handler->setPage("Login");
        include "views/Additional/header.php";
        $user = new \App\Controller\UserController();
        $user->login();
        include "views/login.php";
        include "views/Additional/footer.php";
        break;
    case 'signup.php':
        $Handler->setPage("SignUp");
        include "views/Additional/header.php";
        $user = new \App\Controller\UserController();
        $user->register();
        include "views/register.php";
        include "views/Additional/footer.php";
        break;
    case 'captcha.png':
        FormProtector::CreateCaptcha();
        break;
    
    case 'admin':
    case 'admin/article/':
        $Handler->setPage("Panel");
        $articles = (new App\Controller\Admin\AdminController())->index();
        include "views/Additional/header.php";
        include "views/admin/index.php";
        include "views/Additional/footer.php";
        break;
    case 'admin/article/create.php':
        $Handler->setPage("Panel");
        include "views/Additional/header.php";
        (new \App\Controller\Admin\ArticleController())->create();
        include "views/".$current_route;
        include "views/Additional/footer.php";
        break;
    case 'admin/article/delete.php':

       // include "views/Additional/header.php";
        (new \App\Controller\Admin\ArticleController())->delete();
        //include "views/Additional/footer.php";
        break;
    case 'admin/article/edit.php':
        $Handler->setPage("Panel");
        include "views/Additional/header.php";
        $article = (new \App\Controller\Admin\ArticleController())->edit();
        include "views/".$current_route;
        include "views/Additional/footer.php";
        break;
    case 'admin/article/update.php':
        $Handler->setPage("Panel");
        include "views/Additional/header.php";
        (new \App\Controller\Admin\ArticleController())->update(request()->input('id' , false));
        include "views/".$current_route;
        include "views/Additional/footer.php";
        break;
    default:
        var_dump($current_route);
        ?>
  <link href="/route/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="d-flex justify-content-center align-items-center" style="margin:20% 20% 80% 20%;" id="main">
    <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">404</h1>
    <div class="inline-block align-middle">
    	<h2 class="font-weight-normal lead" id="desc">The page you requested was not found.</h2>
    </div>
</div>
<?php

        break;
}

?>