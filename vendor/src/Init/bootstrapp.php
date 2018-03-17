<?php

namespace src\Init;
abstract class bootstrapp {
    private $routes;
    
    function __construct() {
        $this->initRouts();
        $this->run($this->getUrl());
    }

    
    abstract protected function initRouts();
    
    
    protected function run($url){
        //percorer a url
        array_walk($this->routes, function($route) use($url){
        if($url == $route['route']){
            $class = "App\\Controll\\".ucfirst($route['controller']);
            $controller = new $class;
            $controller->$route['action']();
            /*echo '<pre>';
            print_r($controller);
            echo '</pre>';
         print_r($this->getUrl());*/
        }
            
        });
    }
    //definir a rota        
    protected function setRouts(array $routes){
        $this->routes= $routes;
    }
    
    //levar a url presente
    protected function getUrl(){
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }
}
