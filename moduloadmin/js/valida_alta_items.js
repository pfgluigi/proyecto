function valida(){
 	eritem=/^[a-zA-Z�������������� ]{5,50}$/;
 	
 	if(eritem.test(document.formulario.item.value)==false){ // Si no cuadra...
 	 	alert("item incorrecto"); // Mensaje de error.
 	 	document.formulario.item.focus(); // Cursor en cuadro de texto err�neo.
 	 	return false; // Devolvemos false para que no se env�en los datos.
 	}
 	return true; // Devolvemos true para que se env�en los datos a la p�gina php.
}
