
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
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   	<link rel="stylesheet" type="text/css" href="completa.css" title="style" />
	<script type="text/javascript" src="imagenes.js"></script>
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

if(@$_SESSION['user']==NULL && @$_SESSION['user']==""){

if (isset($_POST['login']) === true && $_POST['user']!="" && $_POST['user']!=NULL)
{
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$sql = "select * from users where user like '".$user."' and pass like '".$pass."';";
	$res = @mysql_query($sql, $con); 
	$filas = mysql_num_rows($res);
	
	if($filas!=0 || $filas!=null)
	{
		
		$usuario = mysql_result($res, 0, "user");
   		$contrasena = mysql_result($res, 0, "pass");
		
		$_SESSION['user']=$usuario;
		$_SESSION['pass']=$contrasena;
		
		
		
	
	}
	else
	{
	?>
		
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<?php if (isset($_POST['login'])===TRUE){echo "<span style=\"color:red\">* User o pass incorrectos</span><br/>";} ?>
			User <input type="text" name="user"/>
			Pass <input type="password" name="pass"/>
			<input type="submit" name="login" value="Login"></input><br/>
			<a href="registro.php">Registrate</a>
	</form>

	<?php
	}
}
else
{
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<?php if (isset($_POST['login'])===TRUE){echo "<span style=\"color:red\">* User o pass incorrectos</span><br/>";} ?>
			User <input type="text" name="user"/>
			Pass <input type="password" name="pass"/>
			<input type="submit" name="login" value="Login"></input><br/>
			<a href="registro.php">Registrate</a>
			
	</form>

	<?php
	
}
}

if(@$_SESSION['user']!=NULL && @$_SESSION['user']!=""){
echo "Bienvenido ".$_SESSION['user'];
echo "<br/><a href='logout.php'>Logout</a>";

}
?>
		
		
		<div class="clear"></div>
	</div>
	<?php
	if(@$_SESSION['user']!=NULL && @$_SESSION['user']!=""){?>
	<div id="menu">
		<ul id="menu_principal">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="#">Mis tickets</a></li>
			<li><a href="#">Mi cuenta</a></li>
			<li><a href="ticket_nuevo.php">Nuevo Ticket</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php
			//Opción de administrador si eres rank=1
			$sql = "select * from users where user like '".$_SESSION['user']."';";
			$res = @mysql_query($sql, $con); 
			$rank = mysql_result($res, 0, "rank");
			$id = mysql_result($res, 0, "id");
			if($rank==1)
			{
				echo "<li><a href='admin.php'>Administrador</a></li>";
			}
			?>
		</ul>
		<div class="clear"></div>
	</div>
	<?php
		}
	?>
<div id="contenido">
	
	<!-- Principal -->
	<div id="principal">
		<?php
		if(@$_SESSION['user']==NULL && @$_SESSION['user']==""){?>
		<div class="articulo">
			<h2>No estas logeado</h2>
		</div>
		<?php
		}
		else
		{ //Aquí va toda la web
			if (isset($_POST['enviar']))
			{
				$frecuencia=$_POST['frec'];
				$tipo=$_POST['tipo'];
				$prioridad=$_POST['prioridad'];
				$asignar=$_POST['asign'];
				$titulo=$_POST['titulo'];
				$bugtext=$_POST['bugtext'];
				$pasos=$_POST['pasos'];
				if(isset($_POST['imagen3'])){
					$img[0]=$_POST['imagen1'];
					$img[1]=$_POST['imagen2'];
					$img[2]=$_POST['imagen3'];
					$sql = "INSERT INTO tickets (user_id,frec,type,priority,associated_admin,title,bugtext,steps,img1,img2,img3) values (".$id.",'".$frecuencia."','".$tipo."','".$prioridad."','".$asignar."','".$titulo."','".$bugtext."','".$pasos."','".$img[0]."','".$img[1]."','".$img[2]."');";
					$res = @mysql_query($sql, $con);  
					}
				else if(!isset($_POST['imagen3']) && isset($_POST['imagen2']))
				{
					$img[0]=$_POST['imagen1'];
					$img[1]=$_POST['imagen2'];
					$sql = "INSERT INTO tickets (user_id,frec,type,priority,associated_admin,title,bugtext,steps,img1,img2,img3) values (".$id.",'".$frecuencia."','".$tipo."','".$prioridad."','".$asignar."','".$titulo."','".$bugtext."','".$pasos."','".$img[0]."','".$img[1]."','no');";
					$res = @mysql_query($sql, $con); 
				}
				else{
					$img[0]=$_POST['imagen1'];
					$sql = "INSERT INTO tickets (user_id,frec,type,priority,associated_admin,title,bugtext,steps,img1,img2,img3) values (".$id.",'".$frecuencia."','".$tipo."','".$prioridad."','".$asignar."','".$titulo."','".$bugtext."','".$pasos."','".$img[0]."','no','no');";
					$res = @mysql_query($sql, $con); 
					}
				
				
			}
			else
			{
			?>
			
			<div id="ticket">
					
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
						<table>
							<tr><td colspan=2><h2>Nuevo BugTicket</h2></td></tr>
							<tr>
								<td>Frecuencia del Error</td>
								<td><select name="frec">
										<option value="aleatorio">Aleatorio</option>
										<option value="aveces">Aveces</option>
										<option value="siempre">Siempre</option>
										<option value="ns">No se</option>
									</select></td>
							</tr>
							<tr>
								<td>Tipo</td>
								<td><select name="tipo">
										<option selected value="menor">Menor</option>
										<option value="trivial">Trivial</option>
										<option value="crash">Crash</option>
										<option value="bloqueo">Bloqueo</option>
									</select></td>
							</tr>
							<tr>
								<td>Prioridad</td>
								<td><select name="prioridad">
										<option selected value="baja">baja</option>
										<option value="media">Media</option>
										<option value="alta">Alta</option>
										<option value="urgente">Urgente</option>
									</select></td>
							</tr>
							<tr>
								<td>Asignar</td>
								<td><select name="asign">
								<?php
								$sql = "select * from users where rank=1;";
								$res = @mysql_query($sql, $con); 
								$filas = mysql_num_rows($res);
								for($i=0;$i<$filas;$i++)
								{
									$responsable= mysql_result($res, $i, "user");
									echo "<option value='".$responsable."'>".$responsable."</option>";
								}
							?>
								</select></td>
							</tr>
							<tr>
								<td>Titulo </td>
								<td><input type="text" required maxlength="40" name="titulo"/></td>
								
							</tr>
							<tr>
								<td>Descripci&oacute;n del bug </td>
								<td><TEXTAREA name="bugtext" required maxlength="250" rows="5" cols="50"></TEXTAREA></td>
							</tr>
							<tr>
								<td>Pasos seguidos que le han lleguado al bug</td>
								<td><TEXTAREA name="pasos" required maxlength="250" rows="5" cols="50"></TEXTAREA></td>
							</tr>
							<tr>
								<td>Capturas</td>
								<td><input name="imagen1" required type="file"/> <span id="mas" onClick="anadir_imagen()"> <h3 style="display:inline;">+</h3> </span><span id="menos" onClick="borrar_imagen()"> <h3 style="display:inline;">-</h3> </span><div id="capturas"></div></td>
								
							</tr>
							
							
						</table>
						<input type="submit" name="enviar" value="Enviar"/>
					</form>
			
			<?php
			}
		}
		?>
		
		
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


