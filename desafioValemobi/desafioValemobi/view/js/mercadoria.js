$(document).ready(function(){ 
    listarTipoMercadoria();
    listarTipoNegocio();
});

$('#btn-confirmar').click(function(){
    var nome = $("#nomeMercadoria").val();
    var quantidade = $("#qtdMercadoria").val();
    var valor = parseFloat($("#valorMercadoria").val().replace('.','').replace(',','.'));
    var tpMercadoria = $("#TipoMercadoria").val();
    var tpNegocio = $("#TipoNegocio").val();
    var baseUrl = $("#url").val();
    
    if(nome == "" || quantidade == "" || valor == "" || tpMercadoria == 0 || tpNegocio == 0){
        $("#response").html("Existem campos vazios!");
        $("#response").removeClass('success');
        $("#response").addClass('err');
    }else{
        $.ajax({
            type: 'GET',
            dataType: "json",
            cache: false,
            contentType:"application/json",    
            url: baseUrl + 'getMercadorias',
            success: function (e) {
    	    	var ver = false;
    	    	if(e!=null){
                    for(var i = 0; i<e.length; i++){
                        if(e[i].nome.trim().toLowerCase() == nome.trim().toLowerCase()){
                            $("#response").html("Já existe uma mercadoria com este nome!");
                            $("#response").removeClass('success');
                            $("#response").addClass('err');
                            ver = true;
                        }
                    }
                }
                var model = {   
                    "nome": nome, 
                    "quantidade": quantidade, 
                    "valor": valor,
                    "tpMercadoria": tpMercadoria,
                    "tpNegocio": tpNegocio,
                    "baseUrl": baseUrl
                    };
                cadastraMercadoria(ver, model);
            }
        });
    }
});

function cadastraMercadoria(ver, model){
    
    if(ver == false){
        $.ajax({
            type: 'POST',
            dataType: "json",
            cache: false,
            contentType:"application/json",    
            url: model.baseUrl + 'cadastrarMercadoria',
            data: JSON.stringify(model),
        }); 
		$("#response").html("Cadastrado com sucesso");
        $("#response").removeClass('err');
        $("#response").addClass('success');
        $("#nomeMercadoria").val("");
        $("#qtdMercadoria").val("");
        $("#valorMercadoria").val("");
        $("#TipoMercadoria").val("0");
        $("#TipoNegocio").val("0");
    }
}

function listarTipoMercadoria(){
    var itens = '<option value="0">Selecione um tipo de mercadoria</option>';
    var baseUrl = $("#url").val();
    $.ajax({
        type: 'GET',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: baseUrl + 'getTipoMercadoria',
    }).done(function(e){
        if(e!=null){
            for(var i = 0; i<e.length; i++){
                itens+='<option value="'+e[i].id+'">'+e[i].nome+'</option>';
            }
            $("#TipoMercadoria").html(itens);
        }
    });
}

function listarTipoNegocio(){
    var itens = '<option value="0">Selecione um tipo de Negócio</option>';
    var baseUrl = $("#url").val();
    $.ajax({
        type: 'GET',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: baseUrl + 'getTipoNegocio',
    }).done(function(e){
        if(e!=null){
            for(var i = 0; i<e.length; i++){
                itens+='<option value="'+e[i].id+'">'+e[i].nome+'</option>';
            }
            $("#TipoNegocio").html(itens);
        }
    });
}
	
function moeda(val){
    var v = val.value;	
    v = v.replace(/\D/g,"") //permite digitar apenas números	
    v = v.replace(/[0-9]{12}/,"inválido") //limita pra máximo 999.999.999,99	
    v = v.replace(/(\d{1})(\d{8})$/,"$1.$2") //coloca ponto antes dos últimos 8 digitos	
    v = v.replace(/(\d{1})(\d{5})$/,"$1.$2") //coloca ponto antes dos últimos 5 digitos	
    v = v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") //coloca virgula antes dos últimos 2 digitos		
    val.value = v;	
}

function checaNumero(val){
    var regra = /^[0-9]+$/;
    var valor = val.value;
    if (! valor.match(regra) || valor == 0){
        $("#response").html("A quantidade deve ser um número inteiro positivo!");
        $("#response").removeClass('success');
        $("#response").addClass('err');
        $("#qtdMercadoria").val("");
    }else{
        $("#response").removeClass('err');
        $("#response").html("");
    }
}