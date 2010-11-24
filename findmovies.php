<?php require_once "header.php";?>
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>search</strong> movies</h2>
				<ul>
					<?php
				        $sql_result = mysql_query("SELECT * FROM category where category.name != 'Exclusions'");  
				        echo "<form action='findmovies.php' method='post' >";
						echo "Name:<br><input type='text' name='search1' value=''/>";
						echo "<br>Category:<br><select name='category'>";
						 while($row = mysql_fetch_assoc($sql_result))
				          {
				          echo "<option>$row[name]</option>";
				          }
						echo "</select>";
						echo "<input type='submit' value='go' />";
					echo "</form>";
					 ?>
				</ul>
			</li>
			<li>
				<h2><strong>manage</strong> movies</h2>
				<ul>
					<li><a href=movielist.php>categorize movies</a></li>
					<li><a href=addmovies.php>find new movies</a></li>
					<li><a href=addcategory.php>create category</a></li>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title"><?php
			     if ($_POST['category'] == null) { echo "movies";}
				 if ($_POST['category'] == '%') { echo "All";}
				 else {echo $_POST['category'];}
				 ?>
				 </h1>
			<div class="entry">
				<p>
<?php
if(!isset($cmd))
{
   $result = mysql_query("SELECT * FROM titles WHERE titles.name LIKE '%".$_POST['search1']."%'AND 
   titles.category LIKE'".$_POST['category']."'order by titles.name");
$counter = 0;
echo "<table width=600 border = 0>";
echo "<tr>";
   while($row=mysql_fetch_array($result))
   {
   $movID=$row['0'];
		$movName= $row['name'];
	    echo "<td align=center>";
		echo "<a href='divx.php?play=$movName' title=$movName>";
		echo "<img src='pics/$movName.jpg'>"; 
		echo "<br>";
		echo substr($movName,0,15);
		echo "</a>";
		echo "</td>";
		
		$counter += 1;
      if ( $counter % 4 == 0 ) { echo "</tr><tr>"; }
     }
echo "</tr>";
echo "</table>";
}
?>
<?php require_once "footer.php";?>


