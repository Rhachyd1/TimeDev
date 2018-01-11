function exibeJson(){
    var caminho = '../JSON/jsonProjeto.php';
    
     $.getJSON(caminho, function(resultado){
       var teste = Object.keys(resultado).length;       
       for (var i = 0; i < teste; i++) {
               tr = $('<tr/>');
               tr.append("<td id = 'tbID' name = 'tbNome'> <input id='txtId"+i+"' type=text value =' "+resultado[i].id+" ' ></input> </td>");
               tr.append("<td id = 'tbFASE"+i+"' name = 'tbNome'></td>");
               tr.append("<td id = 'tbDTIN' name = 'tbNome'> <input type='date' id='dtIn"+i+"' value= ''> </input></td>");                             
               tr.append("<td id = 'tbDTIN' name = 'tbNome'> <input type='date' id='dtFm"+i+"' value= ''> </input></td>");
               tr.append("<td id = 'tbNome' name = 'tbNome'> <input type='text' id='Nome"+i+"' value= ''> </input></td>");
               tr.append("<td id = 'tbDTPROG' name = 'tbNome'> <input type='date' name='dtprog' id = 'dtprog"+i+"'> </input> </td>");
               tr.append("<td id = 'tbATL' name = 'tbNome'>\
                          <button onclick='projCorrecao("+i+")'> Corrigir </button > <br> \
                          <button onclick='projUpdate("+i+")'> Ad.Prorrogcao </button> <br>\
                          <button onclick='removeProjeto("+i+ ")'> Remover </button > </td>");
               $("#view").append(tr);
               document.getElementById("dtIn"+i).value =  resultado[i].dtIn ;
               document.getElementById("dtFm"+i).value =  resultado[i].dtFm ;
               document.getElementById("Nome"+i).value= resultado[i].Nome;
               document.getElementById("tbFASE"+i).appendChild( createSelect(i) );              
       }
    });
}

function projUpdate(i){     


  $.ajax({
    url:"../Controller/ctrlAdProrrog.php",
    type: "POST",
    data: {prog: document.getElementById("dtprog"+i).value,
           id: document.getElementById("txtId"+i).value }
  }).done(function(resposta){
    alert("foi");
    console.log(resposta);
  }).fail(function(resposta){
    alert("foi nao");
    console.log(resposta);
  });

}
function projCorrecao(i){
  let f = document.getElementById("selId"+i);  
  let correcao= {
    nome: document.getElementById("Nome"+i).value,
    dtIn: document.getElementById("dtIn"+i).value,
    dtfim: document.getElementById("dtFm"+i).value,
    fase: f.options[f.selectedIndex].value,
    id: document.getElementById("txtId"+i).value
  } ; 
  $.ajax({
    url: '../Controller/ctrlUpProjeto.php',
    type: "POST",
    data: {c: correcao} 
  }).done(function(resposta){
    alert("Corrigido");
    console.log(resposta);
  }).fail(function(resposta){
      console.log(resposta);
  });    
}
   function createSelect(j){       
       let fase= ["Inicio","Meio","Fim"];
       let sel = document.createElement("select");
       sel.id="selId"+j;      
       let value= ["INICIO","MEIO","FIM"];
       let i = 0;
       for (i=0; i<3; i++){
        let op = document.createElement("option");
        op.value= value[i];
        op.text = fase[i];
        sel.appendChild(op);
       }
      return sel;
   }
function removeProjeto(i){
    $.ajax({
      url:'../Controller/ctrlRemoveProjeto.php',
      type:"POST",
      data:{
        id: document.getElementById("txtId"+i).value
      } 

    }).done(function(resposta){
      console.log(resposta)
    }).fail(function (resposta){
      console.log(resposta)
    });
}
