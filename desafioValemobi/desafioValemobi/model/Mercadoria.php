<?php

class Mercadoria{
    
    private $id, $nome, $idTipoMercadoria, $qtMercadoria, $vlMercadoria, $idTipoNegocio;
    
    public function __construct($id=0, $nome, $idTipoMercadoria, $qtMercadoria, $vlMercadoria, $idTipoNegocio){
        
        $this->id = $id;
        $this->nome = $nome;
        $this->idTipoMercadoria = $idTipoMercadoria;
        $this->qtMercadoria = $qtMercadoria;
        $this->vlMercadoria = $vlMercadoria;
        $this->idTipoNegocio = $idTipoNegocio;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getIdTipoMercadoria(){
        return $this->idTipoMercadoria;
    }
    
    public function getQtMercadoria(){
        return $this->qtMercadoria;
    }
    
    public function getVlMercadoria(){
        return $this->vlMercadoria;
    }
    
    public function getIdTipoNegocio(){
        return $this->idTipoNegocio;
    }
    
}