<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

/**
 * Description of Denuncia
 *
 * @author nelzio
 */
class Denuncia {
    protected $idDenunciante, $idEndereco, $descricao, $tipoViolencia, $db;
    
        public function __construct(\PDO $db) {
        $this->db= $db;
    }
    
    //=============================================================================================
    function getIdDenunciante() {
        return $this->idDenunciante;
    }

    function getIdEndereco() {
        return $this->idEndereco;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDb() {
        return $this->db;
    }

    function setIdDenunciante($idDenunciante) {
        $this->idDenunciante = $idDenunciante;
    }

    function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    
    function getTipoViolencia() {
        return $this->tipoViolencia;
    }

    function setTipoViolencia($tipoViolencia) {
        $this->tipoViolencia = $tipoViolencia;
    }

    
    function setDb($db) {
        $this->db = $db;
    }

//===========================================================================================
    
    function insertDenuncia(){
        $query = "insert into denuncia(idEndereco, idDenunciante, descricao, tipoViolencia)"
                . "values(:idEndereco, :idDenunciante, :descricao, :tipoViolencia)";
        $insert= $this->db->prepare($query);
        $insert->bindValue(":idEndereco", $this->getIdEndereco());
        $insert->bindValue(":idDenunciante", $this->getIdDenunciante());
        $insert->bindValue(":descricao", $this->getDescricao());
        $insert->bindValue(":tipoViolencia", $this->getTipoViolencia());
        $insert->execute();
    }
    
    
    function ultimoId(){
        try{
            $sqlId="SHOW TABLE STATUS LIKE 'denucia'";
            $selectId = $this->db->prepare($sqlId);
            $selectId->execute();
            $resultado=$selectId->fetch();
            $id=$resultado['Auto_increment']-1;
            return $id;
            }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }
}
