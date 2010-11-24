<?php require_once "header.php";?>

<?php
$dir = "DivX Movies";
$dh = opendir($dir);

while ($file = readdir($dh)) {
		$file=substr($file,0, -4);
        $sql1="SELECT * FROM titles WHERE name LIKE '".$file."%'";
		$res = mysql_query($sql1) or die ("bad file name");
		
		if (mysql_num_rows($res) > 0)   {
										
										} 
		else {
			echo "$file has been added<br>";
			$sql= "INSERT INTO titles (name, category) VALUES('".$file."','')";
			mysql_query($sql) or die("failed entry");
			}
	
}
closedir($dh);
?>
<?php require_once "footer.php";?>
