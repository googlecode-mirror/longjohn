<?
			$database=movies;
			$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
			mysql_select_db($database) or die( "Unable to select database");
if($_GET["update"]=="pin")
{
				$id = $_GET['id'];

				$sqlupdate = "UPDATE pics SET date=NOW() WHERE id = $id";
					$result = mysql_query($sqlupdate);
				//	echo $sqlupdate;

}
?>

