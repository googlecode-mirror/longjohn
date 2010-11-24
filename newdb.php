<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
if (mysql_query("CREATE DATABASE movies",$con))
  {
  echo "A new longjohn database has been created. <a href='index.php'>Click here to start using longjohn.</a>";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

// Create new database and tables
mysql_select_db("movies", $con);

$style = "CREATE TABLE style (id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name varchar(100), active MEDIUMINT)";
mysql_query($style,$con). mysql_error();

$music ="CREATE TABLE music (id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name varchar(100),path varchar(255), category varchar(255), artist varchar(100))";
mysql_query($music,$con). mysql_error();

$titles ="CREATE TABLE titles (id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name varchar(100), category varchar(255))";
mysql_query($titles,$con). mysql_error();

$category ="CREATE TABLE category (id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name varchar(100))";
mysql_query($category,$con). mysql_error();

$pics ="CREATE TABLE pics (id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name varchar(100), date date)";
mysql_query($pics,$con). mysql_error();

$playlists = "CREATE TABLE playlists (id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name varchar(100))";
mysql_query($playlists,$con). mysql_error();

$piccategory = "CREATE TABLE piccategory (id MEDIUMINT NOT NULL AUTO_INCREMENT, PRIMARY KEY(id), name varchar(100))";
mysql_query($piccategory,$con). mysql_error();

$insertstyle = "INSERT INTO style VALUES (1,'green',1)";
mysql_query($insertstyle,$con). mysql_error();

$insertcategory = "INSERT INTO category VALUES (1,'%')";
mysql_query($insertcategory,$con). mysql_error();

$insertcategory = "INSERT INTO category VALUES (2,'SciFi')";
mysql_query($insertcategory,$con). mysql_error();

$insertcategory = "INSERT INTO category VALUES (3,'Comedy')";
mysql_query($insertcategory,$con). mysql_error();

$insertcategory = "INSERT INTO category VALUES (4,'Drama')";
mysql_query($insertcategory,$con). mysql_error();

$insertcategory = "INSERT INTO category VALUES (5,'Family')";
mysql_query($insertcategory,$con). mysql_error();

$insertplaylist = "INSERT INTO playlists VALUES (1,'%')";
mysql_query($insertcategory,$con). mysql_error();

mysql_close($con);
?>