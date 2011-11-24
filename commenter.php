

<?php
			$database=movies;
			$databasehost=mysql_connect("localhost","root","")or die("not connect".mysql_error());
			mysql_select_db($database) or die( "Unable to select database");
				                                        
                                        
							if($_POST["Update"]=="update")
								{
									$comments = $_POST["comments2"];
									$picID = $_POST['picID'];
								    $sqlupdate = "INSERT INTO comments (picid,comment,extra) VALUES ($picID,'$comments','')";
								    $result = mysql_query($sqlupdate);	 
								  //  echo $sqlupdate;
								  $sql="SELECT * FROM comments WHERE comments.picid = '".$_POST['picID']."'";
								$output = mysql_query($sql);
								//echo $sql;
								while($row=mysql_fetch_array($output))
							   {
							   echo "<font size='1' face='arial' color='gray'>";
							   echo $row['comment'];
							   echo "</span>";
							   echo "<br>";
								  } 
								
								}
							?>
							</div>
							   