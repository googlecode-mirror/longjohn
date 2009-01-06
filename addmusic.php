<?require_once "header.php";?>

<?php
$it = new RecursiveDirectoryIterator("E:\mp3s");
foreach(new RecursiveIteratorIterator($it) as $file) {
	$name = $file->getFilename();
	$name = htmlspecialchars($name,ENT_QUOTES);
	$file = htmlspecialchars($file,ENT_QUOTES);
	$folderarray=explode("\\",$file);
	$lastfolder=end($folderarray);
	$folder=prev($folderarray);
	$path=str_replace("\\","/",$file);
	$path=substr($path,3);
	$sql="SELECT id FROM music WHERE music.category ='All' AND music.path = '".$path."'";	
	$res = mysql_query($sql) or die ("SQL failed");
	
	if (mysql_num_rows($res) > 0) {
		//if the file is already in the database do nothing
		}
	else {
		mysql_query("INSERT INTO music(name,path,category,artist) VALUES('".$name."','".$path."','All','".$folder."')");
		echo "ADDED".$name."<br>";
		//If the file is not in the database add it to the database
	}
}
?>
<? require_once "footer.php";?>