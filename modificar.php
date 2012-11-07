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
			
			if(isset($_GET['id'])){
		if ((isset($_POST['modificar']) === true && !ereg("([A-Za-z0-9\.|-|_]+)[@]{1}([A-Za-z0-9\.|-|_]+)[.]{1}([A-Za-z]+)", $_POST['mail'])===false) && (strlen($_POST['pass'])<6)===false){
				echo "has modificado el usuario: ".$_GET['id']." correctamente";
				$sql = "update users set user='".$_POST['user']."', pass='".$_POST['pass']."', email='".$_POST['mail']."', rank=".$_POST['rank']." where id = ".$_GET['id'].";";
				$res = mysql_query($sql, $con); 
				echo $sql;
				
		}
		else{
		$sql = "select * from users where id like '".$_GET['id']."';";
		$res = @mysql_query($sql, $con); 
		$usuario = mysql_result($res,0, "user");
		$pass = mysql_result($res,0, "pass");
		$email = mysql_result($res,0, "email");
		$rank= mysql_result($res,0, "rank");
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_GET['id']; ?>&mod=si" method="POST">
			User: <input readonly type="text" name="user" value="<?php echo $usuario; ?>"/><br/>
			Pass: <input type="password" required name="pass" value="<?php echo $pass; ?>"/><?php if (isset($_POST['modificar'])===TRUE && (strlen($_POST['pass'])<6)===true){echo "<span style=\"color:red\">* La pass debe tener mas de 6 caracteres</span>";} ?> <br/>
			E-Mail: <input type="text" value="<?php echo $email; ?>" name="mail"/><?php if (isset($_POST['modificar'])===TRUE &&  (ereg( "([A-Za-z0-9\.|-|_]+)[@]{1}([A-Za-z0-9\.|-|_]+)[.]{1}([A-Za-z]+)", $_POST['mail']))===FALSE){echo "<span style=\"color:red\">* E-Mail no valido</span>";} ?>
			<br/>
			
			Rank: <select name="rank">
						<?php
							if($rank==1){ ?>
							<option selected value="1">Administrador</option>
							<option value="0">Normal</option>
							<?php }
							else{ ?>
							<option value="1">Administrador</option>
							<option selected value="0">Normal</option>
							<?php }
						?>
				  </select>
				  <br/>
			<input type="submit" name="modificar" value="Modificar"></input>
		</form>
	
		<?php
		}
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