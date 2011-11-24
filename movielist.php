<?require_once "header.php";?>
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>search</strong> movies</h2>
				<ul>
					<?php
				    $sql_result = mysql_query("SELECT * FROM category");  
				    echo "<form action='movieList.php' method='post' >";
					echo "Name:<br><input type='text' name='search1' value=''/>";
					echo "<br>Category:<br> <select name='Category'>";
					while($row = mysql_fetch_assoc($sql_result))
				        {
				        echo "<option>$row[name]</option>";
				        }
					echo "</select>";
					echo "  <input type='submit' value='find movie' />";
					echo "</form>";
					?>
				</ul>
			</li>
			<li>
				<h2><strong>manage</strong> movies</h2>
				<ul>
					<li><a href=movielist.php>categorize movies</a></li>
					<li><a href=moviereindex.php>find new movies</a></li>
					<li><a href=addcategory.php>create category</a></li>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title"><?echo $_POST['category'];?></h1>
			<div class="entry">
				<p>
					<?php
					if(!isset($cmd))
					{
					   $result = mysql_query("SELECT * FROM titles WHERE titles.name LIKE '%".$_POST['search1']."%'AND 
					   titles.catagory LIKE'".$_POST['Category']."'order by titles.name");

					echo "<table border=1>";
					   while($row=mysql_fetch_array($result))
					   {
					   $movID=$row['0'];
					   
						    echo "<tr>";
					        echo "<td align=left><a href='divx.php?play=".$row['name']."'>Play</a> - ";
							echo $row['name']. "-";
							echo $row['catagory'];
							$sql_result = mysql_query("SELECT * FROM category");
							echo "<form action='movielist.php' method='post' >";
							echo "<select name=selection>";
							 while($row2 = mysql_fetch_assoc($sql_result))
					          {
					          echo "<option>$row2[name]</option>";
					          }
							
							echo "</select>";
							echo "<input type='hidden' name=movID value=".$row['0'].">";
							
							echo "<input type='hidden' name=Update value='update'>";
							echo " <input type='submit' value='set' >";
							echo "<a href='movieList.php?cmd=delete&id=$movID'>Delete</a>";
							
							echo "<img src=pics/".$row['name'].'.jpg'.">
							<a href=http://images.google.com/images?q=".preg_replace('/(\w+)([A-Z])/U', '\\1%20\\2', $row['name']).">find image</a>" ;
							echo "</form>";
							echo "</td>";
						    echo "</tr>";
					     }
					echo "</table>";
					}

					if($_GET["cmd"]=="delete")
					{
						$id = $_GET["id"];
					    $sql = "DELETE FROM titles WHERE id=$id";
					    $result = mysql_query($sql);
					    echo "Row deleted!";    
					}

					if($_POST["Update"]=="update")
					{
						$id2 = $_POST["movID"];
						$cato = $_POST["selection"];
					    $sqlupdate = "UPDATE titles SET catagory ='$cato' WHERE id=$id2";
					    $result = mysql_query($sqlupdate);	 
					}
					echo $sqlupdate;
					?>
<?require_once "footer.php";?>
