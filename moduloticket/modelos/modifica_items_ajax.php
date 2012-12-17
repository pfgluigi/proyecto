<?php
require '../../modelo/conexion.php';

if($_GET["mas"]!=""){
	if($_GET["mas"]!="all")
		$mas="limit 0,".$_GET["mas"];
	else
		$mas="limit 0,100";
}else
	$mas="limit 0,10";

if($_GET["radio1"]=="true")
	$orden="desc";
else if($_GET["radio2"]=="true")
	$orden="asc";
else
	$orden="asc";
	
if($_GET["criterio_ord"]!="")
	$criterio_ord=$_GET['criterio_ord']; 
else
	$criterio_ord="id"; 
	
$sql="SELECT * FROM items order by $criterio_ord ".$orden." ".$mas;
if($_GET["text"]!=""){
	$text="%".$_GET["text"]."%";
	$sql="SELECT * FROM items where (id_item like '$text') or (item like '$text') order by $criterio_ord ".$orden." ".$mas;
}
else if($_GET["text"]=="")//el us no introduce nada en el input text
	$sql = "select * from items where id_item not LIKE '%'";

$cadena="";
try{
	@ $db = new mysqli($servidor, $usuario, $contrasenia);
	if (mysqli_connect_errno() != 0)
		throw new Exception('Error conectando:'.mysqli_connect_error(), mysqli_connect_errno());
	
	$db->select_db($bd);
	if ($db->errno != 0)
		throw new Exception('Error seleccionando bd:'.$db->error, $db->errno);
		
	$resultado= $db->query($sql);
	if ($db->errno != 0)
		throw new Exception('Error realizando consulta:'.$db->error, $db->errno);

	if ($resultado->num_rows > 0){
		$cadena.= '<br>';$cadena.= '<br>';$cadena.= '<br>';$cadena.= '<br>';
			$cadena.= '<table border="0">';
			$cadena.='<tr>';
				$cadena.='<th style="color:#00afff";>ID_ITEM</th>';
				$cadena.='<th style="color:#00afff";>ITEM</th>';
				$cadena.='<th style="color:#00afff";>&nbsp;</th>';
			$cadena.='</tr>';
			while ($obj = $resultado->fetch_object()){
				LimpiaResultados($obj);
				$cadena.='<tr>';
					$cadena.='<td align="left">'.$obj->id_item.'</td>';
					$cadena.='<td align="center">'.$obj->item.'</td>';
					$cadena.= '<td align="right"><a href="./moduloitems/modelos/modifica_items_ajax1.php?id='.$obj->id_item.'">Modifica</a></td>'; 
				$cadena.='</tr>';
			} 
			$cadena.='</table>';	
	}
	$resultado->free(); 
	$db->close(); 
}catch (Exception $e){
	echo $e->getMessage();
	if (mysqli_connect_errno() == 0)
		$db->close();
	exit();
}
echo utf8_encode($cadena);
?>
