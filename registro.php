<?php
session_start();
//Defino la base de datos y hago la conexión
DEFINE("DB_HOST", "localhost");
DEFINE("DB_USER", "root");
DEFINE("DB_PASSWORD", "root1");
DEFINE("DB_NAME", "proyecto");
	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$con || !mysql_select_db("proyecto", $con))
	{
		die("Error conectando a la BD: " . mysql_error());
	}
//Aquí compruebo si el usuario existe
	$sql = "select * from users where user like '".@$_POST['user']."';";
	$res = @mysql_query($sql, $con); 
	$filas = @mysql_num_rows($res);
	//si email no existe la inicializo vacia pra que entre al primer if
	if (!isset($_POST['mail']))
		$_POST['mail']="";
//Aquí comprueba si le hemos dado al boton de enviar, y si existe el user entra al if.
//si el email es invalido tambíén entra.
if ((isset($_POST['enviar']) === true && $filas>0 || ereg("([A-Za-z0-9\.|-|_]+)[@]{1}([A-Za-z0-9\.|-|_]+)[.]{1}([A-Za-z]+)", $_POST['mail'])===false ) || (strlen($_POST['pass'])<6)===true){
	//Si el usuario existe, salta el formulario avisando
	if($filas>0)
		{
			?>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			User: <input type="text" name="user"/> <span style="color:red">* El usuario ya existe</span><br/>
			Pass: <input type="password" required name="pass" /><?php if (isset($_POST['modificar'])===TRUE && (strlen($_POST['pass'])<6)===true){echo "<span style=\"color:red\">* La pass debe tener mas de 6 caracteres</span>";} ?> <br/>
			E-Mail: <input type="text" name="mail"/><br/>
			<input type="submit" name="enviar" value="Registro"></input>
			<a href="index.php">Login</a>
			</form>
			<?php
		}
		//si el email es invalido, te avisa
		else{?>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			User: <input type="text" name="user"/><br/>
			Pass: <input type="password" required name="pass" /><?php if (isset($_POST['enviar'])===TRUE && (strlen($_POST['pass'])<6)===true){echo "<span style=\"color:red\">* La pass debe tener mas de 6 caracteres</span>";} ?> <br/>
			E-Mail: <input type="text" name="mail"/><?php if (isset($_POST['enviar'])===TRUE &&  (ereg( "([A-Za-z0-9\.|-|_]+)[@]{1}([A-Za-z0-9\.|-|_]+)[.]{1}([A-Za-z]+)", $_POST['mail']))===FALSE){echo "<span style=\"color:red\">* E-Mail no valido</span>";} ?>
			<input type="submit" name="enviar" value="Registro"></input>
			<a href="index.php">Login</a>
		</form>
	
		<?php
		}
			
		}	
		//Aquí si el usuario no existe comprueba que el email sea valido, y avisa si no lo es
		else if(isset($_POST['enviar']) === true && $filas==0 &&  (ereg( "([A-Za-z0-9\.|-|_]+)[@]{1}([A-Za-z0-9\.|-|_]+)[.]{1}([A-Za-z]+)", $_POST['mail']))===FALSE){ echo "tercer if";?>
	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			User: <input type="text" name="user"/><br/>
			Pass: <input type="text" name="pass"/><br/>
			E-Mail: <input type="text" name="mail"/><?php if (isset($_POST['enviar'])===TRUE &&  (ereg( "([A-Za-z0-9\.|-|_]+)[@]{1}([A-Za-z0-9\.|-|_]+)[.]{1}([A-Za-z]+)", $_POST['mail']))===FALSE){echo "<span style=\"color:red\">* E-Mail no valido</span>";} ?>
			<input type="submit" name="enviar" value="Registro"></input>
			<a href="index.php">Login</a>
	</form>
	
<?php
}
//si pasa todos los ifs inserta el usuario insertandolo por defecto como usuario normal.
else{
$sql = "INSERT INTO users (user,pass,email,rank) values ('".$_POST['user']."','".$_POST['pass']."','".$_POST['mail']."',0);";
$res = mysql_query($sql, $con); 
echo "<br/>Usuario insertado!<br/>";
echo "Usuario: ".$_POST['user']."<br/>";
echo "Pass: ".$_POST['pass']."<br/>";
echo "Email: ".$_POST['mail']."<br/>";
$_SESSION['user']=$_POST['user'];
echo "<a href='index.php'>Principal</a>";
}


?>