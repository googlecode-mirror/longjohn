<?php require_once "header.php";?>
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>new</strong> playlist</h2>
				<ul>
					<form ENCTYPE="multipart/form-data" ACTION="addplaylist.php" METHOD="POST">
						<input type="text" name="Name"><br>
						<input type="submit" VALUE="create">
					</form>
				</ul>
			</li>
			<li>
				<h2><strong>manage</strong> music</h2>
				<ul>
					<li><a href=editmusic.php>add tunes to your lists</a></li>
					<li><a href=musicfind.php>music</a></li>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title">playlists</h1>
			<div class="entry">
				<p>

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
<?php require_once "footer.php";?>
