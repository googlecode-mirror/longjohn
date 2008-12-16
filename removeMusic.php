

<?php
			$database=movies;
			$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
			mysql_select_db($database) or die( "Unable to select database");
			
		
if($_GET["cmd"]=="delete")
{
	$id = $_GET["id"];
    $sql = "DELETE FROM music WHERE music.id=$id and music.category !='Master LIST' ";
    $result = mysql_query($sql);
    echo "<table align=center>";
					echo "<tr>";
					
					echo "<td>";
					echo "<font size='1' face='arial' color='gray'>";
					echo "SONG REMOVED";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
}

?>
