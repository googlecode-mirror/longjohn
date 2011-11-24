<?require_once "header.php";?>
<?
$result = mysql_query("delete from music where name like '%.jpg'");
$result = mysql_query("delete from music where name like '%.ini'");
$result = mysql_query("delete from music where name like '%.nfo'");
$result = mysql_query("delete from music where name like '%.txt'");
$result = mysql_query("delete from music where name like '%.torrent'");
$result = mysql_query("delete from music where name like '%.pdf'");
$result = mysql_query("delete from music where name like '%.db'");
echo "Non music files removed."
?>
<? require_once "footer.php";?>