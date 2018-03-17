<?php


namespace App\Controll;
require_once '../vendor/src/Controller/Action.php';
//require_once '../../App/Model/Artigo.php';
use src\Controller\Action;
class Admin extends Action{
    
    function index(){
        $this->render('index');
    }
    
    function login(){
        $this->render('login');
    }

}
