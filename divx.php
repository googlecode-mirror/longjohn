<?require_once "header.php";?>

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
<? require_once "footer.php";?>