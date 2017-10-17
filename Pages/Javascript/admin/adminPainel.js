function Menu(c){
    var caminho = c;          
    var url = "../../Controller/";
    var path = url+caminho;    
    if(caminho =='horas')    {        
        window.location = path+'.php'  ;
    }else if (caminho == "logoff"){
        window.location = path+'.php'  ;
    }
}