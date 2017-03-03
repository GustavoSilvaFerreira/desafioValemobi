<?php

class MercadoriaDAO{
    
    private $conexao;
    
    public function __construct(){
        require_once "Connect.php";
        $this->conexao = new Connect();
    }
    
    public function insert(Mercadoria $m){
        $mysqli = $this->conexao->getConexao();
        $stmt = $mysqli->prepare("INSERT INTO Mercadoria(nm_Mercadoria, cd_TipoMercadoria, qt_Mercadoria, vl_Mercadoria, cd_TipoNegocio) VALUES (?,?,?,?,?)");
        $stmt->bind_param("siidi", $m->getNome(), $m->getIdTipoMercadoria(), $m->getQtMercadoria(), $m->getVlMercadoria(), $m->getIdTipoNegocio());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $retornoId = mysqli_insert_id($mysqli);
        $stmt->close();
        if($retornoId){
            return true;
        }
    }
    
    public function getAllMercadoria(){
        $mysqli = $this->conexao->getConexao();
        $stmt = $mysqli->query("SELECT * FROM Mercadoria");
        $m = [];
        for ($count=0; $row = $stmt->fetch_assoc(); $count++){
            //$dados[$count] = $row;
            $m[$count] = new Mercadoria($row['cd_Mercadoria'], $row['nm_Mercadoria'], $row['cd_TipoMercadoria'], $row['qt_Mercadoria'], $row['vl_Mercadoria'], $row['cd_TipoNegocio']);
        }
        return $m;
        
    }
    
}

?>