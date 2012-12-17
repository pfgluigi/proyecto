<?php
/*$sql = "select * from tickets;";
			$res = @mysql_query($sql, $con); 
			$filas = mysql_num_rows($res);
			echo "<table border='1' id='tablatickets'>";
				for($i=0;$i<$filas;$i++)
				{
					
					$id= mysql_result($res, $i, "id");
					$title= mysql_result($res, $i, "title");
					$priority= mysql_result($res, $i, "priority");
					switch($priority){
						case "baja":
							$icon="icon/priority_low.gif";
							break;
						case "media":
							$icon="icon/priority_normal.gif";
							break;
						case "alta":
							$icon="icon/priority_high.gif";
							break;
						case "urgente":
							$icon="icon/priority_urgent.gif";
							break;
					}
					$user_id= mysql_result($res, $i, "user_id");
					$sql2 = "select user from users where id=".$user_id.";";
					$res2 = @mysql_query($sql2, $con);
					$user= mysql_result($res2, 0, "user");
					echo "<tr><td><a href='ver_ticket.php?id=".$id."'>".$id."</a><br/><img src='".$icon."'</td><td>".$title."<br/>Detectado por: ".$user."</td></tr>";
				}
			
			echo "</table>";*/
?>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="tablatickets">
	<thead>
		<tr>
			<th width="10%">Data</th>
			<th width="30%">IP Source</th>
			<th width="60%">Web destí</th>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="5" class="dataTables_empty">Carregant dades del servidor</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th>Data</th>
			<th>IP Source</th>
			<th>Web destí</th>			
		</tr>
	</tfoot>
</table>