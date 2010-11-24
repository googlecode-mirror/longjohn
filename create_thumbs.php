<?php

function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth ) 
{
  // open the directory
  $dir = opendir( $pathToImages );

  // loop through it, looking for any/all JPG files:
  while (false !== ($fname = readdir( $dir ))) {
    // parse path for the extension
    $info = pathinfo($pathToImages . $fname);
    // continue only if this is a JPEG image
    if ( strtolower($info['extension']) == 'jpg' ) 
    {
      echo "Creating thumbnail for {$fname} <br />";

      // load image and get image size
      $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
      $width = imagesx( $img );
      $height = imagesy( $img );

      // calculate thumbnail size
      $new_width = $thumbWidth;
      $new_height = floor( $height * ( $thumbWidth / $width ) );

      // create a new tempopary image
      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

      // copy and resize old image into new image 
      imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

      // save thumbnail into a file
      imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
    }
  }
  // close the directory
  closedir( $dir );
}

function createGallery( $pathToImages, $pathToThumbs, $galleryPage ) 
{
  echo "Creating gallery.html <br />";

  $output = "<?require_once 'header.php';?><div class='post'>
	<div class='title'>
		<h2>photos</h2>
	</div></div><br>";
  
  $output .= "<table cellspacing=\"0\" cellpadding=\"2\" width=\"600\">";
  $output .= "<tr>";

  // open the directory
  $dir = opendir( $pathToThumbs );

  $counter = 0;
  // loop through the directory
  while (false !== ($fname = readdir($dir)))
  {
    // strip the . and .. entries out
    if ($fname != '.' && $fname != '..') 
    {
      $output .= "<td valign=\"middle\" align=\"center\"><a href=\"{$pathToImages}{$fname}\">";
      $output .= "<img src=\"{$pathToThumbs}{$fname}\" border=\"0\" />";
      $output .= "</a></td>";

      $counter += 1;
      if ( $counter % 4 == 0 ) { $output .= "</tr><tr>"; }
    }
  }
  // close the directory
  closedir( $dir );

  $output .= "</tr>";
  $output .= "</table>";
  $output .= "<?require_once 'footer.php';?>";
  

  // open the file
  $fhandle = fopen( "$galleryPage", "w" );
  // write the contents of the $output variable to the file
  fwrite( $fhandle, $output ); 
  // close the file
  fclose( $fhandle );
}
?>
<?php require_once "header.php";?>
<?php
$dir = "pics";
$it = new RecursiveDirectoryIterator($dir);


foreach(new RecursiveIteratorIterator($it) as $file){

	$folderarray=explode("\\",$file);
	$lastfolder=end($folderarray);
	$folder=prev($folderarray);
	$path=str_replace("\\","/",$file);
	//uncomment the next line if you pass an absolute path to the Iterator, you will need to give apache access to the root of that directory if you use this
	//$path=substr($path,3);
			
	
	
		echo $folder;
		echo "<br>";
	
		
		
	
}
	echo "<form action='create_thumbs.php' method='post'>";
	echo "Gallery Directory:<input type='text' name='search1' value=''>";
	echo "Gallery Name:<input type='text' name='gallery' value=''>";
	echo "<input type='submit' name='go' value='go' /><br>";
	
	if (!isset($_POST['go'])) {

							}
else{
	$gallery = $_POST['gallery'].".php";

// call createThumb function and pass to it as parameters the path 
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width. 
// We are assuming that the path will be a relative path working 
// both in the filesystem, and through the web for links
createThumbs("pics/".$_POST['search1']."/","thumbs/".$_POST['search1']."/",100);
// call createGallery function and pass to it as parameters the path 
// to the directory that contains images and the path to the directory
// in which thumbnails will be placed. We are assuming that 
// the path will be a relative path working 
// both in the filesystem, and through the web for links
createGallery("pics/".$_POST['search1']."/","thumbs/".$_POST['search1']."/","$gallery");
}
?>
<?require_once "footer.php";?>