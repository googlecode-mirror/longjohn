<?require_once "header.php";?>
<div class="post">
	<div class="title">
		<h2>movies</h2>
	</div>
</div>
	<?php
        $sql_result = mysql_query("SELECT * FROM category where category.name != 'Exclusions'");  
        echo "<form action='moviefind.php' method='post' >";
		echo "Name:<input type='text' name='search1' value=''/>";
		//echo "Category:  <select name='category'>";
		// while($row = mysql_fetch_assoc($sql_result))
        //  {
        //  echo "<option>$row[name]</option>";
        //  }
		//echo "</select>";
		echo "<input type='submit' value='go' />";
	echo "</form>";
	 ?>
<?php
if(!isset($cmd))
{
   $result = mysql_query("SELECT * FROM titles WHERE titles.name LIKE '%".$_POST['search1']."%'AND 
   titles.catagory LIKE'".$_POST['category']."'order by titles.name");

echo "<table align=center>";
   while($row=mysql_fetch_array($result))
   {
   $movID=$row['0'];
	    echo "<tr>";
        echo "<td>
		<a href='divx.php?play=".$row['name']."'>".preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $row['name'])."</a>";
		//echo "<a href='divxSmall.php?play=".$row['name']."'>"." / Small"."</a><br>";
		echo $row['category']. "<br>";
		echo "</td>";
        echo "<td align=center> <img src=pics/".$row['name'].'.jpg'." >   </td>";
	    echo "</tr>";
     }
echo "</table>";
}
?>
<?require_once "footer.php";?>


