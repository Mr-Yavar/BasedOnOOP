<?php namespace App\Contracts;

interface Requestinterface{

public function input($filed,$post=true);

public function all($post=true);

public function isPost();
}