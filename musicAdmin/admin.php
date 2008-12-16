<html>

<link rel="stylesheet" type="text/css"
href="../style.css" />

<?php
	
	$database=movies;
	$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
	mysql_select_db($database) or die( "Unable to select database");
	$sql_result = mysql_query("SELECT * FROM playlists");
?>
		<a href=../index.php> home | </a>
		<a href=../movieList.php> edit movies | </a>
		<a href=../movieReIndex.php>add movies | </a>
		<a href=../addmusic.php>add music | </a>
		<a href=../cleanmusic.php>clean music | </a>
		<a href=../addpics.php>add pictures | </a>
		<a href=../create_thumbs.php>create thumbs | </a>
		<a href=../picfind.php>pic find</a>

</html>