<?php 
namespace App\Controller;

use App\Model\Article;
use \App\Model\Users;

class HomeController{
    private $_page;
public function index()
{
    $users =new Users();
   
    $articles = new Article();
   $all=$articles->all();

   foreach ($all as $key => $value) {
    
   echo  "
   <div class=\"card mb-4\">
   <img class=\"card-img-top\" src=\"https://i.imgur.com/khgHX5R.jpg\" alt=\"Card image cap\">
   <div class=\"card-body\">
     <h2 class=\"card-title\">{$value->title}</h2>
     <p class=\"card-text\">".substr($value->body,0,300)."</p>
     <a href=\"#\" class=\"btn btn-primary\">Read More &rarr;</a>
   </div>
   <div class=\"card-footer text-muted\">
     Posted on ".date("M d,Y",strtotime($value->created_at))." by
     <a href=\"#\">". $users->find('id',$value->user_id)->name."</a>
   </div>
 </div>
 ";
   }
}


}

?>
