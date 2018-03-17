<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;


class Denunciante {
    protected $nome, $sexo, $tipoDenunciante, $telefone, $db;
    
    public function __construct(\PDO $db) {
        $this->db= $db;
    }
    
    function getNome() {
        return $this->nome;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getTipoDenunciante() {
        return $this->tipoDenunciante;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getDb() {
        return $this->db;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setTipoDenunciante($tipoDenunciante) {
        $this->tipoDenunciante = $tipoDenunciante;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setDb($db) {
        $this->db = $db;
    }

    //===============================================================================================================
    function insertDenunciante(){
        $query = "Insert into denunciante(nome, sexo, tipoDenunciante, telefone) "
                . "values(:nome, :sexo, :tipoDenunciante, :telefone)";
        $insert= $this->db->prepare($query);
        $insert->bindValue(":nome", $this->getNome());
        $insert->bindValue(":sexo", $this->getSexo());
        $insert->bindValue(":tipoDenunciante", $this->getTipoDenunciante());
        $insert->bindValue(":telefone", $this->getTelefone());
        $insert->execute();
    }
    
    
    
    function ultimoId(){
        try{
            $sqlId="SHOW TABLE STATUS LIKE 'denunciante'";
            $selectId = $this->db->prepare($sqlId);
            $selectId->execute();
            $resultado=$selectId->fetch(\PDO::FETCH_ASSOC);
            $id=$resultado['Auto_increment']-1;
            return $id;
            }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }
}
