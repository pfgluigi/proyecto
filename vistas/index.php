
<?php
session_start();
include ('../modelo/BBDD.inc');
$rank=0;
if(isset($_SESSION['user'])&& $rank==0){
$sql="SELECT rank FROM users where user='".$_SESSION['user']."';";
$res = @mysql_query($sql, $con); 
$rank= @mysql_result($res, 0, "rank");
}
  include("cabecera.html");
if(isset($_SESSION['user'])){
	if($rank==0){
		include("menu_n.html");
	}
	else
	{
		include("menu_a.html");
	}
	echo "<div id='contenido'>
	<div id='principal'>
	";
	if(!empty($_GET['controlador'])){
	$controlador=$_GET['controlador'];
	if(!empty($_GET['accion'])){
		$accion=$_GET['accion'];
	}
	$controlador="../modulo".$controlador."/controladores/".$controlador."Controlador.php";
	if(is_file($controlador)){
		require_once($controlador);
	}
	else
		die("No existe el controlador");
	if(is_callable($accion)){
		$accion();
	}
	else
		die("No existe la accion");
}

  if(empty($_GET['controlador']))
	include("../modelo/mostrar_tickets.php");
	echo"
	</div>";
  
  }
  else{

  include("cont.html");

  }
  include("pie.html");
  //a continuación, la llamada a los modelos
  

  
  
  
  
  
?>
