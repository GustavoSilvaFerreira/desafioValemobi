<?php

class TipoMercadoriaDAO{
    
    private $conexao;
    
    public function __construct(){
        require_once "Connect.php";
        $this->conexao = new Connect();
    }
    
    public function insert(TipoMercadoria $tm){
        $mysqli = $this->conexao->getConexao();
        $stmt = $mysqli->prepare("INSERT INTO TipoMercadoria(nm_TipoMercadoria) VALUES (?)");
        $stmt->bind_param("s",$tm->getNome());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $retornoId = mysqli_insert_id($mysqli);
        $stmt->close();
        if($retornoId){
            return true;
        }
    }
    
    public function getAllTipoMercadoria(){
        $mysqli = $this->conexao->getConexao();
        $stmt = $mysqli->query("SELECT * FROM TipoMercadoria");
        $tm = [];
        for ($count=0; $row = $stmt->fetch_assoc(); $count++){
            //$dados[$count] = $row;
            $tm[$count] = new TipoMercadoria($row['cd_TipoMercadoria'],$row['nm_TipoMercadoria']);
        }
        return $tm;
        
    }
    
}

?>