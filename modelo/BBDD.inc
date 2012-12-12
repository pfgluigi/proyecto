<?php
@DEFINE("DB_HOST", "localhost");
@DEFINE("DB_USER", "root");
@DEFINE("DB_PASSWORD", "root1");
@DEFINE("DB_NAME", "proyecto");
	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$con || !mysql_select_db("proyecto", $con))
	{
		die("Error conectando a la BD: " . mysql_error());
	}
	?>