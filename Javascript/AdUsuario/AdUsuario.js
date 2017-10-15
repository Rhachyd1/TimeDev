
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
   var user = JSON.stringify(jsonUsu);
    $.ajax({
        url: "../Controller/controlaUsuario.php",
        data:{
            usuario: user,
            endereco: null
        },
        type: "POST"
    }).done(function(resposta){
        console.log(resposta);
    }).fail(function(resposta){
        console.log(resposta);
    });

}