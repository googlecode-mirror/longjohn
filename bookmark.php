<?php
$database=movies;
		$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
		mysql_select_db($database) or die( "Unable to select database");
		
		$sql="UPDATE music SET mark = 1 WHERE id = '".$_GET['id']."'";
		$result2 = mysql_query($sql);
		
?>


