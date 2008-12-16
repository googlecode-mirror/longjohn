<?php
    global $pic_num;

	$database=movies;
	$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
	mysql_select_db($database) or die( "Unable to select database");

    if (isset($_REQUEST['pic_id'])) {
        $sqlupdate = "INSERT INTO comments SET picid='".$_REQUEST['pic_id']."', comment='".$_REQUEST['note']."'";
        $result = mysql_query($sqlupdate);

        echo 'comments|<b>Comments</b><br/>';
        //echo $sqlupdate;

        $pic_num = $_REQUEST['pic_id'];
    }

    $sql="SELECT * FROM comments WHERE comments.picid = '".$pic_num."'";
	$output = mysql_query($sql);

	while($row=mysql_fetch_array($output)) {
		
        echo "<font size='1' face='arial' color='gray'>";
		echo $row['comment'];
		echo "<br><br>";
		
		
	}

?>