<DOCTYPE html5>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Valemobi - Cadastro de Mercadorias</title>
  
  <style><?php include "css/estilo.css"; ?></style>
  
  <style><?php include "css/bootstrap.min.css"; ?></style>
  <style><?php include "css/bootstrap-responsive.min.css"; ?></style>
  <style><?php include "css/style.css"; ?></style>
  
</head>
<body class="container">
	<div class="container">
		<nav class="row navbar navbar-inverse">
			<div class="row-fluid">
				<div class="col-xs-12 font-white">
					<h1>Cadastro de Mercadorias</h1>	
				</div>
			</div>
		</nav>
		
		<div>
			<p id="response"></p>
			
			<div class="form-group form-group-sm">
  				<label for="nomeMercadoria">Nome: </label>
				<input type="text" class="form-control" name="nome" id="nomeMercadoria" maxlength="50" placeholder="Digite o nome da mercadoria"/>
  			</div>
  			
  			<div class="form-group form-group-sm">
				<label for="qtdMercadoria">Quantidade: </label>
				<input type="number" class="form-control" name="quantidade" id="qtdMercadoria" placeholder="Digite a quantidade de mercadorias" onblur="checaNumero(this)"/>
  			</div>
			
			<div class="form-group form-group-sm">
				<label for="valorMercadoria">Valor da Mercadoria: </label>
				<input type="text" class="form-control" name="valor" id="valorMercadoria" min="0" placeholder="Digite apenas números" onKeyUp="moeda(this);"/>
  			</div>
  			
  			<div class="form-group ">
				<label for="TipoMercadoria">Tipo de Mercadoria:</label><br>
				<select name="TipoMercadoria" id="TipoMercadoria" style="width:100%" class="input-sm"></select>
  			</div>
  			
  			<div class="form-group">
				<label for="TipoNegocio">Tipo de Negócio:</label><br>
				<select name="TipoNegocio" id="TipoNegocio" style="width:100%" class="input-sm"></select>
  			</div>
			
			<input type="hidden" name="url" id="url" value="<?php echo $dado["baseUrl"] ?>"/>
		</div>
		
		<button class="btn btn-primary margin-bottom" id="btn-confirmar">
			Cadastrar
		</button>
		
		<a class="btn btn-success margin-bottom" href="<?php echo $dado["baseUrl"] ?>listarMercadorias" title="Listar Mercadorias" role="button">
			Listar Mercadorias
		</a>
		
		<a class="btn btn-default margin-bottom" href="<?php echo $dado["baseUrl"] ?>formTipoMercadoria" title="Adicionar novo tipo de mercadoria" role="button">
			Cadastrar novo tipo de mercadoria
		</a>
		
		<a class="btn btn-default margin-bottom" href="<?php echo $dado["baseUrl"] ?>formTipoNegocio" title="Adicionar nova Negócio" role="button">
			Cadastrar novo tipo de negócio
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
	
	<script src="<?php echo $dado["baseUrl"] ?>view/js/mercadoria.js"></script>

</body>
</html>