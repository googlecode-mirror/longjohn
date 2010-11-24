<?php require_once "header.php";?>
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>new</strong> style</h2>
				<ul>
					<form ENCTYPE="multipart/form-data" ACTION="updatestyle.php" METHOD="POST">
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
			<h1 class="title">style</h1>
			<div class="entry">
				<p>

<?php
if (!isset($_POST['Name'])) {

							}
else{
	$sql= "INSERT INTO style (name) VALUES('".$_POST['Name']."')";
	mysql_query($sql) or die("failed entry");
	}
$result = mysql_query("SELECT * FROM style");
echo "<table>";
   while($row=mysql_fetch_array($result))
   {
	  echo "<tr>";
        $catID=$row['id'];
        echo "<td>  <a href='updatestyle.php?cmd=delete&id=$catID'>Delete</a> </td>";
		echo "<td>  <a href='updatestyle.php?cmd=set&id=$catID'>Use this style -></a> </td>";
        echo "<td>" .$row['name'] . "</td>";
	    echo "</tr>";
     }
echo "</table>";
?>
<?php
if($_GET["cmd"]=="delete")
{
	$id = $_GET["id"];
    $sql2 = "DELETE FROM style WHERE id=$id";
    	
    $result = mysql_query($sql2);
    echo "Style Deleted!";

}

if($_GET["cmd"]=="set")
{
	$id = $_GET["id"];
	$sql3 = "UPDATE style SET active = 0";
    $sql2 = "UPDATE style SET active = 1 WHERE id=$id";
    	
    $result = mysql_query($sql3);
	$result = mysql_query($sql2);
    echo "Style set, refresh your page to view!";

}
?>
<?php require_once "footer.php";?>
