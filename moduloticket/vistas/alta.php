<div id="ticket">
					
					<form action="index.php?controlador=ticket&accion=alta" method="POST">
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
										<option value="baja">baja</option>
										<option selected value="media">Media</option>
										<option value="alta">Alta</option>
										<option value="urgente">Urgente</option>
									</select></td>
							</tr>
							<tr>
								<td>Asignar</td>
								<td><select name="asign">
								<?php
								include ('../modelo/BBDD.inc');
								$sql = "select * from users where rank=1;";
								$res = mysql_query($sql, $con); 
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
						
					</form>
</div>

</div>