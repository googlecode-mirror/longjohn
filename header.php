<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
	$database=movies;
	$con=mysql_connect('localhost','movie','qwerty')or die("not connect".mysql_error());
	mysql_select_db("movies", $con) or die( "Unable to select database <a href='newdb.php'>Click here to create a new database.</a>");
	$Style_result = mysql_query("SELECT * FROM style WHERE active = 1",$con);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>LongJohn by kevin</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php while($row = mysql_fetch_assoc($Style_result)) { echo "$row[name]"; } ?>.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- start header -->
<div id="bg2">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Long John<sup></sup></a></h1>
			<h2>web media server</h2>
		</div>
		<div id="menu">
			<ul>
				<!--<li><a href="gallery.php">photos</a></li>-->
				<li><a href="findmovies.php">Movies</a></li>
				<li><a href="findmusic.php">Music</a></li>
				<li><a href="admin.php">Admin</a></li>
			</ul>
		</div>
	</div>
</div>
<!-- end header -->
<!-- start page -->
<div id="bg3">
	<div id="bg4">
		<div id="bg5">
			<div id="page">
	
	
