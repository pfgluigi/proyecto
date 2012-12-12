
<?php
session_start();
include ('../modelo/BBDD.inc');
$rank=0;
if(isset($_SESSION['user'])&& $rank==0){
$sql="SELECT rank FROM users where user='".$_SESSION['user']."';";
$res = @mysql_query($sql, $con); 
$rank= @mysql_result($res, 0, "rank");
}
if(isset($_SESSION['user'])&& $rank==0){
  include("cabecera.html");
  
	include("menu_n.html");
  echo '<div id="contenido">
	
	<!-- Principal -->
	<div id="principal"><center>Selecciona una opci&oacute;n
	</center>
	</div>
</div>';
  include("pie.html");
  }
  else if(isset($_SESSION['user'])&& $rank==1){
  include("cabecera.html");
	include("menu_a.html");
  echo '<div id="contenido">
	
	<!-- Principal -->
	<div id="principal"><center>Selecciona una opci&oacute;n
	</center>
	</div>
</div>';
  include("pie.html");
  }
  else{
  include("cabecera.html");
  include("cont.html");
  include("pie.html");
  }
  
?>
