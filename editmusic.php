<?require_once "header.php";?>
<div class="post">
	<div class="title">
		<h2>pick some tunes</h2>
	</div>
</div>
   	<?php
	echo "<form action='editmusic.php' method='post'>";
	echo "Folder:  <input type='text' name='search2' value=''>";
	echo "playlists: <select name='playlists'>";
	while($row = mysql_fetch_assoc($sql_result))
          {
          echo "<option>$row[name]</option>";
          }
	echo "</select>";
	
	$sql_result = mysql_query("SELECT * FROM playlists WHERE playlists.name != 'Master LIST' ORDER BY id");
	echo "<form action='editmusic.php' method='post' >";
	echo "to:<select name='playlists2'>";
	while($row2 = mysql_fetch_assoc($sql_result))
		{
		echo "<option>$row2[name]</option>";
		}
	echo "</select>";
	echo "<input name=sea type='submit' value='go' />";
	echo "</form>";
	?>

<iframe
name="iframe"
width="750"
height="30"
src="editmusic.php"
frameborder="0"
scrolling="no" >
</iframe>


<?php
	$query = "SELECT * FROM music WHERE music.name LIKE '%".$_POST['search1']."%'AND music.category LIKE'".$_POST['playlists']."'AND music.path LIKE '%".$_POST['search2']."%'order by music.artist, music.name";
	$result = mysql_query($query);

	echo "<table align=center>";
	while($row=mysql_fetch_array($result))
	{
		$movID=$row['0'];
   	    echo "<tr>";
        echo "<td align=left>";
		echo $row['name']. "<br>";
		echo "<form action='editmusic.php' method='post' >";
		echo "<input type='hidden' name=movID value=".$row['0'].">";
		echo "<input type='hidden' name=mName value=\"".$row['1']."\">";
		echo "<input type='hidden' name=path value=\"".$row['2']."\">";
		echo "<input type='hidden' name=artist value=\"".$row['4']."\">";
		echo "<input type='hidden' name=list value=\"".$_POST['playlists2']."\">";
		echo "</td>";
		echo "<td>";
		echo "<a href='removeMusic.php?cmd=delete&id=$movID'target=iframe>remove</a>";
		echo "<br>";
		echo $_POST['playlists'];
		echo "</td>";
		echo "<td>";
		echo "<a href='lister.php?&Update=add&path=".$row['path']."&cato=".$_POST['playlists2']."&name=".$row['name']."&artist=".$row['artist']."'target=iframe>add</a>";
		echo "<br>";
		echo $_POST['playlists2'];
		echo "</form>";
		echo "</td>";
		echo "<td>";
		echo $row['4'];
		echo "</td>";		
	    echo "</tr>";
	 }
	echo "</table>";
?>
<? require_once "footer.php";?>
