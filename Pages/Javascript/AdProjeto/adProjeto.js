function inicio(){
    var esconde = true;
}
function esconde(elemento){ 
   
    var esconde = document.getElementById(elemento).hidden;
  
    if(esconde==true){
      document.getElementById(elemento).hidden=false;
      esconde = false;
    }else{
      document.getElementById(elemento).hidden=true;
      esconde = true;
    }
}
  function enviar(){
    document.getElementById("formulario").submit();
  }
  function limpar(){

    document.getElementById("Fase").value=""    ;
    document.getElementById("Nome").value=""    ;
    document.getElementById("dtInicio").value=""    ;
    document.getElementById("dtFim").value=""    ;
    document.getElementById("dtProg").value=""    ;
        
    
}
function exibeJson(){
    var caminho = '../Controller/JSON/jsonProjeto.php';
    
     $.getJSON(caminho, function(resultado){
       var teste = Object.keys(resultado).length;
       console.log(resultado);
       for (var i = 0; i < teste; i++) {
               tr = $('<tr/>');
               tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].id + "</td>");
               tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].fase + "</td>");
               tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].dtIn + "</td>");
               tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].dtFm + "</td>");
               tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].Nome + "</td>");
               tr.append("<td id = 'tbNome' name = 'tbNome'> <input type='date' name='dtprog' id = 'dtprog'> </input> </td>");
               tr.append("<td id = 'tbNome' name = 'tbNome'> <button onclick='boom()'> atualizar </button>  </td>");
               $("#view").append(tr);
       }
       
     });
   }
   function ValidaData(){
       var d1 = new Date(document.getElementById("dtInicio").value);
       var d2 = new Date(document.getElementById("dtFim").value);
       if (d2>d1){
           alert("ok"+d2+"           "+d1);
       }else{
           alert("deu ruim"+d2+"          "+d1);
       }
   }
   function boom(){
       alert("BOOM!");
   }
   function createSelect(sel){
      var arrayOp=["Inicio", "Meio","Fim"];
      var arrayVal=["INICIO","MEIO","FIM"];
      var selList = document.createElement("select");
       i = 0;
       for (i=0;i<3;i++){
        var option = document.createElement("option");
        option.value = array[i];
        option.text = array[i];
        selectList.appendChild(option);
       }
   }
    

