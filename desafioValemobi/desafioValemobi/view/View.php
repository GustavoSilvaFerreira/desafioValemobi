<?php

class View{
    public function renderizar($pagina, $dado){
        require_once $pagina . ".php";
    }
}

?>