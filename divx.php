<?require_once "header.php";?>

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
					<li><a href=movielist.php>categorize movies</a></li>
					<li><a href=moviereindex.php>find new movies</a></li>
					<li><a href=addcategory.php>create category</a></li>
				</ul>
			</li>
		</ul>
	</div>
<div id="content">
		<div class="post">
			<h1 class="title"><?echo $_GET['play'];?></h1>
			<div class="entry">
				<p>
<?php


echo "<video id='video' autobuffer height='400' width='600' autoplay='autoplay' >";
echo "<source src='/DivX%20Movies/".$_GET['play'].".avi'>";
echo "<source src='/DivX%20Movies/".$_GET['play'].".avi' type='video/webm'>";
echo "<source src='/DivX%20Movies/".$_GET['play'].".avi' type='video/ogg'>";
echo "</video>";

//echo "<video width='320' height='240' controls='controls' poster='poster.gif'  onclick=".playVideo('/DivX%20Movies/web/'.$_GET['play'].'.m4v')." >";
 //  echo "Your browser does not support the video tag.";
//echo "</video>";

echo "<br><a href='../LongJohn/DivX%20Movies/".$_GET['play'].".avi'>Alternate Player</a>";



//echo"<object classid='clsid:67DABFBF-D0AB-41fa-9C46-CC0F21721616' 
//width='320' height='260' 
//codebase='http://go.divx.com/plugin/DivXBrowserPlugin.cab'>
// <param name='custommode' value='none' />

//  <param name='src' value='/DivX%20Movies/".$_GET['play'].".avi' />";
//echo"<embed type='video/divx' src='/DivX%20Movies/".$_GET['play'].".avi' width='600' height='400' pluginspage='http://go.divx.com/plugin/download/'>";
//echo "</embed>";
//echo "</object>";
?>

<? require_once "footer.php";?>