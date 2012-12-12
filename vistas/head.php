<?php @session_start(); 
if(isset($_SESSION['user']))
	@include ('../modelo/BBDD.inc');
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" src="vistas/js/login.js" type="text/javascript"></script>
   	<link rel="stylesheet" type="text/css" href="vistas/css/completa.css" title="style" />
	<title>Lorem ipsum</title>
</head>

<body id="cuerpo">
<!-- Contenedor -->
<div id="contenedor">

	<!-- Cabecera -->
	<div id="cabecera">
		<div id="logo">
			<h1><span>LOGOTIPO</span></h1>
		</div>
		<div id="buscador">
		<?php if(@$_SESSION['user']!=NULL && @$_SESSION['user']!=""){
echo "Bienvenido ".$_SESSION['user'];
echo "<br/><a href='logout.php'>Logout</a>";

}
?>
</div>
		<?php
	if(isset($_SESSION['user'])){?>
	<div id="menu">
		<ul id="menu_principal">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="#">Mis tickets</a></li>
			<li><a href="#">Mi cuenta</a></li>
			<li><a href="ticket_nuevo.php">Nuevo Ticket</a></li>
			<li><a href="modelo/logout.php">Logout</a></li>
			<?php
			//Opción de administrador si eres rank=1
			$sql = "select rank from users where user like '".$_SESSION['user']."';";
			$res = mysql_query($sql, $con); 
			$rank = mysql_result($res, 0, "rank");
			if($rank==1)
			{
				echo "<li><a href='index.php?selec=admin'>Administrador</a></li>";
			}
			?>
		</ul>
		<div class="clear"></div>
	</div>
	
	<?php
		}
	?>
	</div>
	<div id="contenido">
	
	<!-- Principal -->
	<?php if(!isset($_SESSION['user'])){?>
	<div id="principal"><center>
		<!--<form action="./modelo/login.php" method="GET">-->
			User <input type="text" name="user" id="user"/><br/>
			Pass <input type="password" name="pass" id="pass"/>
			<!--<input type="submit" name="login" value="Login"/>
		</form>-->
	</center>
	</div>
	<?php
	}
	?>
	<!-- /Principal -->
	
</div>

<div id="pie">
		<span class="enlaces">
			<a href="#">Nulla</a> |
			<a href="#">Pharetra</a> |
			<a href="#">Luctus</a> |
			<a href="#">Ipsum</a> |
			<a href="#">Proin</a> |
			<a href="#">Placerat</a>
		</span>
		
		<span class="copyright">
			&copy; Copyright Lorem ipsum
		</span>
		<div class="clear"></div>
	</div>
</div>