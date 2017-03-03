<DOCTYPE html5>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Valemobi - Lista de mercadorias</title>
  
  <style><?php include "css/estilo.css"; ?></style>
  
  <style><?php include "css/bootstrap.min.css"; ?></style>
  <style><?php include "css/bootstrap-responsive.min.css"; ?></style>
  <style><?php include "css/style.css"; ?></style>
  
</head>
<body class="container">
	<nav class="row navbar navbar-inverse">
		<div class="row-fluid">
			<div class="col-xs-12 font-white">
				<h1>Lista de mercadorias</h1>
			</div>
		</div>
	</nav>
	
	<div id="painelConteudo">
	</div>
		
	<input type="hidden" name="url" id="url" value="<?php echo $dado["baseUrl"] ?>"/>
	<div class="margin-bottom-voltar">
		<a class="btn btn-default" href="<?php echo $dado["baseUrl"] ?>index" title="Voltar para Mercadoria" role="button">
			Voltar
		</a>
	</div>
	<footer class="footer container navbar-fixed-bottom">
		<div class="container text-center">
    	<p class="text-muted">Desenvolvido por <a href="http://www.gustavosilvaferreira.com.br/"> Gustavo Ferreira</a></p>  
    </div>
	</footer>
	
	<!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
	<script src="<?php echo $dado["baseUrl"] ?>view/js/jquery-3.1.1.min.js"></script>
	
	<script src="<?php echo $dado["baseUrl"] ?>view/js/bootstrap.min.js"></script>
	
	<script src="<?php echo $dado["baseUrl"] ?>view/js/listaMercadoria.js"></script>
			
</body>
</html>