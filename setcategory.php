
<?require_once "header.php";
if($_POST["Update"]=="update")
					{
						$id2 = $_POST["movID"];
						$cato = $_POST["selection"];
					    $sqlupdate = "UPDATE titles SET catagory ='$cato' WHERE id=$id2";
					    $result = mysql_query($sqlupdate);	 
					}
					echo $sqlupdate;

?>