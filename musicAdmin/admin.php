<html>
<?php
	
	$database=movies;
	$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
	mysql_select_db($database) or die( "Unable to select database");
	$sql_result = mysql_query("SELECT * FROM playlists");
?>
<link rel="stylesheet" type="text/css"
href="../style.css" />
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>admin</strong> </h2>
				<ul>
					<li><a href=../index.php>home</a></li>
					<li><a href=../movieList.php>edit movies</a></li>
					<li><a href=../movieReIndex.php>add movies</a></li>
					<li><a href=../addmusic.php>add music</a></li>
					<li><a href=../cleanmusic.php>clean music</a></li>
					<li><a href=../addpics.php>add pictures</a></li>
					<li><a href=../create_thumbs.php>create thumbs</a></li>
					<li><a href=../picfind.php>pic find</a><li>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title"></h1>
			<div class="entry">
				<p>

</html>