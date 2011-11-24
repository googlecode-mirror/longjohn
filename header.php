<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	$database=movies;
	$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
	mysql_select_db($database) or die( "Unable to select database");
	//$sql_result = mysql_query("SELECT * FROM playlists ORDER BY id ASC");
	$Style_result = mysql_query("SELECT * FROM style WHERE active = 1");
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>LongJohn by kevin</title>

<link rel="stylesheet" href="handheld.css" media="print" type="text/css" />
<link rel="stylesheet" href="<? while($row = mysql_fetch_assoc($Style_result)) { echo "$row[name]"; } ?>.css" media="screen and (min-device-width: 481px)" type="text/css" />
<link type="text/css" rel="stylesheet" media="only screen and (max-device-width: 480px)" href="handheld.css" />
<!-- new androids -->
<link rel="stylesheet" media="screen and (-webkit-device-pixel-ratio:0.75)" href="handheld.css" />
<link rel="stylesheet" href="handheld.css" media="handheld" type="text/css" />
<!--[if IE]>
<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
<![endif]-->
<!-- tell iPhone not to shrink mobile website -->
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	</head>
		<body>
		<!-- start header -->
		<div id="header">
			<div id="logo">
				<h1><a href="#">Long John<sup></sup></a></h1>
				<h2>web media server</h2>
			</div>
			<div id="menu">
				<ul>
					<li><a href="moviefind.php">Movies</a></li>
					<li><a href="musicfind.php">Music</a></li>
					<li><a href="bookfind.php">Books</a></li>
					<li><a href="admin.php">Admin</a></li>
				</ul>
			</div>
		</div>
		<!-- end header -->
		<!-- start page -->
		<div id="page">