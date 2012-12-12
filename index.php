<?php
require './modelo/BBDD.inc';
session_start();

if (!isset($_SESSION['user'])){
header('Location: vistas/index.php');
}
else{
if ((empty($_POST))&&(empty($_GET))){

	include('vistas/cabecera.html');
	include('vistas/menu_n.html');
		if ($_SESSION['rol']==='admin'){
			include('./Vistas/u_lateral.html');
			echo "<p> Pulse la opcion deseada</p>";
		}else{
			echo "<aside></aside><section><p>Opciones no Disponibles para tu nivel de acceso</p></section>";

		}

	include('vistas/PieHTML.html');
}else{
	//---------- GESTIONAMOS LAS PETICIONES
	 if (isset($_GET) && !empty($_GET)){
		$recogido=$_GET['SELECCIONADO'];
				$id=$_GET['id'];
				$idrol=$_GET['id3'];
		if ($recogido=='alta'){
			include ('Vistas/u_alta.html');
		}else if ($recogido=='modificacion'){
			include('./Vistas/u_modificacion.html');
		}else if ($recogido=='baja'){
			include('./Vistas/u_baja.html');
		}else if ($recogido=='roles'){
				//include('./Vistas/u_roles.html');	
				echo "<p> OPCION NO DISPONIBLE</p>";
		}else if ($recogido=='on'){
					$donde=$_GET['donde'];
					$filtre = $_GET['filtre'];
					return Pintatabla($filtre,$donde);
		}else if ($recogido=='alt'){
				$pass=$_GET['id2'];
				$email=$_GET['id4'];
				return altaUser ($id,$pass,$idrol,$email);
		}else if ($recogido=='mod'){
				if ($id!=='admin'){
					$pass=$_GET['id2'];
					if($pass==""){
						
					}
					return modiUser($id,$pass,$idrol);
				}else{
					return 'No se puede modificar<br>ese usuario';
				}
		}else if ($recogido=='baj'){
				$pass=$_GET['id2'];
				if ($id!=='admin'){
					return bajaUser($id);
				}else{
					return 'No se puede dar de baja<br>ese usuario';
				}
		}else if ($recogido=='session'){
			$user=$_SESSION['usuario'];
			$rol=$_SESSION['rol'];
			echo ($user."#".$rol);
			//return $user."#".$rol;
		}else if ($recogido=='destroy'){
			session_start();
			session_destroy();
		}
		

	}
 }
}
?>
