//Quando o Documento HTML estiver carregado
/*jQuery(document).ready(function(){
 //Ao clicar em um elemento do tipo button
 jQuery("button").click(function(){
 //Requisição Ajax
 jQuery.ajax({
 url: "http://www.hackathongse.tecnologia.ws/teste.php", //URL de destino
 dataType: "json", //Tipo de Retorno
 success: function(json){ //Se ocorrer tudo certo
 var msg = "Nome: " + json.salas.nome + "\n";
 msg += "Senha: " + json.salas.senha + "\n";
 msg += "SenhaAdm: " + json.salas.senhaAdm;
 alert(msg);
 }
 });
 });
 });*/

//popular salas
/*
 $(document).ready(function () {
 $.ajax({
 type: "POST",
 url: "http://www.hackathongse.tecnologia.ws/BuscarSalas.php",
 //data: {montadora: $("#montadora").val()},
 dataType: "json",
 success: function (json) {
 var options = "";
 
 for (i = 0; i < json.total_salas; i++) {
 options += '<option value="' + json.salas[i].nome + '">' + json.salas[i].nome + '</option>';
 }
 $("#salas").html(options);
 }
 });
 });
 */

/*
 //preencher nome da sala
 $(document).ready(function () {
 $("#btn").click(function () {
 $.ajax({
 type: "POST",
 url: "http://www.hackathongse.tecnologia.ws/nomeSala.php",
 //data: ,
 dataType: "json",
 success: function (json) {
 var options = "";
 options += 'sala: ' + json.salas[0].nome;
 $("#sala").html(options);
 }
 });
 });
 });
 
 */

//----------------------------------------------------------------------------------------------------
//salvar resposta

$(document).ready(function () {
    $("#botaosalvarresposta").click(function () {
        var r = $("#respostatxt").val();
        if (r == "") {
            alert("Selecione uma resposta!");
        } else {
            $.ajax({
                method: "POST",
                url: "http://www.hackathongse.tecnologia.ws/salvarResposta.php",
                data: {resposta: r}
            })
                    .done(function (msg) {
                        alert("Resposta salva com sucesso!");
                    });
        }
    });
});


//----------------------------------------------------------------------------------------------------
//buscar dados perguntas
$(document).ready(function () {
    $("#corpo").ready(function () {
        $.ajax({
            type: "POST",
            url: "http://www.hackathongse.tecnologia.ws/buscarPergunta.php",
            data: {salanome: getCookie("sala")},
            dataType: "json",
        })
                .done(function (json) {
                    if (json.totalpergunta) {
                        $("#perguntatxt").text(json.perguntas[0].titulo);
                    }
                    var options = "";
                    for (i = 0; i < json.totalresposta; i++) {
                        options += '<option value="' + json.respostas[i].idresposta + '" >' + json.respostas[i].nome + '</option>';
                    }
                    $("#respostatxt").html(options);
                });
    });
});


//----------------------------------------------------------------------------------------------------
//direcinar para tela de perguntas
$(document).ready(function () {
    $("#corpo").ready(function () {
        $("#titulopergunta").text(getCookie("sala"))
    });
});

//----------------------------------------------------------------------------------------------------
//direcinar pagina sala
$(document).ready(function () {
    $("#botaoentrarsala").click(function () {
        var idsala = $("#selecionasala").val();
        var lista = idsala.split("|");
        setCookie("sala", lista[1], 1);
    });
});


//----------------------------------------------------------------------------------------------------
//função universal para criar cookie
function setCookie(name, value, exdays) {
    var expires;
    var date;
    date = new Date(); //  criando o COOKIE com a data atual
    date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));
    expires = date.toUTCString();
    //value = "TESTE123";
    document.cookie = name + "=" + value + "; expires=" + expires + "; path=/";
}

function getCookie(name)
{
    var c_name = document.cookie; // listando o nome de todos os cookies
    var lista = c_name.split("=");
    return  lista[1];
}

//----------------------------------------------------------------------------------------------------
//buscar dados salas
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "http://www.hackathongse.tecnologia.ws/buscarSalas.php",
        dataType: "json",
    })
            .done(function (json) {
                var options = "";
                for (i = 0; i < json.total; i++) {
                    options += '<option value="' + json.salas[i].id + "|" + json.salas[i].nome + '" >' + json.salas[i].nome + '</option>';
                }
                $("#selecionasala").html(options);
            });
});
//----------------------------------------------------------------------------------------------------
//buscar dados oficinas
$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "http://www.hackathongse.tecnologia.ws/buscarOficina.php",
        dataType: "json",
    })
            .done(function (json) {
                var options = "";
                for (i = 0; i < json.total; i++) {
                    options += '<option value="' + json.oficinas[i].id_oficina + '">' + json.oficinas[i].datahorario + " - " + json.oficinas[i].nome + '</option>';
                }
                $("#selecionaoficina").html(options);
            });
});

//----------------------------------------------------------------------------------------------------
//retorna cookie cpf
/*$(document).ready(function () {
 $("#pageincricao").ready(function () {
 // $("#cpf").text(getCookie("cpf"));
 $("#cpf").val(getCookie("cpf"));
 });
 });
 */

//----------------------------------------------------------------------------------------------------
//
//
//
//salvar oficina
$(document).ready(function () {
    $("#botaosalvarinscricao").click(function () {
        var c = $("#cpf").val();
        var ido = $("#selecionaoficina").val();
        if (c == "" || ido == "") {
            alert("Informe o Cpf e selecione a oficina!");
        } else {
            $.ajax({
                method: "POST",
                url: "http://www.hackathongse.tecnologia.ws/salvarOficina.php",
                data: {cpf: c, idoficina: ido},
                dataType: "json",
            })
                    .done(function (json) {
                        if (json.msg == "Pessoa não encontrada!") {
                            alert("Cpf não cadastrado!");
                        } else {
                            alert("Inscrição realizada com sucesso!");
                        }

                    });
        }

    });
});
//----------------------------------------------------------------------------------------------------
//salvar dados cadastro
$(document).ready(function () {
    $("#botaosalvarcadastro").click(function () {
        var n = $("#nome").val();
        var c = $("#cpf").val();
        var t = $("#telefone").val();


        if (n == "" || c == "" || t == "") {
            alert("Preencher todos os campos!");
        } else {
            setCookie("cpf", c, 1);
            $.ajax({
                method: "POST",
                url: "http://www.hackathongse.tecnologia.ws/salvarInscricao.php",
                data: {nome: n, cpf: c, telefone: t}
            })
                    .done(function (msg) {
                        alert("Cadastro realizada com sucesso!");
                    });
        }
    });
});
//----------------------------------------------------------------------------------------------------