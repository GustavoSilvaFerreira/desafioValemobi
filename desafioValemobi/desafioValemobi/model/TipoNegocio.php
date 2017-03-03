<?php

class TipoNegocio{
    
    private $id, $nome;
    
    public function __construct($id=0, $nome){
        
        $this->id = $id;
        $this->nome = $nome;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
}