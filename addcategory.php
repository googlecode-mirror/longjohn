<?require_once "header.php";?>
	<table  align=center>
		<td align=center>
			<form ENCTYPE="multipart/form-data" ACTION="addcategory.php" METHOD="POST">
				<input type="text" name="Name">
				<input type="submit" VALUE="create">
			</form>
		</td>
		</tr>
	</table>


<?php
if (!isset($_POST['Name'])) {

							}
else{
	$sql= "INSERT INTO category (name) VALUES('".$_POST['Name']."')";
	mysql_query($sql) or die("failed entry");
	}
$result = mysql_query("SELECT * FROM category");
echo "<table align='center'>";
   while($row=mysql_fetch_array($result))
   {
	  echo "<tr>";
        $catID=$row['id'];
        echo "<td>  <a href='addCategory.php?cmd=delete&id=$catID'>Delete</a> </td>";
        echo "<td>" .$row['name'] . "</td>";
	    echo "</tr>";
     }
echo "</table>";
?>
<?
if($_GET["cmd"]=="delete")
{
	$id = $_GET["id"];
    $sql2 = "DELETE FROM category WHERE id=$id";
    	
    $result = mysql_query($sql2);
    echo "Row deleted!";

}
?>
<? require_once "footer.php";?>
