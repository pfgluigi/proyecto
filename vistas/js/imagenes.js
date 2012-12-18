var num=2;
function anadir_imagen()
{
	if(num!=4){
	var div=document.createElement("div");
	var span=document.createElement("span");
	var numimagen="Imagen "+num;
	var texto=document.createTextNode(numimagen);	
	span.appendChild(texto);
	div.appendChild(span);

	var input=document.createElement("input");
	var numimagen2="imagen"+num;	
	input.setAttribute("name", numimagen2);
	input.setAttribute("type", "file");
	div.setAttribute("id", numimagen2);
	div.appendChild(input);
	
	
	var capturas = document.getElementById("capturas");
	capturas.appendChild(div);	
	num++;
	}
}
function borrar_imagen(){
	var parent=document.getElementById("capturas");
	var child=document.getElementById("imagen"+(num-1));
	parent.removeChild(child);
	if(num!=2)
	num--;
}