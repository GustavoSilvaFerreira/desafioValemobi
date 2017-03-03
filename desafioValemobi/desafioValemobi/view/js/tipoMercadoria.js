
$('#btn-confirmar').click(function(){
    var nome = $("#tipoMercadoria").val();
    var baseUrl = $("#url").val();
    if(nome ==""){
        $("#response").html("O campo está vazio!");
        $("#response").removeClass('success');
        $("#response").addClass('err');
    }else{
        $.ajax({
            type: 'GET',
            dataType: "json",
            cache: false,
            contentType:"application/json",    
            url: baseUrl + 'getTipoMercadoria',
            success: function (e) {
    	    	var ver = false;
    	    	if(e!=null){
                    for(var i = 0; i<e.length; i++){
                        if(e[i].nome.trim().toLowerCase() == nome.trim().toLowerCase()){
                            $("#response").html("Já existe esse tipo de Mercadoria!");
                            $("#response").removeClass('success');
                            $("#response").addClass('err');
                            ver = true;
                        }
                    }
                }
                var model = {
                    "nome": nome,
                    "baseUrl": baseUrl
                    };
                cadastraTipoMercadoria(ver, model);
            }
        });
    }
});

function cadastraTipoMercadoria(ver, model){
    
    if(ver == false){
        $.ajax({
            type: 'POST',
            dataType: "json",
            cache: false,
            contentType:"application/json",    
            url: model.baseUrl + 'cadastrarTipoMercadoria',
            data: JSON.stringify(model),
        });  
		$("#response").html("Cadastrado com sucesso");
        $("#response").removeClass('err');
        $("#response").addClass('success');
        $("#tipoMercadoria").val("");
    }
}