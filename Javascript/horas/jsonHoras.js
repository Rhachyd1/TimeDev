
 function debug(dados){
 var str = JSON.stringify(dados, null, 4);        
  console.log(str); 
 }
  

function es(){
  var caminho = '../Controller/ctrlHoras.php';
 
  $.ajax({
    url: caminho,
    dataType: "JSON",
      }).done(function(resultado){
        debug(resultado);
     
       
      }).fail( function(resultado){
        debug(resultado);        
      });
}

function exibeUsuario(){
   
   var caminho = '../JSON/jsonUsuario.php';
 
  $.getJSON(caminho, function(resultado){
    var teste = Object.keys(resultado).length-1; 
     //console.log(teste);
     document.getElementById('lblNome').innerHTML = resultado[teste].nome;
     document.getElementById('lblSNome').innerHTML = resultado[teste].sobrenome;
     document.getElementById('lblDtNasc').innerHTML = resultado[teste].cpf;
          
     
  });
}
function exibeHoras(){
 
   var caminho = '../JSON/jsonHoras.php';
 
  $.getJSON(caminho, function(resultado){
    //console.log(resultado);
    var teste = Object.keys(resultado).length;
    console.log(resultado);
    for (var i = 0; i < teste; i++) {
            tr = $('<tr/>');
            tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].horaEntrada + "</td>");
            tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].horaSaida + "</td>");
            tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].HorasAcumuladas+ "</td>");
            tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].HorasDevidas + "</td>");
            tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].DataTrab + "</td>");
            $("table").append(tr);
    }
    
  });
}



    
  