

<?
			$database=movies;
			$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
			mysql_select_db($database) or die( "Unable to select database");
if($_GET["Update"]=="add")
{				
				$name = $_GET['name'];
				$cato = $_GET['cato'];
				$path = $_GET['path'];
				$artist = $_GET['artist'];
							
				$sqlupdate = "INSERT INTO music (name,path,category,artist) VALUES ('$name','$path','$cato','$artist')";
					$result = mysql_query($sqlupdate);
					echo "<table align=center>";
					echo "<tr>";
					echo "<td>";
					echo "<font size='1' face='arial' color='gray'>";
					echo $name;
					echo " GOT IT";
					echo "!";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
}
?>

