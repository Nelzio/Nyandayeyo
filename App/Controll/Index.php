<?php

namespace App\Controll;
require_once '../vendor/src/Controller/Action.php';
require_once '../App/Model/Denuncia.php';
require_once '../App/Model/Denunciante.php';
require_once '../App/Model/Endereco.php';
use src\Controller\Action;
use App\Model\Denuncia;
use App\Model\Endereco;
use App\Model\Denunciante;
class Index extends Action{

    
    
    public function index(){
     
        $list = new Endereco(\App\Init::conectarBD());
        $listar = $list->listDistrito();
        $this->view->selecionar=$listar;
        //renderizando
        $this->render('index');
    }
    
        function bairro(){
        $list = new Endereco(\App\Init::conectarBD());
        $listar = $list->listBairro($_POST["id_distrito"]);
        $jsonValor = json_encode($listar);
        print_r($jsonValor);
    }
    
    function denunciante(){
        $denunciante = new Denunciante(\App\Init::conectarBD());
        $denunciante->setNome($_POST['nome']);
        $denunciante->setSexo($_POST['sexo']);
        $denunciante->setTipoDenunciante($_POST['tipo']);
        $denunciante->setTelefone($_POST['telefone']);
        $denunciante->insertDenunciante();
        return $denunciante->ultimoId();
    }
    
    function endereco(){
        $endereco = new Endereco(\App\Init::conectarBD());
        $endereco->setIdProvincia(1);
        $endereco->setDistrito($_POST['idDistrito']);
        $endereco->setIdBairro($_POST['idBairro']);
        $endereco->insertEndereco();
        return $endereco->ultimoId();
    }
            
    function insertDenuncia(){
        $denuncia = new Denuncia(\App\Init::conectarBD());
        //$endereco = new Endereco(\App\Init::conectarBD());
        $denuncia->setIdDenunciante($this->denunciante());
        $denuncia->setIdEndereco($this->endereco());
        $denuncia->setDescricao($_POST['descricao']);
        $denuncia->setTipoViolencia($_POST['tipoViolencia']);
        $denuncia->insertDenuncia();
    }


    function ajuda(){
        $this->render('ajuda');
        
    }
    function sobre(){
        $this->render('sobre');
        
    }


}

