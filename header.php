<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>LongJohn by kevin</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styleW.css" rel="stylesheet" type="text/css" />
<?php
	$database=movies;
	$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
	mysql_select_db($database) or die( "Unable to select database");
	$sql_result = mysql_query("SELECT * FROM playlists ORDER BY id ASC");
?>
</head>
<body>
<!-- start header -->
<div id="bg1">
	<div id="header">
		<h1><a href="#">Long John<sup></sup></a></h1>
		<h2>web media server</h2>
	</div>
</div>
<div id="bg2">
	<!--<div id="header">-->
	<div id="header2">
		<div id="logo">
			<!--<h1><a href="#">Long John<sup></sup></a></h1>-->
			<!--<h2>web media server</h2>-->
		</div>
		
		<div id="menu">
			<ul>
				<li><a href="gallery.php">photos</a></li>
				<li><a href="moviefind.php">Movies</a></li>
				<li><a href="musicfind.php">Music</a></li>
				<li><a href="musicAdmin/admin.php">Admin</a></li>
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
	
	
