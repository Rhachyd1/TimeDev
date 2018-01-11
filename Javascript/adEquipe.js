$(document).ready(function() {
    $("#pnlEquipe").hide();
    
    getProjeto();
    $('#btnRight').click(function(e) {
        var selectedOpts1 = $('#lstBox1 option:selected');
       
      
        if((selectedOpts1.length == 0)){
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts1).clone());
       
        $(selectedOpts1).remove();
       
        e.preventDefault();
    });

    $('#btnLeft').click(function(e) {
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length == 0) {
            alert("Por favor, Selecione um elemento.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
});
var user;
var proj;
var eq;
function getUsuarios(){
    let caminho = '../JSON/jsonExibeUsuario.php';
   $.getJSON(caminho, function(resposta){
       user = resposta;
       console.log(resposta);
        let tam = resposta.length;       
        createSelectEmp(resposta, tam);
   });
}
function getProjeto(){
    let caminho = '../JSON/jsonProjeto.php';
   $.getJSON(caminho, function(resposta){
       proj = resposta;
        let tam = resposta.length;       
        console.log(resposta);
        createSelectProj(resposta, tam);
   });
}
function createSelectEmp(sel, tam){
    var arrayVal=[];
    i = 0;
    for (i = 0; i<tam; i++){
        arrayVal[i] = sel[i].id;
    }   
     i = 0;
     for (i=0;i<tam;i++){
      let option = document.createElement("option");
      option.value = arrayVal[i];
      option.text =sel[i].nome;
      
      $("#lstBox1").append(option);
     }

}
function createSelectProj(sel, tam){
    var arrayVal=[];
    i = 0;
    for (i = 0; i<tam; i++){
        arrayVal[i] = sel[i].id;
        console.log(arrayVal[i])
    }   
     i = 0;
     for (i=0;i<tam;i++){
      let option = document.createElement("option");
      option.value = arrayVal[i];
      option.text =sel[i].Nome;
      
      $("#lstBox3").append(option);
     }

}
var e = true;
function escondePainel(pnl){
  
    if (e===true){
        $(pnl).hide("slow");
        e = false;
    }else{
        $(pnl).show("slow");
        e = true;
    }
   
}

function buscaEquipe(){
    $.ajax({
        url:'../JSON/jsonBuscaEquipe.php',
        type: "POST",
        data: {d:$("#bsEquipe").val()}
    }).done(function (resposta){       
        if(resposta!== "[]" ){
            
             proj = JSON.parse(resposta) ;
             console.log(resposta);
            getUsuarios();
            $("#bEquipe").text('Equipe: '+proj[0].NomeProj);
            $("#pnlEquipe").show("slow");
        }
    }).fail(function (resposta){
        console.log(resposta);
    });
    $.ajax({
        url:'../Controller/ctrlBuscaEquipe.php',
        type: "POST",
        data: {d:$("#bsEquipe").val()}
    }).done(function (resposta){       
        if(resposta!== "[]" ){ 
             console.log(resposta)           ;
             eq = JSON.parse(resposta) ;               
             let tam = resposta.length;
             createSelectEq(eq, tam);
        }
    }).fail(function (resposta){
        console.log("falha"+resposta);
    });
}
function createSelectEq(sel, tam){   
    var arrayVal=[];
    let i = 0;
    alert(i);
    for (i = 0; i<tam; i++){       
        arrayVal[i] = sel[0].idEmp;
        console.log(arrayVal[i]);
    }   
     i = 0;
     for (i=0;i<tam;i++){
      let option = document.createElement("option");
      option.value = arrayVal[i];
      option.text =sel[i].NUsuario;
      console.log(sel[i].NUsuario);
      $("#lstBox2").append(option);
     }

}

function atualizaEquipe(){

    if( ($('#lstBox2').has('option').length < 0)  || ( $('#lstBox2').has('option').length < 0 ) ) {
    //Inserir Usuario no Projeto
    alert("Adicionar Usuario");
    $.ajax({
        url:"",
        type:"POST",
        data:{d:{

        }}
        
           }).done(function(resposta){
                console.log(resposta);
           }).fail(function (resposta){
                console.log(resposta);
           });
        
    }else{
        //Remover Usuario do Projeto
        alert("Remover Usuario");
    }
   // alert(proj[0].NomeProj);
  //  alert(user[0].id);
    //let teste = buscaUsuario(user, $('#lstBox1 option:selected').val())   ;
    let teste = $('#lstBox1 option:selected').val()   ;
   alert (teste+"  "+proj[0].NomeProj);
    
}
function buscaUsuario(u, nome){
   
    let ret = 0 ;
    let i = 0;
    for (i = 0; i< u.length; i++){
       if (nome === u[i].matricula){          
           ret = u[i].id;
       }
    }  
    return ret;

}
function insereEquipe(){
    let a = document.getElementById("lstBox3");
    let b=a.options[a.selectedIndex].value;
    
    $.ajax({
        url:"../Controller/ctrlInsereEquipe.php",
        data: dados={
            nEquipe: $("#inNome").val(),
            idProj: b
        },
        type: "POST"

    }).done(function(resposta){
        console.log(resposta);
    }).fail(function (resposta){

    });
}

