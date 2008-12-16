<?require_once "header.php";?>
<?php

$it = new RecursiveDirectoryIterator("mp3s");
foreach(new RecursiveIteratorIterator($it) as $file) {
	$cleaned = $file->getFilename();
	$cleaned = htmlspecialchars($cleaned,ENT_QUOTES);
		
	$res = mysql_query("SELECT id FROM music WHERE music.category ='Master LIST' AND music.name = '".$cleaned."'");
	
	if (mysql_num_rows($res) > 0) {
				
									}
	else {
	
	$folderarray=explode("\\",$file);
	$lastfolder=end($folderarray);
	$folder=prev($folderarray);
	mysql_query("INSERT INTO music (name,path,category,artist) VALUES('".$cleaned."','".str_replace("\\","/",$file)."','Master LIST','".$folder."')");
	echo $file."<br>";
	}
}

?>
<? require_once "footer.php";?>