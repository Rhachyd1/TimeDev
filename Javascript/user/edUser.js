function buscaUsuario(){
    let caminho = '../JSON/jsonTodosUsuarios.php';


    let usuario={
        nome: $("#txtNome").val(),
        sobrenome: $("#txtSobr").val(),
        matricula: $("#txtMat").val(),
        cpf: $("#txtTRes").val(),
        teleCel: $("#txtTCel").val()
    };
        
    let dados = JSON.stringify(usuario);
    $.ajax({
        url:caminho,
        data:{d: dados},
        type: "POST"

    }).done(function(resposta){
        if(resposta===null){
            alert('Usuario não encontrado');
        }else{
        montaForm(resposta)
        }
        console.log(resposta);
       
    }).fail(function(resposta){
        alert("Usuario não Encontrado");
        console.log(resposta);
    });

}

function montaForm(resposta){      
      $("#tNome").val(resposta[0].nome);      
      $("#tSobrenome").val(resposta[0].sobrenome);
      $("#tTelCel").val(resposta[0].telefone);
      $("#tCpf").val(resposta[0].cpf);
      $("#tMat").val(resposta[0].matricula);
      $("#vlCargo").val(resposta[0].cargo);
      $("#tRua").val(resposta[0].rua);
      $("#tBairro").val(resposta[0].bairro); 
      $("#tTelRes").val(resposta[0].telefoneres)
      $("#tCep").val(resposta[0].cep)
      $("#vlEstado").val(resposta[0].estado)
      $("#tMun").val(resposta[0].municipio)
      $("#tId").val(resposta[0].id);
      //   resposta[0].idend;       
}




function AtualizaUsuario(){

    let caminho = '../Controller/ctrlAtualizaUsuario.php';
    let usuario={
        nome: $("#tNome").val(),
        sobrenome: $("#tSobrenome").val(),
        cargo: $("#vlCargo").val(),
        cpf: $("#tTelRes").val(),
        teleCel: $("#tTelCel").val(),
        matricula: $("#tMat").val(),
        id: $("#tId").val(),
    };
    let end={
        rua: $("#tRua").val(),
        bairro: $("#tBairro").val(),
        estado: $("#vlEstado").val(),
        teRes: $("#tTelRes").val(),
        mun: $("#tMun").val(),
        cep: $("#tCep").val()
    };
    let dados = JSON.stringify(usuario);
    let endereco = JSON.stringify(end);
    $.ajax({
        url:caminho,
        data:{u: dados,
              e:endereco  },
        type: "POST"

    }).done(function(resposta){ 
        alert("Usuario Atualizado com Sucesso")       ;
        console.log(resposta);
       
    }).fail(function(resposta){
        alert("Falha"+resposta) ;
    });

}
function RemoveUsuario(){
    let caminho = '../Controller/ctrlRemoveUsuario.php';
    let usuario = $("#tMat").val();
    let dados = JSON.stringify(usuario);
    $.ajax({
        url:caminho,
        data:{d: dados},
        type: "POST"

    }).done(function(resposta){
        alert("Usuario Removido com Sucesso")       ;
    }).fail(function(resposta){
        console.log(resposta);
    });
}

var busca = true;
function escondeBusca(){
   
   if (busca===true){
    $("#busca").hide("slow");
    busca = false;
   }else{
    $("#busca").show("slow");
    busca = true;
   }
}

function Busca(){
    alert();
}