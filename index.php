
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
			$sql = "select rank from users where user like '".$_SESSION['user']."';";
			$res = @mysql_query($sql, $con); 
			$rank = mysql_result($res, 0, "rank");
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
		{
		?>
		
		<?php
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


