<?require_once "header.php";?>
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>search</strong> books</h2>
				<ul>
					<?php
				        $sql_result = mysql_query("SELECT * FROM category where category.name != 'Exclusions'");  
				        echo "<form action='kindlefind.php' method='post' >";
						echo "Name:<br><input type='text' name='search1' value=''/><br>";
						echo "<select name='alpha'>";
						
						echo "<option value='[:alnum:]'>All</option>";
						echo "<option value='a'>A</option>";
						echo "<option value='b'>B</option>";
						echo "<option value='c'>C</option>";
						echo "<option value='e'>E</option>";
						echo "<option value='f'>F</option>";
						echo "<option value='g'>G</option>";
						echo "<option value='h'>H</option>";
						echo "<option value='i'>I</option>";
						echo "<option value='j'>J</option>";
						echo "<option value='k'>K</option>";
						echo "<option value='l'>L</option>";
						echo "<option value='m'>M</option>";
						echo "<option value='n'>N</option>";
						echo "<option value='o'>O</option>";
						echo "<option value='q'>Q</option>";
						echo "<option value='r'>R</option>";
						echo "<option value='s'>S</option>";
						echo "<option value='t'>T</option>";
						echo "<option value='u'>U</option>";
						echo "<option value='v'>V</option>";
						echo "<option value='w'>W</option>";
						echo "<option value='x'>X</option>";
						echo "<option value='y'>Y</option>";
						echo "<option value='z'>Z</option>";
						echo "</select>";
						echo "<input type='submit' value='go' />";
					echo "</form>";
					 ?>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title"><?
			     if ($_POST['category'] == null) { echo "books";}
				 if ($_POST['category'] == '%') { echo "All";}
				 else {echo $_POST['category'];}
				 ?>
				 </h1>
			<div class="entry">
				<p>
<?php
if(!isset($cmd))
{
   $result = mysql_query("SELECT * FROM books WHERE books.name LIKE '%".$_POST['search1']."%' AND books.name REGEXP '^[".$_POST['alpha']."]' order by books.author, books.name ");
   
$counter = 0;
echo "<table width=600 border = 0>";
echo "<tr>";
   while($row=mysql_fetch_array($result))
   {
   $movID=$row['0'];
		
		
		$cover= $row['cover'];
		$path= $row['path'];
	    echo "<td align=center>";
		
		echo "<img src='$cover.jpg' class='resize'>"; 
		echo "<br>";
		echo "<a href='".$path."' TYPE='application/x-mobipocket-ebook'>Download</a><br>";
		echo $row['name'];
		echo "</a>";
		echo "</td>";
		
		$counter += 1;
      if ( $counter % 5 == 0 ) { echo "</tr><tr>"; }
     }
echo "</tr>";
echo "</table>";
}
?>
<?require_once "footer.php";?>


