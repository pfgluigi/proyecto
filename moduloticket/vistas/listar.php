<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>Item</th>
		</tr>
		<?php while ($obj = $items->fetch_object()){		
				LimpiaResultados($obj);
		?>
			<tr>
				<td><?php echo $obj->id_item?></td>
				<td><?php echo $obj->item?></td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>

