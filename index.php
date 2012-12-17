<?php
//conexion a BBDD y inicio de sesion
require './modelo/BBDD.inc';
session_start();
//--
//si no hay un usuario conectado, puestro la vista principal de la web
header('Location: vistas/index.php');
?>
