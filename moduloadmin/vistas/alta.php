<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<script language="javascript" src="./moduloitems/js/valida_alta_items.js" type="text/javascript"></script>
</head>
<body>
	<form action="./moduloitems/controladores/itemsControlador.php" method="POST" onSubmit="return valida()" name="formulario">
		<TABLE>
			<TR>
				<TD>Item:</TD>
				<TD><INPUT TYPE="text" NAME="item"></TD>
				<TD><INPUT TYPE="submit" NAME="alta" VALUE="Alta"></TD>
			</TR>
		</TABLE>
	</form>
</body>
</html>