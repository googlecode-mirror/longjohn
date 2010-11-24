<?php require_once "header.php";?>
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>add</strong> category</h2>
				<ul>
					<form ENCTYPE="multipart/form-data" ACTION="addcategory.php" METHOD="POST">
						<input type="text" name="Name">
						<input type="submit" VALUE="create">
					</form>
				</ul>
			</li>
			<li>
				<h2><strong>manage</strong> movies</h2>
				<ul>
					<li><a href=movielist.php>categorize movies</a></li>
					<li><a href=moviereindex.php>find new movies</a></li>
					<li><a href=addcategory.php>create category</a></li>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title">categories</h1>
			<div class="entry">
				<p>
					<?php
					if (!isset($_POST['Name'])) {

												}
					else{
						$sql= "INSERT INTO category (name) VALUES('".$_POST['Name']."')";
						mysql_query($sql) or die("failed entry");
						}
					$result = mysql_query("SELECT * FROM category");
					
					   while($row=mysql_fetch_array($result))
						{
						    $catID=$row['id'];
					        echo "<br><a href='addCategory.php?cmd=delete&id=$catID'>Delete</a>";
					        echo $row['name'];
						}
					?>
					<?
					if($_GET["cmd"]=="delete")
					{
						$id = $_GET["id"];
					    $sql2 = "DELETE FROM category WHERE id=$id";
					    	
					    $result = mysql_query($sql2);
					    echo "Row deleted!";

					}
					?>
<?php require_once "footer.php";?>
