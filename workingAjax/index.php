<? require_once "header.php";?>
<div class="post">
	<div class="title">
		<h2><?php echo date("m-d-y"); ?></h2>
	</div>
</div>
	<?php
		$result = mysql_query("SELECT * FROM pics ORDER BY date DESC LIMIT 1");
	    //echo "SELECT * FROM pics WHERE date='".date('m-d-y')."' order by date DESC LIMIT 1";
	    echo "<table align=left border =0>";
	    while($row=mysql_fetch_array($result)) {
		   $picID=$row['0'];
		   $pic_num = $row['0'];
		    echo "<tr>";
			echo "<td align=left >";
			echo "<img src=".str_replace(" ","%20",$row['path'])." ><br>";
			echo "</td>";
			echo  "<td>";
			echo '<div id="comments" style="padding-left: 5px;width: 100px; height: 300px;"><b>Comments</b><br/>';
			 include_once("ajax_comments.php");
			   //echo '<iframe src="'.include_once('ajax_comments.php').'" width ="50px" height="300px">';
			   //echo '</iframe>';
		    echo '</div>';
			echo '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td>';
			echo "<form action='index.php' method='post'>";
			echo "</form>";
			echo "<textarea cols='55' rows='3' name='comments2' id='comments2'></textarea>";
			echo '<input type="button" class="button" onclick="javascript:AddComment();" name="button" value="say something"/>';
			echo "<input type='hidden' name='Update' value='update'>";
			echo "<input type='hidden' name='picID' id='picID' value=".$pic_num.">";
			echo '</td>';
			echo "</tr>";
			echo "</table>";
			
		}
	?>
<? require_once "footer.php";?>