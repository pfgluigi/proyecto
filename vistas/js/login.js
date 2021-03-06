addEvent(window,'load',inicializarEventos,false);
//inicializo los eventos, y le pongo a pass, el onKeyUp event
function inicializarEventos(){
  var ob=document.getElementById('pass');
  addEvent(ob,'keyup',presionTecla,false);
}
var conexion1;
//en esta funci�n, digo que si apreto enter, que se realice la consulta a la BBDD
function presionTecla(e){
  if (window.event.keyCode==13){
  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  user=document.getElementById('user').value;
  pass=document.getElementById('pass').value;
  conexion1.open('GET','../modelo/login.php?user='+user+"&pass="+pass, true);
  conexion1.send(null);
  }
}
//lo que devuelve la BBDD, lo pinto en el cuerpo de la web
function procesarEventos(){
var resultados = document.getElementById("cuerpo");
  if(conexion1.readyState == 4){
    if (conexion1.status==200)
	  resultados.innerHTML = conexion1.responseText;
  } 
  else 
    resultados.innerHTML = '';
}
//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent(elemento,nomevento,funcion,captura){
  if (elemento.attachEvent){
    elemento.attachEvent('on'+nomevento,funcion);
    return true;
  }
  else  
    if (elemento.addEventListener){
      elemento.addEventListener(nomevento,funcion,captura);
      return true;
    }
    else
      return false;
}
function crearXMLHttpRequest() {
  var xmlHttp=null;
  if (window.ActiveXObject) 
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else 
    if (window.XMLHttpRequest) 
      xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}