<?php
session_start();
DEFINE("DB_HOST", "localhost");
DEFINE("DB_USER", "root");
DEFINE("DB_PASSWORD", "root1");
DEFINE("DB_NAME", "proyecto");
	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$con || !mysql_select_db("proyecto", $con))
	{
		die("Error conectando a la BD: " . mysql_error());
	}
	$sql = "select rank from users where user like '".$_SESSION['user']."';";
	$res = @mysql_query($sql, $con); 
	$filas = mysql_num_rows($res);
	$rank= mysql_result($res, 0, "rank");
	$_SESSION['rank']=$rank;
	if($rank==0)
	{
		header("Location: index.php");
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   	<link rel="stylesheet" type="text/css" href="completa.css" title="style" />
	<title>Lorem ipsum</title>
</head>

<body>
<!-- Contenedor -->
<div id="contenedor">

	<!-- Cabecera -->
	<div id="cabecera">
		<div id="logo">
			<h1><span>LOGOTIPO</span></h1>
		</div>
		<div id="buscador">
	<?php

if(@$_SESSION['user']!=NULL && @$_SESSION['user']!=""){
echo "Bienvenido ".$_SESSION['user'];
echo "<br/><a href='logout.php'>Logout</a>";
}
?>
		
		
		<div class="clear"></div>
	</div>
	<?php
	if(@$_SESSION['user']!=NULL && @$_SESSION['user']!="" && @$_SESSION['rank']==1){?>
	<div id="menu">
		<ul id="menu_principal">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="admin.php?check=users">Usuarios</a></li>
			<li><a href="#">Tickets</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<?php
		}
	?>
<div id="contenido">
	
	<!-- Principal -->
	<div id="principal">
		
		<div class="articulo">
			<?php 
			if(!isset($_GET['action'])){
			$sql = "select * from users where id = ".$_GET['id'].";";
					$res = @mysql_query($sql, $con); 
					$filas = mysql_num_rows($res);
					echo "<center><h2>Estas seguro que quieres eliminar al siguiente usuario?</h2></center><br/>";
					echo "<table id='usuarios'>
					<tr>
						<td id='filauno'>ID</td>
						<td id='filauno'>Usuario</td>
						<td id='filauno'>Email</td>
						<td id='filauno'>Rank</td>
						<td id='filauno'>Opción</td>
					</tr>";
						
							$id= mysql_result($res, 0, "id");
							$usuario = mysql_result($res,0, "user");
							$email = mysql_result($res,0, "email");
							$rank= mysql_result($res,0, "rank");
							if($id==2)
								continue;
							echo "<tr>";
								echo "<td>".$id."</td>";
								echo "<td>".$usuario."</td>"; 
								echo "<td>".$email."</td>";
								echo "<td>".$rank."</td>";
								echo "<td><a href='borrar.php?id=".$id."&action=del'>Borrar</td>";
							echo "</tr>";
						
						echo "</table>";
				}
				else
				{
					$sql = "DELETE FROM users where id= ".$_GET['id'].";";
					$res = mysql_query($sql, $con); 
					echo "<center><h2>Usuario Borrado!</h2><br/>";
					echo "<a href='admin.php?check=users'>Volver</a></center>";
					
				}
	
		?>
		</div>
		
		
		
	</div>
	<!-- /Principal -->
	
		</div>
</div>

	
	<!-- /Contenido -->
	
    <div class="clear"></div>
	
    <!-- Pie -->
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
	<!-- /Pie -->
</div>
</div>
<!-- /Contenedor -->

</body>
</html>