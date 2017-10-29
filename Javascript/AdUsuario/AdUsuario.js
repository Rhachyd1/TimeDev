
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

function validaCampo(c){

    var campo = document.getElementById(c).value;
    if (campo.trim()===""){
        alert("Campo inválido");
    }
}

function enviar(){
window.open("../Controller/controlaUsuario.php");
}

function inserirUsuario(){

    var jsonUsu = {
        nome: document.getElementById("txtNome").value,
        sobrenome: document.getElementById("txtSobrenome").value,
        telCel: document.getElementById("txtTelCel").value,
        cpf: document.getElementById("txtCpf").value,
        cargo: document.getElementById("vlCargo").value,
        login: document.getElementById("txtLogin").value,
        senha: document.getElementById("txtSenha").value,
    };
    var jsonEnd = {
        rua: document.getElementById("txtRua").value,
        bairro: document.getElementById("txtBairro").value,
        telRes: document.getElementById("txtTelRes").value,
        estado: document.getElementById("vlEstado").value
       
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