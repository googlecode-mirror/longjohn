<?php require_once "header.php";?>

<?php

$it = new RecursiveDirectoryIterator("pics");
foreach(new RecursiveIteratorIterator($it) as $file) {
	$cleaned = $file->getFilename();
	$cleaned = htmlspecialchars($cleaned,ENT_QUOTES);
		
	$res = mysql_query("SELECT id FROM pics WHERE name = '".$cleaned."'");
	
	if (mysql_num_rows($res) > 0) {
				echo "more than 1 <br>";
									}
	else {
	
	$folderarray=explode("\\",$file);
	$lastfolder=end($folderarray);
	$folder=prev($folderarray);
	mysql_query("INSERT INTO pics (name,path,category,comments,date) VALUES('".$cleaned."','".str_replace("\\","/",$file)."','".$folder."','All Pictures','')");
	echo $file."<br>";
	echo "XXXXXXXXXXXXXXXXLess";
	}
}

?>
<?php require_once "footer.php";?>
