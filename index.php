<?php include_once 'header.php';?>
<div class="post">
	<div class="title">
		<h2><?php echo date("m-d-y"); ?></h2>
	</div>
</div>
	<?php
		$sql9 = "SELECT * FROM pics ORDER BY date DESC LIMIT 1";
		$result = mysql_query($sql9, $con);
	    echo "<table align=left border =0>";
	    while($row=mysql_fetch_array($result)) {
		   $picID=$row['0'];
		   $pic_num = $row['0'];
		    echo "<tr>";
				echo "<td align=left >";
					echo "<img src=".str_replace(" ","%20",$row['path'])." ><br>";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
		
			
		}
		echo "<div>";
			echo "Welcome to longjohn. All you need to do no is add your music and movies to the database. You will add your music and movies in two diffrent steps
			</br></br> Lets start with your music";
			echo "<ul>";
				echo "<li> 1. Copy your music to the mp3s directory inside the longjohn folder. 
				If you don't have a mp3s folder inside of the longjohn folder create one. 
				If you want to store your music in another directory you will need to edit addmusic.php
				and follow the instuctions in the comments.</li>";
				echo "<li>2. Now go to the admin tab and click the add music link under tools. This will scan your mp3s directory and any sub directorys and add your music
				to the database, if your music is organized into folders by artist, those folder names will be used in the database.</li>";
				echo "<li>3. Now longjohn will create m3u playlists that you can open in windows media player or winamp allowing you to stream music over the internet. You may also need to edit the ip
				address found in musicplay.php in order to stream over the internet.</li>";
			echo "</ul>";
			echo "</br></br> Now for your divx or xvid movies.";
			echo "<ul>";
				echo "<li> Create a new directory in the longjohn folder called DivX Movies.</li>";
				echo "<li> Copy all of your divx or xvid movies to this folder. This time do not add any subdirectorys.</li>";
				echo "<li> Go the the admin tab and click add movies.</li>";
			echo "</ul>";
			echo "</br></br> One last note. If you have installed longjohn on a windows PC then your folder names are case sensitive so be sure to create them exactly as the instructions indicate.";
		echo"</div>";
	?>
<?php include_once "footer.php";?>