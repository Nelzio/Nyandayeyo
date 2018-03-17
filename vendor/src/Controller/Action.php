<?php

namespace src\Controller;
class Action {
    protected $view;
    protected $action;
    protected $route;
    public function __construct() {
        $this->view = new \stdClass();
    }
    
    //renderiza a pagina
    public function render($action, $layout=true){
        $this->action=$action;
        if($layout==true && ($this->getUrl()=='/admin/login' || 
                $this->getUrl()=='/admin') && file_exists("../App/View/layoutAdmin.phtml")){
            include_once '../App/View/layoutAdmin.phtml';
                }elseif($layout==true && file_exists("../App/View/layout.phtml")){
                include_once '../App/View/layout.phtml';
                }
    }

    //content da pagina, o caminho da pagina
    function content(){
        $atual= get_class($this);
            $singleClassName = strtolower(str_replace("App\\Controll\\", "", $atual));
            include_once '../App/View/'.$singleClassName."/". $this->action.".phtml";

    }
    
    //verificar controll
    protected function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }
}
