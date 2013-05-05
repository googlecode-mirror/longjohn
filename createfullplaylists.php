
<?php
//this was an experiment where i wanted to pass in a  database id, create an m3u file to be saved on the server to see if it would play better on diffrent android players. It failed.
$database=movies;
		$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
		mysql_select_db($database) or die( "Unable to select database");
		
		$sql="SELECT * FROM music 
		      WHERE music.name LIKE '%".$_GET['sea']."%'
			  AND music.category LIKE '%".$_GET['cat']."%' 
			  AND music.artist LIKE '%".$_GET['folder']."%'
				AND music.id LIKE '%".$_GET['id']."%'
			  order by music.artist, music.name";

		$result2 = mysql_query($sql);


?>



<?php 
$myFile = "list.m3u ";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "#EXTM3U \r\n";
fwrite($fh, $stringData);

while($row = @mysql_fetch_array($result2)) { 
	$stringData = "http://208.53.58.134:1996/".htmlspecialchars_decode($row['path'],ENT_QUOTES)." \r\n";
	fwrite($fh, $stringData);
	}
fclose($fh);

?>

