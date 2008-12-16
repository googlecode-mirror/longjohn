<?require_once "header.php";?>

<?php
$dir = "DivX Movies";
$dh = opendir($dir);

while ($file = readdir($dh)) {
        $sql1="SELECT * FROM titles WHERE name LIKE '".rtrim($file, '.avi')."%'";
				
		$res = mysql_query($sql1) or die ("bad file name");
		
		if (mysql_num_rows($res) > 0)   {
										
										} 
		else {
			echo "$file has been added<br>";
			$sql= "INSERT INTO titles (name) VALUES('".rtrim($file, ".avi")."')";
			mysql_query($sql) or die("failed entry");
			}
	
}
closedir($dh);
?>
<?require_once "footer.php";?>
