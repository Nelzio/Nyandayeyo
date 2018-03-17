<?php

namespace App;
require_once '../vendor/src/Init/bootstrapp.php';
require_once 'Controll/Index.php';
require_once 'Controll/Admin.php';
class Init extends \src\Init\bootstrapp{

    //roteamento
    protected function initRouts(){
        $ar['teste'] = array('route'=>'/teste','controller'=>'index','action'=>'teste');
        
        //=============================================Index============================================================
        $ar['home'] = array('route'=>'/','controller'=>'index','action'=>'index');//camiho para home
        $ar['ajuda'] = array('route'=>'/ajuda','controller'=>'index','action'=>'ajuda');
        $ar['bairro'] = array('route'=>'/listbairro','controller'=>'index','action'=>'bairro');
        $ar['insertDenuncia'] = array('route'=>'/insertDenuncia','controller'=>'index','action'=>'insertDenuncia');
        //============================================End Index=========================================================
        //===========================================admin==============================================================
        $ar['adminIndex'] = array('route'=>'/admin','controller'=>'admin','action'=>'index');
        $ar['adminLogin'] = array('route'=>'/admin/login','controller'=>'admin','action'=>'login');
        //===========================================End admin==============================================================
        if($this->getUrl()!= "/" && $this->getUrl()!= "/ajuda" && $this->getUrl()!= "/listbairro" 
                && $this->getUrl()!= "/admin"
                && $this->getUrl()!= "/insertDenuncia" 
                && $this->getUrl()!="/admin/login"){
            $ar['404'] = array('route'=>$this->getUrl(),'controller'=>'index','action'=>'error');
        }
        ////END inserts e del db
        $this->setRouts($ar);
    }
    
    //connect db function
    public static function conectarBD(){
        try{
            $conectPDO=new \PDO("mysql:host=localhost;dbname=Nyandayeyo", "connect", "0000");
        }catch(PDOException $e){
                    echo $e->getMessage();
            }
        return $conectPDO;
    }
    


}

