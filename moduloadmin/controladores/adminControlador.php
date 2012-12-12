<?php
function listar(){
	//Incluye el modelo que corresponde
	require './moduloitems/modelos/itemsModelo.php';

	//Le pide al modelo todos los items
	$items = buscarTodosLosItems();

	//Pasa a la vista toda la información que se desea representar
	require './moduloitems/vistas/listar.php';
}
function alta(){
	require './moduloitems/vistas/alta.php';
}
if( isset($_POST['item'])  ){
    require '../../modelo/conexion.php';
	require '../modelos/itemsModelo.php';
	altaItem($_POST['item']);
	$items = buscarTodosLosItems();
	header("Location: ../../index.php?controlador=items&accion=listar");
}
function buscar(){
	require './moduloitems/vistas/buscar.php';
}
function eliminar(){
	require './moduloitems/vistas/eliminar.php';
}
function modificar(){
	require './moduloitems/vistas/modificar.php';
}
?>
