$(document).ready(function(){ 
     listarMercadoria();
});

function listarMercadoria(){
    var itens = "<table class='table table-striped'>"+
                "<thead><tr><th>Código</th><th>Nome</th><th>Quantidade</th><th>Valor</th><th>Tipo Mercadoria</th><th>Tipo Negócio</th></tr></thead>"+
                "<tbody>";
    var res = "";
    var baseUrl = $("#url").val();
    $.ajax({
        type: 'GET',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: baseUrl + 'getMercadorias',
    }).done(function(e){
        if(e!=null){
            for(var i = 0; i<e.length; i++){
                var larg = $(window).width();
                if(larg < 768){
                    res += "<div class='panel panel-success'>"+
                        "<div class='panel-heading' style='cursor:pointer'>"+e[i].nome+"</div>"+
                        "<div class='panel-body'>"+
                        "<p>Código: "+e[i].id + "</p>"+
                        "<p>Quantidade: "+e[i].qtMercadoria + "</p>"+
                        "<p>Valor: "+e[i].valor + "</p>"+
                        "<p id='tpMercadoria"+i+"'>"+tipoMercadoria(e[i].tpMercadoria, i, baseUrl, "Tipo Mercadoria: ") + "</p>"+
                        "<p id='tpNegocio"+i+"'>"+tipoNegocio(e[i].tpNegocio, i, baseUrl, "Tipo Negócio: ") + "</p>"+
                        "</div></div>";
                }else{
                    itens+="<tr><td>"+
                        e[i].id+"</td><td>"+
                        e[i].nome+"</td><td>"+
                        e[i].qtMercadoria+"</td><td>"+
                        e[i].valor+"</td><td id='tpMercadoria"+i+"'>"+
                        tipoMercadoria(e[i].tpMercadoria, i, baseUrl)+"</td><td id='tpNegocio"+i+"'>"+
                        tipoNegocio(e[i].tpNegocio, i, baseUrl)+"</td></tr>";
                }
            }
            itens+="</tbody></table>";
            larg < 768 ? $("#painelConteudo").html(res) : $("#painelConteudo").html(itens);
        }
    });
}

function tipoMercadoria(id, posicao, baseUrl, titulo=""){
    $.ajax({
        type: 'GET',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: baseUrl + 'getTipoMercadoria',
        success: function (e) {
        	if(e!=null){
                for(var i = 0; i<e.length; i++){
                    if(e[i].id == id){
                        var nome = titulo + e[i].nome;
                        $("#tpMercadoria"+posicao).html(nome);
                    }
                }
            }
        }
    });
}

function tipoNegocio(id, posicao, baseUrl, titulo=""){
    $.ajax({
        type: 'GET',
        dataType: "json",
        cache: false,
        contentType:"application/json",    
        url: baseUrl + 'getTipoNegocio',
        success: function (e) {
        	if(e!=null){
                for(var i = 0; i<e.length; i++){
                    if(e[i].id == id){
                        var nome = titulo + e[i].nome;
                        $("#tpNegocio"+posicao).html(nome);
                    }
                }
            }
        }
    });
}