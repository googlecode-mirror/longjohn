<link rel="stylesheet" href="popper.css"/>
<?php


$title = $_GET["title"];
$title=str_replace(" ", "%20", $title);
$url = 'http://www.omdbapi.com/?t='.$title.'';

//Set stream options
$opts = array(
  'http' => array('ignore_errors' => true)
);

//Create the stream context
$context = stream_context_create($opts);

//Open the file using the defined context
$file = file_get_contents($url, false, $context);

$obj = json_decode($file);
$img = $obj->{'Poster'};
$imdb= $obj->{'imdbRating'};
$year= $obj->{'Year'};
$rated= $obj->{'Rated'};
$director= $obj->{'Director'};
$plot= $obj->{'Plot'};


echo "Rating: $imdb &nbsp";
echo "Year: $year &nbsp";
echo "Rated: $rated &nbsp";
echo "Director: $director<br>";
echo "Plot: $plot<br>";
//echo "<img src='$img' >"; 
//var_dump ($obj);
?>