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
			echo  "<td>";
			echo '</div>';
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>';
			echo '</td>';
			echo "</tr>";
			echo "</table>";
		}
	?>
<?php include_once "footer.php";?>