<?require_once "header.php";?>
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>search</strong> music</h2>
				<ul>
				   	<?php
					echo "<form action='editmusic.php' method='post'>";
					//echo "Folder:<br><input type='text' name='search2' value=''>";
					echo "Folder:<br><select name='search2'>";
								$sqlCat = mysql_query("SELECT SUM(id) as ID, SUBSTRING(music.artist,1,25) as artist FROM Music WHERE music.path LIKE '%Music%' GROUP BY music.artist ORDER BY artist");
							echo "<option> </option>";
							echo "<option>%</option>";
							 while($row = mysql_fetch_assoc($sqlCat))
						      {
						      echo "<option>$row[artist]</option>";
						      }
							echo "</select><br>";
					//echo "<br>move from playlists:<br><select name='playlists'>";
					//while($row = mysql_fetch_assoc($sql_result))
				     //     {
				       //   echo "<option>$row[name]</option>";
				         // }
					//echo "</select>";
					
					$sql_result = mysql_query("SELECT * FROM playlists WHERE playlists.name != 'All' ORDER BY id");
					echo "<form action='editmusic.php' method='post'>";
					echo "Playlist:";
					echo "<br>";
					echo "<select name='playlists2'>";
					echo "<option> </option>";
					while($row2 = mysql_fetch_assoc($sql_result))
						{
						echo "<option>$row2[name]</option>";
						}
					echo "</select>";
					echo "<br><input name=searh type='submit' value='go'/>";
					echo "</form>";
					?>
				</ul>
			</li>
			<li>
				<h2><strong>manage</strong> music</h2>
				<ul>
					<li><a href=editmusic.php>add tunes to your lists</a></li>
					<li><a href=addplaylist.php>make a playlist</a></li>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title"><?echo "<strong>".$_POST['search2']." </strong> to "; echo $_POST['playlists2'];?></h1>
			<div class="entry">
				<p>

<iframe 
name="iframe"
width="550"
height="25"
src="editmusic.php"
frameborder="0"
scrolling="no" >
</iframe>


<?php
if (!isset($_POST['searh'])) {

											  }
					else{
	$query = "SELECT * FROM music 
	          WHERE music.name LIKE '%".$_POST['search1']."%'
			  AND music.category LIKE 'ALL'
			  AND music.artist LIKE '%".$_POST['search2']."%'
			  order by music.artist, music.name";
	$result = mysql_query($query);
	$cat=$_POST['category'];
	$sea=$_POST['search1'];
	$fold=$_POST['search2'];
	
echo "<a href='musicplay.php?cmd=play&sea=$sea&cat=$cat&folder=$fold'>Play All<br></a>";
echo "<form action='editmusic.php' method='post' >";
	while($row=mysql_fetch_array($result))
	{
		$movID=$row['0'];
   	    
		
		echo "<input type='hidden' name=movID value=".$row['0'].">";
		echo "<input type='hidden' name=mName value=\"".$row['1']."\">";
		echo "<input type='hidden' name=path value=\"".$row['2']."\">";
		echo "<input type='hidden' name=artist value=\"".$row['4']."\">";
		echo "<input type='hidden' name=list value=\"".$_POST['playlists2']."\">";
		//echo "<a href='removeMusic.php?cmd=delete&id=$movID'target=iframe>remove</a>";
		//echo "<br>";
		//echo $_POST['playlists'];
		echo "<a href='lister.php?&Update=add&path=".$row['path']."&cato=".$_POST['playlists2']."&name=".$row['name']."&artist=".$row['artist']."'target=iframe>add</a>";
		echo " - ";
		echo $row['name'];
		echo "<br>";
		//echo "<br>";
		//echo $_POST['playlists2'];
		
		//echo $row['4'];
		   
	 }
	 }
	echo "</form>";
?>
<? require_once "footer.php";?>
