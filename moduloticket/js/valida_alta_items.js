function valida(){
 	eritem=/^[a-zA-ZñÑáÁéÉíÍóÓúÚüÜ ]{5,50}$/;
 	
 	if(eritem.test(document.formulario.item.value)==false){ // Si no cuadra...
 	 	alert("item incorrecto"); // Mensaje de error.
 	 	document.formulario.item.focus(); // Cursor en cuadro de texto erróneo.
 	 	return false; // Devolvemos false para que no se envíen los datos.
 	}
 	return true; // Devolvemos true para que se envíen los datos a la página php.
}
