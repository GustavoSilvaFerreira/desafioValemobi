<?php

abstract class Controller{
    
    protected $view;
    protected $baseUrl;
    
    public function __construct(){
        $this->view = new View();
        $this->baseUrl = new BaseUrl();
    }
    
    public function __call($m,$a){
        $dado["baseUrl"] = $this->baseUrl->getBaseUrl();
        $this->view->renderizar("erro", $dado);
    }
}
?>