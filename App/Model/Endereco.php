<?php
namespace App\Model;
class Endereco{
    protected $nome, $lat, $lng, $bairro, $provincia, $distrito, $idProvincia, $idDristrito, $idBairro, $idQuarteirao, $db;
    
    public function __construct(\PDO $db) {
        $this->db= $db;
    }
    //==============================================================================================================
    function getNome() {
        return $this->nome;
    }

    function getLat() {
        return $this->lat;
    }

    function getLng() {
        return $this->lng;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getIdProvincia() {
        return $this->idProvincia;
    }

    function getIdDristrito() {
        return $this->idDristrito;
    }

    function getIdBairro() {
        return $this->idBairro;
    }

    function getIdQuarteirao() {
        return $this->idQuarteirao;
    }

    function getDb() {
        return $this->db;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setIdProvincia($idProvincia) {
        $this->idProvincia = $idProvincia;
    }

    function setIdDristrito($idDristrito) {
        $this->idDristrito = $idDristrito;
    }

    function setIdBairro($idBairro) {
        $this->idBairro = $idBairro;
    }

    function setIdQuarteirao($idQuarteirao) {
        $this->idQuarteirao = $idQuarteirao;
    }

    function setDb($db) {
        $this->db = $db;
    }

    
        
    //===============================================================================================================
    function insertProvincia(){

    }
    function insertDistrito(){

    }
    function insertBairro(){

    }
    function insertQuarteirao(){

    }
    function insertEndereco(){
        $query = "Insert into endereco(idProvincia, idDistrito, idBairro) "
                . "values(:idProvincia, :idDistrito, :idBairro)";
        $insert= $this->db->prepare($query);
        $insert->bindValue(":idProvincia", $this->getIdProvincia() );
        $insert->bindValue(":idDistrito", $this->getDistrito());
        $insert->bindValue(":idBairro", $this->getIdBairro());
        $insert->execute();
    }
    
            
    function listDistrito(){
        $query = "SELECT id, nome FROM distrito";
        $list = $this->db->prepare($query);
        $list->execute();
        $select=$list->fetchAll(\PDO::FETCH_ASSOC);
      return $select;
    }
    function listBairro($id){
        $query = "SELECT id, nome FROM bairro WHERE idDistrito = :idDistrito";
        $list = $this->db->prepare($query);
        $list->bindValue(":idDistrito", $id);
        $list->execute();
        $select=$list->fetchAll(\PDO::FETCH_ASSOC);
      return $select;
    }
    
    /*
    function listBairroVenda($bairro, $tipo){
        $query = "SELECT * FROM servico WHERE bairro = :bairro AND tipo = :tipo ORDER BY data DESC";
        $listS = $this->db->prepare($query);
        $listS->bindValue(":bairro", $bairro);
        $listS->bindValue(":tipo", $tipo);
        $listS->execute();
        $servico=$listS->fetchAll(\PDO::FETCH_ASSOC);
      return $servico;
    }
    function listBairroAluguer($bairro, $tipo){
        $query = "SELECT * FROM servico WHERE bairro = :bairro AND tipo = :tipo ORDER BY data DESC";
        $listS = $this->db->prepare($query);
        $listS->bindValue(":bairro", $bairro);
        $listS->bindValue(":tipo", $tipo);
        $listS->execute();
        $servico=$listS->fetchAll(\PDO::FETCH_ASSOC);
      return $servico;
    }
    //================================================================Slide================================================
    function listSlides($servico){
        $query = "SELECT foto.foto, foto.descricao FROM foto WHERE idServico=:idServico AND foto.foto!=''";
        $listS = $this->db->prepare($query);
        $listS->bindValue("idServico", $servico);
        $listS->execute();
        $foto=$listS->fetchAll(\PDO::FETCH_ASSOC);
      return $foto;
    }
    //====================================================================================================================
    function listServicosId($id){
        $query = "Select * from servico where id=:id";
        $listS = $this->db->prepare($query);
        $listS->bindValue(":id", $id);
        $listS->execute();
        $servico=$listS->fetchAll(\PDO::FETCH_ASSOC);
      return $servico;
    }
    
    function update($id){
        $query = "UPDATE servico SET nome=:nome, tipo=:tipo, descricao=:descricao, provincia=:provincia, bairro=:bairro, foto=:foto Where id=:id";
        $update = $this->db->prepare($query);
        $update->bindValue(":nome", $this->getNome());
        $update->bindValue(":tipo", $this->getTipo());
        $update->bindValue(":descricao", $this->getDescricao());
        $update->bindValue(":provincia", $this->getProvincia());
        $update->bindValue(":bairro", $this->getBairro());
        $update->bindValue(":foto", $this->getFoto());
        $update->bindValue(":id", $id);
        $update->execute();
    }
    
    function delete($id){
    $query ="DELETE FROM servico WHERE id = :id";
    $del= $this->db->prepare($query);
    $del->bindValue(":id", $id);
    $del->execute();
    }
    
    //===========================================Insert Requisicao================================================
    function insertRequisicao($idServico, $nome, $email, $telefone){
        $query = "Insert into requisicao(idServico, nome, email, telefone) values(:idServico, :nome, :email, :telefone)";
        $inserirRequisicao=$this->db->prepare($query);
        $inserirRequisicao->bindValue(":idServico", $idServico);
        $inserirRequisicao->bindValue(":nome", $nome);
        $inserirRequisicao->bindValue(":email", $email);
        $inserirRequisicao->bindValue(":telefone", $telefone);
        $inserirRequisicao->execute();
        
    }
    
    function listRequisicao(){
        $query = "SELECT requisicao.id, requisicao.idServico, servico.foto, requisicao.nome, servico.descricao, requisicao.telefone, requisicao.email FROM requisicao INNER JOIN servico ON requisicao.idServico=servico.id";
        $list = $this->db->prepare($query);
        $list->execute();
        $listR=$list->fetchAll(\PDO::FETCH_ASSOC);
        return $listR;
    }*/
    
    
    function ultimoId(){
        try{
            $sql="SHOW TABLE STATUS LIKE 'endereco'";
            $select = $this->db->prepare($sql);
            $select->execute();
            $resultado=$select->fetch(\PDO::FETCH_ASSOC);
            $id=$resultado['Auto_increment']-1;
            return $id;
            }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }
}
