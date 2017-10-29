function exibeJson(){
    var caminho = '../Controller/JSON/jsonProjeto.php';
    
     $.getJSON(caminho, function(resultado){
       var teste = Object.keys(resultado).length;       
       for (var i = 0; i < teste; i++) {
               tr = $('<tr/>');
               tr.append("<td id = 'tbID' name = 'tbNome'>" + resultado[i].id + "</td>");
               tr.append("<td id = 'tbFASE"+i+"' name = 'tbNome'></td>");
               tr.append("<td id = 'tbDTIN' name = 'tbNome'> <input type='date' id='dtIn"+i+"' value= ''> </input></td>");                             
               tr.append("<td id = 'tbDTIN' name = 'tbNome'> <input type='date' id='dtFm"+i+"' value= ''> </input></td>");
               tr.append("<td id = 'tbNome' name = 'tbNome'>" + resultado[i].Nome + "</td>");
               tr.append("<td id = 'tbDTPROG' name = 'tbNome'> <input type='date' name='dtprog' id = 'dtprog'> </input> </td>");
               tr.append("<td id = 'tbATL' name = 'tbNome'> <button onclick='boom()'> Corrigir </button> <button onclick='boom()'> atualizar </button> </td>");
               
               $("#view").append(tr);
               document.getElementById("dtIn"+i).value =  resultado[i].dtIn ;
               document.getElementById("dtFm"+i).value =  resultado[i].dtFm ;
               document.getElementById("tbFASE"+i).appendChild(createSelect());
              
       }
       
     });
   }

   function projUpdate(){

   }
   function projCorrecao(){
    
   }
   function createSelect(){       
       let fase= ["Inicio","Meio","Fim"];
       let sel = document.createElement("select");      
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
   function teste(){
    let div = document.getElementById("teste");
    let sel = createSelect();
    div.appendChild(sel);
   }