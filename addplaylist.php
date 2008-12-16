<?require_once "header.php";?>
	<div class="title">
		<form ENCTYPE="multipart/form-data" ACTION="addplaylist.php" METHOD="POST">
			<input type="text" name="Name">
			<input type="submit" VALUE="create">
		</form>
	</div>

<?php
if (!isset($_POST['Name'])) {

							}
else{
	$sql= "INSERT INTO playlists (name) VALUES('".$_POST['Name']."')";
	mysql_query($sql) or die("failed entry");
	}
$result = mysql_query("SELECT * FROM playlists");
echo "<table>";
   while($row=mysql_fetch_array($result))
   {
	  echo "<tr>";
        $catID=$row['id'];
        echo "<td>  <a href='addplaylist.php?cmd=delete&id=$catID'>Delete</a> </td>";
        echo "<td>" .$row['name'] . "</td>";
	    echo "</tr>";
     }
echo "</table>";
?>
<?
if($_GET["cmd"]=="delete")
{
	$id = $_GET["id"];
    $sql2 = "DELETE FROM playlists WHERE id=$id";
    	
    $result = mysql_query($sql2);
    echo "Row deleted!";

}
?>
<? require_once "footer.php";?>
