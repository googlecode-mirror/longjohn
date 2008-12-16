<?php
$database=movies;
		$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
		mysql_select_db($database) or die( "Unable to select database");

$result2 = mysql_query("SELECT * FROM music WHERE music.name LIKE '%".$_GET['sea']."%'AND 
   music.category LIKE'".$_GET['cat']."' AND music.path LIKE '%".$_GET['folder']."%' AND  music.id > 2 order by music.name ");

header("content-type: audio/x-mpegurl");
?>

<?php while($row = @mysql_fetch_array($result2)) { ?>

http://192.168.25.114/LongJohn/<?php echo $row['path']; ?><?php echo " \r\n"?>
<?php }?>

