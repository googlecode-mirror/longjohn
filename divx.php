<?php require_once "header.php";?>
<div id="sidebar">
		<ul>
			<li>
				<h2><strong>search</strong> movies</h2>
				<ul>
				</ul>
			</li>
			<li>
				<h2><strong>manage</strong> movies</h2>
				<ul>
					<li><a href=editmovies.php>categorize movies</a></li>
					<li><a href=addmovies.php>find new movies</a></li>
					<li><a href=addcategory.php>create category</a></li>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title"><?echo $_POST['category'];?></h1>
			<div class="entry">
				<p>
<?php
echo"<object classid='clsid:67DABFBF-D0AB-41fa-9C46-CC0F21721616' 
width='320' height='260' 
codebase='http://go.divx.com/plugin/DivXBrowserPlugin.cab'>
 <param name='custommode' value='none' />

  <param name='src' value='/DivX%20Movies/".$_GET['play'].".avi' />";
echo"<embed type='video/divx' src='/DivX%20Movies/".$_GET['play'].".avi' width='600' height='400' pluginspage='http://go.divx.com/plugin/download/'>";
echo "</embed>";
echo "</object>";
?>
<?php require_once "footer.php";?>