<?php
$database=movies;
		$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
		mysql_select_db($database) or die( "Unable to select database");
		
		$sql="SELECT * FROM music 
		      WHERE music.name LIKE '%".$_GET['sea']."%'
			  AND music.category LIKE '%".$_GET['cat']."%' 
			  AND music.artist LIKE '%".$_GET['folder']."%' 
			  order by music.artist, music.name";

		$result2 = mysql_query($sql);
	//echo $sql;
header("content-type: audio/x-mpegurl");
header("Content-Disposition: attachment; filename=playlist.m3u");
?>
#EXTM3U
<?php while($row = @mysql_fetch_array($result2)) { ?>

http://your server address<?php echo $row['path']; ?><?php echo " \r\n"?>
<?php }?>

