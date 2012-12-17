<?php 
require '../../modelo/conexion.php';;
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css"><!--body{padding-top: 20px;}--></style>
</head>
<body>

<?php
if( (isset($_GET['id'])===true )&&(isset($_GET['modifica'])===false ) ) {
$id=$_GET['id'];
echo '<br>';echo '<br>';echo '<br>';echo '<br>';
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
	<TABLE align="center">
		<TR>
			<TD>ID Item:</TD>
			<TD><INPUT TYPE="text" NAME="id" SIZE="20" MAXLENGTH="30" value="<?php echo $id ?>" readonly></TD>
		</TR>
		<TR>
			<TD>Item:</TD>
			<TD><INPUT TYPE="text" NAME="item" SIZE="20" MAXLENGTH="60"></TD>
		</TR>
		<TR>
			<TD colspan="2"><INPUT TYPE="submit" NAME="modifica" VALUE="Modifica"></TD>
		</TR>
	</TABLE>
</form>
<?php
} else { 
$id=$_GET['id'];
$item=$_GET['item'];
try{
	@ $db = new mysqli($servidor, $usuario, $contrasenia);
	if (mysqli_connect_errno() != 0)
		throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
	
	$db->select_db($bd);
	if ($db->errno != 0)
		throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
	
	$consulta = "update items set item='".$item."' where id_item='".$id."'";
	if ($db->query($consulta) === false)
		throw new ExcepcionEnTransaccion();
	$db->commit();
	
	header ("Location:../../index.php?controlador=items&accion=listar");
	$db->close(); 
}catch (ExcepcionEnTransaccion $e){
	echo 'No se ha podido realizar la modificacion';
	$db->rollback();
	$db->close();
}catch (Exception $e){
	echo $e->getMessage();
	if (mysqli_connect_errno() == 0)
		$db->close();
	exit();
}
}
?>
</body>
</html>