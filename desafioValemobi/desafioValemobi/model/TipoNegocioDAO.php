<?php

class TipoNegocioDAO{
    
    private $conexao;
    
    public function __construct(){
        require_once "Connect.php";
        $this->conexao = new Connect();
    }
    
    public function insert(TipoNegocio $tn){
        $mysqli = $this->conexao->getConexao();
        $stmt = $mysqli->prepare("INSERT INTO TipoNegocio(nm_TipoNegocio) VALUES (?)");
        $stmt->bind_param("s",$tn->getNome());
        if (!$stmt->execute()) {
            echo "Erro: (" . $stmt->errno . ") " . $stmt->error . "<br>";
        }
        $retornoId = mysqli_insert_id($mysqli);
        $stmt->close();
        if($retornoId){
            return true;
        }
    }
    
    public function getAllTipoNegocio(){
        $mysqli = $this->conexao->getConexao();
        $stmt = $mysqli->query("SELECT * FROM TipoNegocio");
        $tn = [];
        for ($count=0; $row = $stmt->fetch_assoc(); $count++){
            //$dados[$count] = $row;
            $tn[$count] = new TipoNegocio($row['cd_TipoNegocio'],$row['nm_TipoNegocio']);
        }
        return $tn;
        
    }
    
}

?>