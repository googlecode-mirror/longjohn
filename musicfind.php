<?require_once "header.php";?>
	<div id="sidebar">
		<ul>
			<li>
				<h2><strong>search</strong> music</h2>
				<ul>
						<?php
						$sql_result = mysql_query("SELECT * FROM playlists ORDER BY id ASC");
						    echo "<form action='musicfind.php' method='post'>";
							echo "Song:<br><input type='text' name='search1' value=''><br>";
							echo "Folder:<br><select name='search2'>";
								$sqlCat = mysql_query("SELECT SUM(id) as ID, music.artist as artist FROM Music WHERE music.path LIKE '%Music%' GROUP BY music.artist ORDER BY artist");
							echo "<option>%</option>";
							 while($row = mysql_fetch_assoc($sqlCat))
						      {
						      echo "<option>";
						      $artName=$row[artist];
						      echo substr($artName,0,25);
						      echo "</option>";
						        }
							echo "</select><br>";
							echo "<input type='hidden' name='title' value='$row[artist]'>";
							echo "Playlist:<br><select name='category'>";
							while($row = mysql_fetch_assoc($sql_result))
						      {
						      echo "<option>$row[name]</option>";
						      }
							echo "</select><br>";
							echo "<input type='submit' name='go' value='go' />";
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
			<h1 class="title"><? 
								if ($_POST['search2'] == null) { echo "Music";}
								if ($_POST['search2'] == "%") { echo "All";}
								else {echo $_POST['search2'];}
								?>
			</h1>
			<div class="entry">
				<p>
					<?php
					if (!isset($_POST['go'])) {

											  }
					else{
						$result = mysql_query("
						SELECT * FROM music 
						WHERE music.name LIKE '%".$_POST['search1']."%'
						AND music.category LIKE'%".$_POST['category']."%' 
						AND music.artist LIKE '".$_POST['search2']."%'  
						AND music.id > 2 
						order by music.artist, music.name
						");
						
						while($row=mysql_fetch_array($result))
						{
							$cat=$_POST['category'];
							$sea=$_POST['search1'];
							$fold=$_POST['search2'];
							$path = htmlspecialchars_decode($row['path'],ENT_QUOTES);
							echo "<a href='musicplay.php?cmd=play&id=".$row['id']."'>play </a>";
							echo $row['name'];
							echo "<a href='../".$path."'>Download</a><br>";
						}
					echo "<a href='musicplay.php?cmd=play&sea=$sea&cat=$cat&folder=$fold'>Play all</a>";
					}
					?>
				</p>
<?require_once "footer.php";?>