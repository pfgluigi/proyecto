<?php
session_start();
include ('../modelo/BBDD.inc');
$user=$_GET['user'];
$pass=$_GET['pass'];
$sql="SELECT pass FROM users where user='".$user."';";
$res = @mysql_query($sql, $con); 
$password= @mysql_result($res, 0, "pass");
$filas = @mysql_num_rows($res);
if($pass==$password && $filas!=0)
	{
		
		
	if(!isset($_SESSION['user'])){
	$_SESSION['user']=$user;
	header ("Location: ../vistas/index.php");
}
}
?>
