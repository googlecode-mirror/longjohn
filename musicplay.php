<?php
$database=movies;
		$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
		mysql_select_db($database) or die( "Unable to select database");
		
		$sql="SELECT * FROM music 
		      WHERE music.name LIKE '%".$_GET['sea']."%'
			  AND music.category LIKE '%".$_GET['cat']."%' 
			  AND music.artist LIKE '".$_GET['folder']."%' 
			  ORDER BY music.name";

		$result2 = mysql_query($sql);
	//echo $sql;
header("content-type: audio/x-mpegurl");


	while($row = @mysql_fetch_array($result2))
	{
	$path = $row['path'];
    $path = str_replace(" ", "%20", $path);
	?>http://192.168.25.122/LongJohn/<?php echo $path; ?><?php echo " \r\n"?><?php 
	}
 
 
 ?>

