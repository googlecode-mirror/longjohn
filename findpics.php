<?php require_once "header.php";?>
	<?php
        $sql_result = mysql_query("SELECT * FROM piccategory");  
        echo "<form action='findpics.php' method='post' >";
		echo "search:  <input type='text' name='search1' value=''>";
		//echo "comments:  <input type='text' name='search2' value=''>";
		//echo "Category:  <select name='category'>";
		//while($row = mysql_fetch_assoc($sql_result))
        //  {
          //echo "<option>$row[name]</option>";
          //}
		//echo "</select>";
		echo"&nbsp";
		echo "<input type='submit' name='go' value='go'/>";
		
	echo "</form>";
	 ?>


<?php
if (!isset($_POST['go'])) {

							}
else{
   $sql1="SELECT pics.* FROM pics
   		LEFT JOIN comments ON pics.id = comments.picid
   		WHERE pics.path LIKE '%".$_POST['search1']."%'
   		
   		order by pics.name "	;
   		$result = mysql_query($sql1);
   		
echo "<table align=left>";
   while($row=mysql_fetch_array($result))
   {
   $picID=$row['0'];
	    echo "<tr>";
        echo "<td>";
		echo "<td align=center> <img src=".str_replace(" ","%20",$row['path'])." width=400 height=300><br>";
		echo $row['name']. "</td>";
		echo  "<td>";
		echo "<br>";
		echo "<a href='comments.php?update=pin&id=$picID' target=iframe>pin to home</a>";
		echo "</tr>";
     }
echo "</table>";
}


?>

<?require_once "footer.php";?>
