<?require_once "header.php";?>
<div class="post">
	<div class="title">
		<h2>movies</h2>
	</div>
</div><br>
	<?php
        $sql_result = mysql_query("SELECT * FROM category where category.name != 'Exclusions'");  
        echo "<form action='moviefind.php' method='post' >";
		echo "Name:<input type='text' name='search1' value=''/>";
		echo "Category:  <select name='category'>";
		 while($row = mysql_fetch_assoc($sql_result))
          {
          echo "<option>$row[name]</option>";
          }
		echo "</select>";
		echo "<input type='submit' value='go' />";
	echo "</form>";
	 ?>
<?php
if(!isset($cmd))
{
   $result = mysql_query("SELECT * FROM titles WHERE titles.name LIKE '%".$_POST['search1']."%'AND 
   titles.catagory LIKE'".$_POST['category']."'order by titles.name");
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
		echo substr($movName,0,10);
		echo "...";
		
		echo "</a>";
		echo "</td>";
		
		$counter += 1;
      if ( $counter % 4 == 0 ) { echo "</tr><tr>"; }
     }
echo "</tr>";
echo "</table>";
}
?>
<?require_once "footer.php";?>


