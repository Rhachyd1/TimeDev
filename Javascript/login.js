function enviar(){
    var usuario = document.getElementById("txtLogin").value;
    var senha = document.getElementById("txtSenha").value;  
    if((usuario.trim()==="" && senha.trim()==="")||(usuario===null && senha===null)){
        alert('Login e senha invalidos!');
       return false;
    }else if (usuario===null || usuario.trim()===""){
      alert('Login invalido!');
    }else if(senha===null || senha.trim() ===""){
        alert('Senha invalida!');
    }else if((usuario.trim()!=="" && senha.trim()!=="")||(usuario!==null && senha!==null)){
       enviarAjax(usuario, senha) ;
       
    }
}
function enviarAjax(usuario, senha){
  
    $.ajax({
        url: "../Controller/ctrlLogin.php",
        data: {
            login: usuario,
            senha: senha,
            async: false,
            dataType: "jsonp"
        },
        type: "POST"
         }).done(function(resposta){ 
         var str = JSON.stringify(resposta, null, 4); 
        console.log(str); 
        redirect(str);
       
        }).fail(function(resposta){
        var str = JSON.stringify(resposta, null, 4); 
        console.log(str); 
        alert("Erro!");
      
        });
}
function redirect( val ){
    
    var local = val.substring(0, 5);
    console.log(local);
    if(local === '"admi'){
        alert("admin");
        window.location.replace("../View/Admin.html");       
    }else if(local==='"gest'){
        alert("gestor");
        window.location.replace("../View/Gestor.html");       
    }else{
        alert("user");
        window.location.replace("../View/Admin.html");       
    }
}