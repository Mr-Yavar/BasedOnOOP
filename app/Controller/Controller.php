<?php namespace App\Controller;

use App\Helper\Validation;
use App\Helper\Flasher;

class Controller
{
    public $flash;

    public function __construct()
    {
        global $base_url,$base_dir;
        $this->flash =new Flasher($base_url,$base_dir);
    }

    public function validation($data , $rules)
    {
        $config = require __DIR__."/../configuration.php";
        $validation = new Validation($config['InputTitle']);

        $valid = $validation->make($data , $rules);

        if(!$valid){


                $this->flash->setMessage($validation->getError());
                
                return false;
            }
        return true;
    }
}