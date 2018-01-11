
function montaSelect(){
    var select = document.getElementById('sEstado');
    var opt = document.createElement('option');
    opt.value='RJ'
    opt.innerHTML='RJ';
    select.appendChild(opt);
    var opt = document.createElement('option');
    opt.value='SP'
    opt.innerHTML='SP';
    select.appendChild(opt);
    var opt = document.createElement('option');
    opt.value='MG'
    opt.innerHTML='MG';
    select.appendChild(opt);
    var opt = document.createElement('option');
    opt.value='BH'
    opt.innerHTML='BH';
    select.appendChild(opt);
    
    
    
}

function validaCampo(c,d){
    let campo = document.getElementById(c);
    let a = document.getElementById(d);
    let str = campo.value;
    if (str.trim() ===""){
        a.innerHTML = "Campo Invalido"
       
    }else{
        a.innerHTML="Ok"
    }
}

function enviar(){
    if(window.confirm("Confirmar Envio?")){
        verInput();
        alert("foi");
    }else{
        alert("foi nao");
    }
}

function inserirUsuario(){

    var jsonUsu = {
        nome: $("#txtNome").val(),
        sobrenome:  $("#txtSobrenome").val(),
        telCel:  $("#txtTelCel").val(),
        cpf:  $("#txtCpf").val(),
        cargo:  $("#vlCargo").val(),
        login:  $("#txtLogin").val(),
        senha:  $("#txtSenha").val()
    };
    var jsonEnd = {
        rua:  $("#txtRua").val(),
        bairro:  $("#txtBairro").val(),
        telRes:  $("#txtTelRes").val(),
        estado:  $("#vlEstado").val(),
        municipio:  $("#txtMun").val(),
        cep:  $("#txtCep").val()
       
    };
   var user = JSON.stringify(jsonUsu);
   var end = JSON.stringify(jsonEnd);
    $.ajax({
        url: "../Controller/controlaUsuario.php",
        data:{
            usuario: user,
            endereco: end
        },
        type: "POST"
    }).done(function(resposta){
        console.log(resposta);
    }).fail(function(resposta){
        console.log(resposta);
    });

}

