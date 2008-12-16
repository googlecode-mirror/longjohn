<?require_once "header.php";?>
<div class="post">
	<div class="title">
		<h2>music</h2>
	</div>
</div>
<a href=addplaylist.php>make your list</a> | 
<a href=editmusic.php>add tunes to your lists</a><br><br>
<?php
    echo "<form action='musicfind.php' method='post'>";
	echo "Song:<input type='text' name='search1' value=''>";
	echo "Folder:<input type='text' name='search2' value=''>";
	echo "Playlist:<select name='category'>";
	 while($row = mysql_fetch_assoc($sql_result))
      {
      echo "<option>$row[name]</option>";
      }
	echo "</select>";
	echo "<input type='submit' name='go' value='go' />";
	echo "</form>";
?>

<?php
if (!isset($_POST['go'])) {

							}
else{
	$result = mysql_query("
	SELECT * FROM music 
	WHERE music.name LIKE '%".$_POST['search1']."%'
	AND music.category LIKE'%".$_POST['category']."%' 
	AND music.path LIKE '%".$_POST['search2']."%'  
	AND music.id > 2 
	order by music.artist, music.name
	");
	
	echo "<table>";
	while($row=mysql_fetch_array($result))
	{
		$cat=$_POST['category'];
		$sea=$_POST['search1'];
		$fold=$_POST['search2'];
		echo "<tr>";
    	echo "<td>";	
    	echo "<a href='musicPlay.php?cmd=play&sea=".$row['name']."&cat=".$row['category']."&folder=".$row['path']."'>play </a>";
		echo $row['name']. "<br>";
		echo "</td>";
		echo "<td>";
		echo $row['artist'];
		echo "</td>";
    	echo "</tr>";
    }
echo "</table>";
echo "<a href='musicPlay.php?cmd=play&sea=$sea&cat=$cat&folder=$fold'>Play all</a>";
}
?>
<?require_once "footer.php";?>