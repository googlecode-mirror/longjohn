<?require_once "header.php";?>
	<div id="sidebar">
		<ul>
			<li>
				<h2><strong>search</strong> books</h2>
				<ul>
						<?php
						$sql_result = mysql_query("SELECT * FROM playlists ORDER BY id ASC");
						    echo "<form action='bookfind.php' method='post'>";
							
							echo "Book:<br><select name='search2'>";
								$sqlCat = mysql_query("SELECT SUM(id) as ID, music.artist as artist FROM Music WHERE music.path LIKE '%Audio Books%' GROUP BY music.artist ORDER BY artist");
							echo "<option>%</option>";
							while($row = mysql_fetch_assoc($sqlCat))
						    {
						    echo "<option>";
						    $artName=$row[artist];
							echo substr($artName,0,40);
						    echo "</option>";
						      }
							echo "</select>";
							echo "<input type='hidden' name='title' value='$row[artist]'>";
							echo "Search for Bookmarks:";
							echo"<input type='checkbox' name='bookmark' value='1' checked='checked' />";
							echo "<br>";
							echo "<input type='submit' name='go' value='go' />";
							echo "</form>";
						?>
				</ul>
			</li>
			
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title"><? 
								if ($_POST['search2'] == null) { echo "";}
								if ($_POST['search2'] == "%") { echo "All";}
								else {echo $_POST['search2'];}
								?>
			</h1>
			<div class="entry">
				<p>
				<iframe 
name="iframe"
width="0"
height="0"
src="bookfind.php"
frameborder="0"
scrolling="no" >
</iframe>
					<?php
					if (!isset($_POST['go'])) {

											  }
					else{
						$result = mysql_query("
						SELECT * FROM music 
						WHERE music.name LIKE '%".$_POST['search1']."%'
						AND music.category LIKE'%".$_POST['category']."%' 
						AND music.artist LIKE '".$_POST['search2']."%'  
						AND music.mark ='".$_POST['bookmark']."' 
						AND music.id > 2 
						order by music.artist, music.name
						");
						
						while($row=mysql_fetch_array($result))
						{
							$cat=$_POST['category'];
							$sea=$_POST['search1'];
							$fold=$_POST['search2'];
							$mark=$_POST['bookmark'];
							$path = htmlspecialchars_decode($row['path'],ENT_QUOTES);
							$path = str_replace("'", "&#039",$path );
							//echo "<a href='createfullplaylists.php?cmd=play&id=".$row['id']."'>createplaylistfile </a>";
							//echo "<a href='musicplay.php?cmd=play&id=".$row['id']."'>play </a>";
							//echo "<a href='http://208.53.58.134:1996/Audio%20Books/".str_replace(" ", "%20",$row['name']).".mp3"'></a>";
							echo $row['name']."&nbsp";
							echo "<a href='../".$path."'>Play</a>";
							echo "&nbsp &nbsp &nbsp";
							echo "&nbsp<a href='bookfind.php?cmd=mark&id=".$row['id']."' target=iframe>M</a>&nbsp";
							if($row['mark']==1){
							echo "-";}
							else{};
							if($row['mark']==1){
							echo "&nbsp<a href='bookfind.php?cmd=rmark&id=".$row['id']."'target=iframe>X</a>&nbsp";}
							else{};
							echo "<br>";
						}
					echo "<a href='musicplay.php?cmd=play&sea=$sea&cat=$cat&folder=$fold&mark=$mark'>Play all</a>";
					}
					if($_GET["cmd"]=="mark")
					{
						$sql="UPDATE music SET mark = 1 WHERE id = '".$_GET['id']."'";
						$result2 = mysql_query($sql);
					    echo "Bookmark Set <br>";    
						
					}
					if($_GET["cmd"]=="rmark")
					{
						$sql="UPDATE music SET mark = 0 WHERE id = '".$_GET['id']."'";
						$result2 = mysql_query($sql);
					    echo "Bookmark Set <br>";    
						
					}
					?>
				</p>
<?require_once "footer.php";?>