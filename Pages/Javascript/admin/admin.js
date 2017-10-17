function inicio(){
 var esconde = true;
}
function exibir(){  
  var esconde = document.getElementById("menu").hidden;

  if(esconde==true){
    document.getElementById("menu").hidden=false;
    esconde = false;
  }else{
    document.getElementById("menu").hidden=true;
    esconde = true;
  }
}
function teste(){
  window.open("http://www.google.com.br");
}

