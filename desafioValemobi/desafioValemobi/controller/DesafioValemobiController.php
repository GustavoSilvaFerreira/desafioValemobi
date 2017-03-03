<?php

class DesafioValemobiController extends Controller{
    
    public function index(){
        $dado["baseUrl"] = $this->baseUrl->getBaseUrl();
        $this->view->renderizar("mercadorias", $dado);
    }
    
    public function formTipoMercadoria(){
        $dado["baseUrl"] = $this->baseUrl->getBaseUrl();
        $this->view->renderizar("tipoMercadoria", $dado);
    }
    
    public function formTipoNegocio(){
        $dado["baseUrl"] = $this->baseUrl->getBaseUrl();
        $this->view->renderizar("tipoNegocio", $dado);
    }
    
    public function listarMercadorias(){
        $dado["baseUrl"] = $this->baseUrl->getBaseUrl();
        $this->view->renderizar("listaMercadorias", $dado);
    }
    
    public function erro(){
        $dado["baseUrl"] = $this->baseUrl->getBaseUrl();
        $this->view->renderizar("erro", $dado);
    }
    
    public function cadastrarTipoMercadoria(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/TipoMercadoria.php";
            require_once "model/TipoMercadoriaDAO.php";
            $tm = new TipoMercadoria(0,$array["nome"]);
            $tmd = new TipoMercadoriaDAO();
            $tpMerc = $tmd->insert($tm);
            echo json_encode(array("response"=>$tpMerc));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function cadastrarTipoNegocio(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/TipoNegocio.php";
            require_once "model/TipoNegocioDAO.php";
            $tn = new TipoNegocio(0,$array["nome"]);
            $tnd = new TipoNegocioDAO();
            $tpNegoc = $tnd->insert($tn);
            echo json_encode(array("response"=>$tpNegoc));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function cadastrarMercadoria(){
        if($_SERVER["CONTENT_TYPE"] === "application/json"){
            $json = file_get_contents('php://input');
            $array = json_decode($json,true);
            require_once "model/Mercadoria.php";
            require_once "model/MercadoriaDAO.php";
            $m = new Mercadoria(0, $array["nome"], $array["tpMercadoria"], $array["quantidade"], $array["valor"], $array["tpNegocio"]);
            $md = new MercadoriaDAO();
            $Mercadoria = $md->insert($m);
            echo json_encode(array("response"=>$Mercadoria));
            http_response_code(200);
        }else{
            echo json_encode(array("response"=>"Dados inválidos"));
            http_response_code(500);   
        }
    }
    
    public function getTipoMercadoria(){
        header('content-type: application/json');
        require_once "model/TipoMercadoria.php";
        require_once "model/TipoMercadoriaDAO.php";
        $tmd = new TipoMercadoriaDAO();
        $tpMerc = $tmd->getAllTipoMercadoria();
        foreach($tpMerc as $x){
            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome());
        }
        echo json_encode($tudo);
        http_response_code(200);
    }
    
    public function getTipoNegocio(){
        header('content-type: application/json');
        require_once "model/TipoNegocio.php";
        require_once "model/TipoNegocioDAO.php";
        $tnd = new TipoNegocioDAO();
        $tpNegoc = $tnd->getAllTipoNegocio();
        foreach($tpNegoc as $x){
            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome());
        }
        echo json_encode($tudo);
        http_response_code(200);
    }
    
    public function getMercadorias(){
        header('content-type: application/json');
        require_once "model/Mercadoria.php";
        require_once "model/MercadoriaDAO.php";
        $md = new MercadoriaDAO();
        $Mercadoria = $md->getAllMercadoria();
        foreach($Mercadoria as $x){
            $tudo[] = array("id"=>$x->getId(), "nome"=>$x->getNome(), "tpMercadoria"=>$x->getIdTipoMercadoria(), "qtMercadoria"=>$x->getQtMercadoria(), "valor"=>$x->getVlMercadoria(), "tpNegocio"=>$x->getIdTipoNegocio());
        }
        echo json_encode($tudo);
        http_response_code(200);
    }

}

?>